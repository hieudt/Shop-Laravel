<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Không tồn tại đường dẫn</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('@styleadmin/images/favicon.png')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
                <div class="row flex-grow">
                    <div class="col-lg-7 mx-auto text-white">
                        <div class="row align-items-center d-flex flex-row">
                            <div class="col-lg-6 text-lg-right pr-lg-4">
                                <h1 class="display-1 mb-0">404</h1>
                            </div>
                            <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                <h2>Xin lỗi!</h2>
                                <h3 class="font-weight-light">Đường dẫn không tồn tại</h3>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center mt-xl-2">
                                <a class="text-white font-weight-medium" href="{{url('/')}}">Quay về trang chủ</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 mt-xl-2">
                                <p class="text-white font-weight-medium text-center">Copyright &copy; 2019 All rights
                                    reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- endinject -->
</body>

</html>