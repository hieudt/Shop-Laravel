<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ROG System</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">

    <link rel="stylesheet" href="{{asset('@styleadmin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('@styleadmin/css/style.css')}}">
    <style>
        .pulse:hover,
        .pulse:focus {
            -webkit-animation: pulse 1s;
            animation: pulse 1s;
            box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
            background:white;
            color:black;
        }

        @-webkit-keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 var(--hover);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 var(--hover);
            }
        }

        .pulse {
            --color: #ef6eae;
            --hover: #ef8f6e;
        }

        button {
            background: black;
            border: 2px solid;
            font: inherit;
            line-height: 1;
            margin: 0.5em;
            color:white;
            padding: 1em 2em;
        }

        .content-wrapper {
            background-image: url('{{url('/@styleadmin/images/mainbg.jpg')}}');
        }

        .loadbody {
            background-color: #0040C1 !important;
            position: relative !important;
            height: 100vh !important;
            overflow: hidden !important;
            font-family: 'Montserrat', sans-serif;
        }

        .hero__title {
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 50px;
            z-index: 1;
        }

        .cube {
            position: absolute;
            top: 80vh;
            left: 45vw;
            width: 10px;
            height: 10px;
            border: solid 1px #ffffff;
            -webkit-transform-origin: top left;
            transform-origin: top left;
            -webkit-transform: scale(0) rotate(0deg) translate(-50%, -50%);
            transform: scale(0) rotate(0deg) translate(-50%, -50%);
            -webkit-animation: cube 12s ease-in forwards infinite;
            animation: cube 12s ease-in forwards infinite;
        }

        .cube:nth-child(2n) {
            border-color: #ffffff;
        }

        .cube:nth-child(2) {
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
            left: 25vw;
            top: 40vh;
        }

        .cube:nth-child(3) {
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            left: 75vw;
            top: 50vh;
        }

        .cube:nth-child(4) {
            -webkit-animation-delay: 3s;
            animation-delay: 3s;
            left: 90vw;
            top: 10vh;
        }

        .cube:nth-child(5) {
            -webkit-animation-delay: 4s;
            animation-delay: 4s;
            left: 10vw;
            top: 85vh;
        }

        .cube:nth-child(6) {
            -webkit-animation-delay: 5s;
            animation-delay: 5s;
            left: 50vw;
            top: 10vh;
        }

        @-webkit-keyframes cube {
            from {
                -webkit-transform: scale(0) rotate(0deg) translate(-50%, -50%);
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                opacity: 1;
            }
            to {
                -webkit-transform: scale(20) rotate(960deg) translate(-50%, -50%);
                transform: scale(20) rotate(960deg) translate(-50%, -50%);
                opacity: 0;
            }
        }

        @keyframes cube {
            from {
                -webkit-transform: scale(0) rotate(0deg) translate(-50%, -50%);
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                opacity: 1;
            }
            to {
                -webkit-transform: scale(20) rotate(960deg) translate(-50%, -50%);
                transform: scale(20) rotate(960deg) translate(-50%, -50%);
                opacity: 0;
            }
        }

        .loader {
            color: #ffffff;
            font-size: 90px;
            text-indent: -9999em;
            overflow: hidden;
            width: 1em;
            height: 1em;
            border-radius: 50%;
            background-image: url('{{url('/@styleadmin/images/roglogoprimary.png')}}');
            margin: 72px auto;
            position: relative;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
            animation: load6 1.7s infinite ease, round 1.7s infinite ease;
        }

        @-webkit-keyframes load6 {
            0% {
                box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
            }
            5%,
            95% {
                box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
            }
            10%,
            59% {
                box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
            }
            20% {
                box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
            }
            38% {
                box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
            }
            100% {
                box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
            }
        }

        @keyframes load6 {
            0% {
                box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
            }
            5%,
            95% {
                box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
            }
            10%,
            59% {
                box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
            }
            20% {
                box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
            }
            38% {
                box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
            }
            100% {
                box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
            }
        }

        @-webkit-keyframes round {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes round {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        #loadingDiv {
            position: absolute;
            top: 150px;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .logoRog {
            position: absolute;
            top: 120px;
            left: 100px;
            opacity: 0.1;
            -webkit-transition: opacity 2s; /* For Safari 3.1 to 6.0 */
            transition: opacity 2s;
        }

        .box {
            height: 699px;
            width: 536px;
        }

        .box.horizTranslate {
            -webkit-transition: 3s;
            -moz-transition: 3s;
            -ms-transition: 3s;
            -o-transition: 3s;
            transition: 3s;
            font-size: 0pt !important;
            opacity: 0;
            transition: rotateX(90deg);

        }
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('@styleadmin/images/favicon.png')}}" />
</head>

<body>
    <div class="loadbody">
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <img class="logoRog" src="{{asset('@styleadmin/images/Webp.net-resizeimage.png')}}">
                            <div style="" id="loadingDiv">
                                <div class="loader">Loading...</div>
                            </div>
                            <div class="box">
                                <div class="auth-form-dark text-left p-5">
                                    <h2>Đăng nhập</h2>
                                    <h4 class="font-weight-light">Vùng làm việc của quản trị</h4>
                                    <form class="pt-5">
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên đăng nhập</label>
                                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
                                                <i class="mdi mdi-account"></i>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                <i class="mdi mdi-eye"></i>
                                            </div>
                                        </form>

                                    </form>
                                    <div class="mt-5">
                                        <button class="btn btn-block btn-lg pulse" id="loginBtn">Đăng Nhập</button>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <a href="#" class="auth-link text-white">Quên mật khẩu?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>

    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="{{asset('@styleadmin/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('@styleadmin/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('@styleadmin/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('@styleadmin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('@styleadmin/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{asset('@styleadmin/js/myjs.js')}}"></script>
    <script src="{{asset('@styleadmin/js/toastDemo.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('@styleadmin/js/off-canvas.js')}}"></script>
    <script src="{{asset('@styleadmin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('@styleadmin/js/misc.js')}}"></script>
    <script src="{{asset('@styleadmin/js/settings.js')}}"></script>
    <script src="{{asset('@styleadmin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <script>
    var boxTwo = $('.box');
    $('#loadingDiv').hide();
    $('#loginBtn').click(function(){
       // postLogin();
       boxTwo.addClass('horizTranslate');
        showLoader();
        $('.logoRog').css('opacity',1);
    });
    function showLoader(){
        $('#loadingDiv').show();
    }
    function postLogin()
    {
        var email = $('#email').val();
        var password = $('#password').val();

        var dataString = "email="+email+"&password="+password;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
                method: 'POST',
                url: '{{route('admin.login')}}',
                data:dataString,
                success: function(data) {
                    ToastSuccess(data.success);
                    boxTwo.addClass('horizTranslate');
                    showLoader();
                    setInterval(function(){
                        $(location).attr('href', '{{url('/admin/index')}}');
                    }, 3000);
                },
                error: function(request, status) {
                    console.log(request.responseJSON);
                    $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
        });
    }
    </script>
</body>

</html>