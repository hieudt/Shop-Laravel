<?php

namespace App\Http\Controllers;
 
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;
use App\Zalo;
use Cache;
use Yajra\Datatables\Datatables;
use App\Product;
class GraphController extends Controller
{
    
    private $api;
    private $token = "";
    private $pagesid = "";
    private $obj = array();
    public function __construct(Facebook $fb)
    {
        $data = Zalo::where('name', 'Facebook')->first();
        $this->token = $data->app_token;
        $this->pagesid = $data->pages_id;

        $this->middleware(function ($request, $next) use ($fb) {
            $data = Zalo::where('name', 'Facebook')->first();
            $fb->setDefaultAccessToken($data->app_token);
            $this->api = $fb;
            return $next($request);
        });
    }
    
    public function fetch(){
        $obj = Cache::get('objfacebook');
       return Datatables::of($obj['datapost'])
       ->editColumn('id',function($data){
            $temp = explode('_',$data['id']);
            return "<a href='https://facebook.com/".$temp[0]."/posts/".$temp[1]."'>".$temp[1]."</a>";
       })
       ->rawColumns(['id'])
       ->make(true);
    }

    public function index(){
        try {

            $page_id = $this->pagesid;

            $obj = array();
            if(Cache::has('objfacebook')){
                $obj = Cache::get('objfacebook');
            } else {
                $accesstoken = $this->getPageAccessToken($page_id);
                $avatar = $this->api->get('/' . $page_id . '/?fields=picture', $accesstoken)->getGraphNode()->asArray();
                $infopages = $this->api->get('/' . $page_id)->getGraphNode()->asArray();
                $ar = $this->api->get('/' . $page_id . '/feed/?fields=reactions.summary(total_count),comments.summary(total_count)', $accesstoken)->getGraphEdge()->asArray();
                $datapost = $this->api->get('/'.$page_id.'/feed',$accesstoken)->getGraphEdge()->asArray();

                foreach ($datapost as $node) {
                    $temp = $this->api->get('/' . $node['id'] . '/?fields=reactions.summary(total_count)', $accesstoken)->getGraphNode()->asArray();
                    $node['countreact'] = count($temp['reactions']);
                    $obj['datapost'][] = $node;
                }
                $obj['totalreact'] = 0;
                $obj['totalpost'] = count($ar);
                $obj['totalcomment'] = 0;
                $obj['pagename'] = $infopages['name'];
                $obj['pageid'] = $infopages['id'];
                $obj['pageavatar'] = $avatar['picture']['url'];
   
                foreach ($ar as $node) {
                    $obj['totalreact'] += count($node['reactions']);
                    $obj['totalcomment'] += count($node['comments']);
                }

                Cache::put('objfacebook', $obj, 20);
            }
        } catch (FacebookSDKException $e) {
            
           // dd($e);
            return view('admin.social.facebook.dietoken');
        }

        return view('admin.social.facebook.timeline',compact('obj'));
    }

    public function scanEmail(Request $req){
        if($req->ajax()){
            $page_id = $this->pagesid;
            $accesstoken = $this->getPageAccessToken($page_id);
            $id = $page_id."_".$req->idbv;
            $data = $this->api->get('/' . $id.'/comments')->getGraphEdge()->asArray();
            $text = "";
            $count = 0;
            foreach ($data as $value) {
                if (filter_var($value['message'], FILTER_VALIDATE_EMAIL)) {
                    $text .= $value['message']."\r\n";
                    $count++;
                }
                if ($count == $req->soluong) break;
            }
            return response()->json(['success'=>$text]);
        }
    }

    public function scanOption(Request $req){
        if($req->ajax()){
            $page_id = $this->pagesid;
            $accesstoken = $this->getPageAccessToken($page_id);
            $id = $page_id . "_" . $req->idbv;
            $data = $this->api->get('/' . $id . '/comments')->getGraphEdge()->asArray();
            $text = array();
            $count = 0;
            $tempText = "";
            if($req->option == 0){
                foreach ($data as $value) {
                    $text[] = $value['from']['id'];
                }
                $text = array_unique($text);
                $temp = "";
                foreach ($text as $value) {
                    $temp .= $value."\r\n";
                    $count++;
                    if ($count == $req->soluong) break;
                }
                return response()->json(['success'=>$temp]);
            }

            if($req->option == 1){
                foreach ($data as $value) {
                    $pos = strpos($value['message'],$req->textExternal);
                    if($pos !== false){
                        $tempText .= $value['message']."\r\n";
                        $count++;
                        if ($count == $req->soluong) break;
                    }
                }

                return response()->json(['success'=>$tempText]);
                
            }

            if($req->option == 2){
                foreach ($data as  $value) {
                    $tempText .= $value['message']."|".$value['from']['id']."|".$value['from']['name']."\r\n";
                    $count++;
                    if ($count == $req->soluong) break;
                }

                return response()->json(['success'=>$tempText]);
            }
            
        }
    }

    public function retrieveUserProfile(){
        try {
 
            $params = "first_name,last_name,age_range,gender";
            $user = $this->api->get('/me?fields='.$params)->getGraphUser();
            dd($user);
 
        } catch (FacebookSDKException $e) {
 
        }
 
    }

    public function getAvatar()
    {
        $endpoint = $this->pagesid;
        $query = ['fields' => 'picture', 'access_token' => $this->pagetoken];
        return $this->runcUrl($endpoint, $query);
    }

    public function getInfopages()
    {
        $endpoint = $this->pagesid;
        $query = ['access_token' => $this->pagetoken];
        return $this->runcUrl($endpoint, $query);
    }

    public function calReact()
    {
        $endpoint = $this->pagesid . "/feed/";
        $query = ['fields' => 'reactions.summary(total_count),comments.summary(total_count)', 'access_token' => $this->pagetoken];
        return $this->runcUrl($endpoint, $query);
    }

    public function runcUrl($param, $query)
    {
        $client = new \GuzzleHttp\Client();
        $endpoint = "https://graph.facebook.com/" . $param;
        $response = $client->request('GET', $endpoint, ['query' => $query]);
        $content = $response->getBody();
        $content = json_decode($response->getBody(), true);
        return $content;
    }

    public function getPageAccessToken($page_id){
        try {
             // Get the \Facebook\GraphNodes\GraphUser object for the current user.
             // If you provided a 'default_access_token', the '{access-token}' is optional.
             $response = $this->api->get('/me/accounts', $this->token);
        } catch(FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            // When validation fails or other local issues
            return response()->json(['erros' => ['fails' => [0 => 'Token của bạn không hợp lệ vui lòng kiểm tra lại']]], 422);
            exit;
        }
     
        try {
            $pages = $response->getGraphEdge()->asArray();
            foreach ($pages as $key) {
                if ($key['id'] == $page_id) {
                    return $key['access_token'];
                }
            }
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }

    public function publishToProfile(){
        $msg = "Mai bao anh em rogteam 1 bữa bún đậu , anh không hứa đâu anh làm !";
        try {
            $response = $this->api->post('/me/feed', [
                'message' => $msg
            ])->getGraphNode()->asArray();
            if($response['id']){
               // post created
            }
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }

    public function getFeed(){
        try{
            $response = $this->api->get('/me/feed')->getGraphEdge()->asArray();
           
            dd($response);
        } catch (FacebookSDKException $e){
            dd($e);
        }
    }

    public function getPostPage(){
        $page_id = $this->pagesid;
        try {
            $post = $this->api->get('/' . $page_id . '/feed/?fields=reactions.type(LIKE).summary(total_count)')->getGraphEdge()->asArray();
            dd($post);
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }

    public function getDescriptionPage(){
        
    }

    //Upload Bài Viết Lên FanPages
    public function publishToPage(Request $req){
        if($req->ajax()){
            $data = Product::find($req->id);
            if(empty($data)){
                return response()->json(['erros'=>['fails'=>[0=>'Xảy ra lỗi vui lòng làm mới lại trang']]],422);
            }
            

            $page_id = $this->pagesid;
            $path = public_path()."/images/product/".$data->thumbnail;
            $msg1 = "☀️ HẾ LÔ SUMMER CÙNG  " . $data->title . "\n";
            $msg1 .= "🔺 COTTON MỀM MẠI, siêu lí tưởng cho ngày nắng bớt nóng! \n";
            $msg1 .= "🔺 S M L XL \n";
            $msg1 .= "🔺 LUÔN CÓ SẴN - ĐẶT LÀ SHIP !! \n";
            $msg1 .= "⭐️ Giá chỉ " . $data->cost . " đ \n";
            $msg1 .= "☑️ Khuyến mãi ngay " . $data->discount . "%";
            $postData = [
                'message' => $msg1,
                'source' => $this->api->fileToUpload($path)
            ];
            try {
                $post = $this->api->post('/' . $page_id . '/photos', $postData, $this->getPageAccessToken($page_id));
                $post = $post->getGraphNode()->asArray();
                return response()->json(['success' => "Tải lên thành công"]);
            } catch (FacebookSDKException $e) {
                dd($e);
            }
        }
        
    }
}
