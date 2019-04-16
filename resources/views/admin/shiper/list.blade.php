@extends('admin.master') 
@section('title','Nhà Vận Chuyển') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">


<style>

    button {
        height: 40px;
    }
</style>
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Nhà Vận Chuyển</h4>
            </div>
            <div class="col-sm-6">
                <button type="button" id="OpenShipperModal" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ShipperModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                
            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Dịch vụ</th>
                        <th>Chi Phí</th>
                        <th>Thời gian trung bình</th>
                        <th>Logo</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="ShipperModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShipperModalLabel">Thêm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
            </div>
            <div class="modal-body">
                <form id="ModalForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Dịch Vụ : </label>
                        <input type="text" class="form-control" id="txtTen" name="txtTen">
                        <input type="hidden" id="txtId" name="txtId">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Chi Phí : </label>
                        <input type="text" class="form-control" id="txtFee" name="txtFee">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Thời Gian : </label>
                        <input type="text" class="form-control" id="txtTime" name="txtTime">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hình Ảnh (Link): </label>
                        <input type="text" class="form-control" id="txtImg" name="txtImg">
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="ShipperModalFooter">
            </div>
        </div>
    </div>
</div>
{{--End modal--}}
@endsection
 
@section('javascript')


<script>
    //Func editShipper
    function editShipper(data)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('shipper.update')}}',
            data:data,
            success: function(data) {
                    ToastSuccess(data.success);
                    $('#order-listing').DataTable().ajax.reload();
                    $('#ShipperModal').modal('hide');
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    //Func editShipper
    function addShipper(data)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('shipper.store')}}',
            data:data,
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

    // Nút edit category
    $(document).on('click','.edited',function(){
        $('#ShipperModal').modal('show');
        $('#ShipperModalLabel').html('Sửa Thông tin');
        $('#ShipperModalFooter').html('<button type="button" id="editShipper" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        
        $('#txtTen').val($(this).attr('data-name'));
        $('#txtTime').val($(this).attr('data-time'));
        $('#txtFee').val($(this).attr('data-fee'));
        $('#txtImg').val($(this).attr('data-images'));
        $('#txtId').val($(this).attr('data-id'));

        $('#editShipper').click(function(){
            var data = $('#ModalForm').serialize();
            editShipper(data);
        });
    });

    $('#OpenShipperModal').click(function(){

        $('#ShipperModalLabel').html('Thêm thông tin');
        $('#ShipperModalFooter').html('<button type="button" id="addShipper" class="btn btn-success">Thêm</button><button type="button" id="addShipper2" class="btn btn-success">Thêm & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        $('#txtTen').val('');
        $('#txtTime').val('');
        $('#txtFee').val('');
        $('#txtImg').val('');
        $('#txtId').val('');

        $('#addShipper').click(function(){
            $('#txtTen').val();
            $('#txtTime').val();
            $('#txtFee').val();
            $('#txtImg').val();
            $('#txtId').val();
            var data = $('#ModalForm').serialize();
            addShipper(data);

        });

        $('#addShipper2').click(function(){
            $('#txtTen').val();
            $('#txtTime').val();
            $('#txtFee').val();
            $('#txtImg').val();
            $('#txtId').val();
            var data = $('#ModalForm').serialize();
            addShipper(data);
            $('#ShipperModal').modal('hide');
        });
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
        "process" : true,
        "stateSave": true,
        "serverSide" : false,
        "ajax" : '{!!route('shipper.fetch')!!}',
        "columns":[
            {data:'id',name:'id'},
            {data:'name',name:'name'},
            {data:'fee',name:'fee'},
            {data:'Time',name:'Time'},
            {data:'image',name:'image'},
            {data:'action',name:'action'}
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