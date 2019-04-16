<?php

namespace App\Http\Controllers;
 
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GraphController extends Controller
{
    private $api;
    private $token = "EAASv7DwM85oBAL8H2JtiA8u0JwrV8By4rKbFjcBt4yxKpkbzti64aLK0De2Mn53PY3w4iL8ROfmZC6Q32T9z2s3QuF4pFxsOEKLQk7L6cDLOSvHaaqXAS71SLJJLXHHZA4mItuVHeZC1TZB7ZAj0bMXZAwuHW7bF8OvxjgyHtG49LGwY4Byq8ZC";
    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken("EAASv7DwM85oBAL8H2JtiA8u0JwrV8By4rKbFjcBt4yxKpkbzti64aLK0De2Mn53PY3w4iL8ROfmZC6Q32T9z2s3QuF4pFxsOEKLQk7L6cDLOSvHaaqXAS71SLJJLXHHZA4mItuVHeZC1TZB7ZAj0bMXZAwuHW7bF8OvxjgyHtG49LGwY4Byq8ZC");
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
