@extends('includes.master') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
@endsection
@section('content')
<section class="go-slider">
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover"
        data-interval="5000">

        <!-- Indicators -->


        <!-- Wrapper For Slides -->
        <div class="carousel-inner" role="listbox">

            <!-- Third Slide -->
            <div class="item active">

                <!-- Slide Background -->
                <img src="{{url('/images//sliders/BrUslider.jpg')}}" alt="Bootstrap Touch Slider" class="slide-image" />
                <div class="bs-slider-overlay"></div>

                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_left">

                            <h1 data-animation="animated fadeInDown">Slider Title 1</h1>
                            <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                        </div>

                    </div>
                </div>
            </div>
            <!-- End of Slide -->
            <!-- Second Slide -->
            <div class="item">

                <!-- Slide Background -->
                <img src="{{url('/images/sliders/8Nsslider3.jpg')}}" alt="Bootstrap Touch Slider" class="slide-image" />
                <div class="bs-slider-overlay"></div>
                <!-- Slide Text Layer -->
                <div class="slide-text slide_style_center">
                    <h1 data-animation="animated fadeInDown">Slider Title 2</h1>
                    <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
            <!-- End of Slide -->
            <!-- Second Slide -->
            <div class="item">

                <!-- Slide Background -->
                <img src="{{url('/images/sliders/RWXslider1.jpg')}}" alt="Bootstrap Touch Slider" class="slide-image" />
                <div class="bs-slider-overlay"></div>
                <!-- Slide Text Layer -->
                <div class="slide-text slide_style_right">
                    <h1 data-animation="animated fadeInDown">Slider Title 3</h1>
                    <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
            <!-- End of Slide -->


        </div>
        <!-- End of Wrapper For Slides -->

        <!-- Left Control -->
        <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <!-- End  bootstrap-touch-slider Slider -->

</section>
<section class="wow fadeInUp go-services hideme">
    <div class="row" style="margin-top:70px;">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h2>Dịch vụ của chúng tôi</h2>
                    <p>ShopTMĐT</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="service-list text-center wow fadeInUp">
                    <img src="{{url('/assets/images/service')}}/jz52.jpg" alt="">
                    <h3>Giao dịch nhanh chóng</h3>
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="service-list text-center wow fadeInUp">
                    <img src="{{url('/assets/images/service')}}/jz52.jpg" alt="">
                    <h3>Sản phẩm chất lượng</h3>
                    <p></p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="service-list text-center wow fadeInUp">
                    <img src="{{url('/assets/images/service')}}/jz52.jpg" alt="">
                    <h3>Hệ thống chuyên nghiệp</h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</section>
{{$CountForm = 0}}

<section class="wow fadeInUp go-products">
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <div class="card">
                <!-- Tab panes -->
                <div class="tab-content">
                        <ul class="nav nav-tabs home-tab" role="tablist">
                            <li class="active"><a>Nổi Bật</a></li>
                        </ul>
                        <div class="row">
                            @foreach($features as $product)
                            {{$CountForm++}}
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid4">
                                    <div class="product-image4">
                                        <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">
                                            <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                        </a>
                                        <ul class="social">
                                            <li><a href="#" data-tip="Xem Nhanh" data-toggle="modal" data-target="#quickViewProduct" data-product="{{$CountForm}}" id="quickviewBtn"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        
                                        @if($product->discount>0)
                                        <span class="product-discount-label">-{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">{{$product->title}}</a></h3>
                                        <div class="price">
                                            @if($product->discount > 0)
                                            {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                            <span>{{$product->formatMoney($product->cost)}}₫</span>
                                            @else
                                            {{$product->formatMoney($product->cost)}}₫
                                            @endif
                                        </div>
                                        <a class="add-to-cart" href="">Thêm vào giỏ</a>
                                    </div>
                                </div>
                                
                                <form id="product{{$CountForm}}">
                                
                                <input type="hidden" name="title" value="{{$product->title}}">
                                <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                <input type="hidden" name="description" value="{{$product->description}}">
                                <input type="hidden" name="discount" value={{$product->discount}}>
                                <input type="hidden" name="price" value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                <input type="hidden" name="idproduct" value="{{$product->id}}">
                            </form>
                            </div>
                            @endforeach
                        </div>
                        <br/><br/>
                        <ul class="nav nav-tabs home-tab" role="tablist">
                                <li class="active"><a>Mới Nhất</a></li>
                        </ul>
                        <div class="row">
                            @foreach($lastes as $product)
                            {{$CountForm++}}
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid4">
                                    <div class="product-image4">
                                        <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">
                                            <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                        </a>
                                        <ul class="social">
                                            <li><a href="#" data-tip="Xem Nhanh" data-toggle="modal" data-target="#quickViewProduct" data-product="{{$CountForm}}" id="quickviewBtn"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        @if($product->discount>0)
                                        <span class="product-discount-label">-{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">{{$product->title}}</a></h3>
                                        <div class="price">
                                            @if($product->discount > 0)
                                            {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                            <span>{{$product->formatMoney($product->cost)}}₫</span>
                                            @else
                                            {{$product->formatMoney($product->cost)}}₫
                                            @endif
                                        </div>
                                        <a class="add-to-cart" href="">Thêm vào giỏ</a>
                                    </div>
                                </div>
                                
                                <form id="product{{$CountForm}}">
                                <input type="hidden" name="title" value="{{$product->title}}">
                                <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                <input type="hidden" name="description" value="{{$product->description}}">
                                <input type="hidden" name="discount" value={{$product->discount}}>
                                <input type="hidden" name="price" value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                <input type="hidden" name="idproduct" value="{{$product->id}}">
                            </form>
                            </div>
                            @endforeach
                        </div>
                        <br/><br/>
                    <ul class="nav nav-tabs home-tab" role="tablist">
                        <li class="active"><a>Khuyến Mãi</a></li>
                    </ul>
                    <div class="row">
                            @foreach($discounts as $product)
                            {{$CountForm++}}
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid4">
                                    <div class="product-image4">
                                        <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">
                                            <img class="pic-1" src="{{url('/images/product')}}/{{$product->thumbnail}}">
                                        </a>
                                        <ul class="social">
                                            <li><a href="#" data-tip="Xem Nhanh" data-toggle="modal" data-target="#quickViewProduct" data-product="{{$CountForm}}" id="quickviewBtn"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        <span class="product-new-label">New</span>
                                        @if($product->discount>0)
                                        <span class="product-discount-label">-{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">{{$product->title}}</a></h3>
                                        <div class="price">
                                            @if($product->discount > 0)
                                            {{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫
                                            <span>{{$product->formatMoney($product->cost)}}₫</span>
                                            @else
                                            {{$product->formatMoney($product->cost)}}₫
                                            @endif
                                        </div>
                                        <a class="add-to-cart" href="">Thêm vào giỏ</a>
                                    </div>
                                </div>
                                
                                <form id="product{{$CountForm}}">
                                <input type="hidden" name="title" value="{{$product->title}}">
                                <input type="hidden" name="img" value="{{$product->thumbnail}}">
                                <input type="hidden" name="description" value="{{$product->description}}">
                                <input type="hidden" name="discount" value={{$product->discount}}>
                                <input type="hidden" name="price" value="{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}">
                                <input type="hidden" name="idproduct" value="{{$product->id}}">
                            </form>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="wow fadeInUp testimonials hideme">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h2>Testiamonaltion</h2>
                    <p>Testiamonaltion</p>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="customers-testimonials" class="owl-carousel">

                    <div class="item">
                        <div class="shadow-effect">
                            <i class="fa fa-quote-right"></i>
                            <div class="item-details">
                                <p class="ctext">hgfhg</p>
                                <h5>hgfhgf</h5>
                                <p>gfdgfdgfd</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF TESTIMONIALS -->
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
                                <div class="size-selector detail-info-entry" id="ListColor">
                                       
                                        
                                </div>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Số Lượng</div>
                                    <div class="entry number-minus">&nbsp;</div>
                                    <div class="entry number">1</div>
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
        <button type="button" class="btn btn-primary">Thêm giỏ hàng</button>
    </div>
    </div>
</div>
</div>
@section('javascript')
<script>
    var id = '';
    $(document).on('click','#quickviewBtn',function(){
        $('#ListColor').html('');
        var count = $(this).attr('data-product');
        var product = $('#product'+count).serializeArray();
        console.log(product);
        $('.product-title').text(product[0].value);
        $('.image-product').attr("src","{{url('/images/product')}}/"+product[1].value);
        $('.current').text(product[4].value+"đ");
        id = product[5].value;
        fetch_size(id);
       
        
    });

    $('#selSize').change(function(){
        fetch_color_forsize(id,$(this).val());
    });
    
    function changeElementsCSS()
    {
        $('.colors').each(function(){
            var att = $(this).attr("data-color");
            $(this).css('background-color',att);
        });
    }
    

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
                console.log(html.responseText);
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
                $('#ListColor').html(data.table_data);
                changeElementsCSS();
            },
            error: function(html, status) {
                    console.log(html.responseText);
            }
        });
    }
</script>
@endsection




@stop 
@section('footer')
<script>

</script>
@stop