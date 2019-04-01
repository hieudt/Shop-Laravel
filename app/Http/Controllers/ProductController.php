<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\product_details;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Product::where('title', 'like', '%' . $query . '%')
                    ->orWhere('slug', 'like', '%' . $query . '%')
                    ->orWhere('cost','like','%'.$query.'%')
                    ->orderBy('id', 'asc')
                    ->get();
            } else {
                $data = Product::orderBy('id', 'asc')
                    ->get();
            }
            $total_row = count($data);
            $select_data = '';
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    setlocale(LC_MONETARY, 'vi_VN');

                    $data = product_details::where('id_product',$row->id)->get();
                    $text = '';
                    $text .= "Tên sản phẩm : ".$row->title."<br/>";
                    $text .= "Mô tả : ".$row->description."<br/>";
                    $text .= "Trong Kho : <br/>";
                    foreach ($data as $key) {
                        $data2 = product_details::find($key['id']);
                        $text .= "Màu ".$data2->Color->name." | Kích thước ".$data2->Size->name." | Còn  : ".$data2->soluong."<br/>";
                    }
                    $text .= "Hình ảnh <br/>";
                    
                    $text .= "<img class='imgProduct' src='/images/product/".$row->thumbnail."' width='300px' height='300px'>";
                    
                    

                    $output .= '
                     <tr>
                     <td>' . $row->id . '</td>
                     <td><div class="tool">' . $row->title . '<span class="tool2">'.$text.'</span></div></td>
                     <td>' . $this->formatMoney($row->cost) . ' đ</td>
                     <td><button type="button" class="btn btn-success" data-toggle="tooltip" title="Hooray!">Click me</button></td>
                     <td><button class="btn btn-outline-primary edited" id="' . $row->id . '" title="' . $row->title . '" slug="' . $row->slug . '">Sửa</button>
                     <button type="button" class="btn btn-outline-danger delete" id="' . $row->id . '">Xóa</button>
                     </td>
                     </tr>
                    ';

                    $select_data .= '<option value="'.$row->id.'">'.$row->title.'</option>';
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%.2f', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
	}
}
