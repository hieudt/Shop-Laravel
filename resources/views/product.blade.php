@extends('includes.master')
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/css/attribute.css')}}">
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
    box-shadow: 0px 0px 25px 25px rgba(0, 0, 0, 0.2);
}

.product:hover .box-items-dev {
    opacity:0.8;
    transform: rotateX(0deg);
}
</style>
@endsection
@section('content')

    <section class="container" style="margin-top: 20px;">
        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="{{url('/')}}">Home</a>
                <a href="/danh-muc/{{$productdata->SubCategory->Category->slug}}">{{$productdata->SubCategory->Category->title}}</a>
                <a href="/danh-muc-con/{{$productdata->SubCategory->slug}}">{{$productdata->SubCategory->name_sub}}</a>
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

                                <div class="rating-number">{{\App\Review::where('id_product',$productdata->id)->count()}} Reviews</div>
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
                                @foreach($productdata->product_details as $att)
                                    <div class="entry">{{$att->Size->name}}</div>
                                @endforeach
                                <div class="spacer"></div>
                            </div>
                            <div class="size-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Màu Sắc</div>
                                        @foreach($productdata->product_details as $att)
                                        <span class="colors" data-color="{{$att->Color->codeColor}}"></span>
                                        @endforeach
                                    <div class="spacer"></div>
                                </div>
                            
                            <div class="quantity-selector detail-info-entry">
                                <div class="detail-info-entry-title">Số Lượng</div>
                                <div class="entry number-minus">&nbsp;</div>
                                <div class="entry number">1</div>
                                <div class="entry number-plus">&nbsp;</div>
                            </div>

                            <div class="detail-info-entry">
                                <form id="cartfrom">
                                    {{csrf_field()}}
                                    @if(Session::has('uniqueid'))
                                        <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
                                    @else
                                        <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
                                    @endif
                                    <input type="hidden" name="title" value="{{$productdata->title}}">
                                    <input type="hidden" name="product" value="{{$productdata->id}}">
                                    <input type="hidden" id="size" name="size" value="">
                                    <input type="hidden" id="cost" name="cost" value="{{$productdata->price}}">
                                    <input type="hidden" id="quantity" name="quantity" value="1">
                                    <button type="button" class="button style-10 to-cart">Thêm giỏ hàng</button>

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
                            <h3>Write a Review</h3>
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
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <input type="hidden" name="rating" id="rate" value="5">
                                <input type="hidden" name="id_product" value="{{$productdata->id}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="name" placeholder="Full Name" class="form-control" type="text" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" placeholder="Your Email" class="form-control" type="email" required>

                                        </div>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="review" rows="6" placeholder="Review Description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="resp" class="col-md-6">
                                    @if ($errors->has('error'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <!-- Button -->
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-4 col-md-offset-2">
                                            <button type="submit" class="button style-10" id="LoginButton"><strong>Submit Review</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3>Reviews:</h3>
                            <hr>
                            @forelse($reviews as $review)
                                <div class="row rating-row">
                                    <div class="col-md-3">
                                        <strong>{{$review->name}}</strong>
                                        <div class="rating-box">
                                            @for($i=1;$i<=5;$i++)
                                                @if($i <= $review->rating)
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                @else
                                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-date">{{$review->review_date}}</div>
                                    </div>
                                    <div class="col-md-8">
                                        {{$review->review}}
                                    </div>
                                </div>
                            @empty
                                <h4>No review has given yet.</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <section class="wow fadeInUp">
        <div class="container">

            <h3>Sản phẩm liên quan</h3>
            <hr>
            <div class="row owl-carousel" id="related-products">
                @foreach($relateds as $product)
                    <div class="product">
                           
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
                                            @if(Session::has('uniqueid'))
                                                <input type="hidden" name="uniqueid" value="{{Session::get('uniqueid')}}">
                                            @else
                                                <input type="hidden" name="uniqueid" value="{{str_random(7)}}">
                                            @endif
                                            <input type="hidden" name="title" value="{{$product->title}}">
                                            <input type="hidden" name="product" value="{{$product->id}}">
                                            <input type="hidden" id="cost" name="cost" value="{{$product->price}}">
                                            <input type="hidden" id="quantity" name="quantity" value="1">
                                            <button type="button" class="button style-10 to-cart">Thêm giỏ hàng</button>

                                        
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
    </section>



@stop
@section('javascript')

<script>
    $(document).ready(function(){
        changeElementsCSS();
    });
    function changeElementsCSS()
    {
        $('.colors').each(function(){
            var att = $(this).attr("data-color");
            $(this).css('background-color',att);
        });
    }
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