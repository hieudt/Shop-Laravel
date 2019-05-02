<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product_details;
use App\Product;
use Pusher\Pusher;
use App\Shipper;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\coupons;
use Cache;
use Gloudemans\Shoppingcart\Facades\Cart;
use SEO;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function destroy(Request $req){
        if($req->ajax()){
            $flag = 0;
            foreach (Cart::content() as $item) {
                if($item->rowId == $req->rowid){
                    $flag = 1; break;
                }
            }

            if($flag == 0) return response()->json(['errors' => ['faillogin' => [0 => 'Không hợp lệ vui lòng tải lại trang']]], 422);
            Cart::remove($req->rowid);
            $this->eventLoadCart();
            return response()->json(['success'=>'Xóa sản phẩm thành công']);
        }
       
    }

    public function cart(){
        SEO::setTitle('Giỏ hàng');
        SEO::setDescription('Giỏ hàng');
        SEOMeta::addKeyword(['Giỏ hàng']);

        $carts = array();
        return view('cart',compact('carts'));
    }

    public function store(Request $req){
        if($req->ajax()){
            
            $this->validate($req,[
                'idProduct' => 'required',
                'Number' => 'required|numeric|min:1|max:100',
                'idSize' => 'required',
                'idColor' => 'required'
            ],[
                'idProduct.required' => 'Sản phẩm không hợp lệ',
                'Number.required' => 'Vui lòng chọn số lượng',
                'Number.numeric' => 'Số lượng phải là số',
                'Number.min' => 'Số lượng ít nhất là 1',
                'Number.max' => 'Số lượng nhiều nhất là 100',
                'idSize.required' => 'Kích thước không hợp lệ',
                'idColor.required' => 'Màu sản phẩm không hợp lệ'
            ]);

            $product = product_details::where('id_product',$req->idProduct)
            ->where('id_size',$req->idSize)
            ->where('id_color',$req->idColor)
            ->first();

            if(empty($product))
            return response()->json(['errors'=>['faillogin'=>[0=>'Sản phẩm không hợp lệ,kiểm tra lại kích thước và màu sắc [ERROR 101]']]],422);
            
            if($req->Number > $product->soluong)
            return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng trong kho không đủ [ERROR102]']]],422);

            $pr = Product::find($req->idProduct);

            $price = priceDiscount($pr->cost,$pr->discount);
            $checkNumber = Cart::search(function($cartItem,$rowId) use($product){
                return $cartItem->id === $product->id;
            });

            if($checkNumber->isNotEmpty()){
                foreach($checkNumber as $item){
                    if(($item->qty + $req->Number) > $product->soluong)
                    return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng trong kho không đủ [ERROR104]']]],422);
                }
                
            }
            $typeDiscount = ['discount'=>0,'coupon'=>0];
            if($pr->discount > 0){
                $typeDiscount = ['discount'=>$pr->discount,'coupon'=>0];
            }
            if (session()->get('coupon') && $pr->discount == 0) {
                $typeDiscount = ['discount'=>session()->get('coupon')['discount'],'coupon'=>1];
            } 
            Cart::add($product->id,$pr->title,$req->Number,$pr->cost,$typeDiscount)
            ->associate('App\product_details');
            $this->eventLoadCart();
            return response()->json(['success'=>'Thêm giỏ hàng thành công'],200);
        }
        
    }

    public function fromWishlist(Request $req){
        $product = product_details::where('id_product', $req->idProduct)
            ->where('id_size', $req->idSize)
            ->where('id_color', $req->idColor)
            ->first();

        if (empty($product))
            return response()->json(['errors' => ['faillogin' => [0 => 'Sản phẩm không hợp lệ,kiểm tra lại kích thước và màu sắc [ERROR 101]']]], 422);

        if ($req->Number > $product->soluong)
            return response()->json(['errors' => ['failnumber' => [0 => 'Số lượng trong kho không đủ [ERROR102]']]], 422);

        $pr = Product::find($req->idProduct);

        $price = priceDiscount($pr->cost, $pr->discount);
        $checkNumber = Cart::instance('default')->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if ($checkNumber->isNotEmpty()) {
            foreach ($checkNumber as $item) {
                if (($item->qty + $req->Number) > $product->soluong)
                    return response()->json(['errors' => ['failnumber' => [0 => 'Số lượng trong kho không đủ [ERROR104]']]], 422);
            }
        }
        $typeDiscount = ['discount' => 0, 'coupon' => 0];
        if ($pr->discount > 0) {
            $typeDiscount = ['discount' => $pr->discount, 'coupon' => 0];
        }
        if (session()->get('coupon') && $pr->discount == 0) {
            $typeDiscount = ['discount' => session()->get('coupon')['discount'], 'coupon' => 1];
        }
        Cart::instance('default')->add($product->id, $pr->title, $req->Number, $pr->cost, $typeDiscount)
            ->associate('App\product_details');
        $this->eventLoadCart();
        return response()->json(['success' => 'Thêm giỏ hàng thành công'], 200);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            
            $output = '';
            $outputPopup = '';
            $outputcheckout = '';
            $giaCu = 0;
            if (Cart::content()->count() > 0) {
                foreach (Cart::content() as $item) {
                    $output .= '
                    <tr id="item">
                    <td>
                        <div class="traditional-cart-entry">
                            <a href="#" class="image">
                                <img src="'.url('/').'/images/product/'.$item->model->Product->thumbnail.'">
                            </a>
                            <div class="content">
                                <div class="cell-view">
                                    <a class="title" href="/san-pham/'.$item->model->Product->id.'/'.$item->model->Product->slug.'">'.$item->name.' 
                                        <ul id="ListSelectColor">
                                            <span class="swatch" style="background-color:'.$item->model->Color->codeColor.'"></span> Size : '.$item->model->Size->name.'
                                        </ul>
                                        </a>
                                 </div>
                            </div>
                        </div>
                    </td>
                    <td><div id="price" class="subtotal" style="">';
                    if($item->options['discount'] > 0){
                       $output.=  formatMoney(priceDiscount($item->price,$item->options['discount']),false,false,$item->options['discount']);
                    } else {
                        $output .=  formatMoney($item->price);
                    }
                    $output.='</div></td>
                    <td>
                        <div class="quantity-selector detail-info-entry">
                            <div class="entry number-minus" id="minus" data-row="'.$item->rowId.'">&nbsp;</div>
                            <div class="entry number" id="number">'.$item->qty.'</div>
                            <div class="entry number-plus" id="plus" data-row="'.$item->rowId. '">&nbsp;</div>
                        </div>
                    </td>
                    <td><div class="subtotal" id="subtotal">' . formatMoney(priceDiscount($item->price * $item->qty, $item->options['discount'])) . '</div></td>
                    <td><a class="remove-button" data-rowid="'.$item->rowId.'"><i class="fa fa-times"></i></a></td>
                    </tr>
                    ';
                    
                    $outputPopup .= '
                    <div class="cart-entry">
                        <div class="content">
                        <a href="#" class="image">
                                <img src="'.url('/').'/images/product/'.$item->model->Product->thumbnail.'">
                        </a>
                        </div>
                        <div class="content"> 
                            <a class="title" href="/san-pham/'.$item->model->Product->id.'/'.$item->model->Product->slug.'">&nbsp '.$item->name.'</a> 
                            <div class="quantity" style="padding-left:10px;"> &nbsp SL: '.$item->qty.' | '.$item->model->Color->name.' | '.$item->model->Size->name. '</div>
                                       
                            <div class="price"> &nbsp ' . formatMoney($item->options['discount'] > 0 ? priceDiscount($item->price, $item->options['discount']) : $item->price * $item->qty) . '</div>
                        </div>
                        <div class="button-x remove-button" data-rowid="'.$item->rowId.'"><i class="fa fa-close"></i></div>
                    </div>
                    ';

                    $outputcheckout .= '
                    <tr>
                        <td><a href="/san-pham/'.$item->model->Product->id.'/'.$item->model->Product->slug.'">&nbsp '.$item->name.'</a> </td>
                        <td><ul id="ListSelectColor">
                        <span class="swatch" style="background-color:'.$item->model->Color->codeColor.'"></span></ul></td>
                        <td>'.$item->model->Size->name.'</td>
                        <td>'.$item->qty. '</td>
                        <td>'.formatMoney(priceDiscount($item->price*$item->qty, $item->options['discount'])).'</td>
                     </tr>
                    ';
                    if($item->options['coupon'] == 0){
                        $giaCu += priceDiscount($item->price * $item->qty, $item->options['discount']);
                    } else {
                        $giaCu += priceDiscount($item->price * $item->qty, 0);
                    }
                   
                }
               
            } else {
                $output .= '<tr>
                <td>
                    <h3>Giỏ hàng đang rỗng.</h3>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>';

            $outputPopup .= 'Giỏ hàng bạn đang rỗng';
            }
            $Shiper = '';
            $total = 0;
            $MaGiamGia = '';
            if(session()->get('coupon')){
                $noDiscount = 0;
                $priceDiscount = 0;
                foreach (Cart::content() as $item) {
                    if($item->options['discount'] == 0)
                    $total += priceDiscount($item->price*$item->qty,session()->get('coupon')['discount']);
                    else
                    $total += priceDiscount($item->price*$item->qty,$item->options['discount']);
                }
                $total = formatMoney($total);
                $MaGiamGia = '<h4>Giá cũ : '.formatMoney($giaCu).'</h4>
                <h4>Giảm giá theo mã : <font color="red"><b>-'.session()->get('coupon')['discount'].'%</b></font></h4>';
            } else {
                foreach (Cart::content() as $item) {
                    $total += priceDiscount($item->price*$item->qty,$item->options['discount']);
                }
                $total = formatMoney($total);
                $MaGiamGia = '<h4><a href="'.url('/cart').'" target="_blank">Tôi có mã giảm giá?</a>';
            }
            

            if(session()->get('idShip')){
                if(deformatMoney(Cart::subtotal()) > 0){
                    $dataShiper = Shipper::find(session()->get('idShip'));
                    if(!empty($dataShiper)){
                        $Shiper .= "<h4>Thời gian vận chuyển : ".$dataShiper->Time."</h4>";
                        $Shiper .= "<h4>Phí vận chuyển : ".formatMoney($dataShiper->fee)."</h4>"; 
                        $total = formatMoney(deformatMoney($total) + $dataShiper->fee);
                    }
                    
                } else {
                    session()->remove('idShip');
                }
                
            }

            $data = array(
                'list' => $output,
                'total'=> $total,
                'count'=> Cart::content()->count(),
                'cartPopup'=>$outputPopup,
                'MaGiamGia'=>$MaGiamGia,
                'cartCheckout' => $outputcheckout,
                'Shiper' => $Shiper
            );
            echo json_encode($data);
        }
    }

    public function addCoupon(Request $req){
        if($req->ajax()){
            
            if(session()->get('coupon')){
                return response()->json(['errors'=>['errorcoupons'=>[0=>'Bạn đã có mã giảm giá rồi']]],422);
            }
            $coupon = coupons::where('code',$req->coupon)->where('Date','>',now())->first();
            if(!$coupon){
                return response()->json(['errors'=>['errorcoupons'=>[0=>'Mã giảm giá không hợp lệ']]],422);
            }
            
            if(!$coupon->Match($coupon->typeEnable,AuthTitle())){
                return response()->json(['errors'=>['errorcoupons'=>[0=>'Bạn không đủ quyền với mã này']]],422);
            }
            
            
            session()->put('coupon',[
                'id' => $coupon->id,
                'code' => $coupon->code,
                'discount' => $coupon->Percent,
                'require' => $coupon->RequireTotal
            ]);
          
            foreach (Cart::content() as $item) {
                if($item->options['discount'] == 0){
                    $item->options['discount'] = $coupon->Percent;
                    $item->options['coupon'] = 1;
                }
                
            }
           
            
            $divCoupons = '<h4>'.session()->get('coupon')['code'].'</h4>
            <button class="col-md-6 pull-right button style-10" style="margin-top:15px;" id="btnRemoveCoupon">Gỡ bỏ</button>';
            $data = array(
                'msg' => 'Đã thêm mã giảm giá',
                'divCoupons' => $divCoupons
            );
            $this->eventLoadCart();
            echo json_encode($data);
        }
    }

    public function infoShiper($id){
        session()->put('idShip',$id);
        $this->eventLoadCart();
        return response()->json(['success'=>'ok']);
    }

    public function removeCoupon(Request $req){
        if($req->ajax()){
            $outputCoupons = '';
            $divCoupons = '';
            if(session()->get('coupon')){
                session()->remove('coupon');
                $divCoupons = '<input type="text" class="form-control pull-left" id="Coupons">
                <button class="col-md-6 pull-right button style-10" style="margin-top:15px;" id="btnAddCoupon">Xác Nhận</button>';
            }
            
            
            $data = array(
                'msg' => 'Đã gỡ bỏ mã giảm giá',
                'outputCoupons'=>$outputCoupons,
                'divCoupons' => $divCoupons
                
            );

            foreach (Cart::content() as $item) {
                if($item->options['coupon'] == 1){
                    $item->options['coupon'] = 0;
                    $item->options['discount'] = 0;
                }
            }
            $this->eventLoadCart();
            echo json_encode($data);
        }
    }


    public function checkout(Request $req){
        if($req->ajax()){
           if(session()->get('coupon')){
               if(deformatMoney(Cart::subtotal()) < session()->get('coupon')['require']){
                return response()->json(['errors'=>['errorcoupons'=>[0=>'Để dùng mã giảm giá này hóa đơn của bạn tối thiểu phải từ '.formatMoney(session()->get('coupon')['require']).' trở lên']]],422);
               }
           }

           return view('checkout');
        }
    }

    public function updateNumber(Request $req){
        if($req->ajax()){
            $cart = "";
            try {
               $cart = Cart::get($req->rowId);
            } catch (\Throwable $th) {
               return response()->json(['errors'=>['errorcoupons'=>[0=>'Số lượng không hợp lệ']]],422);
            }

            $product = product_details::find($cart->id);
            if($req->number > $product->soluong)
            return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng trong kho không đủ [ERROR102]']]],422);

            if($req->number <= 0)
            return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng không hợp lệ']]],422);

            Cart::update($req->rowId,$req->number);
            $this->eventLoadCart();


        }
    }

    public function eventLoadCart(){
        // Truyền message lên server Pusher
        $options = array(
            'cluster' => 'ap1',
            // 'useTLS' => true
          );

        $pusher = new Pusher(
            'fbefcc8bb38866195ed2',
            'ca8d13f7e7ec66461aed',
            '757854',
            $options
        );
        
        $pusher->trigger('Cart', 'loadCart','');
    }
}
