@extends('admin.master') 
@section('title','Trang sản phẩm') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/owl-carousel-2/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/owl-carousel-2/assets/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">

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
                        <input type="text" name="SearchProduct" id="SearchProduct" placeholder="Tìm kiếm sản phẩm" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <button type="button" id="OpenAdd" class="btn btn-success btn-fw" data-toggle="modal" data-target="#ProductModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                    </div>

                </div><br/>
                <table id="Product_table" class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá SP</th>
                            <th>Giá Khuyến mãi</th>
                            <th>Nổi bật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="product_table_body">
                    </tbody>
                </table>
                <div class="pagination-container">
                    <nav>
                        <ul class="pagination flat pagination-success">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')
<script>
$(document).ready(function(){

    fetch_product();
    $('[data-toggle="tooltip"]').tooltip(); 
    function fetch_product(query = '')
    {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
                method: 'GET',
                url: '{{route('product.search')}}',
                data:{query:query},
                dataType: 'json',
                success: function(data) {
                    $('#product_table_body').html(data.table_data);
                },
                error: function(html, status) {
                    console.log(html.responseText);
                }
            });
    }

    $(document).on('keyup', '#SearchProduct', function(){
        var query = $(this).val();
        fetch_product(query);
    });

    $('#OpenAdd').click(function(){
        window.location.href = "{{route('product.create')}}";
    });


});
// Tìm kiếm

</script>

<script src="{{asset('@styleadmin/node_modules/owl-carousel-2/owl.carousel.min.js')}}"></script>
<script>

</script>
@endsection