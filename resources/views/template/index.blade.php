<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการข้อมูลมคอ.3 และมคอ.5</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('assets/css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Sarabun:ital,wght@0,400;0,500;1,400;1,500&display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.red.css') }} " id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.ico') }}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield('style')
</head>

<body>
    <div class="page">
        <!-- Main Navbar-->
        <header class="header">
            <nav class="navbar head">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand --><a href="{{ url('/') }}" class="navbar-brand d-none d-sm-inline-block">
                                <div class="brand-text d-none d-lg-inline-block">
                                    {{-- <img src="{{ asset('assets/img/logo/logo3.png') }}" class="logo"> --}}
                                    <strong>ระบบจัดการข้อมูลมคอ.3 และมคอ.5</strong>
                                </div>
                                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>ระบบจัดการข้อมูลมคอ.3
                                        และมคอ.5</strong></div>
                            </a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                            <a id="languages" rel="nofollow" data-target="#" href="{{ url('downloadtqf') }}"
                                aria-haspopup="true" aria-expanded="false" class="nav-link"><span
                                    class="d-none d-sm-inline-block">Download มคอ.</span></a>
                            <!-- Login -->
                            <li class="nav-item"><a class="nav-link login" href="{{ url('/login') }}">
                                <i class="fa fa-sign-in"></i> <span class="d-none d-sm-inline"> เข้าสู่ระบบ</span></a></li> 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="page-content d-flex align-items-stretch">
            <div class="index-inner">
                <!-- Content Section-->
                @yield('content')


                <!-- Page Footer-->
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Your company &copy; 2017-2020</p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>Design by <a href="https://bootstrapious.com/p/admin-template"
                                        class="external">Bootstrapious</a></p>
                                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    
    <!-- Main File-->
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/cumtom.js') }}"></script>
    <script type="text/javascript">
    
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
</body>

</html>
