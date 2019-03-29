<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="author" content="GeniusOcean">
    <link rel="icon" type="image/png" href="{{url('/')}}/assets/images/" />
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('assets/css/idangerous.swiper.css')}}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{ URL::asset('assets/css/genius1.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/genius-slider.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/genius-gallery.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/lightbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>
<body>
<div id="cover"></div>
<div class="theme2">

    <div id="content-block">

        <div class="content-center fixed-header-margin">
            <!-- HEADER -->
            <div class="header-wrapper style-10">
                <header class="type-1">

                    <div class="header-product">
                        <div class="logo-wrapper">
                            <a href="{{url('/')}}" id="logo">
                                <img alt="" src="{{ URL::asset('assets/images/logo')}}/">
                            </a>
                        </div>

                        <div class="product-header-content">
                            <div class="line-entry">
                                <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>

                            </div>
                            {{--<div class="middle-line"></div>--}}
                            <div class="line-entry">
                                <div class="header-top-entry increase-icon-responsive open-search-popup">
                                    <div class="title"><i class="fa fa-search"></i> <span>Search</span></div>
                                </div>
                                <div class="header-top-entry increase-icon-responsive login">
                                    <a href="{{url('/vendor')}}" class="title"><i class="fa fa-group"></i> <span>Vendors</span></a>
                                </div>
                                <div class="header-top-entry increase-icon-responsive login">
                                    <a href="{{url('user/login')}}" class="title"><i class="fa fa-user"></i> <span>My Account</span></a>
                                </div>
                                <a href="{{url('/cart')}}" class="header-top-entry open-cart-popup" id="notify"><div class="title"><i class="fa fa-shopping-cart"></i><span>My Cart</span> <b id="carttotal">$0.00</b></div></a>

                            </div>
                        </div>
                    </div>

                    <div class="close-header-layer"></div>
                    <div class="navigation">
                        <div class="navigation-header responsive-menu-toggle-class">
                            <div class="title">Navigation</div>
                            <div class="close-menu"></div>
                        </div>
                        <div class="nav-overflow">
                            <nav>
                                <ul>
                                 <li class="simple-list"><a href="{{url('/')}}" class="">Home</a></li>

                                
                                        <li class="full-width-columns">
                                            <a href="{{url('/category')}}/fds">fgfdgfd</a>
                                            
                                            <i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                
                                                <div class="product-column-entry">
                                                    <div class="submenu-list-title"><a href="{{url('/category')}}/gfdgfd">fdsfds</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                          
                                                                <li><a href="{{url('/category')}}/"><i class="fa fa-angle-right"></i>fdsfds</a></li>
                                                                <li><a href="{{url('/category')}}/"><i class="fa fa-angle-right"></i>fdsfds</a></li>
                                                                <li><a href="{{url('/category')}}/"><i class="fa fa-angle-right"></i>fdsfds</a></li>
                                                                <li><a href="{{url('/category')}}/"><i class="fa fa-angle-right"></i>fdsfds</a></li>
                                                           
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark yellow">sale</div>
                                                </div>
                                                
                                            </div>
                                            
                                        </li>
                                   

                                        
                                            <li class="simple-list"><a href="{{url('/about')}}" class="">About Us</a></li>
                                        
                                       
                                            <li class="simple-list"><a href="{{url('/faq')}}" class="">FAQ</a></li>
                                        
                                            <li class="simple-list"><a href="{{url('/contact')}}" class="">Contact Us</a></li>
                                       

                                    <li class="fixed-header-visible">
                                        <a class="fixed-header-square-button open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
                                    </li>
                                </ul>

                                <div class="clear"></div>

                            </nav>
                            <div class="navigation-footer responsive-menu-toggle-class">

                            </div>
                        </div>
                    </div>
                </header>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>


    @yield('content')


    </div>

<footer>

    <div class="go-top">
        <a id="gtop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
    </div>

<div class="row">
    <div class="col-md-3 about">
        <h4>About Us</h4>
        <p>fdsfdsfds</p>
    </div>
    <div class="col-md-3 address">
        <h4>Address</h4>
        <p>Street Address: </p>
        <p>Phone: </p>
        <p>Fax: </p>
        <p>Email: </p>
    </div>
    <div class="col-md-3">
        <div class="socicon text-center">
                       
                            <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                       
                        
                            <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                       
                            <a href="" class="google"><i class="fa fa-google"></i></a>
                       
                            <a href="" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        
                    </div>
    </div>      
    <div class="col-md-3 text-center">
        <form action="" method="post">
            {{csrf_field()}}
            <h4>Subscription:</h4>
            <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" required>
            <p id="resp">
            
            </p>
            <button id="subs" class="btn btn-ocean">Subscribe</button>
        </form>
    </div>
</div>
      

<div class="c-line"></div>
            <div class="text-center footerlink">
              Footer
            </div>
</footer>


    <div class="cart-box popup">
        <div class="popup-container">
            <div id="emptycart">
                Your Cart is Empty.
            </div>
            <div id="goCart">

            </div>
            <div class="summary">
                <div class="grandtotal">Total <span id="grandttl">$0.00</span></div>
            </div>
            <div class="cart-buttons">
                <div class="column">
                    <a href="{{url('/cart')}}" class="button style-3">view cart</a>
                    <div class="clear"></div>
                </div>
                <div class="column">
                    <a href="" class="button style-4">checkout</a>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>



    <div class="search-box popup">
        <form id="searchform">
            <button type="button" id="searchbtn" class="search-button">
                <i class="fa fa-search"></i>

            </button>

            <div class="search-field">
                <input type="text" id="searchdata" value="" placeholder="Search for product" />
            </div>
        </form>
    </div>





</div>
<script>
    var mainurl = '{{url('/')}}';
</script>
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery.js')}}"></script>
    <script src="{{ URL::asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.smooth-scroll.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{ URL::asset('assets/js/jquery.mixitup.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/lightbox.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/plugins.js')}}"></script>
    <script src="{{ URL::asset('assets/js/genius.js')}}"></script>
    <script src="{{ URL::asset('assets/js/genius-slider.js')}}"></script>
    <script src="{{ URL::asset('assets/js/idangerous.swiper.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/global.js')}}"></script>

    <!-- custom scrollbar -->
    <script src="{{ URL::asset('assets/js/jquery.mousewheel.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.jscrollpane.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/notify.js')}}"></script>
    
    @yield('footer')
    
    <script>
              new WOW().init();
    </script>
<script>

	$(window).load(function(){
                setTimeout(function(){
                	$('#cover').fadeOut(500);
                },500)
            });

	$("#searchbtn").click(function (){
	   if($("#searchdata").val() != ""){
            	window.location = "{{url('/')}}/search/"+$("#searchdata").val();
            }else{
            	window.location = "{{url('/')}}/search/none";
            }
    	});

	    $("#searchdata").keypress(function(event) {
	        if (event.which == 13) {
	            event.preventDefault();
	            if($("#searchdata").val() != ""){
	            	window.location = "{{url('/')}}/search/"+$("#searchdata").val();
	            }else{
	            	window.location = "{{url('/')}}/search/none";
	            }
	            
	        }
	    });

	function getCart() {
        $.get('{{url('/')}}/cartupdate', function(response){
            var total = 0;
            $("#goCart").html('');
            $.each(response, function(i, cart){
                $.each(cart, function (index, data) {
                    //for (var i = 0; i <= index; i++){
                    var title = data.title.toLowerCase();
                    title = title.split(' ').join('-');
                    url = '{{url('/product')}}/'+data.product+'/'+title;
                    total = total + data.cost;
                    $("#goCart").append('<div class="cart-entry"> <div class="content"> <a class="title" href="'+url+'">'+data.title+'</a> <div class="quantity">Quantity: '+data.quantity+'</div><div class="price">$'+data.cost+'</div></div><div class="button-x"><i class="fa fa-close" onclick=" getDelete('+data.product+')"></i></div></div>');
                    $('#grandttl').html('$'+total.toFixed(2));
                    $('#carttotal').html('$'+total.toFixed(2));
                    $('#emptycart').html('');
                    //console.log('index', data);
                    //}
                })
            })
        });
    }

    function getDelete(id) {
        $.get('{{url('/')}}/cartdelete/'+id, function(response){
            $('#grandttl').html('$0.00');
            $('#carttotal').html('$0.00');
            $('#grandtotal').html('$0.00');
            $('#emptycart').html('Your Cart is Empty.');
            $('#cartempty').html('<td><h3>Your Cart is Empty.</h3></td>');
            $('#item'+id).remove();
            var total = 0;
            var url = '';
            $("#goCart").html('');
            $.each(response, function(i, cart){
                $.each(cart, function (index, data) {
                    //for (var i = 0; i <= index; i++){
                    var title = data.title.toLowerCase();
                    title = title.split(' ').join('-');
                    url = '{{url('/product')}}/'+data.product+'/'+title;
                    total = total + data.cost;
                    $("#goCart").append('<div class="cart-entry"> <div class="content"> <a class="title" href="'+url+'">'+data.title+'</a> <div class="quantity">Quantity: '+data.quantity+'</div><div class="price">$'+data.cost+'</div></div><div class="button-x"><i class="fa fa-close" onclick=" getDelete('+data.product+')"></i></div></div>');
                    $('#grandttl').html('$'+total.toFixed(2));
                    $('#carttotal').html('$'+total.toFixed(2));
                    $('#grandtotal').html('$'+total.toFixed(2));
                    $('#emptycart').html('');
                    $('#cartempty').html('');
                    //console.log('index', data);
                    //}
                })
            })
        });
    }


    $(".to-cart").click(function(){

        var formData = $(this).parents('form:first').serializeArray();
        $.ajax({
            type: "POST",
            url: '{{url('/')}}/cartupdate',
            data:formData,
            success: function (data) {
                getCart();
                $.notify(data.response, "success");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

	function toCart(btn) {
        var formData = $(btn).parents('form:first').serializeArray();
        $.ajax({
            type: "POST",
            url: '{{url('/')}}/cartupdate',
            data:formData,
            success: function (data) {
                getCart();
                //alert("Added to Cart: " + data.product);
                $.notify("Successfully Added to Cart.", "success");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    $(document).ready(function(){

        getCart();

        $('.project_list').mixItUp({
            animation: {
                effects: 'fade translateZ(-100px)'
            }
        });
    });

    jQuery(document).ready(function($) {
        "use strict";
        $('#customers-testimonials').owlCarousel( {
            loop: true,
            center: true,
            items: 3,
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
                    items: 3
                }
            }
        });
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
</script>
</body>
</html>