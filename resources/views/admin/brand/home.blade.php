@extends('admin.master') 
@section('title','Thương Hiệu') 
@section('css')
<style>
table td img {
    width:200px !important;
    height: 100px !important;
    border-radius: 0% !important;
}
button { height: 40px; }</style>
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Cập Nhật Thương Hiệu</h4>
            </div>
            <div class="col-sm-6">
                <button type="button" id="OpenBrandModal" class="btn btn-success btn-xs" data-toggle="modal" data-target="#BrandModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>

            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>URL</th>
                        <th>Hình Ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="BrandModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BrandLabel">Thêm mới thương hiệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form id="BrandForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tiêu đề </label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">URL (Có thể để trống) </label>
                        <input type="text" class="form-control" id="slug" name="slug">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hình Ảnh (Link): </label>
                        <input type="text" class="form-control" id="thumbnail" name="thumbnail">
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="BrandFooter">
                <button type="button" class="btn btn-primary" id="btnBrandPost">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')

<script>

    function addBrand(){
        var datastr = $('#BrandForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
                method: 'POST',
                url: '{{route('brand.store')}}',
                data:datastr,
                success: function(data) {
                    ToastSuccess(data.success);
                    $('#order-listing').DataTable().ajax.reload();
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }

    function editBrand(id){
        var datastr = $('#BrandForm').serialize();
        datastr += '&id='+id;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('brand.update')}}',
            data:datastr,
            success: function(data) {
                ToastSuccess(data.success);
                $('#order-listing').DataTable().ajax.reload();
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
                console.log(datastr);
            }
        });
    }

    $(document).ready(function(){
        loadDb();

         $(document).on('click','.edited',function(){
                $('#BrandModal').modal('show');
                $('#BrandLabel').html('Sửa thương hiệu');
                $('#BrandFooter').html('<button type="button" id="editBrand" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
                var id = $(this).attr("data-id");
                var title = $(this).attr("data-title");
                var slug = $(this).attr("data-slug");
                var thumbnail = $(this).attr("data-thumbnail");
                $('#title').val(title);
                $('#slug').val(slug);
                $('#thumbnail').val(thumbnail);
                $('#editBrand').click(function(){
                    editBrand(id);
                });
            });

        $('#OpenBrandModal').click(function(){
            $('#BrandLabel').html('Thêm thương hiệu');
            $('#BrandFooter').html('<button type="button" id="addBrand" class="btn btn-success">Lưu</button><button type="button" id="addBrand2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
            $('#title').val('');
            $('#slug').val('');
            $('#thumbnail').val('');
            // Lưu
            $('#addBrand').click(function(){
                addBrand();
            });

            // Lưu và đóng
            $('#addBrand2').click(function(){
                addBrand();
                $('#title').val('');
                $('#slug').val('');
                $('#thumbnail').val('');
                $('#BrandModal').modal('hide');
            });
        
        });
    });

    function loadDb(){
        $('#order-listing').DataTable({
        "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
        "iDisplayLength": 10,
        "language": { 
            "sProcessing":   "Đang xử lý...",
            "sLengthMenu":   "Xem _MENU_ mục",
            "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
            "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
            "sInfoPostFix":  "",
            "sSearch":       "Tìm:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Đầu",
                "sPrevious": "Trước",
                "sNext":     "Tiếp",
                "sLast":     "Cuối"
            }
        },
        "process" : true,
        "ajax" : '{!!route('brand.show')!!}',
        "columns":[
            {data:'id',name:'id'},
            {data:'title',name:'title'},
            {data:'slug',name:'slug'},
            {data:'thumbnail',name:'thumbnail'},
            {data:'action'}
        ],
        

        });
        $('#order-listing').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.removeClass('form-control-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.removeClass('form-control-sm');
        });
    }

</script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection