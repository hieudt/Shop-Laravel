@extends('admin.master') 
@section('title','Mã giảm giá') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

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
</style>
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Danh mục</h4>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="SearchCoupons" id="SearchCoupons" placeholder="Tìm kiếm mã giảm giá" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="button" id="OpenCouponsModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#CouponsModal"
                            data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                    </div>
                </div><br/>
                <table id="coupons_table" class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã</th>
                            <th>% Giảm giá</th>
                            <th>HSD</th>
                            <th>G.Trị Hóa Đơn</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="coupons_table_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="CouponsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CouponsLabel">Thêm mới danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Mã : </label><br/>
                        <textarea class="form-control" id="codeCoupon"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tiêu đề : </label>
                        <input type="text" class="form-control" id="titleCoupon">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nội dung : </label><br/>
                        <textarea class="form-control" id="contentCoupon"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">% Giảm giá: </label>
                        <input type="number" class="form-control" id="discount">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Giá trị đơn hàng: </label>
                        <input type="number" class="form-control" id="requireTotal">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hình ảnh (Link): </label>
                        <input type="text" class="form-control" id="imageLink">
                    </div>
                    <div class="form-group">
                        <label for="date">HSD :</label>
                        <div id="datepicker-popup" class="input-group date datepicker">
                            <input type="text" class="form-control" id="date">
                            <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="js-example-basic-single" id="SelStatus" style="width:100%">
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="modalFooter">
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')
<script>
    $(document).ready(function(){
        $('#datepicker-popup').datepicker({
            format: 'yyyy-mm-dd',
            minDate: 0,
            todayHighlight: true,
        });
        fetch('','{{route('coupons.search')}}','#coupons_table_body','');

        $('#OpenCouponsModal').click(function(){
            $('#CouponsLabel').html('Thêm mới mã giảm giá');
            $('#modalFooter').html('<button type="button" id="addCoupons" class="btn btn-success">Lưu</button><button type="button" id="addCoupons2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
            $('#titleCoupon').val('');
            $('#contentCoupon').val('');
            $('#codeCoupon').val('');
            $('#discount').val('');
            $('#requireTotal').val('');
            $('#imageLink').val('');
            $('#date').val('');

            $('#addCoupons').click(function(){
                addCoupons();
            });

            $('#addCoupons2').click(function(){
                addCoupons();
                $('#CouponsModal').modal('hide');
            });
        });
    });
    //Func Addcategory
    function addCoupons()
    {
        var title = $('#titleCoupon').val();
        var content = $('#contentCoupon').val();
        var code = $('#codeCoupon').val();
        var Percent = $('#discount').val();
        var RequireTotal = $('#requireTotal').val();
        var thumbnail = $('#imageLink').val();
        var typeEnable = $('#SelStatus').val();
        var date = $('#date').val();
        var dataString = "title="+title+"&content="+content+"&code="+code+"&Percent="+Percent+"&RequireTotal="+RequireTotal+"&thumbnail="+thumbnail+"&typeEnable="+typeEnable+"&date="+date;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
                method: 'POST',
                url: '{{route('coupons.store')}}',
                data:dataString,
                success: function(data) {
                    ToastSuccess(data.success);
                    fetch('','{{route('coupons.search')}}','#coupons_table_body','');
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }


    function fetch(query = '',url = '',table_body = '',funcOption)
    {
        var request = $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
            method: 'GET',
            url: url,
            data:{query:query},
            dataType: 'json',
        });

        request.done(function(data){
            $(table_body).html(data.table_data);
            $('#SelStatus').html(data.select_data);
            if(funcOption)
            funcOption();
        });

        request.fail(function(html,status){
            console.log(status);
        });
    }

</script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/select2.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>


<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection