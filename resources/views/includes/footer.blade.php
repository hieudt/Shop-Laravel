
<footer class="v2_bnc_footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 v2_bnc_footer_left">
                <div class="v2_bnc_footer_info_company"><br>
                    <br>
                    <strong><span style="color:rgb(255, 255, 255)">{{$setting->nameshop}}</span><br>
                        Địa chỉ:</strong>&nbsp; {{$setting->addressshop}}<br>
                    <strong>Điên thoại : </strong> <a href="tel:{{$setting->phoneshop}}"><span style="color:rgb(255, 255, 255);">033 600 1860</span></a> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="v2_bnc_footer_right">
                    <div class="v2_bnc_footer_right_top">
                        @forelse ($pages as $item)
                            @if(enable($item['id']))
                            <div class="col-md-4 col-sm-6 col-xs-6 full-xs">
                                <h4 class="v2_bnc_footer_title">{{$item['name']}}</h4>
                                @if(count($item['child']) > 0)
                                <ul class="v2_bnc_footer_links">
                                    @foreach ($item['child'] as $items)
                                        <li>
                                            <a href="{{$items['slug']}}" class="lienket sm-link sm-link_padding-all sm-link5">
                                                <span class="sm-link__label">{{$items['name']}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            @endif
                        @empty
                            <h4>Không có dữ liệu</h4>
                        @endforelse
                        
                    </div>
                    <div class="v2_bnc_footer_right_bottom">
                        <div class="v2_bnc_footer_follow_me"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="v2_bnc_footer_bottom"><small class="copyright ">Thiết kế bởi <a rel="nofollow" href="https://fb.com/bossgin.vhb" target="_blank">Rog.vn</a></small></div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 v2_bnc_footer_left">
                    <h4>Đăng ký nhận tin tức:</h4>
                    <input type="email" id="reg-email" class="form-control" placeholder="Để lại email" name="email" required>
                    <br/><button id="confirmEmail" class="button style-6">Xác Nhận</button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="v2_bnc_footer_right">
                    <div class="v2_bnc_footer_right_top">
                        <div class="col-md-4 col-sm-6 col-xs-6 full-xs">
                            <h4>Theo dõi chúng tôi tại :</h4>
                            <div class="socicon">
                                <a href="{{$setting->fblink}}" class="facebook"><i class="fa fa-facebook-f"></i></a>
                                <a href="{{$setting->twitterlink}}" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="{{$setting->instagramlink}}" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="{{$setting->youtubelink}}" class="youtube"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 full-xs">
                            <h4>Hãng vận chuyển :</h4>
                            @forelse ($shipper as $item)
                            <img src="{{url('images/shipper/'.$item->image)}}" style="border-radius:5%;width:50px;height:auto;">
                            @empty
                            Không có dữ liệu
                            @endforelse
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 full-xs">
                            <h4>Thanh toán :</h4>
                            <img src="{{url('/images/thumbnail/')}}/v.png" width="100">
                            <img src="https://www.paypalobjects.com/webstatic/mktg/logo-center/PP_Acceptance_Marks_for_LogoCenter_266x142.png" alt="" width="100" class="src">
                            <img src="{{url('/images/thumbnail/')}}/b.png">
 
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</footer>
