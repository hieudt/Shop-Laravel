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

class WishlistController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function wishlist(){
        return view('wishlist');
    }

    public function store(Request $req)
    {
        if ($req->ajax()) {

            $this->validate($req, [
                'idProduct' => 'required',
                'Number' => 'required|numeric|min:1|max:100',
                'idSize' => 'required',
                'idColor' => 'required'
            ], [
                'idProduct.required' => 'Sản phẩm không hợp lệ',
                'Number.required' => 'Vui lòng chọn số lượng',
                'Number.numeric' => 'Số lượng phải là số',
                'Number.min' => 'Số lượng ít nhất là 1',
                'Number.max' => 'Số lượng nhiều nhất là 100',
                'idSize.required' => 'Kích thước không hợp lệ',
                'idColor.required' => 'Màu sản phẩm không hợp lệ'
            ]);

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
            $checkNumber = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($product) {
                return $cartItem->id === $product->id;
            });

            if ($checkNumber->isNotEmpty()) {
                return response()->json(['errors' => ['failnumber' => [0 => 'Sản phẩm đã có trong danh sách yêu thích']]], 422);
            }
            $typeDiscount = ['discount' => 0, 'coupon' => 0];
            if ($pr->discount > 0) {
                $typeDiscount = ['discount' => $pr->discount, 'coupon' => 0];
            }
            if (session()->get('coupon') && $pr->discount == 0) {
                $typeDiscount = ['discount' => session()->get('coupon')['discount'], 'coupon' => 1];
            }
            Cart::instance('wishlist')->add($product->id, $pr->title, 1, $pr->cost, $typeDiscount)
                ->associate('App\product_details');
            $this->eventLoadWish();
            return response()->json(['success' => 'Đã thêm'], 200);
        }
    }

    public function destroy(Request $req)
    {
        if ($req->ajax()) {
            $flag = 0;
            foreach (Cart::instance('wishlist')->content() as $item) {
                if ($item->rowId == $req->rowid) {
                    $flag = 1;
                    break;
                }
            }

            if ($flag == 0) return response()->json(['errors' => ['faillogin' => [0 => 'Không hợp lệ vui lòng tải lại trang']]], 422);
            Cart::instance('wishlist')->remove($req->rowid);
            $this->eventLoadWish();
            return response()->json(['success' => 'Xóa sản phẩm thành công']);
        }
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            if (Cart::instance('wishlist')->content()->count() > 0) {
                foreach (Cart::instance('wishlist')->content() as $item) {
                    $output .= '
                    <tr id="item">
                    <td>
                        <div class="traditional-cart-entry">
                            <a href="#" class="image">
                                <img src="' . url('/') . '/images/product/' . $item->model->Product->thumbnail . '">
                            </a>
                            <div class="content">
                                <div class="cell-view">
                                    <a class="title" href="/san-pham/' . $item->model->Product->id . '/' . $item->model->Product->slug . '">' . $item->name . ' 
                                        <ul id="ListSelectColor">
                                            <span class="swatch" style="background-color:' . $item->model->Color->codeColor . '"></span> Size : ' . $item->model->Size->name . '
                                        </ul>
                                        </a>
                                 </div>
                            </div>
                        </div>
                    </td>
                    <td><div id="price" class="subtotal" style="">';
                    if ($item->options['discount'] > 0) {
                        $output .=  formatMoney(priceDiscount($item->price, $item->options['discount']), false, false, $item->options['discount']);
                    } else {
                        $output .=  formatMoney($item->price);
                    }
                    $output .= '</div></td>
                    <td>
                        <div class="quantity-selector detail-info-entry">
                            <button class="button style-10 toCart" data-id="' . $item->model->Product->id . '" data-rowid="' . $item->rowId . '" data-loading-text="<i class=\'fa fa-circle-o-notch fa-spin\'></i> Đang xử lý"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button>
                        </div>
                    </td>
                    <td><a class="remove-wishlist-button"  data-rowid="' . $item->rowId . '"><i class="fa fa-times"></i></a></td>
                    </tr>
                    ';
                }
            } else {
                $output .= '<tr>
                <td>
                    <h3>Danh sách  yêu thích đang rỗng.</h3>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>';

            }
            $total = 0;
                foreach (Cart::instance('wishlist')->content() as $item) {
                    if ($item->options['discount'] == 0)
                        $total += priceDiscount($item->price * $item->qty, session()->get('coupon')['discount']);
                    else
                        $total += priceDiscount($item->price * $item->qty, $item->options['discount']);
                }
            $data = array(
                'list' => $output,
                'count' => Cart::instance('wishlist')->content()->count(),
            );
            echo json_encode($data);
        }
    }

    public function tocart(Request $req){
        $res = new Request();
        $flag = 0;
        foreach (Cart::instance('wishlist')->content() as $item) {
            if ($item->rowId == $req->rowid) {
                $flag = 1;
                break;
            }
        }
        if ($flag == 0) return response()->json(['errors' => ['faillogin' => [0 => 'Không hợp lệ vui lòng tải lại trang']]], 422);
        $items = Cart::instance('wishlist')->get($req->rowid);
        $res->idProduct = $req->id;
        $res->idSize = $items->model->id_size;
        $res->idColor = $items->model->id_color;
        $res->Number = 1;
        $this->destroy($req);
        $var = new CartController;
        return $var->fromWishlist($res);
    }

    public function eventLoadWish()
    {
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

        $pusher->trigger('Wish', 'loadWish', '');
    }
}
