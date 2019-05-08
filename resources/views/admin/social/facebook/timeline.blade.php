@extends('admin.master')
@section('title','Kênh bán hàng Facebook')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')

<div class="row user-profile">
    <div class="col-lg-4 side-left d-flex align-items-stretch">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body avatar">
                        <h4 class="card-title">Bài Viết</h4>
                        <img src="{{$obj['pageavatar']}}" alt="">
                        <p class="name">{{$obj['pagename']}}</p>
                        <p class="designation">- ID {{$obj['pageid']}} -</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body overview">
                        <ul class="achivements">
                            <li>
                                <p>{{$obj['totalreact']}}</p>
                                <p>Lượt tương tác</p>
                            </li>
                            <li>
                                <p>{{$obj['totalpost']}}</p>
                                <p>Bài Viết</p>
                            </li>
                            <li>
                                <p>{{$obj['totalcomment']}}</p>
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
                    <h4 class="card-title mb-0">Các bài post gần đây</h4>
                    <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Bài Viết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Quét Email</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Quét Tùy Chọn</a>
                        </li>
                    </ul>
                </div>
                <div class="wrapper">
                    <hr>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                            <table id="order-listing" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Lượng tương tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                </tbody>
                            </table>
                        </div>
                        <!-- tab content ends -->
                        <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                            <div class="wrapper mb-5 mt-4">
                                <span class="badge badge-warning text-white">Note : </span>
                                <p class="d-inline ml-3 text-muted">Điền ID Bài viết bên dưới và click quét</p>
                            </div>
                            <label for="">ID Bài Viết : </label>
                            <input type="text" name="" class="form-control" id="idBaiViet">
                            <label for="">Số lượng cần lấy (-1 = lấy tất cả) : </label>
                            <input type="text" name="" class="form-control" id="slBaiViet" value="-1">

                            <div class="form-group mt-5">
                                <button type="button" class="btn btn-success mr-2 scanEmail">Quét</button>
                            </div>
                           <div class="form-group"> 
                            <label for="">Kết Quả</label>
                            <textarea name="" id="dataResult" class="form-control" cols="30" rows="10"></textarea>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                            <label for="">ID Bài Viết : </label>
                            <input type="text" name="" class="form-control" id="idBaiVietOption">
                            <label for="">Số lượng cần lấy (-1 = lấy tất cả) : </label>
                            <input type="text" name="" class="form-control" id="slBaiVietOption" value="-1">
                            <div class="form-group">
                                <label for="sel1">Tùy chọn:</label>
                                <select class="form-control" id="selOption">
                                    <option value="2">Lấy Hết Bình Luận</option>
                                    <option value="1">Theo chuỗi</option>
                                </select>
                            </div>
                            <span class="external" style="display:none;">
                                <div class="form-group">
                                    <label>Chuỗi</label>
                                    <input type="text" class="form-control" id="txtExternal">
                                </div>
                            </span>
                            <div class="form-group mt-5">
                                <button type="button" class="btn btn-success mr-2 scanOption">Quét</button>
                            </div>
                            <div class="form-group">
                                <label for="">Kết Quả</label>
                                <textarea name="" id="dataResultOption" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
$('#selOption').change(function(){
    if($(this).val() == 1){
        $('.external').show();
    } else {
        $('.external').hide();
    }
});
$('.scanEmail').click(function(){
    $('#dataResult').text('');
    var idbv = $('#idBaiViet').val(); 
    var soluong = $('#slBaiViet').val();
     $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: '{{route('admin.facebook.scanemail')}}',
        data:{idbv:idbv,soluong:soluong},
        success: function (data) {
            $('#dataResult').text(data.success);
        },
        error: function (request, status) {
            $.each(request.responseJSON.errors,function(key,val){
                ToastError(val);
            });
        }
    }); 
});

$('.scanOption').click(function(){
    $('#dataResultOption').text('');
    var idbv = $('#idBaiVietOption').val(); 
    var soluong = $('#slBaiVietOption').val();
    var textExternal = $('#txtExternal').val();
    var option = $('#selOption').val();
     $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: '{{route('admin.facebook.scanoption')}}',
        data:{idbv:idbv,soluong:soluong,textExternal:textExternal,option:option},
        success: function (data) {
            $('#dataResultOption').text(data.success);
        },
        error: function (request, status) {
            $.each(request.responseJSON.errors,function(key,val){
                ToastError(val);
            });
        }
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
        "serverSide" : false,
        "ajax" : '{!!route('admin.facebook.fetch')!!}',
        "aaSorting" : [[0,'desc']],
        "columns":[
            {data:'id',name:'id'},
            {data:'countreact'}
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