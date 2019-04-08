<style>
    .tab-style {
        font-size: 20px;
        width: 50%;
        background-color: #f2f2f2;
        text-align: center;


    }

    .nav-tabs>li>a {
        margin-right: 0px;
        color: grey;
    }



    .group2 {
        position: relative;
        margin-top: 16px;
    }

    .btn-block {
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 18px;
    }


    .login-shadow {
        -webkit-box-shadow: 5px -5px 6px 0px rgba(82, 82, 82, 0.52);
        -moz-box-shadow: 5px -5px 6px 0px rgba(82, 82, 82, 0.52);
        box-shadow: 5px -5px 6px 0px rgba(82, 82, 82, 0.52);
        z-index: 1;

    }

    .signup-shadow {
        -webkit-box-shadow: -5px 0px 6px 0px rgba(82, 82, 82, 0.52);
        -moz-box-shadow: -5px -5px 6px 0px rgba(82, 82, 82, 0.52);
        box-shadow: -5px 0px 6px 0px rgba(82, 82, 82, 0.52);

    }


    .modal-header {
        background-color: #e5ecf4;
    }

    .group {
        border: none !important;
        position: relative;
        margin-top: 30px;
    }


    .input {
        font-size: 18px;
        padding: 10px 10px 10px 5px;
        -webkit-appearance: none;
        display: block;
        background: none;
        color: #636363;
        width: 100%;
        border: none;
        border-radius: 0;
        border-bottom: 1px solid #757575;
    }

    .input:focus {
        outline: none;
    }


    /* Label */

    .label {
        color: #757575;
        font-size: 18px;
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: -10px;
        top: 10px;
        transition: all 0.2s ease;
    }


    /* active */

    .input:focus~.label,
    .input.used~.label {
        top: -20px;
        transform: scale(.75);
        left: -15px;
        /* font-size: 14px; */
        color: #000;
    }


    /* Underline */

    .bar {
        position: relative;
        display: block;
        width: 100%;
    }

    .bar:before,
    .bar:after {
        content: '';
        height: 2px;
        width: 0;
        bottom: 1px;
        position: absolute;
        background: #000;
        transition: all 0.2s ease;
    }

    .bar:before {
        left: 50%;
    }

    .bar:after {
        right: 50%;
    }


    /* active */

    .input:focus~.bar:before,
    .input:focus~.bar:after {
        width: 50%;
    }


    /* Highlight */

    .highlight {
        position: absolute;
        height: 60%;
        width: 100px;
        top: 25%;
        left: 0;
        pointer-events: none;
        opacity: 0.5;
    }


    /* active */

    .input:focus~.highlight {
        animation: inputHighlighter 0.3s ease;
    }


    @media screen and (max-width: 767px) and (min-width: 576px) {
        #myModal {
            margin-left: 20%;
            margin-right: 20%;
        }

        #forgot-password {
            margin-left: 20%;
            margin-right: 20%;
        }
    }


    @media screen and (min-width: 768px) {

        #myModal .modal-dialog {
            width: 500px;
        }

        #forgot-password .modal-dialog {
            width: 500px;
        }

        .modal-body {
            padding-left: 50px;
            padding-right: 50px;
        }
    }

    em {
        display: none;
    }
</style>
<div class="header-wrapper style-10">
    <header class="type-1">
        <div class="header-product">
            <div class="logo-wrapper">
                <a href="{{url('/')}}" id="logo">
                    <img class="logoImg" alt="" src="{{ URL::asset('/assets/images/logo/avatar_null_nonecircle.png')}}/">
                </a>
            </div>
            <div class="product-header-content">
                <div class="line-entry">
                    <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
                </div>
                {{--
                <div class="middle-line"></div>--}}
                <div class="line-entry">
                    <div class="header-top-entry increase-icon-responsive open-search-popup">
                        <div class="title"><i class="fa fa-search"></i> <span>Tìm kiếm</span></div>
                    </div>
                    @if(!Auth::check())
                    <div class="header-top-entry increase-icon-responsive login">
                        <a href="#signup" data-toggle="modal" data-target=".log-sign" class="title"><i class="fa fa-user"></i> <span>Tài khoản của tôi</span></a>
                    </div>
                    @else
                    <div class="header-top-entry increase-icon-responsive login">
                        <div class="title"><i class="fa fa-user"></i> <a href="users">Hồ sơ : {{Auth::user()->name}}</a></div>
                    </div>
                    <div class="header-top-entry increase-icon-responsive login">
                        <div class="title"><i class="fa fa-sign-out"></i> <a href="users/logout">Đăng xuất</a></div>
                    </div>
                    @endif
                    
                    <a href="{{url('/cart')}}" class="header-top-entry" id="notify">
                        <div class="title"><i class="fa fa-shopping-cart"></i><span>Giỏ Hàng</span> <b id="carttotal">(0)</b></div>
                    </a>
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
                        <li class="simple-list"><a href="{{url('/')}}" class="">TRANG CHỦ</a></li>
                        <li class="full-width-columns">
                            <a href="{{url('/category')}}/fds">DANH MỤC</a>
                            <i class="fa fa-chevron-down"></i>
                            <div class="submenu">
                                @foreach($danhmuc as $cat)
                                <div class="product-column-entry">
                                <div class="submenu-list-title"><a href="{{url('san-pham?category=')}}{{$cat->slug}}">{{$cat->title}}</a><span class="toggle-list-button"></span></div>
                                    <div class="description toggle-list-container">
                                        <ul class="list-type-1">
                                            @foreach($cat->SubCategory as $s)
                                            <li><a href="{{url('san-pham?subcategory=')}}{{$s->slug}}"><i class="fa fa-angle-right"></i>{{$s->name_sub}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="hot-mark yellow">sale</div>
                                </div>
                                @endforeach
                            </div>
                        </li>
                        <li class="simple-list">
                            <a href="#" class="">
                                 Điều Khoản
                                </a></li>
                        <li class="simple-list"><a href="{{url('/faq')}}" class="">Liên Hệ</a></li>
                        <li class="simple-list"><a href="{{url('/contact')}}" class="">CHÍNH SÁCH</a></li>
                        <li class="fixed-header-visible">
                            <a class="fixed-header-square-button"><i class="fa fa-shopping-cart"></i></a>
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
<!-- Modal -->
<!-- Modal -->
<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="bs-example bs-example-tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Đăng nhập</a></li>
                    <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Đăng ký</a></li>

                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade active in" id="signin">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="group">
                                    <input required="" class="input" type="text" placeholder="Email" id="email"><span class="highlight"></span><span class="bar"></span>
                                <div class="group">
                                    <input required="" class="input" type="password" placeholder="Mật Khẩu" id="password"><span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button type="button" class="button style-10" id="LoginButton"><strong>Đăng nhập</strong></button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="signup">
                        <form class="form-horizontal">
                            <fieldset>
                                <div class="group">
                                    <input required="" class="input" type="text" id="nameR" placeholder="Họ và Tên"><span class="highlight"></span><span class="bar"></span>
                                 
                                <div class="group">
                                    <input required="" class="input" type="email" id="emailR" placeholder="Email"><span class="highlight"></span><span class="bar"></span>
                               
                                <div class="group">
                                    <input required="" class="input" type="text" id="AddressR" placeholder="Địa chỉ"><span class="highlight"></span><span class="bar"></span>
                                
                                <div class="group">
                                    <input required="" class="input" type="text" id="PhoneR" placeholder="Số Điện thoại"><span class="highlight"></span><span class="bar"></span>
                                  
                                <div class="group">
                                <input required="" class="input" type="password" id="passwordR" placeholder="Mật Khẩu"><span class="highlight"></span>
                                <span class="bar"></span>
                                

                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button type="button" class="button style-10" id="SignUpButton"><strong>Đăng ký</strong></button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
