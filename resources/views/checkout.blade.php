@extends('includes.master') 
@section('title','Thanh toán giỏ hàng') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/css/checkout.css')}}">

@endsection
@section('content')

<section class="go-section">
    <div class="row">
        <div class="container">
            <div class="col-md-offset-2 col-md-8">
            </div>
            <div class="text-center services">

                <div class="col-md-7 order-right">
                    <h4>Thông tin hóa đơn</h4>
                    <form class="" action="" method="post" id="OrderForm">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-50">
                                <label for="fname"><i class="fa fa-user"></i> Họ Tên</label>
                                <input type="text" name="firstname" placeholder="" value="{{Auth::check() ? Auth::user()->name : ''}}">
                                <label for="adr"><i class="fa fa-address-card-o"></i> Địa Chỉ</label>
                                <input type="text" name="address" placeholder="" value="{{Auth::check() ? Auth::user()->Address : ''}}">
                            </div>

                            <div class="col-50">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" name="email" placeholder="" value="{{Auth::check() ? Auth::user()->email : ''}}">
                                <label for="phone"><i class="fa fa-address-card-o"></i> Số điện thoại</label>
                                <input type="text" name="phone" placeholder="" value="{{Auth::check() ? Auth::user()->Phone : ''}}">
                                
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="note"><i class="fa fa-address-card-o"></i> Ghi chú </label>
                                <input type="text" name="note" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <span class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                    Đơn vị vận chuyển
                                                </a>
                                            </span>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div id="sites">
                                                    @forelse($shipper as $ship)
                                                    <input type="radio" name="selShiper" value="{{$ship->name}}" />
                                                    <label
                                                        for="so" data-idShip="{{$ship->id}}"
                                                        @if(session()->get('idShip') && session()->get('idShip') == $ship->id) 
                                                        class='selected'
                                                        @endif >
                                                        <img src="{{$ship->image}}" alt="Stack Overflow" width="50" height="50" />
                                                        <p>{{$ship->name}}</p>
                                                        </label>
                                                        @empty Hiện không có dịch vụ ship nào @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <span class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        Phương thức thanh toán
                                                    </a>
                                            </span>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <select name="selMethod" class="form-control" id="selMethod">
                                                        <option value="0" selected>Nhận hàng thanh toán (COD)</option>
                                                        <option value="1">PayPal</option>
                                                        <option value="2">Khác</option>
                                                    </select>
                                                <div id="show0" class="divMethod">
                                                    
                                                </div>
                                                <div id="show1" class="divMethod">
                                                        
                                                </div>
                                                <div id="show2" class="divMethod">
                                                    <br/>
                                                 <h3>Chọn phương thức thanh toán</h3>
                                                 <br/>
                                                <form name="NLpayBank" action="#">
                                                    <ul class="list-content">
                                                        <li class="active">
                                                            <label>
                                                                <input type="radio" value="NL" name="option_payment" selected="true">Thanh toán bằng Ví điện tử
                                                                NgânLượng
                                                            </label>
                                                            <div class="boxContent">
                                                                <p>
                                                                    Thanh toán trực tuyến AN TOÀN và ĐƯỢC BẢO VỆ, sử dụng thẻ ngân hàng trong và ngoài nước hoặc nhiều
                                                                    hình thức tiện lợi khác.
                                                                    <img src="https://www.nganluong.vn/css/newlanding/img//nganluong_english_color-01.svg" width="50%" alt="" class="src">
                                                                    <br />
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label><input type="radio" value="ATM_ONLINE" name="option_payment">Thanh toán online bằng thẻ ngân hàng nội
                                                                địa</label>
                                                            <div class="boxContent">
                                                                <p><i>
                                                                        <span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần
                                                                        đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực
                                                                        hiện.</i></p>
                                                
                                                                <ul class="cardList clearfix">
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vcb_ck_on">
                                                                            <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                                            <input type="radio" value="BIDV" name="bankcode">
                                                
                                                                        </label></li>
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vcb_ck_on">
                                                                            <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                                            <input type="radio" value="VCB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vnbc_ck_on">
                                                                            <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                                            <input type="radio" value="DAB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="tcb_ck_on">
                                                                            <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                                            <input type="radio" value="TCB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_vtb_ck_on">
                                                                            <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                                                            <input type="radio" value="ICB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_exb_ck_on">
                                                                            <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                                                            <input type="radio" value="EXB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_acb_ck_on">
                                                                            <i class="ACB" title="Ngân hàng Á Châu"></i>
                                                                            <input type="radio" value="ACB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_hdb_ck_on">
                                                                            <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
                                                                            <input type="radio" value="HDB" name="bankcode">
                                                
                                                                        </label></li>
                              
                                          
                                                                <li class="bank-online-methods ">
                                                                        <label for="sml_atm_vpb_ck_on">
                                                                            <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
                                                                            <input type="radio" value="VPB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_scb_ck_on">
                                                                            <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                                                            <input type="radio" value="SCB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="bnt_atm_agb_ck_on">
                                                                            <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                                                            <input type="radio" value="AGB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="bnt_atm_sgb_ck_on">
                                                                            <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                                                            <input type="radio" value="SGB" name="bankcode">
                                                
                                                                        </label></li>
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_bab_ck_on">
                                                                            <i class="TPB" title="Tền phong bank"></i>
                                                                            <input type="radio" value="TPB" name="bankcode">
                                                
                                                                        </label></li>
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_bab_ck_on">
                                                                            <i class="NAB" title="Ngân hàng Nam Á"></i>
                                                                            <input type="radio" value="NAB" name="bankcode">
                                                
                                                                        </label></li>
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_bab_ck_on">
                                                                            <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                                                            <input type="radio" value="SHB" name="bankcode">
                                                
                                                                        </label></li>
                                                                    <li class="bank-online-methods ">
                                                                        <label for="sml_atm_bab_ck_on">
                                                                            <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                                                            <input type="radio" value="OJB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                </ul>
                                                
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label><input type="radio" value="IB_ONLINE" name="option_payment">Thanh toán bằng Internet Banking</label>
                                                            <div class="boxContent">
                                                                <p><i>
                                                                        <span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần
                                                                        đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực
                                                                        hiện.</i></p>
                                                
                                                                <ul class="cardList clearfix">
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vcb_ck_on">
                                                                            <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                                            <input type="radio" value="BIDV" name="bankcode">
                                                
                                                                        </label></li>
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vcb_ck_on">
                                                                            <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                                            <input type="radio" value="VCB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vnbc_ck_on">
                                                                            <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                                            <input type="radio" value="DAB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="tcb_ck_on">
                                                                            <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                                            <input type="radio" value="TCB" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                
                                                                </ul>
                                                
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <label><input type="radio" value="VISA" name="option_payment" selected="true">Thanh toán bằng thẻ Visa hoặc
                                                                MasterCard</label>
                                                            <div class="boxContent">
                                                                <p><span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>:Visa hoặc
                                                                    MasterCard.</p>
                                                                <ul class="cardList clearfix">
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vcb_ck_on">
                                                                            Visa:
                                                                            <input type="radio" value="VISA" name="bankcode">
                                                
                                                                        </label></li>
                                                
                                                                    <li class="bank-online-methods ">
                                                                        <label for="vnbc_ck_on">
                                                                            Master:<input type="radio" value="MASTER" name="bankcode">
                                                                        </label></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                                <script src="https://www.nganluong.vn/webskins/javascripts/jquery_min.js" type="text/javascript"></script>
                                                <script language="javascript">
                                                    $('input[name="option_payment"]').bind('click', function() {
                                                		$('.list-content li').removeClass('active');
                                                		$(this).parent().parent('li').addClass('active');
                                                		});		
                                                </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="BillOrder" class="button style-10"> Đặt Hàng </button>
                    </form>
                    @if(!Auth::check())
                    <div class="col-md-12">
                        <button id="MyAccount" class="button style-10">Tôi muốn sử dụng tài khoản của tôi ?</button>
                    </div>
                    @endif
                </div>
                <div class="col-md-5 order-right">
                    <h4>CHI TIẾT ĐƠN HÀNG</h4>
                    <div class="pricing-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Màu Sắc</th>
                                    <th>Kích Thước</th>
                                    <th width="20%">Số Lượng</th>
                                    <th>Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody id="cartCheckOut">

                            </tbody>
                        </table>
                        <table class="table">
                            <tr>
                                <div id="MaGiamGia">
                                    @if(session()->get('coupon'))
                                    <h5 class="mgg">Giá cũ {{formatMoney(Cart::subtotal())}}</h5>
                                    <h5 class="mgg">Giảm giá theo mã : -{{session()->get('coupon')['discount']}}%</h5>
                                    @endif
                                </div>
                                <div id="infoShiper">

                                </div>
                            </tr>
                            <tr>
                                <td>
                                    <h3 class="pricing-count" style="margin: 0">Thành Tiền:</h3>
                                </td>
                                <td width="30%">
                                    <h3 class="pricing-count" id="grandtotal" style="margin: 0">0</h3>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>



@stop 
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('#selMethod').on('change', function(){
        var value = $(this).val(); 
        $("div.divMethod").hide();
        $("#show"+value).show();
        });
    });

    $('#BillOrder').click(function(){
        var data = $('#OrderForm').serialize();
        postOrder(data);
    });

    $('#sites input:radio').addClass('input_hidden');
    $('#sites label').click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
        putSession($(this).attr('data-idShip'));
    });

    function putSession(id){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{url('session/idship/')}}/'+id,
        dataType: 'json',
            success: function(data) {
            },
            error: function(request, status) {
               
            }
        });
    }

    function postOrder(data){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('checkout.order')}}',
            data:data,
            success: function (data) {
                ToastSuccess(data.success); 
                window.location.href = "{{url('checkout/bill')}}/"+data.token;
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    

    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);

    $('#MyAccount').click(function(){
        $('#myModal').modal('show');
    });
    function meThods(val) {
        var action1 = "";
        var action2 = "";
        var action3 = "";
        if (val.value == "Paypal") {
            $("#payment_form").attr("action", action1);
            $("#stripes").hide();
        }
        if (val.value == "Stripe") {
            $("#payment_form").attr("action", action2);
            $("#stripes").show();
        }
        if (val.value == "Cash") {
            $("#payment_form").attr("action", action3);
            $("#stripes").hide();
        }
    }



</script>

@stop