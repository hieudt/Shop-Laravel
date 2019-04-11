@extends('includes.master') 
@section('title','Danh mục sản phẩm') 
@section('css')

<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
<style>
    .pagination>.active>span {
        background-color: black !important;
        color: white !important;
        border-color: none !important;
    }

    .pagination>li>a {
        color: black !important;
    }
</style>
@endsection
 
@section('content')

<?php $CountForm = 0; ?>
<div id="wrapper" class="go-section">
    <section class="wow fadeInUp go-products">
        <div class="container">
                <div class="breadcrumb-box">
                        <a href="{{url('/')}}">Trang Chủ</a>
                        @if($CategoryName != "")
                        <a href="san-pham?category={{$CategorySlug}}">{{$CategoryName}}</a>
                        @else
                        <a href="san-pham">Tất Cả Sản Phẩm</a>
                        @endif

                        @if($SubCategoryName != "")
                        <a href="san-pham?subcategory={{$SubCategorySlug}}">{{$SubCategoryName}}</a>
                        @endif
                </div>
            <div class="row">
                <div class="col-md-3" style="padding: 0">
                    <h3 class="allcats">Danh Mục</h3>
                    <div id="left" class="span3">
                        <ul id="menu-group-1" class="nav menu">
                            @foreach($Category as $cat)
                            <li class="item-1 deeper parent">
                                <a class="" href="{{route('front.category',['category'=>$cat->slug,'color'=>request()->color,'sort'=>request()->sort])}}">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$cat->slug}}-1" class="sign"><i class="fa fa-plus"></i></span>
                                            <span class="lbl">{{$cat->title}}</span>
                                        </a>
                                <ul class="children nav-child unstyled small collapse" id="{{$cat->slug}}-1">
                                    @foreach($cat->SubCategory as $submenu)
                                    <li class="item-2 deeper parent">
                                        <a class="" href="{{route('front.category',['subcategory'=>$submenu->slug,'color'=>request()->color,'sort'=>request()->sort])}}">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$submenu->slug}}-1" class="sign"><i class="fa fa-plus"></i></span>
                                            <span class="lbl">{{$submenu->name_sub}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <h3 class="allcats">Bộ Lọc</h3>
                        <div id="left" class="span3">
                            <ul id="menu-group-2" class="nav menu">
                                <li class="item-1 deeper parent">
                                    <a class="" href="#">
                                        <span data-toggle="collapse" data-parent="#menu-group-2" class="sign" href="#giatien-2"><i class="fa fa-plus"></i></span>
                                        <span class="lbl">Giá Tiền</span>
                                    </a>
                                    <ul class="children nav-child unstyled small collapse" id="giatien-2">
                                        <li class="item-2 deeper parent">
                                            <a class="" href="{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'color'=>request()->color,'sort'=>'low_high'])}}">
                                                <span data-toggle="collapse" data-parent="#menu-group-2" class="sign"><i class="fa fa-sort"></i></span>
                                                <span class="lbl">Từ thấp tới cao</span>
                                            </a>
                                        </li>
                                        <li class="item-2 deeper parent">
                                            <a class="" href="{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'color'=>request()->color,'sort'=>'high_low'])}}">
                                                <span data-toggle="collapse" data-parent="#menu-group-2" class="sign"><i class="fa fa-sort"></i></span>
                                                <span class="lbl">Từ cao tới thấp</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="item-1 deeper parent">
                                    <a class="" href="#">
                                        <span data-toggle="collapse" data-parent="#menu-group-2" class="sign" href="#mausac-2"><i class="fa fa-plus"></i></span>
                                        <span class="lbl">Màu Sắc</span>
                                    </a>
                                    <ul class="children nav-child unstyled small collapse" id="mausac-2">
                                    @foreach($Color as $colors)
                                        <li class="item-2 deeper parent">
                                            <a class="" href="{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'sort'=>request()->sort,'color'=>$colors->slug])}}">
                                                <span data-toggle="collapse" data-parent="#menu-group-2" class="sign"></span>
                                                <span class="colors" data-color="{{$colors->codeColor}}"></span>
                                                <span class="lbl">{{$colors->name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        @forelse($Product as $product)
                        <?php $CountForm++; ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">
                                                <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                            </a>
                                    <ul class="social">
                                        <li><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/" data-tip="Xem Nhanh" ><i class="fa fa-eye"></i></a></li>
                                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>

                                    @if($product->discount>0)
                                    <span class="product-discount-label">-{{$product->discount}}%</span> @endif
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">{{$product->title}}</a></h3>
                                    <div class="price">
                                        @if($product->discount > 0) {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                        <span>{{$product->formatMoney($product->cost)}}₫</span> @else {{$product->formatMoney($product->cost)}}₫
                                        @endif
                                    </div>
                                    <form id="product{{$CountForm}}">
                                    <input type="hidden" name="title" value="{{$product->title}}">
                                    <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                    <input type="hidden" name="description" value="{{$product->description}}">
                                    <input type="hidden" name="discount" value={{$product->discount}}>
                                    <input type="hidden" name="price" value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                    <input type="hidden" name="idproduct" value="{{$product->id}}">
                                    </form>
                                    <span class="add-to-cart" data-toggle="modal" data-target="#quickViewProduct" data-product="{{$CountForm}}" id="quickviewBtn">Thêm vào giỏ</span>
                                </div>
                            </div>
                            
                        </div>
                        @empty
                        <h3>Không có sản phẩm nào trong danh mục này</h3>
                        @endforelse
                    </div>

                    <div class="d-flex justify-content-center">
                        <center>{{$Product->appends(request()->input())->render()}}</center>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL -->
<div class="modal fade" id="quickViewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
                <div class="information-blocks">
                        <div class="row">
                            <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
                                <div class="product-preview-box">
                                    <div class="product-zoom-image">
                                    <img class="image-product" src="http://larvuejs.vn/images/product/r7zO_xc-nam.jpg" alt="" data-zoom="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-md-7 information-entry">
                                <div class="product-detail-box">
                                    <input type="hidden" value="" id="modalIdProduct">
                                    <h1 class="product-title">Tiêu đề PRoduct</h1>
                                    <div class="price detail-info-entry">
                                         <span class="current">255000₫</span>                                                    
                                    </div>
                                    <div class="detail-info-entry-title">Kích cỡ</div>
                                    <div class="form-group">
                                      <select class="form-control" name="selSize" id="selSize">
                                      </select>
                                    </div>
                                    <div class="detail-info-entry-title">Màu Sắc</div>
                                    <div class="colorsProduct">
                                        <ul id="ListSelectColor">
                                                
                                        </ul>
                                    </div>
                                    <div class="quantity-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Số Lượng</div>
                                        <div class="entry number-minus">&nbsp;</div>
                                        <div class="entry number" id="modalSoLuong">1</div>
                                        <div class="entry number-plus">&nbsp;</div>
                                    </div>
        
                                    <div class="detail-info-entry">
                                        <div class="clear"></div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="clear visible-xs visible-sm"></div>
        
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="CloseModal">Đóng</button>
            <button type="button" class="btn btn-primary" id="btnAddProduct">Thêm giỏ hàng</button>
        </div>
        </div>
    </div>
    </div>
@stop 
@section('footer')
<script>
    $(document).ready(function(){
        changeElementsCSS();
    });
    $("#sortby").change(function () {
        var sort = $("#sortby").val();
        if(sort == 'low_high'){
            window.location = "{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'color'=>request()->color,'sort'=>'low_high'])}}";
        } else{
            window.location = "{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'color'=>request()->color,'sort'=>'high_low'])}}";
        }
    });

   

    function changeElementsCSS()
    {
        $('.colors').each(function(){
            var att = $(this).attr("data-color");
            $(this).css('background-color',att);
        });
    }

    var id = '';
    $(document).on('click','#quickviewBtn',function(){
        $('#ListSelectColor').html('');
        var count = $(this).attr('data-product');
        var product = $('#product'+count).serializeArray();

        $('.product-title').text(product[0].value);
        $('.image-product').attr("src","{{url('/images/product')}}/"+product[1].value);
        $('.current').text(product[4].value+"đ");
        id = product[5].value;
        $('#modalIdProduct').val(id);
        fetch_size(id);
       
        
    });

    $('#selSize').change(function(){
        fetch_color_forsize(id,$(this).val());
    });


    function fetch_size(idproduct)
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('front.fetchsize')}}',
        data:{idproduct:idproduct},
        dataType: 'json',
            success: function(data) {
                $('#selSize').html(data.table_data);
                $('#selSize').append('<option disabled selected value> -- Chọn kích cỡ -- </option>');
            },
            error: function(html, status) {
              
            }
        });
    }

    function fetch_color_forsize(idproduct,idsize)
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('front.fetchcolor')}}',
        data:{idproduct:idproduct,idsize:idsize},
        dataType: 'json',
            success: function(data) {
                $('#ListSelectColor').html(data.table_data);
              
            },
            error: function(html, status) {

            }
        });
    }
</script>

@stop