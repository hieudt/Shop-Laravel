@extends('includes.master')
@section('css')
@endsection
@section('content')

    <section class="container" style="margin-top: 20px;">

        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/cart')}}">My Cart</a>
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="information-blocks">
                <div class="table-responsive">
                    <table class="cart-table">
                        <tr>
                            <th class="column-1">Tên Sản Phẩm</th>
                            <th class="column-2">Đơn Giá</th>
                            <th class="column-3">Số Lượng</th>
                            <th class="column-4">Tổng tiền</th>
                            <th class="column-5"></th>
                        </tr>
                        <tr id="cartempty"></tr>
                        @forelse($carts as $cart)
                        <tr id="item">
                            <td>
                                <div class="traditional-cart-entry">
                                    <a href="#" class="image"></a>
                                    <div class="content">
                                        <div class="cell-view">
                                            
                                            <a href="#"></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td id="price" class="prices"></td>
                            <td>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="entry number-minus" id="minus">&nbsp;</div>
                                    <div class="entry number" id="number"></div>
                                    <div class="entry number-plus" id="plus">&nbsp;</div>
                                </div>
                            </td>
                            <td><div class="subtotal" id="subtotal"></div></td>
                            <td><a class="remove-button" onclick=""><i class="fa fa-times"></i></a></td>

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
                </div>
                <div class="cart-submit-buttons-box">
                    <div class="row" style="margin: 0">
                        <div class="cart-summary-box pull-right col-md-6" style="margin: 0">
                            <div class="grand-total">Thành Tiền  <span id="grandtotal"></span></div>
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


        </div>

    </section>
@section('javascript')
@endsection
@stop

@section('footer')
<script>

</script>
@stop