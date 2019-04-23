@extends('admin.master')
@section('title','Cấu hình chung')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/css/asColorPicker.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
@endsection
@section('content')
<div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Giao Diện</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Kích Thước</label>
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
                                    <form id="GiaoDien">
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Màu Chủ Đạo : </label>
                                            <div class="col-sm-9">
                                                <input type="color" name="colorValue" id="codeColor" class="color-picker" value="{{$data->theme_color}}" style="height:30px">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success mr-2" id="UIUpdate">Lưu</button>
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
$('#UIUpdate').click(function(){
    updateSetting();
});

 function updateSetting()
{
    var datas = $('#GiaoDien').serialize();
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
</script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
@endsection