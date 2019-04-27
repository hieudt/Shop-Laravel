@extends('admin.master')
@section('title','Danh sách tin tức')
@section('css')
<style>
    .table td img {
        width:auto !important;
        height:auto !important;
        border-radius:0 !important;
    }

    button { height: 40px; }
</style>
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Danh sách tin tức </h4>
            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Hình ảnh</th>
                        <th>Ngày đăng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
$(document).ready(function(){
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
        "stateSave": true,
        "serverSide" : false,
        "ajax" : '{!!route('news.fetch')!!}',
        "columns":[
            {data:'id'},
            {data:'title'},
            {data:'thumbnail'},
            {data:'created_at'},
            {data:'action'},

        ]

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
    });

    $(document).on('click','.delete',function(){
        var id = $(this).attr("data-id");
        $.ajax({
            headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: '{{url('admin/news/delete')}}/'+id,
            success: function(data) {
                ToastSuccess(data.success);
                $('#order-listing').DataTable().ajax.reload();
            },
            error: function(request, status) {
                ToastError(request.responseText);
            }
        })
    });

    $(document).on('click','.sendMail',function(){
        var id = $(this).attr("data-id");
        $.ajax({
            headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: '{{url('admin/news/sendmail')}}/'+id,
            success: function(data) {
                ToastSuccess(data.success);
                $('#order-listing').DataTable().ajax.reload();
            },
            error: function(request, status) {
                ToastError(request.responseText);
            }
        })
    });
</script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection