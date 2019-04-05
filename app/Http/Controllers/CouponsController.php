<?php

namespace App\Http\Controllers;

use App\coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupons.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate(
                $request,
                [
                    'code' => 'required|min:3|max:15|unique:coupons,code', /* không trùng tiêu đề khác */
                    'Percent' => 'required|numeric|min:1|max:100',
                    'RequireTotal' => 'required|numeric|min:1000',
                    'date'=>'required',
                    'title'=>'required',
                    'thumbnail'=>'required',
                    'typeEnable'=>'required|numeric',
                    'content'=>'required'
                ],
                [
                    'code.required' => 'Bạn chưa nhập mã giảm giá',
                    'code.min' => 'Mã giảm giá tối thiểu 3 ký tự',
                    'code.max' => 'Mã giảm giá tối đa 15 ký tự',
                    'code.unique' => 'Mã bị trùng',
                    'Percent.required' => 'Vui lòng nhập % giảm giá',
                    'Percent.numeric'=>'% giảm giá phải là số',
                    'Percent.min' => '% Giảm giá tối thiểu 1',
                    'Percent.max' => '% giảm giá tối đa 100',
                    'RequireTotal.required' => 'Nhập Giá trị hóa đơn',
                    'RequireTotal.numeric' => 'Giá trị hóa đơn phải là số',
                    'RequireTotal.min' => 'Giá trị hóa đơn tối thiểu là 1000',
                    'date.required' => 'Vui lòng chọn HSD',
                    'title.required' => 'Nhập tiêu đề mã giảm giá',
                    'thumbnail.required' => 'Chọn link ảnh mã giảm giá',
                    'typeEnable.required' => 'Chọn trạng thái mã',
                    'typeEnable.numeric' => 'Trạng thái phải là giá trị nguyên',
                    'content.required' => 'Vui lòng nhập mô tả mã'
                ]
            );


            $coupons = new coupons;
            $coupons->code = $request->code;
            $coupons->Percent = $request->Percent;
            $coupons->RequireTotal = $request->RequireTotal;
            $coupons->Date = $request->date;
            $coupons->title = $request->title;
            $coupons->thumbnail = $request->thumbnail;
            $coupons->typeEnable = $request->typeEnable;
            $coupons->content = $request->content;
            $coupons->save();
            return response()->json(['success' => 'Thêm mới thành công']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit(coupons $coupons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupons $coupons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupons $coupons)
    {
        //
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $id = $request->get('id');
            if ($query != '') {
                $data = coupons::where('code', 'like', '%' . $query . '%')
                    ->orWhere('Percent', 'like', '%' . $query . '%')
                    ->orWhere('id', 'like', '%' . $query . '%')
                    ->orWhere('RequireTotal', 'like', '%' . $query . '%')
                    ->orderBy('id', 'asc')
                    ->get();
            } else {
                $data = coupons::orderBy('id', 'asc')
                    ->get();
            }
            $total_row = count($data);
            $select_data = '';
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $text = '<table class="table table-bordered"><tbody>
                    <tr>
                        <td>Tiêu đề</td>';
                    $text .= "<td colspan='2'> " . $row->title . "</td></tr>";
                    $text .= "<tr><td>Mô tả : </td><td colspan='2'>" . $row->content . "</td>";
                    $text .= "</tbody></table>";
                    $text .= "Hình ảnh <br/>";
                    $text .= " <img class='imgProduct' src='" . $row->thumbnail . "'>";
                   

                    $output .= '
                     <tr>
                     <td>' . $row->id . '</td>
                     <td><div class="tool">' . $row->code . '<span class="tool2">'.$text.'</span></div></td>
                     <td>' . $row->Percent . ' %</td>
                     <td>' . date('d-m-Y', strtotime($row->Date)) . '</td>
                     <td>' . formatMoney($row->RequireTotal) . ' Đ</td>';
                    if ($row->typeEnable == 0)
                        $output .= '<td><label class="badge badge-info badge-pill">Công Khai</label></td>';
                    elseif ($row->typeEnable == 1)
                        $output .= '<td><label class="badge badge-danger badge-pill">Riêng tư</label></td>';
                    else
                        $output .= '<td><label class="badge badge-warning badge-pill">Tiềm Năng</label></td>';
                    $output .= '<td><button class="btn btn-outline-primary edited" id="' . $row->id . '" code="' . $row->code . '" Percent="' . $row->Percent . '" RequireTotal="'.$row->RequireTotal.'" Date="'.date('d-m-Y', strtotime($row->Date)).'" title="'.$row->title.'" thumbnail="'.$row->thumbnail.'" typeEnable="'.$row->typeEnable.'" content="'.$row->content.'">Sửa</button>
                     <button type="button" class="btn btn-outline-danger delete" id="' . $row->id . '">Xóa</button>
                     </td>
                     </tr>
                    ';

                    $select_data .= '<option value="0">Công Khai</option>';
                    $select_data .= '<option value="1">Riêng tư</option>';
                    $select_data .= '<option value="2">Tiềm Năng</option>';
            
                  
                }
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
                'select_data' => $select_data
            );

            echo json_encode($data);
        }
    }
}
