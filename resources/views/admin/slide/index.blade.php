@extends('admin.master')
@section('title','Slide')
@section('css')
<style>
    .tool {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
        color: blue;

    }

    .imgProduct {
        border-radius: 0% !important;
        width: 200px !important;
        height: auto !important;
    }

    .tool .tool2 {
        visibility: hidden;
        width: 100px;
        height: auto;
        background-color: gray;
        color: black;
        text-align: center;
        border-radius: 6px;
        font-size: 3pt;
        padding: 5px;
        box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.5);
        -webkit-transition: font-size 1s, width 1s, height 1s, background-color 1s, -webkit-transform 1s;
        /* Safari */
        transition: font-size 1s, width 1s, height 1s, background-color 1s, transform 1s;
        /* Position the tooltip */
        position: absolute;
        z-index: 1;
    }

    .tool:hover .tool2 {
        background-color: white;
        visibility: visible;
        width: 800px;
        height: auto;
        font-size: 15pt;
    }

    button {
        height: 40px;
    }
</style>
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Quản lý Slide</h4>
            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Nội Dung</th>
                        <th>Liên Kết</th>
                        <th>Hình ảnh</th>
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

     //Nút delete review
    $(document).on('click','.delete',function(){
        var id = $(this).attr("data-id");
        $.ajax({
            headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: '{{url('admin/slide/delete')}}/'+id,
            success: function(data) {
                ToastSuccess(data.success);
                $('#order-listing').DataTable().ajax.reload();
            },
            error: function(request, status) {
                ToastError(request.responseText);
            }
        })
    });


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
        "stateSave": true,
        "serverSide" : false,
        "ajax" : '{!!route('slide.fetch')!!}',
        "columns":[
            {data:'id',name:'id'},
            {data:'title'},
            {data:'content'},
            {data:'url'},
            {data:'thumbnail'},
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
</script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection