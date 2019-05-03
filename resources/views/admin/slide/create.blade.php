@extends('admin.master')
@section('title','Thêm mới slide')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/summernote/dist/summernote-bs4.css')}}">
@endsection

@section('content')
<form id="addSlides" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới slide</h4>
                        <p class="card-description">
                            Thông tin slide
                        </p>
                        <div class="form-group">
                            <label for="Name Product">Tiêu đề</label>
                            <input type="text" class="form-control" name="txtTitle"
                                placeholder="Nhập tiêu đề slide">
                        </div>
                       <div class="form-group">
                        <label for="Name Product">Nội Dung</label>
                        <input type="text" class="form-control"  name="txtContent" placeholder="Nhập nội dung slide">
                        </div>
                       <div class="form-group">
                            <label for="Name Product">Đường Dẫn</label>
                            <input type="text" class="form-control"  name="txtUrl" placeholder="Nhập đường dẫn slide">
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
                                Chọn hình ảnh cho slide
                            </p>
                            <div class="form-group">
                                <input type="file" id="Image1" name="Image1" class="dropify">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" id="addSlide"
                                    class="btn btn-success btn-sm">Lưu</button>
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
    $('#addSlides').on('submit',function(event){
    event.preventDefault();
    var data = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('slide.store')}}',
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