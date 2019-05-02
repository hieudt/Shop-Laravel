<div class="header-wrapper style-10">
    <header class="type-1">
        <div class="header-product">
            <div class="logo-wrapper">
                <a href="{{url('/')}}" id="logo">
                    <!--<img class="logoImg" alt="" src="/"> -->
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
                        <a href="#signup" id="openLoginSignup" data-toggle="modal" data-target=".log-sign" class="title"><i class="fa fa-user"></i> <span>Tài khoản của tôi</span></a>
                    </div>
                    @else
                    <div class="header-top-entry increase-icon-responsive login">
                        <div class="title"><i class="fa fa-user"></i> <a href="{{url('/')}}/users">Hồ sơ : {{Auth::user()->name}}</a></div>
                    </div>
                    <div class="header-top-entry increase-icon-responsive login">
                        <div class="title"><i class="fa fa-sign-out"></i> <a href="/users/logout">Đăng xuất</a></div>
                    </div>
                    @endif
                    <div class="header-top-entry increase-icon-responsive login">
                    <a href="{{url('/cart')}}" class="header-top-entry title" id="notify">
                        <i class="fa fa-shopping-cart open-cart-popup"></i><span>Giỏ Hàng</span> <b id="carttotal">(0)</b>
                    </a>
                    </div>
                    <div class="header-top-entry increase-icon-responsive login">
                    <a href="{{url('/wishlist')}}" class="header-top-entry title" id="notify">
                        <i class="fa fa-heart"></i><span>Yêu Thích</span> <b id="wishlistcount">(0)</b>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="close-header-layer"></div>
        <div class="navigation">
            <div class="navigation-header responsive-menu-toggle-class">
                <div class="title">Menu</div>
                <div class="close-menu"></div>
            </div>
            <div class="nav-overflow">
                <nav>
                    <ul>
                        <li class="simple-list"><a href="{{url('/')}}" class="botred">TRANG CHỦ</a></li>
                        <li class="simple-list"><a href="{{url('/cart')}}" class="botred">GIỎ HÀNG</a></li>
                        <li class="simple-list"><a href="{{url('/wishlist')}}" class="botred">YÊU THÍCH</a></li>
                        <li class="full-width-columns">
                            <a href="{{url('/san-pham?')}}">DANH MỤC</a>
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
                        @forelse ($pages as $item)
                            @if(enable($item['id'],1))
                                @if(count($item['child']) > 0)
                                    <li class="full-width-columns">
                                        <a href="#">{{$item['name']}}</a>
                                        <i class="fa fa-chevron-down"></i>
                                        <div class="submenu">
                                            <div class="product-column-entry">
                                                <div class="submenu-list-title"><a href="#">{{$item['name']}}</a><span class="toggle-list-button"></span></div>
                                                <div class="description toggle-list-container">
                                                    <ul class="list-type-1">
                                                        @foreach($item['child'] as $items)
                                                        <li><a href="{{url('/')}}/{{$items['slug']}}"><i class="fa fa-angle-right"></i>{{$items['name']}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="hot-mark yellow">sale</div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="simple-list">
                                        <a href="{{url('/')}}/{{$item['slug']}}" class="botred">
                                            {{$item['name']}}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @empty
                            <li class="simple-list">
                                <a href="#" class="">
                                    Không Có Dữ Liệu
                                </a>
                            </li>
                        @endforelse


                        </li>
                        <li class="fixed-header-visible">
                            <a class="fixed-header-square-button"><i class="fa fa-shopping-cart open-cart-popup"></i></a>
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
                                    <input required="" class="input" type="text" placeholder="Email" id="email2"><span class="highlight"></span><span class="bar"></span>
                                <div class="group">
                                    <input required="" class="input" type="password" placeholder="Mật Khẩu" id="password2"><span class="highlight"></span>
                                    <span class="bar"></span>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button type="button" class="button style-10" id="LoginButton"><strong>Đăng nhập</strong></button>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <a href="{{url('/forgot')}}">Quên mật khẩu</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <a href="{{url('/redirect/facebook')}}" class="button facebook" id="FBLogin"><strong><i class="fa fa-facebook"></i>Đăng nhập với FB</strong></a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="signup">
                        <form id="FormReg" class="form-horizontal" method="POST">
                            <fieldset>
                                <div class="group">
                                    <input required="" class="input" type="text" name="name" placeholder="Họ và Tên"><span class="highlight"></span><span class="bar"></span>
                                 
                                <div class="group">
                                    <input required="" class="input" type="email" name="email" placeholder="Email"><span class="highlight"></span><span class="bar"></span>
                               
                                <div class="group">
                                    <input required="" class="input" type="text" name="Address" placeholder="Địa chỉ"><span class="highlight"></span><span class="bar"></span>
                                
                                <div class="group">
                                    <input required="" class="input" type="text" name="Phone" placeholder="Số Điện thoại"><span class="highlight"></span><span class="bar"></span>
                                  
                                <div class="group">
                                <input required="" class="input" type="password" name="password" placeholder="Mật Khẩu"><span class="highlight"></span>
                                <span class="bar"></span>
                                
                                <div class="g-recaptcha" data-sitekey="6LemlaAUAAAAAIeyg-ksAbIRzKROiSboePM6wjtZ"></div>
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button type="submit" class="button style-10" id="SignUpButton"><strong>Đăng ký</strong></button>
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
