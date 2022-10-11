<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>ระบบจัดการข้อมูลมคอ.3 และมคอ.5</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="robots" content="all,follow">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการข้อมูลมคอ.3 และมคอ.5</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('assets/css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Sarabun:ital,wght@0,400;0,500;1,400;1,500&display=swap">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css') }}">
    <!-- select bootstap-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- summernote-->
    {{-- <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<body>

    <div class="header">
        <img height="90" src="{{ asset('assets/img/logo/tapnew.png') }}">
        <!-- <h1>My Website</h1>
        <p>A <b>responsive</b> website created by me.</p> -->
    </div>
    <nav class="navbar navbar-dark navbar-expand-md navbarA justify-content-center">
        {{-- <a href="/" class="navbar-brand mr-0">Brand</a> --}}
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto text-center" id="myTab">
                {{-- <li class="nav-item">
                    <a class="nav-link @yield('home')" href="{{ url('/') }}">หน้าหลัก</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link @yield('tqf3')" href="{{ url('downloadtqf3') }}">มคอ.3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('tqf5')" href="{{ url('downloadtqf5') }}">มคอ.5</a>
                </li> --}}
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">เข้าสู่ระบบ</a></li>
            </ul>
        </div>
    </nav>


    @yield('content')


    <div class="footer">
        <div class="container-fluid" style="text-align: center">
            {{-- <div class="row-between"> --}}
                <p>ระบบจัดการข้อมูลมคอ.3 และมคอ.5 © 2021-2022 </p>
                <p>ชั้น 2 อาคาร 18 อาคาร 50 ปี เทคนิคไทย-เยอรมัน ขอนแก่น มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน
                    วิทยาเขตขอนแก่น</p>
            {{-- </div> --}}
        </div>
    </div>

    <!-- JavaScript files-->
    {{-- <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script> --}}
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script> --}}

    <!-- Main File-->
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/cumtom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/save_info.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tqf.js') }}"></script>

    <!--bootstrap select-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}
    <!-- Data Table-->
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/dataTables.bootstrap4.min.js') }}"></script>

    @yield('script')
</body>

</html>
