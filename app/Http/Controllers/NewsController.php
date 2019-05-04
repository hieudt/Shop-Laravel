<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\DataTables;
use Mail;
use Cache;
use App\Subcriber;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class NewsController extends Controller
{
    public function index(){
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem danh sách tin tức');
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
            return '<a href="edit/'.$user->id.'"><button class="btn btn-outline-primary edited md-trigger md-setperspective">Sửa </button></a>&nbsp<button class="btn btn-outline-danger delete" data-id="' . $user->id . '">Xóa </button>&nbsp &nbsp<br/><button class="btn btn-outline-success sendMail" data-id="' . $user->id . '">Gửi Mail</button>';
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
            Cache::pull('newscache');
            Log::info('Quản trị ' . Auth::user()->name . ' Đã thêm mới tin tức '.$News->id);
            return response()->json(['success'=>"Thêm mới tin tức thành công"]);
        }
    }

    public function update(Request $req,$id){
        if ($req->ajax()) {
            $this->validate($req, [
                'txtName' => 'required',
                'editordata' => 'required',
                'txtSlug' => 'unique:news,slug,'.$id,
 
            ], [
                'txtName.required' => 'Vui lòng nhập tiêu đề',
                'editordata.required' => 'Vui lòng nhập nội dung',
                'txtSlug.unique' => 'Đường dẫn tin tức bị trùng',
   
            ]);

            $News =  News::find($id);

            $News->title = $req->txtName;
            $News->content = $req->editordata;
            if ($req->txtSlug == '') {
                $slug = changeTitle($req->txtName);
                $News->slug = $slug;
            } else {
                $News->slug = $req->txtSlug;
            }
            $News->save();
            Cache::pull('newscache');
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật tin tức ' . $News->id);
            return response()->json(['success' => "Cập nhật thành công"]);
        }
    }

    public function edit($id){
        $data = News::find($id);
        return view('admin.news.edit',compact('data'));
    }

    public function destroy($id){
        $News = News::find($id);
        if ($News) {
            $News->delete();
            Cache::pull('newscache');
            Log::info('Quản trị ' . Auth::user()->name . ' Đã xóa tin tức ' . $News->id);
            return response()->json(['success' => 'Xóa thành công']);
        } else {
            return response('Thất bại', 422);
        }
    }

    public function sendmail($id){
        $News = News::find($id);
        $data = Subcriber::all();
        if ($News) {
            Mail::send('emails.subcriber', ['title' => $News->title, 'thumbnail' => url('/')."/images/news/".$News->thumbnail,'url'=>url('/')."/tin-tuc/".$News->slug], function ($message) use ($data) {
                $message->from('hieumai@rog.vn', 'Trung Hieu');
                foreach ($data as $item) {
                    $message->to($item->email);
                }
            });
            Log::info('Quản trị ' . Auth::user()->name . ' Đã gửi mail tin tức cho người dùng id tin : ' . $News->id);
            return response()->json(['success' => 'Đã gửi cho người đăng ký nhận tin']);
        } else {
            return response('Thất bại', 422);
        }
    }

}
