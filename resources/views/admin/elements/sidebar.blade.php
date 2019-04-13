<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
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
                <a href="{{url('admin/product/add')}}" class="nav-link">Thêm Mới</a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/product/attribute')}}" class="nav-link">Thuộc tính</a>
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
      <li class="nav-item nav-doc">
        <a class="nav-link" href="#">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>