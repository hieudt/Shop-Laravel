<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function Search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Color::where('name','like','%'.$query.'%')
                        ->orWhere('slug','like','%'.$query.'%')
                        ->orderBy('id','asc')
                        ->get();
            } else {
                $data = Color::orderBy('id','asc')->get();
            }
            $total_row = $data->count();
            $select_data = '';
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                        <td>'.$row->id.'</td>
                        <td>'.$row->name.'</td>
                        <td><span class="colors" data-color="'.$row->codeColor.'"></span></td>
                        <td><label class="badge badge-info badge-pill">Enable</label></td>
                        <td><button class="btn btn-outline-primary edited" id="' . $row->id . '" title="' . $row->title . '" slug="' . $row->slug . '">Sửa</button>
                        <button type="button" class="btn btn-outline-danger delete" id="' . $row->id . '">Xóa</button></td>
                    </tr>
                    ';

                    $select_data .= '<option value="'.$row->id.'" data-color="'.$row->codeColor.'">'.$row->name.'</option>';
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

    public function store(Request $request)
    {

        if ($request->ajax()) {
            $this->validate(
                $request,
                [
                    'name' => 'required|min:3|max:150|unique:Color,name', /* không trùng tiêu đề khác */
                    'slug' => 'unique:Color,slug',
                    'codeColor' => 'required'
                ],
                [
                    'name.required' => 'Bạn chưa nhập tiêu đề',
                    'name.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'name.max' => 'Tiêu đề tối đa 150 ký tự',
                    'slug.unique' => 'Đường dẫn tắt bị trùng',
                    'name.unique' => 'Tên màu bị trùng',
                    'codeColor.required' => 'Vui lòng chọn mã màu'
                ]
            );


            $Color = new Color;
            $Color->name = $request->name;
            $Color->codeColor = $request->codeColor;
            if ($request->slug == '') {
                    $slug = changeTitle($request->name);
                    $Color->slug = $slug;

                } else {
                $Color->slug = $request->slug;
            }
            $Color->save();
            return response()->json(['success' => 'Thêm mới thành công']);
        }
    }
}
