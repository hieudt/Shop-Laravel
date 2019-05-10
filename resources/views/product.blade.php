@extends('includes.master')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
<style>

</style>
@endsection
@section('content')

    <section class="container" style="margin-top: 20px;">
        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="/san-pham?category={{$productdata->SubCategory->Category->slug}}">{{$productdata->SubCategory->Category->title}}</a>
                <a href="/san-pham?subcategory={{$productdata->SubCategory->slug}}">{{$productdata->SubCategory->name_sub}}</a>
                <a href="/san-pham/{{$productdata->id}}/{{$productdata->slug}}">{{$productdata->title}}</a>
            </div>

            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
                        <div class="product-preview-box">
                            <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-zoom-image">
                                            <img src="{{url('/')}}/images/product/{{$productdata->thumbnail}}" alt="" data-zoom="" />
                                        </div>
                                    </div>
                                    @forelse($gallery as $galdta)
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('/')}}/images/product/{{$galdta->Link}}" alt="" data-zoom="" />
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="pagination"></div>
                                <div class="product-zoom-container">
                                    <div class="move-box">
                                        <img class="default-image" src="" alt="" />
                                        <img class="zoomed-image" src="" alt="" />
                                    </div>
                                    <div class="zoom-area"></div>
                                </div>
                            </div>
                            <div class="swiper-hidden-edges">
                                <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide selected">
                                            <div class="paddings-container">
                                                <img src="{{url('/')}}/images/product/{{$productdata->thumbnail}}" alt="" />
                                            </div>
                                        </div>
                                        @forelse($gallery as $galdta)
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="{{url('/')}}/images/product/{{$galdta->Link}}" alt="" />
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse


                                    </div>
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-7 information-entry">
                        <div class="product-detail-box">
                            <h1 class="product-title">{{$productdata->title}}</h1>
                                <h3 class="product-subtitle"><i class="fa fa-check-circle fa-fw"></i> Còn hàng </h3>

                            <div class="rating-box">
                                @for($i=1;$i<=5;$i++)
                                    @if($i <= \App\Review::ratings($productdata->id))
                                        <div class="star"><i class="fa fa-star"></i></div>
                                    @else
                                        <div class="star"><i class="fa fa-star-o"></i></div>
                                    @endif
                                @endfor

                                <div class="rating-number">{{\App\Review::where('id_product',$productdata->id)->count()}} Đánh giá</div>
                            </div>
                            <div class="product-description detail-info-entry">{{substr(strip_tags($productdata->description), 0, 600)}}... <a id="showmore">Xem Tiếp</a></div>
                            <div class="price detail-info-entry">
                                    @if($productdata->discount > 0)
                                    <span class="prev">{{$productdata->formatMoney($productdata->cost)}}₫</span>
                                    <span class="current">{{$productdata->formatMoney($productdata->priceDiscount($productdata->cost,$productdata->discount))}}₫</span> 
                                    @else                                                   
                                    <span class="current">{{$productdata->formatMoney($productdata->cost)}}₫</span>                                                    
                                    @endif
                            </div>
                           
                            <div class="size-selector detail-info-entry">
                                <div class="detail-info-entry-title">Kích cỡ</div>
                                <div class="form-group">
                                    <select class="form-control" name="selSizeInProduct" id="selSizeInProduct">
                                    </select>
                                </div>
                              
                            </div>
                            <div class="detail-info-entry-title">Màu Sắc</div>
                            <div class="colorsProduct">
                                <ul id="ListSelectColor">
                                    
                                </ul>
                            </div>
                            <div class="quantity-selector detail-info-entry">
                                <div class="detail-info-entry-title">Số Lượng</div>
                                <div class="entry number-minus">&nbsp;</div>
                                <div class="entry number" id="ProductNumber">1</div>
                                <div class="entry number-plus">&nbsp;</div>
                            </div>

                            <div class="detail-info-entry">
                                <form id="cartfrom">
                                    <button type="button" class="button style-10 to-cart" id="ProductAdd">Thêm giỏ hàng</button>
                                </form>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="share-box detail-info-entry">
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.geniusocean.com"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_google_plus"></a>
                                    <a class="a2a_button_linkedin"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                                <div class="title">Chia sẻ lên mạng xã hội</div>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear visible-xs visible-sm"></div>

                </div>
            </div>

            <div class="information-blocks">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                        <li role="presentation"><a href="#policy" aria-controls="profile" role="tab" data-toggle="tab"> Lưu Ý </a></li>
                        <li role="presentation"><a href="#reviews" aria-controls="messages" role="tab" data-toggle="tab">Đánh giá({{\App\Review::where('id_product',$productdata->id)->count()}})</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            {!! $productdata->description !!}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="policy">
                            {!! $productdata->policy !!}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            @if(Auth::user())
                            <h3>Viết đánh giá</h3>
                            <hr>
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-6">
                                    <div class='starrr' id='star1'></div>
                                    <div>
                                        <span class='your-choice-was' style='display: none;'>
                                            Đánh giá của bạn: <span class='choice'></span>.
                                        </span>
                                    </div>
                                </div>
                            </div>
                           
                            <form id="FormReview">
                                {{ csrf_field() }}
                                <input type="hidden" name="rating" id="rate" value="5">
                                <input type="hidden" name="idproduct" value="{{$productdata->id}}">
                                <!-- Text input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="content" rows="6" placeholder="Nội Dung" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="button" class="button style-10" id="btnReview"><strong>Gửi Đánh Giá</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                            <hr>
                            <h3>Đánh giá:</h3>
                            <hr>
                            <section id="listReview">

                            </section>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <?php $CountForm = 0; ?>
    <section class="wow fadeInUp">
        <div class="container">

            <h3>Sản phẩm liên quan</h3>
            <hr>
            <div class="row">
                    @foreach($relateds as $product)
                    <?php $CountForm++; ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid4">
                            <div class="product-image4">
                                <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}">
                                    <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                </a>
                                <ul class="social">
                                    <li><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}" data-tip="Chi Tiết SP"><i class="fa fa-eye fa-fix"></i></a></li>
                                    <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag fa-fix"></i></a></li>
                                    <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart fa-fix"></i></a></li>
                                </ul>
                                
                                @if($product->discount>0)
                                <span class="product-discount-label">-{{$product->discount}}%</span>
                                @endif
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}">{{$product->title}}</a></h3>
                                <div class="price">
                                    @if($product->discount > 0)
                                    {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                    <span>{{$product->formatMoney($product->cost)}}₫</span>
                                    @else
                                    {{$product->formatMoney($product->cost)}}₫
                                    @endif
                                </div>
                                <form id="product{{$CountForm}}">
                                    <input type="hidden" name="title" value="{{$product->title}}">
                                    <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                    <input type="hidden" name="description" value="{{$product->description}}">
                                    <input type="hidden" name="discount" value={{$product->discount}}>
                                    <input type="hidden" name="price" value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                    <input type="hidden" name="idproduct" value="{{$product->id}}">
                                    <button class="add-to-cart" type="button"  data-product="{{$CountForm}}">Thêm vào giỏ</span>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>

            <h3>Có thể bạn thích</h3>
            <hr>
            <div class="row">
                @forelse ($Likes as $product)
                    <?php $CountForm++; ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid4">
                            <div class="product-image4">
                                <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}">
                                    <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                </a>
                                <ul class="social">
                                    <li><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}" data-tip="Chi Tiết SP"><i
                                                class="fa fa-eye fa-fix"></i></a></li>
                                    <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag fa-fix"></i></a></li>
                                    <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart fa-fix"></i></a></li>
                                </ul>
                    
                                @if($product->discount>0)
                                <span class="product-discount-label">-{{$product->discount}}%</span>
                                @endif
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}">{{$product->title}}</a>
                                </h3>
                                <div class="price">
                                    @if($product->discount > 0)
                                    {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                    <span>{{$product->formatMoney($product->cost)}}₫</span>
                                    @else
                                    {{$product->formatMoney($product->cost)}}₫
                                    @endif
                                </div>
                                <form id="product{{$CountForm}}">
                                    <input type="hidden" name="title" value="{{$product->title}}">
                                    <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                    <input type="hidden" name="description" value="{{$product->description}}">
                                    <input type="hidden" name="discount" value={{$product->discount}}>
                                    <input type="hidden" name="price"
                                        value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                    <input type="hidden" name="idproduct" value="{{$product->id}}">
                                    <button class="add-to-cart" type="button" data-product="{{$CountForm}}">Thêm vào giỏ</span>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>Không có dữ liệu</h4>
                @endforelse
            </div>
        </div>
    </section>


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
                                <h1 class="product-title" id="ModalTitle">Tiêu đề PRoduct</h1>
                                <div class="price detail-info-entry">
                                    <span class="current" id="ModalTien">255000₫</span>
                                </div>
                                <div class="detail-info-entry-title">Kích cỡ</div>
                                <div class="form-group">
                                    <select class="form-control" name="selSize" id="selSize">
                                            </select>
                                </div>
                                <div class="detail-info-entry-title">Màu Sắc</div>
                                <div class="colorsProduct">
                                    <ul id="ListSelectColor2">

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
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')

<script>
    $(document).ready(function(){

        $('#related-products').owlCarousel( {
            loop: true,
            items: 4,
            margin: 30,
            autoplay: true,
            dots:true,
            nav:true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 4
                }
            }
        });
    });

    var id = '';
    $(document).on('click','.add-to-cart',function(){
        $('#ListSelectColor2').html('');
        var count = $(this).attr('data-product');
        var product = $('#product'+count).serializeArray();
       
        $('#ModalTitle').text(product[0].value);
        $('.image-product').attr("src","{{url('/images/product')}}/"+product[1].value);
        $('#ModalTien').text(product[4].value+"đ");
        id = product[5].value;
        $('#modalSoLuong').text(1);
        $('#modalIdProduct').val(id);
        fetch_size2(id); 
        setTimeout(function() {
            $('#quickViewProduct').modal();
        }, 200); 
    });

    $('#ProductAdd').click(function(){
        var cart_idProduct = '{{$productdata->id}}';
        var cart_number = $('#ProductNumber').text();
        var cart_idSize = $('#selSizeInProduct').val();
        var rdoColor = $("input[name=rdoColor]");
        var rdoValue = rdoColor.filter(":checked").val();
        dataString = "idProduct="+cart_idProduct+"&Number="+cart_number+"&idSize="+cart_idSize
        +"&idColor="+rdoValue;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('cart.store')}}',
            data:dataString,
            success: function (data) {
                ToastSuccess(data.success); 
                loadCart();
            },
            error: function (request, status) {
               
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

    $('#selSizeInProduct').change(function(){
        fetch_color_forsize({{$productdata->id}},$(this).val());
    });

    $('#selSize').change(function(){
        fetch_color_forsize2(id,$(this).val());
    });

    fetch_size({{$productdata->id}});
    fetch_review({{$productdata->id}});
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
                $('#selSizeInProduct').html(data.table_data);
                $('#selSizeInProduct').append('<option disabled selected value> -- Chọn kích cỡ -- </option>');
                
            },
            error: function(html, status) {
               
            }
        });
    }

    function fetch_size2(idproduct)
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

    function fetch_review(idproduct)
    {
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('review.fetch')}}',
        data:{idproduct:idproduct},
        dataType: 'json',
            success: function(data) {
                $('#listReview').html(data.load);
               
            },
            error: function(html, status) {
            }
        });
    }

    function fetch_color_forsize2(idproduct,idsize)
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
                $('#ListSelectColor2').html(data.table_data);
               
            },
            error: function(html, status) {
               
            }
        });
    }

    $("#btnReview").click(function(){
        var datas = $('#FormReview').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('review.store')}}',
            data:datas,
            success: function (data) {
                ToastSuccess(data.success); 
                fetch_review({{$productdata->id}});
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

</script>
@endsection
@section('footer')
<script>
    $('#star1').starrr({
        rating: 5,
        change: function(e, value){
            if (value) {
                $('.your-choice-was').show();
                $('.choice').text(value);
                $('#rate').val(value);
            } else {
                $('.your-choice-was').hide();
            }
        }
    });

    $("#showmore").click(function() {
        $('html, body').animate({
            scrollTop: $("#description").offset().top - 200
        }, 1000);
    });

</script>
@stop