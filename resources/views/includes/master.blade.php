<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    {!! SEO::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" href="{{url('/')}}/assets/images/logo/avatar_null_nonecircle.png" /> --}}
    <link rel="stylesheet" href="{{url('/')}}/css/app.css">
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
            <div class="aa-input-container" id="aa-input-container">
                <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Tìm kiếm sản phẩm" name="search" autocomplete="off"
                />
                <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
                    <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                </svg>
            </div>
        </div>
    </div>
    <script>
        var mainurl = '{{url('/')}}';
    </script>
    <!-- jQuery -->
    <script src="{{url('/')}}/js/app.js"></script>

    <!-- js Page -->
    @yield('javascript')
    @yield('footer')
    <script>
        new WOW().init();
    </script>
   
    <script>
        $(window).load(function(){
            setTimeout(function(){
                $('#cover').fadeOut(100);
            },100)
            loadCart();
            loadWish();
        });



    $("#LoginButton").click(function(){
        var mail = $('#email2').val();
        var pw = $('#password2').val();
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
               
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    });

    $('#FormReg').on('submit',function(event){
    event.preventDefault();
    var data = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('user.signup')}}',
            data:data,
            dataType:'JSON',
            contentType:false,
            cache:false,
            processData:false,
            success: function(data) {
                ToastSuccess(data.success);
                location.reload(true);
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                ToastError(val);
                });
            }
        });
    });
    function loadWish(){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('wishlist.show')}}',
        dataType: 'json',
            success: function(data) {
            $('#ListWishlist').html(data.list);
            // $('#grandtotal').html(data.total);
            $('#wishlistcount').html('('+data.count+')');
            },
            error: function(html, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    $('#openLoginSignup').click(function(){
        $.getScript("https://www.google.com/recaptcha/api.js");
    });
    function loadCart(){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '{{route('cart.show')}}',
        dataType: 'json',
            success: function(data) {
              $('#ListCart').html(data.list);
              $('#grandtotal').html(data.total);
              $('#carttotal').html('('+data.count+')');
              $('#goCart').html(data.cartPopup);
              $('#grandttl').html(data.total);
              $('#MaGiamGia').html(data.MaGiamGia);
              $('#cartCheckOut').html(data.cartCheckout);
              $('#infoShiper').html(data.Shiper);
            },
            error: function(html, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }


    
    $(document).ready(function(){
        $('#btnAddProduct').click(function(){
            var $this = $(this);
            $this.button('loading');
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
                    setTimeout(function(){
                        ToastSuccess(data.success);
                    }, 800);
                },
                error: function (request, status) {
        
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
            });
            setTimeout(function() {
                $this.button('reset');
            }, 1200);
            
        });


        $('#btnAddWishlist').click(function(){
            var $this = $(this);
            $this.button('loading');
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
                url: '{{route('wishlist.store')}}',
                data:dataString,
                success: function (data) {
                    setTimeout(function(){
                        ToastSuccess(data.success);
                    }, 800);
                },
                error: function (request, status) {
        
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
            });
            setTimeout(function() {
                $this.button('reset');
            }, 1200);
            
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

        $('#news').owlCarousel( {
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



    $(document).on('click','.remove-button',function(){
        var row_id = $(this).attr('data-rowId');
        deleteCart(row_id);
    });

    $(document).on('click','.remove-wishlist-button',function(){
        var row_id = $(this).attr('data-rowId');
        deleteWish(row_id);
    });

    $(document).on('click','.toCart',function(){
        var $this = $(this); $this.button('loading');
        var row_id = $(this).attr('data-rowid');
        var id = $(this).attr('data-id');
        toCart(row_id,id);
        setTimeout(function() {
                $this.button('reset');
        }, 1200);
    });


    function deleteCart(row_id){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('cart.destroy')}}',
        data:{rowid:row_id},
        dataType: 'json',
            success: function(data) {
                setTimeout(function(){
                    ToastSuccess(data.success);
                }, 800);
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    function toCart(row_id,id){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('wishlist.tocart')}}',
        data:{rowid:row_id,id:id},
        dataType: 'json',
            success: function(data) {
                setTimeout(function(){
                    ToastSuccess(data.success);
                }, 800);
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    function deleteWish(row_id){
        $.ajax({
        headers: {
            'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '{{route('wishlist.destroy')}}',
        data:{rowid:row_id},
        dataType: 'json',
            success: function(data) {
                setTimeout(function(){
                    ToastSuccess(data.success);
                }, 800);
            },
            error: function(request, status) {
                $.each(request.responseJSON.errors,function(key,val){
                    ToastError(val);
                });
            }
        });
    }

    $('#confirmEmail').click(function(){
        var storage = localStorage.getItem('subcriber');
        if(storage == "YES"){
            ToastError("Hệ thống ghi nhận bạn đã đăng ký nhận tin tức trên IP này");
            console.log(storage);
        } else {
            var reg = $('#reg-email').val();
            $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '{{route('subcriber.store')}}',
            data:{email:reg},
            dataType: 'json',
                success: function(data) {
                    setTimeout(function(){
                        ToastSuccess(data.success);
                        localStorage.setItem ('subcriber', 'YES');
                    }, 800);
                },
                error: function(request, status) {
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
            });
        }
    });
    </script>
    
</body>



{{VisitLog::save()}}

</html>