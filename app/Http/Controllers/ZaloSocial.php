<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Yajra\Datatables\Datatables;
use Psy\Util\Json;
use function GuzzleHttp\json_decode;
use Config;
use PhpParser\Node\Stmt\TryCatch;
use App\Zalo;
use App\Providers\BaoKim;

class ZaloSocial extends Controller
{
    private $token= "";
    private $app_id = '';
    private $redirect_uri = '';
    private $state = 'getLogin';
    private $code = '';
    private $app_serect = '';


    public function index(){
        return view('admin.social.zalo.index');
    }

    function reload_code()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://oauth.zaloapp.com/v3/auth?app_id=' . $this->app_id . '&redirect_uri=' . $this->redirect_uri . '&state=' . $this->state);
        if ($res->getStatusCode() == 200) { // 200 OK
            $this->code = $res->getHeader('code');
        }
        dd($res->input('code'));
    }

    function getAccesstoken()
    {
        $zalo = Zalo::where('name','Zalo')->first();
        $client = new Client();
        $res = $client->request('GET', 'https://oauth.zaloapp.com/v3/access_token?app_id=' . $zalo->app_id . '&app_secret=' . $zalo->app_secrect . '&code=' . $zalo->app_code);
        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
        }
        $response_data = json_decode($response_data, true);
        $zalo->app_token = $response_data['access_token'];
        $zalo->save();
        //$response_data['access_token']
    }


    public function getInfo()
    {
        $zalo2 = Zalo::where('name', 'Zalo')->first();
        $client = new Client();
        $res = $client->request('GET', 'https://graph.zalo.me/v2.0/me?fields=id,name,birthday,picture,gender&limit=1000&access_token=' . $zalo2->app_token . '');
        $response_data = "rooxng";
        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
        }
        $response_data = json_decode($response_data, true);
        $new = array();
        //$new = $response_data['data'];
        return response()->json($response_data);
    }

    public function shareLink(Request $req){
        if($req->ajax()){
            $zalo2 = Zalo::where('name', 'Zalo')->first();
            $client = new Client();
            $res = $client->request('POST', 'https://graph.zalo.me/v2.0/me/feed?access_token=' . $zalo2->app_token . '&link='.$req->link.'&message='.$req->msg.'');
            if ($res->getStatusCode() == 200) { // 200 OK
                return response()->json(['success' => 'Chia sẻ thành công']);
            }
        }
    }

    public function getFriends(){
        
        $zalo = Zalo::where('name','Zalo');
        if($zalo->count() == 0 || $zalo->first()->app_id == ""){
            return response()->json(['errors'=>['fail'=>['Bạn chưa cấu hình zalo vui lòng cấu hình app id và app serect']]],422);
        }
        $zalo2 = Zalo::where('name','Zalo')->first();
        $client = new Client();
        $res = $client->request('GET','https://graph.zalo.me/v2.0/me/invitable_friends?access_token='.$zalo2->app_token.'&fields=id,name,birthday,picture,gender&limit=1000');
        $response_data = "rooxng";
        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
        }

        try {
            $response_data = json_decode($response_data, true);
            $new = array();
            $new = $response_data['data'];
            return Datatables::of($new)
                ->editColumn('picture.data.url', function ($new) {
                    return "<img class='avataruser' src='" . $new['picture']['data']['url'] . "'>";
                })
                ->rawColumns(['picture.data.url'])
                ->make(true);
        } catch (\Throwable $th) {
            $this->getAccesstoken();
            return response()->json(['errors' => ['fail' => ['Hệ thống đã cập nhật token của bạn vui lòng tải lại trang']]], 422);
        }
    }

    

   
}

   

    