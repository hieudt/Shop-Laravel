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
                        <div class="col-md-4 col-sm-6">
                            <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">
                                                <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                            </a>
                                    <ul class="social">
                                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
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
                                    <a class="add-to-cart" href="">Thêm vào giỏ</a>
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


@stop 
@section('footer')
<script>
    $(document).ready(function(){
        changeElementsCSS();
    });
    $("#sortby").change(function () {
        var sort = $("#sortby").val();
        if(sort == 'low_high'){
            window.location = "{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'sort'=>'low_high'])}}";
        } else{
            window.location = "{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'sort'=>'high_low'])}}";
        }
    });

   
    $("#load-more").click(function () {
        $("#load").show();
        var slug = "";
        var page = $("#page").val();
        var sort = $("#sortby").val();
        $.get("{{url('/')}}/loadcategory/"+slug+"/"+page+"?sort="+sort, function(data, status){
            $("#load").fadeOut();
            $("#products").append(data);
            //alert("Data: " + data + "\nStatus: " + status);
            $("#page").val(parseInt($("#page").val())+1);
            if ($.trim(data) == ""){
                $("#load-more").fadeOut();
            }

        });
    });
    function changeElementsCSS()
    {
        $('.colors').each(function(){
            var att = $(this).attr("data-color");
            $(this).css('background-color',att);
        });
    }
</script>

@stop