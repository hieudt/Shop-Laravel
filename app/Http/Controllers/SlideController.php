<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Log;
class SlideController extends Controller
{
    public function index(){
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem danh sách slide');
        return view('admin.slide.index');
    }

    public function fetch(){
        $data = Slide::all();

        return Datatables::of($data)
            ->editColumn('url', function ($data) {
                return "<a href='".$data->url."'>[Liên Kết]</a>";
            })
            ->editColumn('thumbnail', function ($data) {
               return "<img class='imgProduct' src='".url('/images/sliders')."/".$data->thumbnail."'>";
            })
            ->addColumn('action', function ($ship) {
                return '<button class="btn btn-outline-danger delete" data-id="' . $ship->id . '">Xóa </button> &nbsp; <a href="edit/'.$ship->id. '"><button class="btn btn-outline-primary">Sửa</button></a>';
            })->rawColumns(['action', 'url', 'thumbnail'])->make(true);
    }

    public function destroy($id)
    {
        $Slide = Slide::find($id);
        if ($Slide) {
            $Slide->delete();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã xóa slide ' . $Slide->id);
            return response()->json(['success' => 'Xóa thành công']);
        } else {
            return response('Thất bại', 422);
        }
    }

    public function create(){
        return view('admin.slide.create');
    }

    public function store(Request $req){
        if ($req->ajax()) {
            $this->validate($req, [
                'txtTitle' => 'required',
                'txtContent' => 'required',
                'txtUrl' => 'required',
                'Image1' => 'mimes:jpeg,png,jpg|required'

            ], [
                'txtTitle.required' => 'Vui lòng nhập tiêu đề',
                'txtContent.required' => 'Vui lòng nhập nội dung',
                'txtUrl.required' => 'Vui lòng nhập đường dẫn',
                'Image1.mimes' => 'Định dạng ảnh không hợp lệ',
                'Image1.required' => 'Thiếu hình ảnh hiển thị'

            ]);

            $Slide = new Slide;
            $Slide->title = $req->txtTitle;
            $Slide->content = $req->txtContent;
            $Slide->url = $req->txtUrl;

            $File = $req->file('Image1');
            $nameImage = $File->getClientOriginalName(); // lấy tên hình 
            $Image = str_random(4) . "_" . $nameImage;
            while (file_exists("images/sliders/" . $Image)) {
                $Image = str_random(4) . "_" . $nameImage;
            }
            Image::make($File)->resize(null, 500)->save("images/sliders/" . $Image);
            $Slide->thumbnail = $Image;
            $Slide->save();
           
            Log::info('Quản trị ' . Auth::user()->name . ' Đã thêm mới slide ' . $Slide->id);
            return response()->json(['success' => "Thêm mới thành công"]);
        }
    }

    public function update(Request $req,$id){
        if ($req->ajax()) {
            $this->validate($req, [
                'txtTitle' => 'required',
                'txtContent' => 'required',
                'txtUrl' => 'required',
                'Image1.mimes' => 'Định dạng ảnh không hợp lệ',
                'Image1.required' => 'Thiếu hình ảnh hiển thị'
            ], [
                'txtTitle.required' => 'Vui lòng nhập tiêu đề',
                'txtContent.required' => 'Vui lòng nhập nội dung',
                'txtUrl.required' => 'Vui lòng nhập đường dẫn',

            ]);

            $Slide = Slide::find($id);
            $Slide->title = $req->txtTitle;
            $Slide->content = $req->txtContent;
            $Slide->url = $req->txtUrl;

            $File = $req->file('Image1');
            $nameImage = $File->getClientOriginalName(); // lấy tên hình 
            $Image = str_random(4) . "_" . $nameImage;
            while (file_exists("images/sliders/" . $Image)) {
                $Image = str_random(4) . "_" . $nameImage;
            }
            Image::make($File)->resize(null, 500)->save("images/sliders/" . $Image);
            $Slide->thumbnail = $Image;

            $Slide->save();

            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật slide ' . $Slide->id);
            return response()->json(['success' => "Cập nhật thành công"]);
        }
    }

    public function edit($id)
    {
        $data = Slide::find($id);
        return view('admin.slide.edit', compact('data'));
    }
}
