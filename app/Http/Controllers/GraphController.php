<?php

namespace App\Http\Controllers;
 
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;
use App\Zalo;
use App\Product;
class GraphController extends Controller
{
    
    private $api;
    private $token = "";
    private $pagesid = "";
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
 
    public function retrieveUserProfile(){
        try {
 
            $params = "first_name,last_name,age_range,gender";
            $user = $this->api->get('/me?fields='.$params)->getGraphUser();
            dd($user);
 
        } catch (FacebookSDKException $e) {
 
        }
 
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

    //Upload Bài Viết Lên FanPages
    public function publishToPage(Request $req){
        if($req->ajax()){
            $data = Product::find($req->id);
            if(empty($data)){
                return response()->json(['erros'=>['fails'=>[0=>'Xảy ra lỗi vui lòng làm mới lại trang']]],422);
            }
            

            $page_id = $this->pagesid;
            dd($this->getPageAccessToken($this->pagesid));
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
