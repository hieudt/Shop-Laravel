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
