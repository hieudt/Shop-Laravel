<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use Yajra\Datatables\Datatables;
use Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    public function index(){
        $pages = Pages::nested()->get();
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem menu');
        return view('admin.pages.index',compact('pages'));
    }

    public function fetch(Request $request){
        if ($request->ajax()) {
            $data = Pages::nested()->get();
            $total_row = count($data);

            $output = '';
            if ($total_row > 0) {
                foreach ($data as $item) {
                    $output .= '
                        <li class="dd-item" data-id="'.$item['id'].'">
                            <div class="dd-handle">'.$item['name'].'</div>';
                            if(count($item['child']) > 0){
                            $output .= '<ol class="dd-list">';
                                foreach($item['child'] as $items){
                                   $output .= '<li class="dd-item" data-id="'.$items['id'].'">
                                    <div class="dd-handle">'.$items['name'].'</div>
                                    </li>';
                                }
                            $output .= '</ol>';
                            }
                            
                       $output .= '
                        </li>
                    ';
                }
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
            );

            echo json_encode($data);
        }
    }

    public function update(Request $req){
        foreach ($req->list as $key) {
           if(count($key) > 1){
               foreach ($key['children'] as $keys) {
                   $temp = Pages::find($keys['id']);
                   $temp->parent_id = $key['id'];
                   $temp->save();
               }
           } else {
               $temp = Pages::find($key['id']);
               $temp->parent_id = 0;
               $temp->save();
           }

        }
        Cache::pull('pagescache');
        return response()->json(['success' => 'Cập nhật thành công'], 200);
    }

    public function updaterecord(Request $req){
        if($req->ajax()){
            $this->validate($req, [
                'name' => 'required',
                'slug' => 'required',
                'selFooter' => 'required',
                'selMenu' => 'required'
            ], [
                'name.required' => 'Chưa nhập tiêu đề',
                'slug.required' => 'Chưa nhập đường dẫn',
                'selFooter.required' => 'Vui lòng chọn hiển thị dưới trang',
                'selMenu.required' => 'Vui lòng chọn hiển thị trên menu'
            ]);

            $pages = Pages::find($req->id);
            if(empty($pages)){
                return response()->json(['errors'=>['fail'=>['Không tồn tại menu này vui lòng tải lại trang']]],422);
            }
            $pages->name = $req->name;
            $pages->slug = $req->slug;
            $pages->enableFooter = $req->selFooter;
            $pages->enableMenu = $req->selMenu;
            $pages->save();
            Cache::pull('pagescache');
            return response()->json(['success' => 'Cập nhật thành công']);
        }
    }

    public function fetchDb(){
        $data = Pages::all();
        return Datatables::of($data)
        ->editColumn('parent_id',function($data){
            $pages = Pages::find($data->parent_id);
            if($data->parent_id == 0){
                return "Không";
            }else {
                return $pages['name'];
            }
            
        })
        ->editColumn('slug',function($data){
            return "<a href='".url('/')."/".$data->slug."'>Đường Dẫn</a>";
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-outline-primary edited md-trigger md-setperspective" data-modal="modal-18" data-id="' . $data->id . '" data-name="' . $data->name . '" data-slug="' . $data->slug . '" data-selfooter="' . $data->enableFooter . '" data-selMenu="' . $data->enableMenu . '">Sửa </button>&nbsp<button class="btn btn-outline-danger delete" data-id="' . $data->id . '">Xóa </button>';
        })
        ->addColumn('status', function ($data) {
            if($data->parent_id == 0){
                $output = '';
                if($data->enableFooter == 1) $output .= '<div class="badge badge-success">Footer</div>';
                else $output .= '<div class="badge badge-danger">Footer</div>';
                if($data->enableMenu == 1) $output .= '<div class="badge badge-success">Menu</div>';
                else $output .= '<div class="badge badge-danger">Menu</div>';

                return $output;
            }else {
                return "";
            }
        })
        ->rawColumns(['parent_id','slug','action','status'])
        ->make(true);
    }

    public function store(Request $req){
        if($req->ajax()){
            $this->validate($req,[
                'name' => 'required',
                'slug' => 'required',
                'selFooter' => 'required',
                'selMenu' => 'required'
            ],[
                'name.required' => 'Chưa nhập tiêu đề',
                'slug.required' => 'Chưa nhập đường dẫn',
                'selFooter.required' => 'Vui lòng chọn hiển thị dưới trang',
                'selMenu' => 'Vui lòng chọn hiển thị trên menu'
            ]);

            $pages = new Pages;
            $pages->name = $req->name;
            $pages->slug = $req->slug;
            $pages->enableFooter = $req->selFooter;
            $pages->enableMenu = $req->selMenu;
            $pages->save();
            Cache::pull('pagescache');
            Log::info('Quản trị ' . Auth::user()->name . ' Đã thêm mới menu');
            return response()->json(['success'=>'Thêm mới thành công']);
        }
    }
}
