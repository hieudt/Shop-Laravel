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
}
