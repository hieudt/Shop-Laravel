@extends('includes.master') 
@section('title','Quên Mật Khẩu')
@section('content')
<div id="wrapper" class="go-section">
    <div class="row">
        <div class="container">
            <div class="container">
                <h2 class="text-center">Lấy lại mật khẩu</h2>
                <hr>

                <form>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <input name="email" value="" placeholder="Email" class="form-control" type="email" id="email" required>
                                <p id="emailError" class="errorMsg"></p>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <div class="col-md-2">
                            <button type="button" class="button style-10" id="ForgotButton"><strong>Xác Nhận</strong></button>
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
    $('#ForgotButton').click(function(){
        var email = $('#email').val();
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('user.forgot')}}',
        data:{email:email},
        dataType: 'json',
            success: function(data) {
                ToastSuccess(data.success);
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
