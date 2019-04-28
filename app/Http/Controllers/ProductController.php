<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\product_details;
use App\Images;
use App\Size;
use App\Color;
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
        
                    $data = product_details::where('id_product',$row->id)->get();
                    $text = '<table class="table table-bordered"><tbody>
                    <tr>
                        <td>Tên sản phẩm</td>';
                    $text .= "<td colspan='2'> ".$row->title."</td></tr>";
                    $text .= "<tr><td colspan='3'>Trong Kho : </td></tr>";
                    $text .= "<tr><td>Màu</td><td>Kích cỡ</td><td>Số lượng</td></tr>";
                    foreach ($data as $key) {
                        $data2 = product_details::find($key['id']);
                        $text .= "<tr><td>".$data2->Color->name."</td><td>".$data2->Size->name."</td><td>".$data2->soluong."</td>";
                    }
                    $text .= "</tbody></table>";
                    $text .= "Hình ảnh <br/>";
                    $text .= " <img class='imgProduct' src='".url('')."/images/product/".$row->thumbnail."'>"; 
                    if (!empty($row->Images[0])) 
                    $text .= " <img class='imgProduct' src='".url('')."/images/product/".$row->Images[0]->Link."'>";
                    if(!empty($row->Images[1]))
                    $text .= " <img class='imgProduct' src='".url('')."/images/product/".$row->Images[1]->Link."'>";  


                    $output .= '
                     <tr class="trProduct">
                     <td>' . $row->id . '</td>
                     <td><div class="tool">' . $row->title . '<span class="tool2">'.$text.'</span></div></td>
                     <td>' . $this->formatMoney($row->cost) . ' ₫</td>
                     <td>'.$this->formatMoney($this->priceDiscount($row->cost,$row->discount)).' ₫ (KM '.$row->discount.'%)</td>';
                    if($row->featured == 1)
                    $output .= '<td><label class="badge badge-info badge-pill">Nổi Bật </label></td>';
                    else
                    $output .= '<td><label class="badge badge-danger badge-pill">Không </label></td>';
                     $output .= '<td><a href="edit/'.$row->id.'"><button class="btn btn-outline-primary edited" id="' . $row->id . '" title="' . $row->title . '" slug="' . $row->slug . '">Sửa</button></a>
                     <button type="button" class="btn btn-outline-danger delete" id="' . $row->id . '">Xóa</button>
                     <button type="button" class="btn btn-outline-success upfb" id="'.$row->id.'">Up FB Pages</button>
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
    public function edit($id)
    {
        if($Product = Product::find($id))
        {
            $Count = count($Product->product_details);
            $Size = Size::all();
            $Color = Color::all();
            return view('admin.product.edit',compact('Product','Count','Size','Color'));
        }      
        return back();
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
	        $number = sprintf('%d', $number);  
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
    
    public function priceDiscount($Money,$Discount)
    {
       return  $Money - ($Money / 100 * $Discount);
    }
}
