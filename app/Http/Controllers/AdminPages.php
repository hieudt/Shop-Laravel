<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use Carbon\Carbon;
use App\User;
use DB;
use Yajra\Datatables\Datatables;
class AdminPages extends Controller
{
    function index()
    {
        $dayArr = array();
        $to = Carbon::now('Asia/Ho_Chi_Minh');
        $to->addDay(1);
        for ($i = 0; $i <= 6; $i++) {
            $ar = $to->subDay(1)->toDateString();
            $dayArr[] = $ar;
        }
        $data = ChartCategory();
        if(!empty($data)){
            $charts = Charts::multi('line', 'highcharts')
                ->title('Biểu đồ doanh thu theo top 4 danh mục trong 7 ngày gần nhất')
                ->elementLabel('Biểu đồ doanh thu theo top 4 danh mục trong 7 ngày gần nhất')
                ->colors(['#ff0000', 'green', 'gray', 'blue'])
                ->labels($dayArr);
            foreach ($data as $key) {
                $charts->dataset($key['DanhMuc'], [$key['Ngay' . $dayArr[0]], $key['Ngay' . $dayArr[1]], $key['Ngay' . $dayArr[2]], $key['Ngay' . $dayArr[3]], $key['Ngay' . $dayArr[4]], $key['Ngay' . $dayArr[5]], $key['Ngay' . $dayArr[6]]]);
            }
            $charts
                ->responsive(false)
                ->height(600)
                ->width(0);
        }else {
            $charts = '';
        }

        $review = DB::table('reviews')
        ->select(DB::raw('rating,count(*) as value'))
        ->groupBy('rating')
        ->get();
        $ratingValue = array();
        $ratingRate = array();
        foreach ($review as $value) {
            $ratingValue[] = $value->rating." ★";
            $ratingRate[] = $value->value;
        }
        $reviewChart = Charts::create('pie', 'highcharts')
            ->title('Độ Hài Lòng Của Khách Hàng')
            ->labels($ratingValue)
            ->values($ratingRate)
            ->dimensions(400, 300)
            ->responsive(false);
        $categoryTop = getListCategoryTop(5);
        $activity = \App\Notification::orderBy('id','desc')->where('to','Quản trị')->take(3)->get();
        return view('admin.index', ['chart' => $charts], compact('categoryTop','reviewChart','activity'));
    }

    function kanban()
    {
        return view('admin.funcBPC');
    }

    function bpc()
    {
        return view('admin.home');
    }

    function erd()
    {
        return view('admin.erd');
    }

    public function attIndex()
    {
        return view('admin.attribute.home');
    }

    public function loginIndex()
    {
        return view('admin.login');
    }

    public function loginPost(Request $req)
    {
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password'
        ]);

        if(User::where('email',$req->email)->first()->role == 0){
            return response()->json(['errors' => ['faillogin' => [0 => 'Sai tên tài khoản hoặc mật khẩu']]], 422);
        }

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $data = new \App\Notification;
            $data->action = "Đăng nhập";
            $data->idUser = Auth::user()->id;
            $data->to = "Quản trị";
            $data->task = "Trang chủ";
            $data->nameUser = Auth::user()->name;
            $data->seen = 1;
            $data->save();

            return response()->json(['success' => 'Đăng nhập thành công']);
            
        } else {
            return response()->json(['errors' => ['faillogin' => [0 => 'Sai tên tài khoản hoặc mật khẩu']]], 422);
        }
    }

    public function logoutIndex()
    {
        Auth::logout();
        return view('admin.login');
    }

    public function fetchTopProduct(){
        $data = getProductTop();
        $money = 0;
        foreach ($data as $key) {
            $money += $key->TongTien;
        }

        return Datatables::of($data)
        ->editColumn('TongTien',function($data){
            return formatMoney((int)$data->TongTien,false);
        })
        ->addColumn('progress', function ($data) use ($money){
        $number = (int)$data->TongTien;
        $new = ($number / $money) * 100;
            $output = '<div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: '. $new.'%" aria-valuenow="'.$new.'" aria-valuemin="0" aria-valuemax="100"></div>
                </div>';
            return $output;
        })->rawColumns(['progress','TongTien'])->make(true);
    }
}
