<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
class SizeController extends Controller
{
    public function Search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Size::where('name','like','%'.$query.'%')
                        ->orderBy('id','asc')
                        ->get();
            } else {
                $data = Size::orderBy('id','asc')->get();
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
                        <td><label class="badge badge-info badge-pill">Enable</label></td>
                        <td><button class="btn btn-outline-primary edited" id="' . $row->id . '" title="' . $row->title . '" >Sửa</button>
                        <button type="button" class="btn btn-outline-danger delete" id="' . $row->id . '">Xóa</button></td>
                    </tr>
                    ';

                    $select_data .= '<option value="'.$row->id.'">'.$row->name.'</option>';
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
