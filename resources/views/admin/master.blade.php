<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
  <link rel="stylesheet" href="{{asset('@styleadmin/css/home.css')}}">

  <!-- endinject -->
  <!-- plugin css for this page -->
  @yield('css')
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('@styleadmin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
  @include('admin.elements.header')
    <div class="container-fluid page-body-wrapper">
  @include('admin.elements.themes')
  @include('admin.elements.sidebar')
      <div class="main-panel">
        
          <div class="content-wrapper">
              <div id="app">
                  @yield('content')
              </div>
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
  <div class="modal fade" id="SiriModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubCategoryLabel">ROG Siri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hi Im Siri </label><br/>
                    <div class="input-single">
                        <textarea id="note-textarea" placeholder="Chào ngài ! Ngài muốn làm gì?? " rows="6"></textarea>
                    </div>  
                </div>
            </div>
            <div class="modal-footer" id="submodalFooter">
            </div>
        </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('@styleadmin/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
  <script src="{{asset('@styleadmin/js/toastDemo.js')}}"></script>
  <script src="{{asset('@styleadmin/js/pusher.min.js')}}"></script>
  <script src="{{asset('@styleadmin/js/myjs.js')}}"></script>
  <script src="{{asset('@styleadmin/js/pace.min.js')}}"></script>
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
  @yield('javascript')
  <!-- End custom js for this page-->
</body>
@include('admin.elements.siri');

</html>