@extends('admin.master') 
@section('title','Trang sản phẩm') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/owl-carousel-2/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/owl-carousel-2/assets/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<style>
    .tool {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
        color: blue;

    }

    .imgProduct {
        border-radius: 5% !important;
        width: 300px !important;
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
        height:40px;
    }
</style>
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title">Danh Sách Sản Phẩm</h4>
            </div>
            <div class="col-sm-6">
                <button type="button" id="OpenAdd" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ProductModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
            </div>
        </div>

        <div class="row">
            <table id="order-listing" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản Phẩm</th>
                        <th>Giá SP</th>
                        <th>Giá KM</th>
                        <th>Nổi Bật</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="viewProduct" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi Tiết Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Tên sản phẩm : </label>
                <a href="" class="modalTensp"></a>
                <div class="row">
                    <div class="col-md-3">
                        <img src="" alt="" style="float:left;" class="modalThumbnail imgProduct">  
                    </div>
                    <div class="col-md 8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody class="tableProduct">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
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
       
        "stateSave": true,
        "serverSide" : false,
        "ajax" : '{!!route('product.fetch')!!}',
        "columns":[
            {data:'id'},
            {data:'title'},
            {data:'cost'},
            {data:'discount'},
            {data:'featured'},
            {data:'action'}
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

    $('[data-toggle="tooltip"]').tooltip(); 
    function postFanpage(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('product.upfacebook')}}',
            data:{id:id},
                success: function(data) {
                    ToastSuccess(data.success);
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }

    $(document).on('click','.upfb',function(){
        var id = $(this).attr("id");
        postFanpage(id);
    });

    $(document).on('click','.xemProduct',function(){
        $('.tableProduct').html('');
        $('#viewProduct').modal('show');
        var id = $(this).attr("id");
        var title = $(this).attr("title");
        var slug = $(this).attr("slug");
        var thumbnail = $(this).attr("thumbnail");
        $('.modalTensp').html(title);
        $('.modalTensp').attr("href","{{url('/san-pham')}}/"+id+"/"+slug);
        $('.modalThumbnail').attr("src","{{url('/images/product')}}/"+thumbnail);
        $.ajax({
            method:'GET',
            url:'{{url('/api/v1/product')}}/'+id,
            success: function(data){
                var output = "";
                data.forEach(element => {
                   output += "<tr>"
                    output += "<td>"+element.size.name+"</td>";
                    output += "<td>"+element.color.name+"<span class='colors' style='background-color:"+element.color.codeColor+";'></span></td>";
                    output += "<td>"+element.soluong+"</td>";
                   output += "</tr>";
                    
                });
                $('.tableProduct').html(output);
            },
            error: function(request,status){
                console.log(request.responseJSON);
            }
        });
    });

    $('#OpenAdd').click(function(){
        window.location.href = "{{route('product.create')}}";
    });

});
// Tìm kiếm

</script>

<script src="{{asset('@styleadmin/node_modules/owl-carousel-2/owl.carousel.min.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>


<script>

</script>
@endsection