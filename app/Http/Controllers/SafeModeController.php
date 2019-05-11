<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use App\VisitLog as vl;
use Mail;
use Illuminate\Support\Facades\Artisan;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class SafeModeController extends Controller
{
    public function AlertLogin(Request $req){
        $data = vl::orderBy('updated_at','DESC')->first();
        $output = "";
        $output .= "Địa chỉ IP : ".$data->ip."<br/>";
        $output .= "Hệ điều hành :".$data->os."<br/>";
        $output .= "Tài khoản hiện hành :".$data->user_name."<br/>";
        $output .= "Vị trí :".$data->city."<br/>";
        
        $setting =\App\Setting::find(1);
        if($setting->authtokenbackend == null){
            $mailadmin = $setting->emailadmin;
            $setting->authtokenbackend = str_random(50);
            $setting->save();
            Log::warning('Cảnh báo đăng nhập trái phép vào trang quản trị');
            Mail::send('emails.alertlogin', ['output' => $output, 'token' => $setting->authtokenbackend], function ($message) use ($mailadmin) {
                $message->from('hieumai@rog.vn', 'Trung Hieu');
                $message->to($mailadmin);
            });
        }

    }

    public function updateSystem(Request $req){
        $data = \App\Setting::find(1);
        $data->emailadmin = $req->emailadmin;
        $data->save();
        Log::notice('Quản trị ' . Auth::user()->name . ' Đã cập nhật safemode hệ thống');
        return response()->json(['success'=>'Cập nhật thành công']);
    }
    
    public function rememberauth($token){
        $app = \App\Setting::find(1);
        if($token == $app->authtokenbackend){
            $app->authtokenbackend = null;
            $app->save();
            return "<script type='text/javascript'>window.localStorage.setItem('admintoken','YES')</script>";
            //return redirect()->route('admin.index')->script("window.localStorage.setItem('admintoken', 'YES')");;        
        } else {
            return redirect('/');
        }
    }

    public function turnOnSafe($token)
    {
        $app = \App\Setting::find(1);
        if ($token == $app->authtokenbackend) {
            $app->authtokenbackend = null;
            $mailadm = $app->emailadmin;
            $app->save();
            $user = User::where('role',1)->first();
            $user->remember_token = null;
            $pw = "SHOPROG" . Str::random(6);
            $user->password = bcrypt($pw);
            $user->save();
            Mail::send('emails.send', ['title' => 'Thông tin tài khoản quản trị tại cửa hàng ShopHieuMai', 'content' => 'Email : ' . $user->email . ' Mật khẩu : ' . $pw], function ($message) use ($user,$mailadm) {
                $message->from($mailadm, 'Trung Hieu');
                $message->to($user->email);
            });
            
            return redirect('/');        
        } else {
            return redirect('/');
        }
    }

    public function database(){
        Log::notice('Quản trị ' . Auth::user()->name . ' Đã xem cơ sở dữ liệu');
        return view('admin.setting.db.index');
    }

    public function dbBackup(Request $req){
        if($req->ajax()){
            Artisan::call("backup:mysql-dump");
            Log::notice('Quản trị ' . Auth::user()->name . ' Đã sao lưu csdl');
            return response()->json(['success'=>'Sao lưu thành công']);
        }
    }

    public function dbRestore(Request $req){
        if($req->ajax()){
            Log::notice('Quản trị ' . Auth::user()->name . ' Đã phục hồi csdl');
            Artisan::call("backup:mysql-restore",['--filename'=>$req->namefile,'--yes'=>true]);

            return response()->json(['success' => 'Phục hồi thành công']);
        }
    }

    public function dbfetch(){
        $data = Storage::files('backups');
        return Datatables::of($data)
        ->addColumn('action',function($data){
            $getNamefile = explode('backups/',$data);
            return "<button class='btn btn-danger restore' namefile='".$getNamefile[1]."'>Phục Hồi</button>";
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function changePass(Request $req){
        $user = User::find($req->id);
        $input = "";
        $this->validate($req, [
            'oldPass' => 'required',
            'newPass' => 'required',
            'newPassRe' => 'required|same:newPass',
        ], [
            'oldPass.required' => 'Vui lòng nhập mật khẩu cũ',
            'newPass.required' => 'Vui lòng nhập mật khẩu mới',
            'newPassRe.required' => 'Vui lòng xác thực mật khẩu mới',
            'newPassRe.same' => 'Xác thực mật khẩu không khớp'
        ]);

        if ($req->oldPass) {
            if (Hash::check($req->oldPass, $user->password)) {
                $user->password = bcrypt($req->newPass);
                $user->remember_token = null;
                $user->save();
                return response()->json(['success' => 'Thay đổi mật khẩu thành công']);
            } else {
                return response()->json(['errors' => ['faillogin' => [0 => 'Mật khẩu cũ không hợp lệ']]], 422);
            }
        }
    }
}
