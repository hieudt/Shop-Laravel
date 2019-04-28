@extends('admin.master')
@section('title','Cấu hình chung')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/css/asColorPicker.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
@endsection
@section('content')
<div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Cấu hình chung</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Liên Kết MXH</label>
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Chất Liệu</label>
    <div class="tabs">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                       <div class="col-md-12">
                           <div class="card">
                                <div class="card-body">
                                    <form id="General">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Màu Chủ Đạo : </label>
                                            <div class="col-sm-9">
                                                <input type="color" name="colorValue" id="codeColor" class="color-picker" value="{{$data->theme_color}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên cửa hàng : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="nameshop" class="form-control" value="{{$data->nameshop}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Địa chỉ : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="addressshop" class="form-control" value="{{$data->addressshop}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Số Điện Thoại : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="phoneshop" class="form-control" value="{{$data->phoneshop}}" style="height:30px">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mr-2" id="GeneralUpdate">Lưu</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="SocialLinks">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Facebook : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="fblink" class="form-control" value="{{$data->fblink}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Twitter : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="twitterlink" class="form-control" value="{{$data->twitterlink}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Instagram : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="instagramlink" class="form-control" value="{{$data->instagramlink}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Youtube : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="youtubelink" class="form-control" value="{{$data->youtubelink}}" style="height:30px">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mr-2" id="SocialUpdate">Lưu</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
@endsection
@section('javascript')
<script>
$('#GeneralUpdate').click(function(){
    updateSetting();
});

$('#SocialUpdate').click(function(){
    updateSocialLinks();
});

 function updateSetting()
{
    var datas = $('#General').serialize();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('admin.config.update.ui')}}',
        data:datas,
        success: function(data) {
            ToastSuccess(data.success);
        },
        error: function(request, status) {
            $.each(request.responseJSON.errors,function(key,val){
                ToastError(val);
            });
        }
    });
}
function updateSocialLinks()
{
    var datas = $('#SocialLinks').serialize();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('admin.config.update.sociallinks')}}',
        data:datas,
        success: function(data) {
            ToastSuccess(data.success);
        },
        error: function(request, status) {
            $.each(request.responseJSON.errors,function(key,val){
                ToastError(val);
            });
        }
    });
}

</script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
@endsection