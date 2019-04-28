@extends('includes.master') 
@section('title','Đặt lại mật khẩu') 
@section('content')
<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <div class="container">
                <h2 class="text-center">Đặt lại mật khẩu</h2>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <input type="hidden" id="token" value="{{$token}}">
                                <input name="password" value="" placeholder="Mật khẩu mới" class="form-control" type="password" id="password" required>
                                <p id="emailError" class="errorMsg"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <div class="col-md-2">
                            <button type="button" class="button style-10" id="ConfirmForgot"><strong>Xác Nhận</strong></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')
<script>
    $('#ConfirmForgot').click(function(){
        var password = $('#password').val();
        var token = $('#token').val();
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('forgot.accept')}}',
        data:{password:password,token:token},
        dataType: 'json',
            success: function(data) {
                ToastSuccess(data.success);
                window.location.href = "/";
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

</script>
@endsection