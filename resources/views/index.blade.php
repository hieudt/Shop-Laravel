@extends('includes.master')
@section('content')


<section class="go-slider">
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

    <!-- Indicators -->
    {{--<ol class="carousel-indicators">--}}
        {{--@for ($i = 0; $i < count($sliders); $i++)--}}
            {{--@if($i == 0)--}}
                {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}" class="active"></li>--}}
            {{--@else--}}
                {{--<li data-target="#bootstrap-touch-slider" data-slide-to="{{$i}}"></li>--}}
            {{--@endif--}}
        {{--@endfor--}}
    {{--</ol>--}}

    <!-- Wrapper For Slides -->
    {{-- <div class="carousel-inner" role="listbox">

        @for ($i = 0; $i < count($sliders); $i++)
            @if($i == 0)
                <!-- Third Slide -->
                    <div class="item active">

                        <!-- Slide Background -->
                        <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text {{$sliders[$i]->text_position}}">

                                    <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                                    <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
            @else
            <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{url('/')}}/assets/images/sliders/{{$sliders[$i]->image}}" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text {{$sliders[$i]->text_position}}">
                        <h1 data-animation="animated fadeInDown">{{$sliders[$i]->title}}</h1>
                        <p data-animation="animated fadeInUp">{{$sliders[$i]->text}}</p>
                    </div>
                </div>
                <!-- End of Slide -->
            @endif
    @endfor


    </div><!-- End of Wrapper For Slides --> --}}

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

    </div> <!-- End  bootstrap-touch-slider Slider -->

</section>

<section class="wow fadeInUp go-services hideme">
    <div class="row" style="margin-top:70px;">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h2>Language</h2>
                    <p>Language</p>
                </div>
            </div>
                <div class="col-xs-12 col-md-4">
                    <div class="service-list text-center wow fadeInUp">
                        <img src="{{url('/assets/images/service')}}/jz52.jpg" alt="">
                        <h3>Service title</h3>
                        <p>Service Text</p>
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
                        <li class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Feature Products</a></li>
                        <li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Latest Products</a></li>
                        <li><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Popular Products</a></li>
                    </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active" id="home">
                                <div class="row">
                                        <div class="col-xs-6 col-sm-4 col-md-3 product">
                                            <article class="col-item">
                                                <div class="photo">
                                                    <a href="{{url('/product')}}/1/"> <img src="{{url('/assets/images/products')}}/149615617618342277_1363825740371972_1502677715878156657_n.jpg" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                                                </div>
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="price-details">

                                                            <a href="" class="row" style="min-height: 60px">
                                                                <h1>ProductTitle</h1>
                                                            </a>
                                                            <div class="pull-left">
                                                                    <span class="price-old">255000</span>
                                                                <span class="price-new">255000</span>
                                                            </div>
                                                            <div class="pull-right">
                                                            <span class="review">
                                                               
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                  
                                                            </span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="separator clear-left">
                                                        <form>
                                                            <p>
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="title" value="">
                                                                <input type="hidden" name="product" value="">
                                                                <input type="hidden" id="cost" name="cost" value="">
                                                                <input type="hidden" id="quantity" name="quantity" value="1">

                                                                    <button type="button" class="button style-10 to-cart">Add to cart</button>

                                                                    <button type="button" class="button style-10 to-cart" disabled>Out Of Stock</button>

                                                                {{--<button type="button" class="button style-10 hidden-sm to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>--}}
                                                            </p>
                                                        </form>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </article>
                                        </div>

                                </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <div class="row">
                                    <div class="col-xs-6 col-sm-4 col-md-3 product">
                                        <article class="col-item">
                                            <div class="photo">
                                                <a href=""> <img src="{{url('/assets/images/products')}}/149615617618342277_1363825740371972_1502677715878156657_n.jpg" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price-details">

                                                        <a href="" class="row" style="min-height: 60px">
                                                            <h1>Product Title</h1>
                                                        </a>

                                                        <div class="pull-left prices">
                                                                <span class="price-old">250000</span>
                                        
                                                            <span class="price-new">255000</span>
                                                        </div>
                                                        <div class="pull-right revs">
                                                            <span class="review">
                                                              
                                                                   
                                                                        <i class="fa fa-star"></i>
                                                                   
                                                                        <i class="fa fa-star-o"></i>
                                                             
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="separator clear-left">
                                                    <form>
                                                        <p>
                                                            {{csrf_field()}}
                                                           
                                                            <input type="hidden" name="title" value="">
                                                            <input type="hidden" name="product" value="">
                                                            <input type="hidden" id="cost" name="cost" value="">
                                                            <input type="hidden" id="quantity" name="quantity" value="1">
                                                          
                                                                <button type="button" class="button style-10 to-cart">Add to cart</button>
                                                        
                                                                <button type="button" class="button style-10 to-cart" disabled>Out Of Stock</button>
                                                            
                                                            {{--<button type="button" class="button style-10 hidden-sm to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>--}}
                                                        </p>
                                                    </form>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </article>
                                    </div>
                              

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <div class="row">
                              
                                    <div class="col-xs-6 col-sm-4 col-md-3 product">
                                        <article class="col-item">
                                            <div class="photo">
                                                <a href="" class="img-responsive" style="height: 320px;" alt="Product Image" /> </a>
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price-details">

                                                        <a href="" class="row" style="min-height: 60px">
                                                            <h1>Product tile</h1>
                                                        </a>
                                                        <div class="pull-left">
                                                          
                                                                <span class="price-old">$2555000</span>
                                                           
                                                            <span class="price-new">$255252</span>
                                                        </div>
                                                        <div class="pull-right">
                                                            <span class="review">
                                                            
                                                                   
                                                                        <i class="fa fa-star"></i>
                                                                   
                                                                        <i class="fa fa-star-o"></i>
                                                                
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="separator clear-left">
                                                    <form>
                                                        <p>
                                                            {{csrf_field()}}
                                                           
                                                            <input type="hidden" name="title" value="">
                                                            <input type="hidden" name="product" value="">
                                                            <input type="hidden" id="cost" name="cost" value="">
                                                            <input type="hidden" id="quantity" name="quantity" value="1">
                                                     
                                                                <button type="button" class="button style-10 to-cart">Add to cart</button>
                                                        
                                                                <button type="button" class="button style-10 to-cart" disabled>Out Of Stock</button>
                                                          
                                                            {{--<button type="button" class="button style-10 hidden-sm to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>--}}
                                                        </p>
                                                    </form>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </article>
                                    </div>
                               

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