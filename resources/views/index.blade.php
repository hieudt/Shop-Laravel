@extends('includes.master') 
@section('content')
<style>
.box-items-dev {
    background-color:white;
    color:blue;
    height: 40px;
    text-align: center;
    font-size:13pt;
    line-height: 40px;
    position:relative !important;
    top:200px;
    z-index:1;
    transform: rotateX(-100deg);
    transform-origin: top center;
    transition: opacity .3s, transform 1s;
    opacity: 0;
    text-decoration: none;
}
.product:hover {
    box-shadow: 25px 25px 25px 25px rgba(0, 0, 0, 0.2);
}

.product:hover .box-items-dev {
    opacity:0.8;
    transform: rotateX(0deg);
}
</style>
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
                <div class="col-md-12">
                    <ul class="nav nav-tabs home-tab" role="tablist">
                        <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Nổi Bật</a></li>
                        <li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Mới Nhất</a></li>
                        <li><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Khuyến Mãi</a></li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active" id="home">
                        <div class="row">
                            @foreach($features as $product)
                            <div class="col-xs-6 col-sm-4 col-md-3 product">
                                    <div class="box-items-dev">
                                        <a href="#">Xem Sản Phẩm</a>
                                    </div>
                                <article class="col-item">
                                    <div class="photo">
                                        <a href="{{url('/sanpham')}}/{{$product->id}}/"> <img src="{{url('/images/product')}}/{{$product->thumbnail}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
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
                                                    <span class="price-new">{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫</span> 
                                                    @else                                                   
                                                    <span class="price-new">{{$product->formatMoney($product->cost)}}₫</span>                                                    
                                                    @endif
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
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                        <div class="row">
                            @foreach($lastes as $product)
                            <div class="col-xs-6 col-sm-4 col-md-3 product">
                                    <div class="box-items-dev">
                                        <a href="#">Xem Sản Phẩm</a>
                                    </div>
                                <article class="col-item">
                                    <div class="photo">
                                        <a href="{{url('/sanpham')}}/{{$product->id}}/"> <img src="{{url('/images/product')}}/{{$product->thumbnail}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
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
                                                    <span class="price-new">{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫</span> 
                                                    @else                                                   
                                                    <span class="price-new">{{$product->formatMoney($product->cost)}}₫</span>                                                    
                                                    @endif
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
                    <div role="tabpanel" class="tab-pane fade" id="messages">
                        <div class="row">
                            @foreach($discounts as $product)
                            <div class="col-xs-6 col-sm-4 col-md-3 product">
                                    <div class="box-items-dev">
                                        <a href="#">Xem Sản Phẩm</a>
                                    </div>
                                <article class="col-item">
                                    <div class="photo">
                                        <a href="{{url('/sanpham')}}/{{$product->id}}/"> <img src="{{url('/images/product')}}/{{$product->thumbnail}}" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
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
                                                    <span class="price-new">{{$product->formatMoney($product->priceDiscount($product->cost,$product->discount))}}₫</span> 
                                                    @else                                                   
                                                    <span class="price-new">{{$product->formatMoney($product->cost)}}₫</span>                                                    
                                                    @endif
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


@stop 
@section('footer')
<script>

</script>

@stop