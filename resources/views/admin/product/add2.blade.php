@extends('admin.master') 
@section('title','Trang chủ admin') 
@section('css')
 
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/summernote/dist/summernote-bs4.css')}}">
@endsection
 
@section('content')
<form id="addProduct" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm mới sản phẩm</h4>
                        <p class="card-description">
                            Thông tin sản phẩm
                        </p>
                        <div class="form-group">
                            <label for="Name Product">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="nameProduct" name="txtNameProduct" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="Name Product">Đường dẫn sản phẩm</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{url('san-pham/')}}/</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup1" name="txtSlugProduct" placeholder="Để trống sẽ tự tạo theo tiêu đề sp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chi tiết sản phẩm</h4>
                        <p class="card-description">
                            Cấu hình thuộc tính cho sản phẩm
                        </p>
                        <div class="input-group mr-sm-2 mb-sm-0" id="dynamic">
                            <div class="form-group row" id="listRow">
                                <div class="col-3">
                                    <input type="text" class="form-control" id="inlineFormInputGroup1" name="sku[]" placeholder="SKU" required="">
                                </div>
                                <div class="col-3">
                                    <select class="form-control selColor" name="selColor[]" id="selColor">
                                    </select>
                                </div>
                                <div class="col-3">
                                    <select class="form-control selSize" id="selSize" name="selSize[]">
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input type="number" name="number[]" class="form-control" id="inlineFormInputGroup1" placeholder="Số lượng">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="btnAddList" class="btn btn-info btn-sm">+</button>
                        <button type="submit" name="submit" id="btnList" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Phân loại</h4>
                            <p class="card-description">
                                Chọn danh mục cho sản phẩm
                            </p>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="js-example-basic-single" id="SelCat" name="SelCat" style="width:80%">    
                                </select>
                                <button type="button" id="OpenModal" class="btn btn-success" data-toggle="modal" data-target="#CategoryModal" data-whatever="@getbootstrap">+</button>
                            </div>
                            <div class="form-group">
                                <label>Danh mục con</label>
                                <select class="js-example-basic-single" id="SelSubCat" name="SelSubCat" style="width:80%">    
                                </select>
                                <button type="button" id="OpenSubModal" class="btn btn-success" data-toggle="modal" data-target="#SubcategoryModal" data-whatever="@getbootstrap">+</button>
                            </div>
                            <div class="form-group">
                                <label>Chất Liệu SP</label>
                                <select class="js-example-basic-single" id="SelChatLieu" name="SelChatLieu" style="width:80%">    
                                </select>
                                <button type="button" id="OpenChatLieuModal" class="btn btn-success" data-toggle="modal" data-target="#ChatLieuModal" data-whatever="@getbootstrap">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hình ảnh</h4>
                            <p class="card-description">
                                Chọn hình ảnh cho sản phẩm
                            </p>
                            <div class="form-group">
                                <input type="file" id="Image1" name="Image1" class="dropify">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" id="Image2" name="Image2" class="subDropify">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" id="Image3" name="Image3" class="subDropify">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Giá sản phẩm</h4>
                            <p class="card-description">
                                Giá sản phẩm và khuyến mãi
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Name Product">Giá tiền</label>
                                    <input type="text" class="form-control" placeholder="Giá tiền" name="txtMoney" id="txtMoney">
                                </div>
                                <div class="col-md-6">
                                    <label for="Name Product">% Khuyến Mãi</label>
                                    <input type="number" class="form-control" placeholder="% Khuyến mãi" name="txtDiscount" id="txtMoney">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Nổi bật</h4>
                            <div class="row">
                                <div class="form-radio">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rdoNoiBat" id="rdoNoiBat" value="1">
                                    Có 
                                    <i class="input-helper"></i></label>
                                </div>
                                &nbsp;
                                <div class="form-radio">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="rdoNoiBat" id="rdoNoiBat" value="0" checked="">
                                    Không
                                    <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{--Modal Category--}}
<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên : </label>
                        <input type="text" class="form-control" id="nameCategory">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Đường dẫn : </label><br/>
                        <textarea class="form-control" id="slug"></textarea><br/> Nếu để trống sẽ tự động tạo ra.
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="modalFooter">
            </div>
        </div>
    </div>
</div>
{{--EndModal category--}} {{-- Modal --}}
<div class="modal fade" id="SubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubCategoryLabel">Thêm mới danh mục con</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên : </label>
                        <input type="text" class="form-control" id="nameSubCategory">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Đường dẫn : </label><br/>
                        <textarea class="form-control" id="slugSub"></textarea><br/> Nếu để trống sẽ tự động tạo ra.
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="submodalFooter">
            </div>
        </div>
    </div>
</div>
{{--Endmodal}} {{--Modal Chat Lieu--}}
<div class="modal fade" id="ChatLieuModal" tabindex="-1" role="dialog" aria-labelledby="ChatLieuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ChatLieuLabel">Thêm mới Chất liệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên : </label>
                        <input type="text" class="form-control" id="nameChatLieu">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Đường dẫn : </label><br/>
                        <textarea class="form-control" id="slugCL"></textarea><br/> Nếu để trống sẽ tự động tạo ra.
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="chatlieumodalFooter">
            </div>
        </div>
    </div>
</div>
{{--EndModal--}}
@endsection
 
@section('javascript')
<script>
    fetch_category();
    fetch_subcategory(1);
    fetch_chatlieu();
    fetch_color();
    fetch_size();
    //Open modal SubCategory
    $('#OpenSubModal').click(function(){
            $('#SubCategoryLabel').html('Thêm danh mục con');
            $('#submodalFooter').html('<button type="button" id="addSubCategory2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
            $('#nameSubCategory').val('');
            $('#slugSub').val('');
            $('#addSubCategory2').click(function(){
                addSubcategory();
                $('#nameSubCategory').val('');
                $('#slugSub').val('');
            });
     });
    // Open modal category
    $('#OpenModal').click(function(){
            $('#exampleModalLabel').html('Thêm danh mục');
            $('#modalFooter').html('<button type="button" id="addCategory2" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
            $('#nameCategory').val('');
            $('#slug').val('');
            // Lưu và đóng
            $('#addCategory2').click(function(){
                addCategory();
                $('#nameCategory').val('');
                $('#slug').val('');
            });
            
    });
    //Open modal chat lieu
    $('#OpenChatLieuModal').click(function(){
        $('#chatlieumodalFooter').html('<button type="button" id="addChatLieu" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        $('#nameChatLieu').val('');
        $('#slugCL').val('');
        // Lưu và đóng
        $('#addChatLieu').click(function(){
             addChatLieu();
            $('#nameChatLieu').val('');
            $('#slugCL').val('');
        });
            
    });

    //Func Add SubCategory
    function addSubcategory()
        {
            var id_cat = $('#SelCat').val();
            var name_sub = $('#nameSubCategory').val();
            var slug = $('#slugSub').val();
            var dataString = "name_sub="+name_sub+"&id_cat="+id_cat+"&slug="+slug;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'POST',
                    url: '{{route('subcategory.store')}}',
                    data:dataString,
                    success: function(data) {
                        ToastSuccess(data.success);
                        fetch_subcategory(1);
                        fetch_category();
                        $('#SubcategoryModal').modal('hide');
                    },
                    error: function(request, status) {
                        $.each(request.responseJSON.errors,function(key,val){
                            ToastError(val);
                        });
                    }
            });
        }
    //Func Addcategory
    function addCategory()
    {
            var category = $('#nameCategory').val();
            var slug = $('#slug').val();
            var dataString = "title="+category+"&slug="+slug;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '{{route('category.store')}}',
                data:dataString,
                success: function(data) {
                    ToastSuccess(data.success);
                    fetch_category();
                    $('#CategoryModal').modal('hide');
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });

                    console.log(request.responseJSON);
                }
        });
    }

    //Func add product
    $('#addProduct').on('submit',function(event){
    event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('productdetails.store')}}',
            data:new FormData(this),
            dataType:'JSON',
            contentType:false,
            cache:false,
            processData:false,
            success: function(data) {
                ToastSuccess(data.success);
            },
            error: function(request, status) {
                if(request.responseText == 1)
                {
                    ToastError('Có trường bị trùng');
                } else {
                    $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                    });
                }
            }
        });
    });


 
    //Func add ChatLieu
    function addChatLieu()
    {
            var name = $('#nameChatLieu').val();
            var slug = $('#slugCL').val();
            var dataString = "name="+name+"&slug="+slug;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '{{route('chatlieu.store')}}',
                data:dataString,
                success: function(data) {
                    ToastSuccess(data.success);
                    fetch_chatlieu();
                    $('#ChatLieuModal').modal('hide');
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }

    // Load category Func
    function fetch_category(query = '')
    {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            url: '{{route('category.search')}}',
            data:{query:query},
            dataType: 'json',
                success: function(data) {
                    $('#SelCat').html(data.select_data);
                },
                error: function(html, status) {
                     console.log(html.responseText);
                }
            });
    }

    // Load subcategory func
    function fetch_subcategory(query = '')
    {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            url: '{{route('subcategory.search')}}',
            data:{query:query},
            dataType: 'json',
                success: function(data) {
                    $('#SelSubCat').html(data.select_data);
                },
                error: function(html, status) {
                     console.log(html.responseText);
                }
            });
    }
    // Load Color
    function fetch_color(query = '')
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('color.search')}}',
        data:{query:query},
        dataType: 'json',
            success: function(data) {
                $('#selColor').html(data.select_data);
            },
            error: function(html, status) {
                console.log(html.responseText);
            }
        });
    }
    // Load Size
    function fetch_size(query = '')
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('size.search')}}',
        data:{query:query},
        dataType: 'json',
            success: function(data) {
                $('#selSize').html(data.select_data);
            },
            error: function(html, status) {
                console.log(html.responseText);
            }
        });
    }
    // Load Chat Lieu func
    function fetch_chatlieu(query = '')
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('chatlieu.search')}}',
        data:{query:query},
        dataType: 'json',
            success: function(data) {
                $('#SelChatLieu').html(data.select_data);
            },
            error: function(html, status) {
                console.log(html.responseText);
            }
        });
    }
    $(document).ready(function(){

        
        $(document).on('click','.btnRemoveList',function(){
            var button_id = $(this).attr("id");
            $('#listRow'+button_id+'').remove();
        });

        $('#SelCat').change(function(){
            var idCat = $(this).val();
            fetch_subcategory(idCat);
        });
        $('#summernote').summernote({
            height: 500,
        });

        $('.dropify').dropify({
            messages:{
                'default':'Ảnh chính sản phẩm',
                'replace':'Kéo và thả hoặc click để thay đổi',
                'remove':'Xóa',
                'error':'Xin lỗi dung lượng file quá lớn'
            },
        });
        $('.subDropify').dropify({
            messages:{
                'default':'Ảnh phụ sản phẩm',
                'replace':'Kéo và thả hoặc click để thay đổi',
                'remove':'Xóa',
                'error':'Xin lỗi dung lượng file quá lớn'
            },
        });

        var i = 1;
        var b = 0;
        var a = '';
       

        $('#btnAddList').click(function(){
            if(b == 0)
            {
                a = $('#listRow').html();
                $('#listRow').append('<div class="col-1"><button type="button" id="'+i+'" class="btn btn-danger btnRemoveList">-</button></div>');
            }
            b++;
            i++;
            $('#dynamic').append('<div class="form-group row" id="listRow'+i+'">'+a+'<div class="col-1"><button type="button" id="'+i+'" class="btn btn-danger btnRemoveList">-</button></div></div>');
            
        });
    });

</script>
<script src="{{asset('@styleadmin/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/select2.js')}}"></script>
<script src="{{asset('@styleadmin/js/editorDemo.js')}}"></script>
<script src="{{asset('@styleadmin/js/form-repeater.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/inputmask/dist/inputmask/bindings/inputmask.binding.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/inputmask/dist/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/jquery.repeater/jquery.repeater.min.js')}}"></script>
@endsection