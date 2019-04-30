@extends('admin.master') 
@section('title','Kênh bán Zalo') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<style>
.avataruser {
    width:120px !important;
    height:120px !important;
}
</style>
@endsection
 
@section('content')
<div class="row user-profile">
    <div class="col-lg-4 side-left d-flex align-items-stretch">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body avatar">
                        <h4 class="card-title">Thông tin tài khoản</h4>
                        <img src="" alt="" id="infoavt">
                        <p class="name" id="infoname"></p>
                        <p class="designation" id="infoid">- ID  -</p>
                        <p class="designation" id="infobirthday">Sinh nhật : </p>

                    </div>
                </div>
            </div>
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body overview">
                        <ul class="achivements">
                            <li>
                                <p></p>
                                <p>Lượt tương tác</p>
                            </li>
                            <li>
                                <p></p>
                                <p>Bài Viết</p>
                            </li>
                            <li>
                                <p></p>
                                <p>Bình Luận</p>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 side-right stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Chia sẻ Liên kết lên tường cá nhân</h4>
                    <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Bài Viết</a>
                        </li>
                    </ul>
                </div>
                <div class="wrapper">
                    <hr>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Liên Kết : </label>
                                    <input type="text" class="form-control" name="message" id="linkShare">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nội dung : </label>
                                    <input type="text" class="form-control" name="message" id="msgShare">
                                </div>
                                <button type="button" class="btn btn-primary" id="ShareLink">Đăng tải</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Danh Sách Bạn Bè</h4>
            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên hiển thị</th>
                        <th>Avatar</th>
                        <th>Giới tính</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="ZaloModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubCategoryLabel">Thêm mới danh mục con</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form id="FormSend">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID </label>
                        <input type="text" class="form-control" name="to">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Access Token </label>
                        <input type="text" class="form-control" name="access_token">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">MSG</label>
                        <input type="text" class="form-control" name="message">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Link :  </label>
                        <input type="text" class="form-control" name="link">
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="submodalFooter">
                <button type="button" class="btn btn-primary" id="SendBTN">Send</button>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')
<script src="https://zjs.zdn.vn/zalo/Zalo.Extensions.min.js"></script>
<script>
    $('#ShareLink').click(function(){
        var msg = $('#msgShare').val();
        var link = $('#linkShare').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('zalo.sharelink')}}',
            data:{msg:msg,link:link},
            success: function (data) {
               ToastSuccess(data.success);
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });  
    });

    function callZaloService(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "GET",
            url: '{{route('zalo.getfriend')}}',
            success: function (data) {
               loadDb();
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });  
    }

    function ZaloGetInfo(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "GET",
            url: '{{route('zalo.getinfo')}}',
            success: function (data) {
               $('#infoid').append(data.id);
               $('#infoname').append(data.name);
               $('#infoavt').attr("src",data.picture.data.url);
               $('#infobirthday').append(data.birthday);
               console.log(data.id);
               console.log(data);
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });  
    }

    $(document).ready(function(){
        callZaloService();
        ZaloGetInfo();
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
        "ajax" : '{!!route('zalo.getfriend')!!}',
        "columns":[
            {data:'id',name:'id'},
            {data:'name',name:'name'},
            {data:'picture.data.url',name:'picture'},
            {data:'gender',name:'gender'}
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