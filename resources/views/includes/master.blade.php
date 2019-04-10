<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="">
    <meta name="author" content="GeniusOcean">
    <link rel="icon" type="image/png" href="{{url('/')}}/assets/images/logo/avatar_null_nonecircle.png" />
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/idangerous.swiper.css')}}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900'
        rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{URL::asset('assets/css/mycss.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/genius1.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/genius-slider.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/genius-gallery.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
    <link href="{{ URL::asset('assets/css/lightbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.min.css')}}" rel="stylesheet">

    <!-- Inject CSS -->
    @yield('css')
</head>

<body>
    <div id="cover"></div>
    <div class="theme2">
        <div id="content-block">
            <div class="content-center fixed-header-margin">
                <!-- HEADER -->
    @include('includes.header')
            </div>
            <div class="clear"></div>
            @yield('content')
        </div>
    @include('includes.footer')
    @include('includes.cart')
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
    <script src="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{asset('@styleadmin/js/toastDemo.js')}}"></script>
    <script src="{{asset('@styleadmin/js/myjs.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.mousewheel.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jquery.jscrollpane.min.js')}}"></script>
    <!-- js Page -->
    @yield('javascript'); @yield('footer');
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


    $("#LoginButton").click(function(){
        var mail = $('#email').val();
        var pw = $('#password').val();
        var dataString = "email="+mail+"&password="+pw;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('user.login')}}',
            data:dataString,
            success: function (data) {
                ToastSuccess(data.success); 
                location.reload(true);

            },
            error: function (request, status) {
                console.log(request.responseJSON);
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

    $("#SignUpButton").click(function(){
        var name = $('#nameR').val();
        var email = $('#emailR').val();
        var Address = $('#AddressR').val();
        var Phone = $('#PhoneR').val();
        var password = $('#passwordR').val();
        var dataString = "name="+name+"&password="+password+"&email="+email+"&Address="+Address+"&Phone="+Phone;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: '{{route('user.signup')}}',
            data:dataString,
            success: function (data) {
                ToastSuccess(data.success); 
                location.reload(true);

            },
            error: function (request, status) {
                console.log(request.responseJSON);
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });



    $(document).ready(function(){

        $('.project_list').mixItUp({
            animation: {
                effects: 'fade translateZ(-100px)'
            }
        });

        $('#btnAddProduct').click(function(){
            var cart_idProduct = $('#modalIdProduct').val();
            var cart_number = $('#modalSoLuong').text();
            var cart_idSize = $('#selSize').val();
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

                },
                error: function (request, status) {
                    console.log(request.responseJSON);
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
            });
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

        $('#coupons').owlCarousel( {
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

    });
    </script>
</body>

</html>