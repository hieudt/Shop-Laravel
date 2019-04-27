@extends('admin.master') 
@section('title','Thêm mới tin tức') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/summernote/dist/summernote-bs4.css')}}">
@endsection
 
@section('content')
<form id="addNews" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới tin tức</h4>
                        <p class="card-description">
                            Thông tin tin tức
                        </p>
                        <div class="form-group">
                            <label for="Name Product">Tiêu đề</label>
                            <input type="text" class="form-control" id="nameProduct" name="txtName" placeholder="Nhập tên tin tức">
                        </div>
                        <div class="form-group">
                            <label for="Name Product">Đường dẫn tin tức</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{url('tin-tuc/')}}/</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup1" name="txtSlug" placeholder="Để trống sẽ tự tạo theo tiêu đề">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hình ảnh</h4>
                            <p class="card-description">
                                Chọn hình ảnh cho tin tức
                            </p>
                            <div class="form-group">
                                <input type="file" id="Image1" name="Image1" class="dropify">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" id="addNew" class="btn btn-success btn-sm">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
 
@section('javascript')
<script>
    $('#addNews').on('submit',function(event){
    event.preventDefault();
    var data = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('news.store')}}',
            data:data,
            dataType:'JSON',
            contentType:false,
            cache:false,
            processData:false,
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

    $(document).ready(function(){
            $('.dropify').dropify({
            messages:{
                'default':'Ảnh chính',
                'replace':'Kéo và thả hoặc click để thay đổi',
                'remove':'Xóa',
                'error':'Xin lỗi dung lượng file quá lớn'
            },
        });
    });
</script>
<script src="{{asset('@styleadmin/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/editorDemo.js')}}"></script>

@endsection