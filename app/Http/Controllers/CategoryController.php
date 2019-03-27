<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $Category = Category::all();
        return view('admin.category.list', compact('Category'));
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
                $this->validate(
                    $request,
                    [
                        'title' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                        'slug' => 'unique:categories,slug,'.$request->id
                    ],
                    [
                        'title.required' => 'Bạn chưa nhập tiêu đề',
                        'title.min' => 'Tiêu đề tối thiểu 3 ký tự',
                        'title.max' => 'Tiêu đề tối đa 150 ký tự',
                        'slug.unique' => 'Đường dẫn tắt sbị trùng'
                    ]
                );

                $Category = Category::find($request->id);
                if ($Category) {
                    $Category->title = $request->title;
                    if ($request->slug == '') {
                        $Category->slug = changeTitle($request->title);
                    } else {
                        $Category->slug = $request->slug;
                    }
                    $Category->save();
                    return response()->json(['success'=>'Cập nhật thành công']);
                } else {
                    return response('ID không tồn tại', 422);
                }
            }
    }

    public function destroy($id)
    {
        $Category = Category::find($id);
        if ($Category) {
            $Subcategory = SubCategory::where('id_category', $id)->get()->toArray();
            if (!empty($Subcategory)) {
                return response('Tồn tại danh mục con', 422);
            } else {
                $Category->delete();
                return response()->json(['success' => 'Xóa thành công']);
            }
        } else {
            return response('Thất bại', 422);
        }
    }

    public function store(Request $request)
    {

        if ($request->ajax()) {
            $this->validate(
                $request,
                [
                    'title' => 'required|min:3|max:150', /* không trùng tiêu đề khác */
                    'slug' => 'unique:categories,slug',
                ],
                [
                    'title.required' => 'Bạn chưa nhập tiêu đề',
                    'title.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'title.max' => 'Tiêu đề tối đa 150 ký tự',
                    'slug.unique' => 'Đường dẫn tắt bị trùng'
                ]
            );


            $Category = new Category;
            $Category->title = $request->title;
            if ($request->slug == '') {
                    $Category->slug = changeTitle($request->title);
                } else {
                $Category->slug = $request->slug;
            }
            $Category->save();
            return response()->json(['success' => 'Thêm mới thành công']);
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
                     <td><button class="btn btn-outline-primary edited" id="' . $row->id . '" title="' . $row->title . '" slug="' . $row->slug . '">Sửa</button>
                     <button type="button" class="btn btn-outline-danger delete" id="' . $row->id . '">Xóa</button>
                     </td>
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