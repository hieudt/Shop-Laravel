<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $Category = Category::all();
        return view('admin.category.list', compact('Category'));
    }

    public function store(Request $request)
    {

        if ($request->ajax()) {
            $this->validate(
                $request,
                [
                    'title' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'slug' => 'required',
                ],
                [
                    'title.required' => 'Bạn chưa nhập tiêu đề',
                    'title.min'=>'Tiêu đề tối thiểu 3 ký tự',
                    'title.max'=>'Tiêu đề tối đa 150 ký tự',
                    'slug.required'=>'Bạn chưa nhập đường dẫn tắt'
                ]
            );

            $Category = new Category;
            $Category->title = $request->title;
            $Category->slug = $request->slug;
            $Category->save();
            return response()->json(['success' => 'OK']);
        }
    }

    public function Search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                    $data = DB::table('categories')
                        ->where('title', 'like', '%' . $query . '%')
                        ->orWhere('slug', 'like', '%' . $query . '%')
                        ->orderBy('id', 'asc')
                        ->get();
                } else {
                    $data = DB::table('categories')
                        ->orderBy('id', 'asc')
                        ->get();
                }
            $total_row = $data->count();
            $output = '';
            if ($total_row > 0) {
                    foreach ($data as $row) {
                        $output .= '
                     <tr>
                     <td class="sorting_1">' . $row->id . '</td>
                     <td>' . $row->title . '</td>
                     <td>' . $row->slug . '</td>
                     <td><label class="badge badge-info badge-pill">Enable</label></td>
                     <td><button class="btn btn-outline-primary">View</button></td>
                     </tr>
                    ';
                    }
                } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }
}
