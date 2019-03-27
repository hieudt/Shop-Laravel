@extends('admin.master') 
@section('title','Danh mục') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}
            @endforeach
        </div>
        @endif
        
        <h4 class="card-title">Danh mục</h4>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="Search" id="Search" placeholder="Tìm kiếm danh mục" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success btn-fw" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                        <button type="button" class="btn btn-success btn-fw" onclick="showToast();"><i class="mdi mdi-check"></i>Test</button>
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
{{-- Modal --}}
<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="nameCategory">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="slug"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addCategory" class="btn btn-success">Send message</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')
<script>
    

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
                    $('#category_table_body').html(data.table_data);
                },
                error: function(html, status) {
                    console.log(html.responseText);
                }
            });
    }

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
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }
    $(document).ready(function(){
        fetch_category();
        $('#addCategory').click(function(){
            addCategory();
        });
        
    });
    $(document).on('keyup', '#Search', function(){
        var query = $(this).val();
        fetch_category(query);
    });

</script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection