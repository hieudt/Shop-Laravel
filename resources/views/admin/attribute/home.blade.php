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
                                    <input type="text" name="SearchColor" id="SearchColor" placeholder="Tìm kiếm màu sắc" class="form-control">
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
                    <h4 class="card-title">Kích Thước</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="SearchSize" id="SearchSize" placeholder="Tìm kiếm size" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="OpenSizeModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#SizeModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                                </div>
                            </div><br/>
                            <table id="size_table" class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Size</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="size_table_body">
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
                    <h4 class="card-title">Chất Liệu</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="SearchChatLieu" id="SearchChatLieu" placeholder="Tìm kiếm chất liệu" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <button type="button" id="OpenChatLieuModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#ChatLieuModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                                </div>
                            </div><br/>
                            <table id="chatlieu_table" class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên chất liệu</th>
                                        <th>Tên không dấu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="chatlieu_table_body">
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
                <h5 class="modal-title" id="ColorLabel">Thêm mới màu</h5>
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
                        <label for="color" class="col-form-label">Chọn Màu</label>
                        <input type='color' name="colorValue" id="codeColor" class="color-picker" value="#ffe74c" style="height:30px" />
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="modalColorFooter">
            </div>
        </div>
    </div>
</div>

{{-- END MODAL--}}
{{-- Modal --}}
<div class="modal fade" id="ChatLieuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ChatLieuLabel">Thêm mới màu</h5>
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
                        <input type="text" name="slug" id="slug" class="form-control"><br/> Nếu để trống sẽ tự động tạo ra.
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="modalChatLieuFooter">
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
        fetch('','{{route('color.search')}}','#color_table_body',changeElementsCSS);
        fetch('','{{route('size.search')}}','#size_table_body');
        fetch('','{{route('chatlieu.search')}}','#chatlieu_table_body');

    });


    function changeElementsCSS()
    {
        $('.colors').each(function(){
            var att = $(this).attr("data-color");
            $(this).css('background-color',att);
        });
    }
    // Load All
    function fetch(query = '',url = '',table_body = '',funcOption)
    {
        var request = $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: url,
            data:{query:query},
            dataType: 'json',
        });

        request.done(function(data){
            $(table_body).html(data.table_data);
            if(funcOption)
            funcOption();
        });

        request.fail(function(html,status){
            console.log(html.responseText);
        });
    }
    
    //Func addColor
    function addColor()
    {
        var color = $('#nameColor').val();
        var slug = $('#slug').val();
        var codeColor = $('#codeColor').val();
        var dataString = "name="+color+"&slug="+slug+"&codeColor="+codeColor;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
                method: 'POST',
                url: '{{route('color.store')}}',
                data:dataString,
                success: function(data) {
                    ToastSuccess(data.success);
                    fetch('','{{route('color.search')}}','#color_table_body',changeElementsCSS);
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }

    //Func ChatLieu
    function addChatLieu()
    {
        var name = $('#nameChatLieu').val();
        var slug = $('#slug').val();

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
                    fetch('','{{route('chatlieu.search')}}','#chatlieu_table_body');
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }
    
    //ModalColor
    $('#OpenColorModal').click(function(){
        $('#ColorLabel').html('Thêm mới màu');
        $('#modalColorFooter').html('<button type="button" id="addColor" class="btn btn-success">Lưu</button><button type="button" id="addColor2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        $('#nameColor').val('');
        $('#slug').val('');
        // Lưu
        $('#addColor').click(function(){
            addColor();
        });

        // Lưu và đóng
        $('#addColor2').click(function(){
            addColor();
            $('#nameColor').val('');
            $('#slug').val('');
            $('#ColorModal').modal('hide');
        });
    
    });


    //Modal ChatLieu
    $('#OpenChatLieuModal').click(function(){
        $('#ChatLieuLabel').html('Thêm mới Chất Liệu');
        $('#modalChatLieuFooter').html('<button type="button" id="addChatLieu" class="btn btn-success">Lưu</button><button type="button" id="addChatLieu2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        $('#nameChatLieu').val('');
        $('#slug').val('');
        // Lưu
        $('#addChatLieu').click(function(){
            addChatLieu();
        });

        // Lưu và đóng
        $('#addChatLieu2').click(function(){
            addChatLieu();
            $('#nameChatLieu').val('');
            $('#slug').val('');
            $('#ChatLieuModal').modal('hide');
        });
    
    });

    $(document).on('keyup', '#SearchColor', function(){
        var query = $(this).val();
        fetch(query,'{{route('color.search')}}','#color_table_body',changeElementsCSS);
    });
    $(document).on('keyup', '#SearchChatLieu', function(){
        var query = $(this).val();
        fetch(query,'{{route('chatlieu.search')}}','#chatlieu_table_body');
    });
    $(document).on('keyup', '#SearchSize', function(){
        var query = $(this).val();
        fetch(query,'{{route('size.search')}}','#size_table_body');
    });

</script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
@endsection