@extends('includes.master') 
@section('title','Hồ sơ tài khoản') 
@section('content')
<section class="go-section">
    <div class="container">
        <div class="col-sm-3">
            <nav class="nav-sidebar">
                <ul class="nav tabs">
                    <li class="active"><a href="#info" data-toggle="tab">Lịch sử hóa đơn</a></li>
                    <li class=""><a href="#update" data-toggle="tab">Sửa thông tin</a></li>
                    <li class=""><a href="#change" data-toggle="tab">Thay đổi mật khẩu</a></li>
                    <li class=""><a href="#magiamgia" data-toggle="tab">Mã giảm giá</a></li>
                    <li class="">
                        <a href="{{ route('front.logout') }}">
                        <i class="fa fa-fw fa-power-off"></i> Đăng Xuất
                    </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- tab content -->
        <div class="col-sm-9">
            <div class="tab-content">
                <div class="tab-pane active text-style" id="info">
                    <h4 class="pull-right">Bạn đã đăng nhập với tài khoản: {{Auth::user()->name}}</h4>
                    <h2>Lịch sử hóa đơn</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr class="info">
                                <th>#HD</th>
                                <th>Sản Phẩm</th>
                                <th>Thuộc Tính</th>
                                <th>SL</th>
                                <th>Giá</th>
                                <th>Đánh Giá</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($listproduct as $item)
                                <tr>
                                    <td>{{$item->id_bill}}</td>
                                    <td>
                                        <div class="traditional-cart-entry">
                                            <a href="#" class="image">
                                                <img src="{{url('/')}}/images/product/{{$item->product_details->Product->thumbnail}}">
                                            </a>
                                            <div class="content">
                                                <div class="cell-view">
                                                    <a class="title" href="/san-pham/{{$item->product_details->Product->id}}/{{$item->product_details->Product->slug}}">{{$item->product_details->Product->title}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul id="ListSelectColor">
                                            <span class="swatch" style="background-color:{{$item->product_details->Color->codeColor}}"></span> Size : {{$item->product_details->Size->name}}
                                        </ul>
                                    </td>
                                    <td>
                                        {{$item->Number}}
                                    </td>
                                    <td>
                                        {!!formatMoney($item->price)!!}
                                    </td>
                                    <td>
                                        <span class="review">
                                        <?php $count = \App\User::getReview($item->product_details->Product->id); ?>
                                        @if($count > 0)
                                            @for($i=1;$i<=5;$i++) 
                                            @if($i <= $count) <i class="fa fa-star"></i>
                                            @else 
                                                <i class="fa fa-star-o"></i> @endif @endfor
                                        @else
                                        <a class="title" href="/san-pham/{{$item->product_details->Product->id}}/{{$item->product_details->Product->slug}}"><button class="button style-4">Review</button></a>
                                        @endif
                                    </span>
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        Bạn chưa có mua sản phẩm nào
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane text-style" id="update">

                    <h2>Cập nhật thông tin tài khoản</h2>
                    <hr>
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h4>Họ và tên: </h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="name" id="nameUpdate" value="{{$user->name}}" placeholder="Full Name" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h4>Email : </h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="phone" id="emailUpdate" value="{{$user->email}}" placeholder="Email" class="form-control" type="email" disabled
                                        required>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h4>SĐT : </h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="phone" id="phoneUpdate" value="{{$user->Phone}}" placeholder="Phone Number" class="form-control" type="text"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <h4>Địa chỉ: </h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="address" id="AddressUpdate" placeholder="Address" class="form-control" required>{{$user->Address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div id="resp" class="col-md-6">
                            @if ($errors->has('error'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-4 col-md-offset-1">
                                    <button type="button" class="button style-10" id="btnUpdateProfile"><strong>Cập nhật</strong></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane text-style" id="change">
                    <h2>Thay đổi mật khẩu</h2>
                    <hr>
                    <form method="POST" action="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="cpass" id="oldPass" placeholder="Mật khẩu cũ" class="form-control" type="password" required>

                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="newpass" id="newPass" placeholder="Mật Khẩu Mới" class="form-control" type="password" required>

                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="renewpass" id="renewPass" placeholder="Xác nhận mật khẩu mới" class="form-control" type="password" required>

                                </div>
                            </div>
                        </div>

                        <div id="resp" class="col-md-6">
                            @if ($errors->has('error'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-5 col-md-offset-1">
                                    <button type="button" class="button style-10" id="btnUpdatePass"><strong>Cập nhật mật khẩu</strong></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane text-style" id="magiamgia">
                    <h2>Mã Giảm Giá</h2>
                    <hr>
                    <div class="row">
                        @foreach($coupons as $cp)
                        <div class="col-md-5">
                            <div class="coupon">
                                <img src="{{$cp->thumbnail}}" alt="Avatar">
                                <div class="MaGiamGia" style="background-color:white">
                                    <b>{{$cp->title}}</b>
                                    <p>{{$cp->content}}</p>
                                </div>
                                <div class="MaGiamGia">
                                    <p>Mã: <span class="promo code">{{$cp->code}}</span></p>
                                    <p>Giảm: <span class="promo">{{$cp->Percent}}%</span></p>
                                    <p>Đối với đơn hàng: > {{formatMoney($cp->RequireTotal,true)}}đ</p>
                                    <p class="expire">HSD: Còn {{formatDateTime($cp->Date)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br><br/><br/>
                    <h2>Mã Giảm Giá (VIP)</h2>
                    <hr>
                    <div class="row">
                        @if(AuthTitle() == 2 || AuthTitle() == 0)
                        @foreach($couponsVip as $cp)
                        <div class="col-md-5">
                            <div class="coupon">
                                <img src="{{$cp->thumbnail}}" alt="Avatar">
                                <div class="MaGiamGia" style="background-color:white">
                                    <b>{{$cp->title}}</b>
                                    <p>{{$cp->content}}</p>
                                </div>
                                <div class="MaGiamGia">
                                    <p>Mã: <span class="promo code">{{$cp->code}}</span></p>
                                    <p>Giảm: <span class="promo">{{$cp->Percent}}%</span></p>
                                    <p>Đối với đơn hàng: > {{formatMoney($cp->RequireTotal,true)}}đ</p>
                                    <p class="expire">HSD: Còn {{formatDateTime($cp->Date)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


@section('javascript')
<script>
    $('#btnUpdateProfile').click(function(){
        var name = $('#nameUpdate').val();
        var email = $('#emailUpdate').val();
        var Address = $('#AddressUpdate').val();
        var Phone = $('#phoneUpdate').val();
        var dataString = "id={{$user->id}}&name="+name+"&email="+email+"&Address="+Address+"&Phone="+Phone;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('profile.update')}}',
            data:dataString,
            success: function (data) {
                ToastSuccess(data.success); 
            },
            error: function (request, status) {
                console.log(request.responseJSON);
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

    $('#btnUpdatePass').click(function(){
        var oldpass = $('#oldPass').val();
        var newpass = $('#newPass').val();
        var renewpass = $('#renewPass').val();
        var dataString = "id={{$user->id}}&oldpass="+oldpass+"&newpass="+newpass+"&renewpass="+renewpass;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('profile.changepass')}}',
            data:dataString,
            success: function (data) {
                ToastSuccess(data.success); 
            },
            error: function (request, status) {
                console.log(request.responseJSON);
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

</script>
@endsection
 
@stop 
@section('footer') 
@stop