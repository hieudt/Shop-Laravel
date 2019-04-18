<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use Carbon\Carbon;

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

        $charts = Charts::multi('line', 'highcharts')
            ->title('Biểu đồ doanh thu theo top 4 danh mục trong 7 ngày gần nhất')
            ->elementLabel('Biểu đồ doanh thu theo top 4 danh mục trong 7 ngày gần nhất')
            ->colors(['#ff0000', 'green', 'gray', 'blue'])
            ->labels($dayArr)
            ->dataset($data[0]['DanhMuc'], [$data[0]['Ngay' . $dayArr[0]], $data[0]['Ngay' . $dayArr[1]], $data[0]['Ngay' . $dayArr[2]], $data[0]['Ngay' . $dayArr[3]], $data[0]['Ngay' . $dayArr[4]], $data[0]['Ngay' . $dayArr[5]], $data[0]['Ngay' . $dayArr[6]]])
            ->dataset($data[1]['DanhMuc'],  [$data[1]['Ngay' . $dayArr[0]], $data[1]['Ngay' . $dayArr[1]], $data[1]['Ngay' . $dayArr[2]], $data[1]['Ngay' . $dayArr[3]], $data[1]['Ngay' . $dayArr[4]], $data[1]['Ngay' . $dayArr[5]], $data[1]['Ngay' . $dayArr[6]]])
            ->dataset($data[2]['DanhMuc'],  [$data[2]['Ngay' . $dayArr[0]], $data[2]['Ngay' . $dayArr[2]], $data[2]['Ngay' . $dayArr[2]], $data[2]['Ngay' . $dayArr[3]], $data[2]['Ngay' . $dayArr[4]], $data[2]['Ngay' . $dayArr[5]], $data[2]['Ngay' . $dayArr[6]]])
            ->dataset($data[3]['DanhMuc'],  [$data[3]['Ngay' . $dayArr[0]], $data[3]['Ngay' . $dayArr[2]], $data[3]['Ngay' . $dayArr[2]], $data[3]['Ngay' . $dayArr[3]], $data[3]['Ngay' . $dayArr[4]], $data[3]['Ngay' . $dayArr[5]], $data[3]['Ngay' . $dayArr[6]]])
            ->responsive(false)
            ->height(600)
            ->width(0);



        return view('admin.index', ['chart' => $charts]);
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

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
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
}
