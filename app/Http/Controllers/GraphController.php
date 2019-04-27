<?php

namespace App\Http\Controllers;
 
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;

class GraphController extends Controller
{
    private $api;
    private $token = "EAASv7DwM85oBAFjjBghsIyPaC7qkWemxlxzS7Dxrl0myrP2xxAu1N8mgmtzrvpfYgiwlowNFPl6S16eWMNcuZClDlAjdqwYiI8zvgqV4c3yvaM83xqRxZArH9FmBYOZCkRnPZBQKT1PZAqZAcSvX6E0n1Qc4KfcoY14ZCylumGmRwZDZD";
    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken("EAASv7DwM85oBAFjjBghsIyPaC7qkWemxlxzS7Dxrl0myrP2xxAu1N8mgmtzrvpfYgiwlowNFPl6S16eWMNcuZClDlAjdqwYiI8zvgqV4c3yvaM83xqRxZArH9FmBYOZCkRnPZBQKT1PZAqZAcSvX6E0n1Qc4KfcoY14ZCylumGmRwZDZD");
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
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
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
        $page_id = '491152857694713';
        try {
            $post = $this->api->get('/' . $page_id . '/feed/?fields=reactions.type(LIKE).summary(total_count)')->getGraphEdge()->asArray();
            dd($post);
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }

    //Upload Bài Viết Lên FanPages
    public function publishToPage(Request $req){
 
        $page_id = '491152857694713';
        $msg1 = "☀️ HẾ LÔ SUMMER CÙNG ÁO PHÔNG ".$req->title."\n";
        $msg1 .= "🔺 COTTON MỀM MẠI, siêu lí tưởng cho ngày nắng bớt nóng! \n";
        $msg1 .= "🔺 S M L XL \n";
        $msg1 .= "🔺 LUÔN CÓ SẴN - ĐẶT LÀ SHIP !! \n";
        $msg1 .= "⭐️ Giá chỉ ".$req->price." đ \n";
        $msg1 .= "☑️ Khuyến mãi ngay ".$req->discount."%";
     
        try {
            $post = $this->api->post('/' . $page_id . '/feed', array('message' => $msg1), $this->getPageAccessToken($page_id));
            $post = $post->getGraphNode()->asArray();
            return response()->json(['success'=>"ok"]);

        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }
}
