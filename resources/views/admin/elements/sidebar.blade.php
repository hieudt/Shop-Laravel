<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/index')}}">
          <i class="mdi mdi-compass-outline menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{url('admin/category')}}">
          <i class="mdi mdi-puzzle menu-icon"></i>
          <span class="menu-title">Danh mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
            <i class="mdi mdi-puzzle menu-icon"></i>
            <span class="menu-title">Sản Phẩm</span>
            <i class="menu-arrow"></i>
          </a>
          <div id="products" class="collapse" style>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a href="{{url('admin/product')}}" class="nav-link">Danh sách</a>
              </li>
              <li class="nav-item">
                  <a href="{{url('admin/product/add')}}" class="nav-link">Thêm Mới</a>
              </li>
            </ul>
          </div>
        </li>
      
      <li class="nav-item nav-doc">
        <a class="nav-link" href="../../pages/documentation.html">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>