<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Yajra\Datatables\Datatables;
use Psy\Util\Json;
use function GuzzleHttp\json_decode;
use Config;
class ZaloSocial extends Controller
{
    private $token= "";
    private $app_id = '';
    private $redirect_uri = '';
    private $state = 'getLogin';
    private $code = '';
    private $app_serect = '';
    public function __construct(){
        $config = config('zalo');
        $this->token = $config['app_token'];
        $this->app_id = $config['app_id'];
        $this->redirect_uri = $config['app_callback'];
        $this->code = $config['app_code'];
        $this->app_serect = $config['app_serect'];
    }

    public function getFriends(){
        $token = $this->getAccesstoken();
        $client = new Client();
        $res = $client->request('GET', 'https://graph.zalo.me/v2.0/me/invitable_friends?access_token='.$token.'&fields=id,name,birthday,picture,gender&limit=1000');
        $response_data = "rooxng";
        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
        }
        $response_data = json_decode($response_data,true);
       
        $new = array();
        $new = $response_data['data'];
        return Datatables::of($new)
            ->editColumn('picture.data.url', function ($new) {
                return "<img src='" . $new['picture']['data']['url'] . "'>";
            })
            ->rawColumns(['picture.data.url'])
            ->make(true);
    }

    function reload_code(){
        $client = new Client();
        $res = $client->request('GET', 'https://oauth.zaloapp.com/v3/auth?app_id='.$this->app_id.'&redirect_uri='.$this->redirect_uri.'&state='.$this->state);
        if ($res->getStatusCode() == 200) { // 200 OK
            $this->code = $res->getHeader('code');
        }
        dd($res->input('code'));
    }

    function getAccesstoken(){
        $client = new Client();
        $res = $client->request('GET', 'https://oauth.zaloapp.com/v3/access_token?app_id='.$this->app_id.'&app_secret='.$this->app_serect.'&code='.$this->code);
        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
        }
        $response_data = json_decode($response_data,true);
        setEnv('ZALO_APP_TOKEN',$response_data['access_token']);
    }
}
