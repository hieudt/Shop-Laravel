@extends('includes.master')
@section('title','Giỏ Hàng')
@section('css')
@endsection
@section('content')

    <section class="container" style="margin-top: 20px;">

        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('/cart')}}">Giỏ Hàng</a>
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
                        <tbody id="ListCart">
                        </tbody>
                    </table>
                </div>
                <div class="cart-submit-buttons-box">
                    <div class="row" style="margin: 0">
                        <div class="cart-summary-box pull-right col-md-6" style="margin: 0">
                            <div id="MaGiamGia">
                                @if(session()->get('coupon'))
                                <h4>Giá cũ {{formatMoney(Cart::subtotal())}}</h4>
                                <h4>Giảm giá theo mã : -{{session()->get('coupon')['discount']}}%</h4>
                                @endif
                            </div>
                            <div class="grand-total">Thành Tiền : <span id="grandtotal">{{Cart::total()}}</span></div>
                            <a class="col-md-6 pull-right button style-10" href="{{url('/checkout')}}">Thanh Toán</a>
                            <a class="col-md-5 pull-right button style-10" href="san-pham">Tiếp tục mua hàng</a>
                        </div>
                        <div class="cart-summary-box pull-left col-md-3" style="margin: 0" >
                            <div class="grand-total">Mã giảm giá  <span id="grandtotal"></span></div>
                            <div id="divCoupon">
                                @if(session()->get('coupon'))
                                <h4>{{session()->get('coupon')['code']}}</h4>
                                <button class="col-md-6 pull-right button style-10" style="margin-top:15px;" id="btnRemoveCoupon">Gỡ bỏ</button>
                                @else
                                <input type="text" class="form-control pull-left" id="Coupons">
                                <button class="col-md-6 pull-right button style-10" style="margin-top:15px;" id="btnAddCoupon">Xác Nhận</button>
                                @endif
                            </div>
                           
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
    $(document).on('click','#btnAddCoupon',function(){
        addCoupon();
    });

    $(document).on('click','#btnRemoveCoupon',function(){
        removeCoupon();
    });

    $('#btnCheckOut').click(function(){
        btnCheckOut();
    });

    $(document).on('click','.number-minus',function(){
        var divUpd = $(this).parent().find('.number'), newVal = parseInt(divUpd.text(), 10)-1;
        var rowID = $(this).attr('data-row');
        updateNumber(newVal,rowID);
    })

    $(document).on('click','.number-plus',function(){
        var divUpd = $(this).parent().find('.number'), newVal = parseInt(divUpd.text(), 10)+1;
        var rowID = $(this).attr('data-row');
        updateNumber(newVal,rowID);
        
    });

    function updateNumber(number,rowid){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('cart.update')}}',
            data:{number:number,rowId:rowid},
            success: function (data) {
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    function addCoupon(){
        var coupon = $('#Coupons').val();
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'POST',
            url: '{{route('cart.addcoupon')}}',
            data:{coupon:coupon},
            dataType: 'json',
            success: function(data) {
                $('#MaGiamGia').html(data.outputCoupons);
                $('#divCoupon').html(data.divCoupons);
                setTimeout(function(){
                    ToastSuccess(data.msg);
                }, 800);
                

            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    

    function removeCoupon(){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'POST',
            url: '{{route('cart.removecoupon')}}',
            dataType: 'json',
            success: function(data) {
                $('#MaGiamGia').html(data.outputCoupons);
                $('#divCoupon').html(data.divCoupons);
                setTimeout(function(){
                    ToastSuccess(data.msg);
                }, 800);
                
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }
 </script>
@stop