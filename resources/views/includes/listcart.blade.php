<table class="cart-table">
    <tr>
        <th class="column-1">Tên Sản Phẩm</th>
        <th class="column-2">Đơn Giá</th>
        <th class="column-3">Số Lượng</th>
        <th class="column-4">Tổng tiền</th>
        <th class="column-5"></th>
    </tr>
    <tr id="cartempty"></tr>
    @forelse(Cart::content() as $item)
    <tr id="item">
        <td>
            <div class="traditional-cart-entry">
                <a href="#" class="image">
                    <img src="{{url('/')}}/images/product/{{$item->model->Product->thumbnail}}">
                </a>
                <div class="content">
                    <div class="cell-view">
                        <a class="title" href="/san-pham/{{$item->model->Product->id}}/{{$item->model->Product->slug}}">{{$item->name}} 
                            <ul id="ListSelectColor">
                                <span class="swatch" style="background-color:{{$item->model->Color->codeColor}}"></span> Size : {{$item->model->Size->name}}
                            </ul>
                            </a>
                     </div>
                </div>
            </div>
        </td>
        <td><div id="price" class="subtotal" style="">{{formatMoney($item->price)}}</div></td>
        <td>
            <div class="quantity-selector detail-info-entry">
                <div class="entry number-minus" id="minus">&nbsp;</div>
                <div class="entry number" id="number">{{$item->qty}}</div>
                <div class="entry number-plus" id="plus">&nbsp;</div>
            </div>
        </td>
        <td><div class="subtotal" id="subtotal">{{formatMoney($item->price*$item->qty)}}</div></td>
        <td><a class="remove-button" data-rowid="{{$item->rowId}}"><i class="fa fa-times"></i></a></td>

        <form id="citem">
            {{csrf_field()}}
            @if(Session::has('uniqueid'))
                <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
            @else
                <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
            @endif
            <input type="hidden" name="title" value="">
            <input type="hidden" name="product" value="">
            <input type="hidden" id="cost" name="cost" value="">
            <input type="hidden" id="quantity" name="quantity" value="">
        </form>

    </tr>

    @empty
        <tr>
            <td>
                <h3>Giỏ hàng đang rỗng.</h3>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforelse

</table>

<div class="cart-submit-buttons-box">
        <div class="row" style="margin: 0">
            <div class="cart-summary-box pull-right col-md-6" style="margin: 0">
                <div class="grand-total">Thành Tiền  <span id="grandtotal">{{Cart::total()}}</span></div>
                <a class="col-md-6 pull-right button style-10" href="">Thanh Toán</a>
                <a class="col-md-5 pull-right button style-10" href="">Tiếp tục mua hàng</a>
            </div>
            <div class="cart-summary-box pull-left col-md-3" style="margin: 0">
                <div class="grand-total">Mã giảm giá  <span id="grandtotal"></span></div>
                
               <input type="text" class="form-control pull-left">
               <a class="col-md-6 pull-right button style-10" href="" style="margin-top:15px;">Xác nhận</a>
            </div>
        </div>
    </div>