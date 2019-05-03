<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="{{asset('/admin')}}"><img src="{{asset('@styleadmin/images/avatar_null_nonecircle.png')}}" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="{{asset('/admin')}}"><img src="{{asset('@styleadmin/images/avatar_null_nonecircle.png')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
        <i class="mdi mdi-menu"></i>
      </button>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-email-outline"></i>
            <span class="countMsg"></span>
          </a>
          <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0 text-center">Thông báo</h6>
            <div id="notifyBox">

            </div>
            <h6 class="p-3 mb-0 text-center">Xem tất cả</h6>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right ml-lg-auto">
        <li class="nav-item nav-search">
          <form class="nav-link form-inline mt-2 mt-md-0 d-none d-lg-flex">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-magnify"></i>                  
                </span>
              </div>
            </div>
          </form>
        </li>
        <li class="nav-item  nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
            <img src="{{asset('@styleadmin/images/faces-clipart/pic-1.png')}}">
            @if(Auth::user())
            <span class="profile-name">{{Auth::user()->name}}</span>
            @endif
          </a>
          <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{url('/admin/profile')}}">
              <i class="mdi mdi-account mr-2 text-success"></i>
              Hồ Sơ
            </a>
            <a class="dropdown-item" href="{{url('/admin/logs')}}">
              <i class="mdi mdi-cached mr-2 text-success"></i>
              Lịch sử
            </a>
            <a class="dropdown-item" href="/admin/logout">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              Signout
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
