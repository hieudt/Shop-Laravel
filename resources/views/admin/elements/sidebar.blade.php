<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin')}}">
        <i class="mdi mdi mdi-home menu-icon"></i>
        <span class="menu-title">Tổng Quan</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#project" aria-expanded="false" aria-controls="products">
            <i class="mdi mdi-compass menu-icon"></i>
            <span class="menu-title">PROJECT</span>
            <i class="menu-arrow"></i>
          </a>
      <div id="project" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/bpc')}}" class="nav-link">Sơ Đồ BPC</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/kanban')}}" class="nav-link">Sơ Đồ C. Việc</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/erd')}}" class="nav-link">Sơ Đồ ERD</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/users')}}">
            <i class="mdi mdi mdi-account menu-icon"></i>
            <span class="menu-title">Khách Hàng</span>
          </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/category')}}">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Danh mục</span>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
          <i class="mdi mdi-shopping menu-icon"></i>
          <span class="menu-title">Sản Phẩm</span>
          <i class="menu-arrow"></i>
        </a>
      <div id="products" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/product/home')}}" class="nav-link">Danh sách</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/product/add-product')}}" class="nav-link">Thêm Mới</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/product/attribute')}}" class="nav-link">Thuộc tính</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/product/brand')}}" class="nav-link">Thương hiệu</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#bill" aria-expanded="false" aria-controls="products">
            <i class="mdi mdi-file-document menu-icon"></i>
            <span class="menu-title">Hóa Đơn</span>
            <i class="menu-arrow"></i>
          </a>
      <div id="bill" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/bill/list')}}" class="nav-link">Danh sách</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/bill/add')}}" class="nav-link">Lập Đơn Hàng</a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="products">
            <i class="mdi mdi-rss menu-icon"></i>
            <span class="menu-title">Tin Tức</span>
            <i class="menu-arrow"></i>
          </a>
      <div id="news" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/news/tintuc')}}" class="nav-link">Danh sách</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/news/add-news')}}" class="nav-link">Tạo tin tức</a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/coupons/')}}">
            <i class="mdi mdi-barcode menu-icon"></i>
            <span class="menu-title">Mã Giảm Giá</span>
          </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/shipper')}}">
              <i class="mdi mdi-motorbike menu-icon"></i>
              <span class="menu-title">Vận Chuyển</span>
            </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/reviews')}}">
          <i class="mdi mdi-account-star menu-icon"></i>
          <span class="menu-title">Đánh Giá</span>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#social" aria-expanded="false" aria-controls="products">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Kênh Bán Hàng</span>
                <i class="menu-arrow"></i>
              </a>
      <div id="social" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/social/zalo')}}" class="nav-link">Zalo</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/bill/add')}}" class="nav-link">Facebook</a>
          </li>
    
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="products">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Hệ Thống</span>
                <i class="menu-arrow"></i>
              </a>
      <div id="setting" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/config')}}" class="nav-link">Cấu hình chung</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/menu')}}" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/database')}}" class="nav-link">Dữ Liệu</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/social')}}" class="nav-link">Kênh Bán Hàng</a>
          </li>
        </ul>
      </div>
    </li>
    @if(App\Setting::find(1)->authtokenbackend == null)
    <li class="nav-item">
      <a class="nav-link collapsed" data-toggle="collapse" href="#safemode" aria-expanded="false" aria-controls="products">
                <i class="mdi mdi-security menu-icon"></i>
                <span class="menu-title">SafeMode</span>
                <i class="menu-arrow"></i>
              </a>
      <div id="safemode" class="collapse" style>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a href="{{url('admin/safemode/cauhinh')}}" class="nav-link">Cấu hình chung</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/safemode/backup')}}" class="nav-link">Sao lưu dữ liệu</a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/safemode/restore')}}" class="nav-link">Phục Hồi Dữ Liệu</a>
          </li>
          <li class="nav-item">
            <a href="{{url('visitlogs')}}" class="nav-link">Lượt Truy Cập</a>
          </li>
        </ul>
      </div>
    </li>
    @endif
  </ul>
</nav>