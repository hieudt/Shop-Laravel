<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use Yajra\Datatables\Datatables;
class PagesController extends Controller
{
    public function index(){
        $pages = Pages::nested()->get();
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

        return response()->json(['success' => 'Cập nhật thành công'], 200);
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
        ->rawColumns(['parent_id'])
        ->make(true);
    }
}
