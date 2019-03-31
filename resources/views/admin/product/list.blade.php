@extends('admin.master') 
@section('title','Trang sản phẩm') 
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Danh mục</h4>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="SearchCategory" id="SearchCategory" placeholder="Tìm kiếm danh mục" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="button" id="OpenModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#CategoryModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>

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

<form id="addProduct" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileUp" id="fileUp">
    <input type="text" class="form-control" name="inputText">
    <button id="Submit" type="submit" class="btn btn-primary"></button>
</form>
@endsection
 
@section('javascript')
<script>
$(document).ready(function(){
    $('#addProduct').on('submit',function(event){
    event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('productdetails.test')}}',
            data:new FormData(this),
            dataType:'JSON',
            contentType:false,
            cache:false,
            processData:false,
            success: function(data) {
                ToastSuccess('Ok');
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
  });

</script>
@endsection