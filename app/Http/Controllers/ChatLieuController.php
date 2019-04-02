<?php

namespace App\Http\Controllers;

use App\ChatLieu;
use Illuminate\Http\Request;

class ChatLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                    'name' => 'required|min:3|max:150|unique:ChatLieu,name', /* không trùng tiêu đề khác */
                    'slug' => 'unique:ChatLieu,slug',
                ],
                [
                    'name.required' => 'Bạn chưa nhập tiêu đề',
                    'name.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'name.max' => 'Tiêu đề tối đa 150 ký tự',
                    'slug.unique' => 'Đường dẫn tắt bị trùng',
                    'name.unique' => 'Tên chất liệu bị trùng'
                ]
            );


            $ChatLieu = new ChatLieu;
            $ChatLieu->name = $request->name;
            if ($request->slug == '') {
                    $slug = changeTitle($request->name);
                    $ChatLieu->slug = $slug;

                } else {
                $ChatLieu->slug = $request->slug;
            }
            $ChatLieu->save();
            return response()->json(['success' => 'Thêm mới thành công']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatLieu  $chatLieu
     * @return \Illuminate\Http\Response
     */
    public function show(ChatLieu $chatLieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatLieu  $chatLieu
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatLieu $chatLieu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChatLieu  $chatLieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatLieu $chatLieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatLieu  $chatLieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatLieu $chatLieu)
    {
        //
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $id = $request->get('id');
            if ($query != '') {
                $data = ChatLieu::where('name','like','%'.$query.'%')
                        ->orWhere('slug','like','%'.$query.'%')
                        ->orderBy('id','asc')
                        ->get();
            } else {
                $data = ChatLieu::orderBy('id','asc')->get();

            }
            $total_row = $data->count();
            $select_data = '';
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    ';

                    if($id == $row->id){
                        $select_data .= '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
                    } else {
                        $select_data .= '<option value="'.$row->id.'">'.$row->name.'</option>';
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
