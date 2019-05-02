<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
    public function index(){
        Log::info('Quản trị ' . Auth::user()->name . ' Đã xem danh sách thương hiệu');
        return view('admin.brand.home');
    }

    public function show(){
        $data = Brand::all();
        return Datatables::of($data)
        ->editColumn('thumbnail',function($data){
            return "<img src='".$data->thumbnail."'>";
        })
        ->addColumn('action',function($data){
            return '<button class="btn btn-outline-primary edited md-trigger md-setperspective" data-modal="modal-18" data-id="' . $data->id . '" data-title="' . $data->title . '" data-slug="' . $data->slug . '" data-thumbnail="'.$data->thumbnail.'">Sửa </button>&nbsp<button class="btn btn-outline-danger delete" data-id="' . $data->id . '">Xóa </button>';
        })
        ->rawColumns(['thumbnail','action'])
        ->make(true);

    }

    public function store(Request $req)
    {
        if ($req->ajax()) {
            $this->validate(
                $req,
                [
                    'title' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'slug' => 'unique:brands,slug',
                    'thumbnail' => 'required',
                ],
                [
                    'title.required' => 'Vui lòng nhập Tiêu đề',
                    'title.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'title.max' => 'Tiêu đề tối đa 150 ký tự',
  
                    'slug.unique' => 'URL Đã trùng với brand khác',
                    'thumbnail.required' => 'Thiếu hình ảnh hiển thị'

                ]
            );


            $brand = new Brand;
            $brand->title = $req->title;
            $brand->thumbnail = $req->thumbnail;
            if ($req->slug == '') {
                $slug = changeTitle($req->title);
                $brand->slug = $slug;
            } else {
                $brand->slug = $req->slug;
            }
            $brand->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã thêm mới thương hiệu');
            return response()->json(['success' => 'Thêm mới thương hiệu thành công'], 200);
        }
    }


    public function update(Request $req)
    {
        if ($req->ajax()) {
            $this->validate(
                $req,
                [
                    'title' => 'required|min:3|max:150|unique:brands,title,'.$req->id,  /* không trùng tiêu đề khác */
                    'slug' => 'unique:brands,slug,'.$req->id,
                    'thumbnail' => 'required',
                ],
                [
                    'title.required' => 'Vui lòng nhập Tiêu đề',
                    'title.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'title.max' => 'Tiêu đề tối đa 150 ký tự',
                    'title.unique' => 'Không trùng tiêu đề với thương hiệu khác',
                    'slug.unique' => 'URL Đã trùng với brand khác',
                    'thumbnail.required' => 'Thiếu hình ảnh hiển thị'

                ]
            );


            $brand = Brand::find($req->id);
            if(!empty($brand)){
                $brand->title = $req->title;
                $brand->thumbnail = $req->thumbnail;
                if ($req->slug == '') {
                    $slug = changeTitle($req->title);
                    $brand->slug = $slug;
                } else {
                    $brand->slug = $req->slug;
                }
                $brand->save();
                Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật thương hiệu '.$req->id);
                return response()->json(['success' => 'Cập Nhật thương hiệu thành công'], 200);
            }
            
            return response()->json(['errors'=>['failupdate'=>['msg'=>'Không tìm thấy thương hiệu']]],422);
            
        }
    }

    public function fetch(Request $request){
        if ($request->ajax()) {
            $query = $request->get('query');
            $id = $request->get('id');
            $data = Brand::orderBy('id', 'asc')->get();
            $total_row = $data->count();
            $select_data = '';
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    if ($id == $row->id) {
                        $select_data .= '<option value="' . $row->id . '" selected>' . $row->title . '</option>';
                    } else {
                        $select_data .= '<option value="' . $row->id . '">' . $row->title . '</option>';
                    }
                }
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
                'select_data' => $select_data,
            );

            echo json_encode($data);
        }
    }
}
