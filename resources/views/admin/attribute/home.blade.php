@extends('admin.master') 
@section('title','Thuộc tính sản phẩm') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/css/asColorPicker.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">

@endsection
 
@section('content')
<div class="tabbed">
    <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">Màu Sắc</label>
    <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">Kích Thước</label>
    <input type="radio" name="tabs" id="tab-nav-3">
    <label for="tab-nav-3">Chất Liệu</label>
    <div class="tabs">
        <div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Màu Sắc</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="SearchColor" id="SearchColor" placeholder="Tìm kiếm danh mục" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="OpenColorModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#ColorModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                                </div>
                            </div><br/>
                            <table id="color_table" class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Màu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="color_table_body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="SearchColor" id="SearchColor" placeholder="Tìm kiếm danh mục" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="OpenModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#ColorModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                                </div>
                            </div><br/>
                            <table id="category_table" class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Tên không dấu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="category_table_body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="SearchColor" id="SearchColor" placeholder="Tìm kiếm danh mục" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="OpenModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#ColorModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                                </div>
                            </div><br/>
                            <table id="category_table" class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Tên không dấu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="category_table_body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="ColorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới màu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên : </label>
                            <input type="text" class="form-control" id="nameColor">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Đường dẫn : </label><br/>
                            <input type="text" name="slug" id="slug" class="form-control"><br/> Nếu để trống sẽ tự động tạo ra.
                        </div>
                        <div class="form-group">
                            <label for="color" class="col-form-label">Màu</label>
                            <input type='text' class="color-picker" value="#ffe74c" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="modalFooter">
                </div>
            </div>
        </div>
    </div>
    
    {{-- END MODAL--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.6/prefixfree.min.js"></script>
@endsection
 
@section('javascript')
<script>
    $(document).ready(function(){
        fetch_color();
    });

    function changeElementsCSS()
    {
        $('.colors').each(function(){
            var att = $(this).attr("data-color");
            $(this).css('background-color',att);
            console.log(att);
        });
    }

    //Load color
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
                $('#color_table_body').html(data.table_data);
                changeElementsCSS();
            },
            error: function(html, status) {
                console.log(html.responseText);
            }
        });
    }

    //Func Addcategory
    function addColor()
    {
        var color = $('#nameColor').val();
        var slug = $('#slug').val();
        var codeColor = $('#codeColor').val();
        var dataString = "name="+category+"&slug="+slug+"&codeColor="+codeColor;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
                method: 'POST',
                url: '{{route('color.store')}}',
                data:dataString,
                success: function(data) {
                    ToastSuccess(data.success);
                    fetch_color();
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }

    $(document).on('keyup', '#SearchColor', function(){
        var query = $(this).val();
        fetch_color(query);
    });
</script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>

@endsection