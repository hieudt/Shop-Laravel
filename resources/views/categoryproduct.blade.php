@extends('includes.master') 
@section('title','Danh mục sản phẩm') 
@section('css')

<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
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
                                <a class="" href="{{route('front.category',['brands'=>request()->brands,'category'=>$cat->slug,'color'=>request()->color,'sort'=>request()->sort,'km'=>request()->km,'noibat'=>request()->noibat,'moinhat'=>request()->moinhat,'giamin'=>request()->giamin,'giamax'=>request()->giamax])}}">
                                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#{{$cat->slug}}-1" class="sign"><i class="fa fa-plus"></i></span>
                                            <span class="lbl">{{$cat->title}}</span>
                                        </a>
                                <ul class="children nav-child unstyled small collapse" id="{{$cat->slug}}-1">
                                    @foreach($cat->SubCategory as $submenu)
                                    <li class="item-2 deeper parent">
                                        <a class="" href="{{route('front.category',['brands'=>request()->brands,'subcategory'=>$submenu->slug,'color'=>request()->color,'sort'=>request()->sort,'km'=>request()->km,'noibat'=>request()->noibat,'moinhat'=>request()->moinhat,'giamin'=>request()->giamin,'giamax'=>request()->giamax])}}">
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
                                            <a class="" href="{{route('front.category',['brands'=>request()->brands,'category'=>request()->category,'subcategory'=>request()->subcategory,'color'=>request()->color,'sort'=>'low_high','km'=>request()->km,'noibat'=>request()->noibat,'moinhat'=>request()->moinhat,'giamin'=>request()->giamin,'giamax'=>request()->giamax])}}">
                                                <span data-toggle="collapse" data-parent="#menu-group-2" class="sign"><i class="fa fa-sort"></i></span>
                                                <span class="lbl">Từ thấp tới cao</span>
                                            </a>
                                        </li>
                                        <li class="item-2 deeper parent">
                                            <a class="" href="{{route('front.category',['brands'=>request()->brands,'category'=>request()->category,'subcategory'=>request()->subcategory,'color'=>request()->color,'sort'=>'high_low','km'=>request()->km,'noibat'=>request()->noibat,'moinhat'=>request()->moinhat,'giamin'=>request()->giamin,'giamax'=>request()->giamax])}}">
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
                                            <a class="" href="{{route('front.category',['brands'=>request()->brands,'category'=>request()->category,'subcategory'=>request()->subcategory,'sort'=>request()->sort,'color'=>$colors->slug,'km'=>request()->km,'noibat'=>request()->noibat,'moinhat'=>request()->moinhat,'giamin'=>request()->giamin,'giamax'=>request()->giamax])}}">
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
                    <div class="row" style="margin-bottom: 20px;">
                        <h3 class="allcats">Khoảng Giá</h3>
                        <br/><br/>
                        <div id="left" class="span3">
                            <ul id="menu-group-3" class="nav menu">
                                <li class="item-1 deeper parent">
                                    <h3>
                                        <span id="giaMin">
                                            @if(request()->giamin)
                                            {!!formatMoney(request()->giamin,true)!!} ₫
                                            @else
                                            0
                                            @endif
                                        </span>
                                     -
                                        <span id="giaMax">
                                            @if(request()->giamax)
                                            {!!formatMoney(request()->giamax,true)!!} ₫
                                            @else
                                            0
                                            @endif
                                        </span>
                                     </h3><br/>
                                    <div name="rangeslider" id="rangeslider" style=" height: 6px; " step="1000">
                                </li>
                            </ul>
                        </div>
                    
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <h3 class="allcats">Thương Hiệu</h3>
                        <div id="left" class="span3">
                            <ul id="menu-group-3" class="nav menu">
                                <li class="item-1 deeper parent">
                                    <ul class="children nav-child unstyled small">
                                    @foreach($Brand as $brands)
                                        <li class="deeper parent">
                                            <a class="" href="{{route('front.category',['category'=>request()->category,'subcategory'=>request()->subcategory,'sort'=>request()->sort,'color'=>request()->color,'brands'=>$brands->slug,'km'=>request()->km,'noibat'=>request()->noibat,'moinhat'=>request()->moinhat,'giamin'=>request()->giamin,'giamax'=>request()->giamax])}}">
                                                <span class="lbl">{{$brands->title}}</span>
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
                    <div class="row p-3">
                        <label class="checkbox-inline"><input type="checkbox" value="km" name="km"
                        @if(request()->km) 
                        checked 
                        @endif
                        >Khuyến Mãi</label>
                        <label class="checkbox-inline"><input type="checkbox" value="noibat" name="noibat" 
                        @if(request()->noibat) 
                        checked 
                        @endif
                        >Nổi bật</label>
                        <label class="checkbox-inline"><input type="checkbox" value="moinhat" name="moinhat" 
                        @if(request()->moinhat) 
                        checked 
                        @endif
                        >Mới Nhất</label>
                    </div>
                    <div class="row">
                        
                        @forelse($Product as $product)
                        <?php $CountForm++; ?>
                        
                        <div class="col-md-4 col-sm-6">
                            <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}">
                                                <img class="pic-1" src="{{url('/images/thumbnail')}}/{{$product->thumbnail}}">
                                            </a>
                                    <ul class="social">
                                        <li><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}" data-tip="Xem Nhanh" ><i class="fa fa-eye fa-fix"></i></a></li>
                                        <li><a href="#" data-tip="Add to Wishlist" data-product="{{$CountForm}}" class="add-to-wish"><i class="fa fa-shopping-bag fa-fix"></i></a></li>
                                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart fa-fix"></i></a></li>
                                    </ul>

                                    @if($product->discount>0)
                                    <span class="product-discount-label">-{{$product->discount}}%</span> @endif
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}">{{$product->title}}</a></h3>
                                    <div class="price">
                                        @if($product->discount > 0) {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                        <span>{{$product->formatMoney($product->cost)}}₫</span> @else {{$product->formatMoney($product->cost)}}₫
                                        @endif
                                    </div>
                                    <form class="product{{$CountForm}}">
                                    <input type="hidden" name="title" value="{{$product->title}}">
                                    <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                    <input type="hidden" name="description" value="{{$product->description}}">
                                    <input type="hidden" name="discount" value={{$product->discount}}>
                                    <input type="hidden" name="price" value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                    <input type="hidden" name="idproduct" value="{{$product->id}}">
                                    </form>
                                    <button class="add-to-cart" type="button" data-product="{{$CountForm}}" >Thêm vào giỏ</span>
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
                                    <img class="image-product" src="" alt="" data-zoom="" />
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
            <button type="button" class="btn btn-primary" id="btnAddProduct" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Đang xử lý">Thêm giỏ hàng</button>
            <button type="button" class="btn btn-danger" id="btnAddWishlist" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Đang xử lý">Yêu thích</button>
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
    $(document).on('click','.add-to-cart , .add-to-wish',function(){
        $('#ListSelectColor').html('');
        var count = $(this).attr('data-product');
        var product = $('.product'+count).serializeArray();

        $('.product-title').text(product[0].value);
        $('.image-product').attr("src","{{url('/images/product')}}/"+product[1].value);
        $('.current').text(product[4].value+"đ");
        id = product[5].value;
        $('#modalIdProduct').val(id);
        $('#modalSoLuong').text(1);
        fetch_size(id);
        setTimeout(function() {
            $('#quickViewProduct').modal();
        }, 200);
        
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

    $("input:checkbox[name=km],input:checkbox[name=noibat],input:checkbox[name=moinhat]").click(function(){
        if(this.checked == false){
            // window.location = window.location.href
            //console.log(this.value);
           window.location = removeURLParameter(window.location.href,this.value);
        }
        if(this.checked == true){
            insertParam(this.value,1);
        }
    });

    function removeURLParameter(url, parameter) {
        //prefer to use l.search if you have a location/link object
        var urlparts = url.split('?');   
        if (urlparts.length >= 2) {

            var prefix = encodeURIComponent(parameter) + '=';
            var pars = urlparts[1].split(/[&;]/g);

            //reverse iteration as may be destructive
            for (var i = pars.length; i-- > 0;) {    
                //idiom for string.startsWith
                if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                    pars.splice(i, 1);
                }
            }

            return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
        }
        return url;
    }

    function insertParam(key, value) {
        key = escape(key); value = escape(value);

        var kvp = document.location.search.substr(1).split('&');
        if (kvp == '') {
            document.location.search = '?' + key + '=' + value;
        }
        else {

            var i = kvp.length; var x; while (i--) {
                x = kvp[i].split('=');

                if (x[0] == key) {
                    x[1] = value;
                    kvp[i] = x.join('=');
                    break;
                }
            }

            if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

            //this will reload the page, it's likely better to store this until finished
            document.location.search = kvp.join('&');
        }
    }
    

</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
    var url = new URL(window.location.href);
    var query_string = url.search;
    var search_params = new URLSearchParams(query_string); 
    var priceMax = search_params.get('giamax');
    var priceMin = search_params.get('giamin');
    $('#rangeslider').slider({
    range: true,
    min: 0,
    values:[priceMin,priceMax],
    max: 5000000,
    step:20000,
    slide: function(event,ui) {
    $('#giaMin').html(numeral(ui.values[0]).format('0,0') +" ₫");
    $('#giaMax').html(numeral(ui.values[1]).format('0,0') +" ₫");
    },
    stop: function(event, ui) {
       if(priceMin && priceMax){
            var uri = window.location.href;
            uri = uri.replace("giamin="+priceMin,"giamin="+ui.values[0]).replace("giamax="+priceMax,"giamax="+ui.values[1]);
            window.location = uri;
       }else {
           window.location = window.location.href+"&giamin="+ui.values[0]+"&giamax="+ui.values[1];
       }
    },
  });
</script>
@stop