@extends('admin.master') 
@section('title','Cấu hình khóa bí mật') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/css/asColorPicker.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
@endsection
 
@section('content')
<div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Zalo</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Facebook</label>
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Hệ thống</label>
    <div class="tabs">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="ZaloForm">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP ID : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_id" class="form-control" value="{{$data[0]->app_id}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP SECRECT : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_secrect" class="form-control" value="{{$data[0]->app_secrect}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP CODE : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_code" class="form-control" value="{{$data[0]->app_code}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP TOKEN : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_token" class="form-control" value="{{$data[0]->app_token}}" style="height:30px">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mr-2" id="ZaloUpdate">Lưu</button>
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
                                    <form id="FacebookForm">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP ID : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_id" class="form-control" value="{{$data[1]->app_id}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP SECRECT : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_secrect" class="form-control" value="{{$data[1]->app_secrect}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP CODE : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_code" class="form-control" value="{{$data[1]->app_code}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">APP TOKEN : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="app_token" class="form-control" value="{{$data[1]->app_token}}" style="height:30px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">PAGES ID: </label>
                                            <div class="col-md-5">
                                                <input type="text" name="pages_id" class="form-control" value="{{$data[1]->pages_id}}" style="height:30px">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mr-2" id="FacebookUpdate">Lưu</button>
                                        <button class="btn btn-light">Cancel</button>
                                        <a href="https://developers.facebook.com/tools/explorer/"><button class="btn btn-danger">Get Access Token</button></a>
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
                                    <form id="SystemForm">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email quản trị : </label>
                                            <div class="col-md-5">
                                                <input type="text" name="emailadmin" class="form-control"
                                                    value="{{$setting->emailadmin}}" style="height:30px">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mr-2" id="SystemUpdate">Lưu</button>
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
    $('#ZaloUpdate').click(function(){
    updateZalo();
});

$('#FacebookUpdate').click(function(){
    updateFacebook();
});
$('#SystemUpdate').click(function(){
    updateSystem();
});

 function updateZalo()
{
    var datas = $('#ZaloForm').serialize();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('admin.zalo.update')}}',
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
function updateFacebook()
{
    var datas = $('#FacebookForm').serialize();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('admin.facebook.update')}}',
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

function updateSystem()
{
    var datas = $('#SystemForm').serialize();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('admin.safemode.system.update')}}',
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