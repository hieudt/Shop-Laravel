<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('@styleadmin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:{{asset('@styleadmin/partials/_navbar.html')}} -->
    @include('admin.elements.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:{{asset('@styleadmin/partials/_settings-panel.html')}} -->
    @include('admin.elements.themes')
      <!-- partial -->
      <!-- partial:{{asset('@styleadmin/partials/_sidebar.html')}} -->
      @include('admin.elements.sidebar')
      <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:{{asset('@styleadmin/partials/_footer.html')}} -->
        @include('admin.elements.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @yield('javascript')
  <script src="{{asset('@styleadmin/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('@styleadmin/js/off-canvas.js')}}"></script>
  <script src="{{asset('@styleadmin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('@styleadmin/js/misc.js')}}"></script>
  <script src="{{asset('@styleadmin/js/settings.js')}}"></script>
  <script src="{{asset('@styleadmin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
