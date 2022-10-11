<!doctype html>
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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Sarabun:ital,wght@0,400;0,500;1,400;1,500&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('assets/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
        integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css') }}">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/toast/jquery.toast.min.css') }}">
    <!-- summernote-->
    {{-- <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    {{-- <script>
        window.jQuery || document.write(
            '<script src="{{ asset('assets/js/vendor/jquery.slim.min.js') }}"><\/script>')

    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.js"
        integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('textscript')



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .unsave {
            background-color: #f32f2fb8 !important;
        }

        .unsave.active {
            background-color: #e10000cf !important;
            color: white !important;
        }

        .page-save {
            background-color: #63df63 !important;
            border: 1px solid #9b9b9b !important;
            border-bottom: 0px !important;
        }

        .page-save.active {
            background-color: #19e319ee !important;
            color: white !important;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    <nav class="navbar navbar-dark red shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('tqf') }}">ระบบจัดการข้อมูลมคอ.3
            และมคอ.5</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-user">
            <span>{{ session('data')->Uprefix }}{{ session('data')->UFName }} {{ session('data')->ULName }}
                &nbsp;<span style="color: rgba(255, 255, 255, 0.87);">
                    {{ session('data')->sublevel->levelName }}</span></span>
            <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
            <!-- <ul class="navbar-nav px-3"> -->
            <!-- <li class="nav-item text-nowrap"> -->
            <a href="{{ url('/logout') }}">ออกจากระบบ <i class="fa fa-sign-out"></i></a>
            <!-- </li> -->
            <!-- </ul> -->
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('main')" href="{{ url('tqf') }}">
                                <i class="bi bi-house-door"></i> หน้าแรก <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('tqf3')" href="{{ url('tqf3') }}">
                                <i class="bi bi-window"></i> บันทึกมคอ. 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('tqf5')" href="{{ url('tqf5') }}">
                                <i class="bi bi-window"></i> บันทึกมคอ. 5
                            </a>
                        </li>
                        @if (session('data')->chairman == 1)
                            <li class="nav-item">
                                <a class="nav-link @yield('head_course')" data-target="#SubMenu" data-toggle="collapse">
                                    <i class="bi bi-window"></i> รายงานมคอ. <i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <ul class="{{ View::hasSection('head_course') ? 'nav down-list collapse show' : 'collapse nav down-list' }}"
                                    id="SubMenu">
                                    <li class="nav-item">
                                        <a class="nav-link @yield('course3')" href="{{ url('tqf/course3') }}"></i>
                                            มคอ.3</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @yield('course5')" href="{{ url('tqf/course5') }}"></i>
                                            มคอ.5</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link @yield('d1')" data-target="#SubMenu1" data-toggle="collapse">
                                <i class="bi bi-window"></i> ดาวน์โหลดมคอ. <i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="{{ View::hasSection('d1') ? 'nav down-list collapse show' : 'collapse nav down-list' }}"
                                id="SubMenu1">
                                <li class="nav-item">
                                    <a class="nav-link @yield('d3')" href="{{ url('tqf/downloadtqf3') }}"></i>
                                        มคอ.3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('d5')" href="{{ url('tqf/downloadtqf5') }}"></i>
                                        มคอ.5</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                @yield('pageheader')
                @yield('content')
            </main>
        </div>
    </div>







    {{-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> --}}
    {{-- <script src="dashboard.js"></script> --}}

    <!-- JavaScript files-->
    {{-- <script src="{{ asset('assets/vendor/jquery/jquery-3.5.1.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script> --}}
    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script> --}}
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- <!--bootstrap select-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}
    <!-- Data Table-->
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- toast-->
    <script type="text/javascript" src="{{ asset('assets/vendor/toast/jquery.toast.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- autoSize-->
    <script type="text/javascript" src="{{ asset('assets/vendor/autoSizedJS/autoSized.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @yield('script')
    <!-- Main File-->
    <script type="text/javascript" src="{{ asset('assets/js/cumtom.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/save_info.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tqf.js') }}"></script>
</body>

</html>
