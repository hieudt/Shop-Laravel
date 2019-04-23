@extends('admin.master') 
@section('title','Quản lý khách hàng') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">


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
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Quản lý khách hàng</h4>
            </div>
            <div class="col-sm-6">
                <button type="button" id="OpenUserModal" class="btn btn-success btn-xs" data-toggle="modal" data-target="#UserModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Tổng Hóa Đơn</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
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
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UserModalLabel">Thêm mới danh mục con</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
            </div>
            <div class="modal-body">
                <form id="ModalForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên : </label>
                        <input type="text" class="form-control" id="txtTen" name="txtTen">
                        <input type="hidden" id="txtId" name="txtId">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email : </label>
                        <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Số Điện Thoại : </label>
                        <input type="text" class="form-control" id="txtPhone" name="txtPhone">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Địa chỉ : </label>
                        <input type="text" class="form-control" id="txtAddress" name="txtAddress">
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="UserModalFooter">
            </div>
        </div>
    </div>
</div>
{{--End modal--}}
@endsection
 
@section('javascript')


<script>
    $(document).ready(function(){
        if (window.location.hash === "#hihi") {
            $('#order-listing').DataTable().search('4').draw();
        }
    });
    //Func editUser
    function editUser(data)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('users.update')}}',
            data:data,
            success: function(data) {
                    ToastSuccess(data.success);
                    $('#order-listing').DataTable().ajax.reload();
                    $('#UserModal').modal('hide');
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    //Func editUser
    function addUser(data)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('users.store')}}',
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
        $('#UserModal').modal('show');
        $('#UserModalLabel').html('Sửa Thông tin');
        $('#UserModalFooter').html('<button type="button" id="editUser" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        
        $('#txtTen').val($(this).attr('data-hoten'));
        $('#txtEmail').val($(this).attr('data-email'));
        $('#txtPhone').val($(this).attr('data-phone'));
        $('#txtAddress').val($(this).attr('data-address'));
        $('#txtId').val($(this).attr('data-id'));
        $('#editUser').click(function(){
            var data = $('#ModalForm').serialize();
            editUser(data);
        });
    });

    $('#OpenUserModal').click(function(){
        $('#UserModalLabel').html('Thêm thông tin');
        $('#UserModalFooter').html('<button type="button" id="addUser" class="btn btn-success">Thêm</button><button type="button" id="addUser2" class="btn btn-success">Thêm & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
        $('#txtTen').val('');
        $('#txtEmail').val('');
        $('#txtPhone').val('');
        $('#txtAddress').val('');
        $('#txtId').val('');

        $('#addUser').click(function(){
            $('#txtTen').val();
            $('#txtEmail').val();
            $('#txtPhone').val();
            $('#txtAddress').val();
            $('#txtId').val();
            var data = $('#ModalForm').serialize();
            addUser(data);

        });

        $('#addUser2').click(function(){
            $('#txtTen').val();
            $('#txtEmail').val();
            $('#txtPhone').val();
            $('#txtAddress').val();
            $('#txtId').val();
            var data = $('#ModalForm').serialize();
            addUser(data);
            $('#UserModal').modal('hide');
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
        "ajax" : '{!!route('users.fetch')!!}',
        "columns":[
            {data:'id',name:'id'},
            {data:'name',name:'name'},
            {data:'SoBill',name:'SoBill'},
            {data:'TotalMoney',name:'TotalMoney'},
            {data:'Title',name:'Title'},
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