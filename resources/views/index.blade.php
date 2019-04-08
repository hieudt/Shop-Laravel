@extends('includes.master') 
@section('content')
<style>
    .box-items-dev {
        background-color: white;
        color: blue;
        height: 40px;
        text-align: center;
        font-size: 13pt;
        line-height: 40px;
        position: relative !important;
        top: 200px;
        z-index: 1;
        transform: rotateX(-100deg);
        transform-origin: top center;
        transition: opacity .3s, transform 1s;
        opacity: 0;
        text-decoration: none;
    }

    .col-item:hover {
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.2);
    }

    .col-item:hover .box-items-dev {
        opacity: 1;
        transform: rotateX(0deg);
    }
</style>
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
                            <div class="col-xs-6 col-sm-4 col-md-3 product">
                                <article class="col-item">
                                        <div class="box-items-dev">
                                                <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">Xem Sản Phẩm</a>
                                            </div>
                                    <div class="photo">
                                        <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/"> <img src="{{url('/images/product')}}/{{$product->thumbnail}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price-details">
                                                <a href="" class="row" style="min-height: 60px">
                                                    <h1>{{$product->title}}</h1>
                                                </a>
                                                <div class="row">
                                                    @if($product->discount > 0)
                                                    <span class="price-old">{{$product->formatMoney($product->cost)}}₫</span>
                                                    <span class="price-new">{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫</span>                                                    @else
                                                    <span class="price-new">{{$product->formatMoney($product->cost)}}₫</span>                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <span class="review">
                                                            @for($i=1;$i<=5;$i++)
                                                                @if($i <= \App\Review::ratings($product->id))
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <form>
                                                <p>
                                                    {{csrf_field()}}
                                                    <button type="button" class="button style-10 to-cart">Thêm vào giỏ</button>
                                                </p>
                                            </form>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                        <br/><br/>
                        <ul class="nav nav-tabs home-tab" role="tablist">
                                <li class="active"><a>Mới Nhất</a></li>
                        </ul>
                        <div class="row">
                            @foreach($lastes as $product)
                            <div class="col-xs-6 col-sm-4 col-md-3 product">
                                <article class="col-item">
                                        <div class="box-items-dev">
                                                <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">Xem Sản Phẩm</a>
                                            </div>
                                    <div class="photo">
                                        <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/"> <img src="{{url('/images/product')}}/{{$product->thumbnail}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price-details">
                                                <a href="" class="row" style="min-height: 60px">
                                                    <h1>{{$product->title}}</h1>
                                                </a>
                                                <div class="row">
                                                    @if($product->discount > 0)
                                                    <span class="price-old">{{$product->formatMoney($product->cost)}}₫</span>
                                                    <span class="price-new">{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫</span>                                                    @else
                                                    <span class="price-new">{{$product->formatMoney($product->cost)}}₫</span>                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <span class="review">
                                                            @for($i=1;$i<=5;$i++)
                                                                @if($i <= \App\Review::ratings($product->id))
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <form>
                                                <p>
                                                    {{csrf_field()}}
                                                    <button type="button" class="button style-10 to-cart">Thêm vào giỏ</button>
                                                </p>
                                            </form>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div><br/><br/>
                    <ul class="nav nav-tabs home-tab" role="tablist">
                        <li class="active"><a>Khuyến Mãi</a></li>
                    </ul>
                        <div class="row">
                            @foreach($discounts as $product)
                            <div class="col-xs-6 col-sm-4 col-md-3 product">
                                <article class="col-item">
                                        <div class="box-items-dev">
                                                <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/">Xem Sản Phẩm</a>
                                            </div>
                                    <div class="photo">
                                        <a href="{{url('/san-pham')}}/{{$product->id}}/{{$product->slug}}/"> <img src="{{url('/images/product')}}/{{$product->thumbnail}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price-details">
                                                <a href="" class="row" style="min-height: 60px">
                                                    <h1>{{$product->title}}</h1>
                                                </a>
                                                <div class="row">
                                                    @if($product->discount > 0)
                                                    <span class="price-old">{{$product->formatMoney($product->cost)}}₫</span>
                                                    <span class="price-new">{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫</span>                                                    @else
                                                    <span class="price-new">{{$product->formatMoney($product->cost)}}₫</span>                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <span class="review">
                                                            @for($i=1;$i<=5;$i++)
                                                                @if($i <= \App\Review::ratings($product->id))
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <form>
                                                <p>
                                                    {{csrf_field()}}
                                                    <button type="button" class="button style-10 to-cart">Thêm vào giỏ</button>
                                                </p>
                                            </form>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
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

<!-- Modal -->

<div class="modal fade" id="quickViewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        ...
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </div>
</div>
</div>



@stop 
@section('footer')
<script>

</script>




@stop