<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\DataTables;
class NewsController extends Controller
{
    public function index(){
        return view('admin.news.list');
    }

    public function fetch(){
        $data = News::orderBy('created_at','DESC')->get();

        return Datatables::of($data)
        ->editColumn('title',function($data){
            return "<a href='".url('/')."/tin-tuc/".$data->slug."'>".$data->title."</a>";
        })
        ->editColumn('thumbnail',function($data){
            return "<img src='".url('/')."/images/news/".$data->thumbnail."'>";
        })
        ->editColumn('created_at',function($data){
            return formatDate($data->created_at);
        })
        ->addColumn('action', function ($user) {
            return '<button class="btn btn-outline-primary edited md-trigger md-setperspective" data-modal="modal-18" data-id="' . $user->id . '" data-hoten="' . $user->name . '" data-email="' . $user->email . '" data-phone="' . $user->Phone . '" data-address="' . $user->Address . '">Sửa </button>&nbsp<button class="btn btn-outline-danger delete" data-id="' . $user->id . '">Xóa </button>';
        })->rawColumns(['action','thumbnail','created_at','title'])->make(true);
    }

    public function create(){
        return view('admin.news.create');
    }

    public function store(Request $req){
        if($req->ajax()){
            $this->validate($req,[
                'txtName' => 'required',
                'editordata' => 'required',
                'txtSlug' => 'unique:news,slug',
                'Image1' => 'mimes:jpeg,png,jpg|required'
            ],[
                'txtName.required' => 'Vui lòng nhập tiêu đề',
                'editordata.required' => 'Vui lòng nhập nội dung',
                'txtSlug.unique' => 'Đường dẫn tin tức bị trùng',
                'Image1.mimes' => 'Định dạng ảnh không hợp lệ',
                'Image1.required' => 'Thiếu hình ảnh hiển thị'
            ]);

            $News = new News;
            $News->title = $req->txtName;
            $News->content = $req->editordata;
            if ($req->txtSlug == '') {
                $slug = changeTitle($req->txtName);
                $News->slug = $slug;
            } else {
                $News->slug = $req->txtSlug;
            }

            
            $File = $req->file('Image1');
            $nameImage = $File->getClientOriginalName(); // lấy tên hình 
            $Image = str_random(4) . "_" . $nameImage;
            while (file_exists("images/news/" . $Image)) {
                $Image = str_random(4) . "_" . $nameImage;
            }
            //$File->move("images/news", $Image);
            Image::make($File)->resize(270, 150)->save("images/news/".$Image);
            $News->thumbnail = $Image;
            $News->save();

            return response()->json(['success'=>"Thêm mới tin tức thành công"]);
        }
    }

    public function edit(){

    }

    public function update(Request $req){

    }
}
