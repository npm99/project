<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการข้อมูลมคอ.3 และมคอ.5</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"> -->
    <!-- <meta name="generator" content="Hugo 0.80.0"> -->
    <title>ระบบจัดการข้อมูลมคอ.3 และมคอ.5</title>
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/"> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Sarabun:ital,wght@0,400;0,500;1,400;1,500&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <!-- summernote-->
    {{-- <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script>
        window.jQuery || document.write(
            '<script src="{{ asset('assets/js/vendor/jquery.slim.min.js') }}"><\/script>')

    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.js"
        integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css"
        integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    <nav class="navbar navbar-dark red shadow" style="{{ session('data')->is_editor == 0 ? 'z-index: 9999999;' : '' }}">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('tqf') }}">ระบบจัดการข้อมูลมคอ.3
            และมคอ.5</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-user">
            <span>{{ session('data')->Uprefix }}{{ session('data')->UFName }}
                {{ session('data')->ULName }}&nbsp;<span
                    style="color: rgba(255, 255, 255, 0.87);">{{ session('data')->sublevel->levelName }}</span></span>
            <a href="{{ url('/logout') }}">ออกจากระบบ <i class="	fa fa-sign-out"></i></a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @yield('main')" href="{{ url('tqf') }}">
                                <i class="bi bi-house-door"></i> หน้าแรก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('report')" href="{{ url('report') }}">
                                <i class="	fa fa-pie-chart"></i> รายงานการจัดทำมคอ.
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('m1')" data-target="#SubMenu1" data-toggle="collapse">
                                <i class="bi bi-window"></i> จัดการข้อมูล <i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="{{ View::hasSection('m1') ? 'nav down-list collapse show' : 'collapse nav down-list' }}"
                                id="SubMenu1">
                                <li class="nav-item">
                                    <a class="nav-link @yield('term')" href="{{ url('term') }}"></i>
                                        เพิ่มปีการศึกษา</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('fac')" href="{{ url('faculty') }}"></i> เพิ่มคณะ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('ben')" href="{{ url('branch') }}"></i> เพิ่มสาขา</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('sub')" href="{{ url('subject') }}"></i>
                                        เพิ่มรายวิชา</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('group')" href="{{ url('group_subject') }}"></i>
                                        เพิ่มกลุ่มเรียน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('course')" href="{{ url('course') }}"></i>
                                        หลักสูตร</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('m2')" data-target="#SubMenu2" data-toggle="collapse">
                                <i class="bi bi-window"></i> จัดการมคอ. 3 <i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="{{ View::hasSection('m2') ? 'nav down-list collapse show' : 'collapse nav down-list' }}"
                                id="SubMenu2">
                                {{-- <li class="nav-item">
                                    <a class="nav-link @yield('a3')" href="{{ url('tqf/addtqf3') }}"></i>
                                        เพิ่มมคอ.3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('af3')" href="{{ url('tqf/addfastqf3') }}"></i>
                                        เพิ่มมคอ.3 แบบรวดเร็ว</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @yield('e3')" href="{{ url('edittqf3') }}"></i>
                                        จัดการข้อมูลมคอ.3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('t3')" href="{{ url('checktqf3') }}"></i>
                                        ตรวจสอบมคอ.3</a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('m3')" data-target="#SubMenu3" data-toggle="collapse">
                                <i class="bi bi-window"></i> จัดการมคอ. 5 <i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="{{ View::hasSection('m3') ? 'nav down-list collapse show' : 'collapse nav down-list' }}"
                                id="SubMenu3">
                                {{-- <li class="nav-item">
                                    <a class="nav-link @yield('a5')" href="{{ url('tqf/addtqf5') }}"></i>
                                        เพิ่มมคอ.5</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link @yield('af5')" href="{{ url('tqf/addfastqf5') }}"></i>
                                        เพิ่มมคอ.5 แบบรวดเร็ว</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @yield('e5')" href="{{ url('edittqf5') }}"></i>
                                        จัดการข้อมูลมคอ.5</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('t5')" href="{{ url('checktqf5') }}"></i>
                                        ตรวจสอบมคอ.5</a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('manage')" href="{{ url('add/filetqf') }}">
                                <i class="bi bi-window"></i></span> เพิ่มไฟล์มคอ.
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('user')" href="{{ url('user') }}">
                                <i class="bi bi-people"></i></span> ผู้ใช้งาน
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('news')" href="{{ url('news') }}">
                                <i class="bi bi-newspaper"></i></span> ข่าวประชาสัมพันธ์
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link @yield('document')" href="{{ url('document') }}">
                                <i class="bi bi-files"></i></span> เอกสารดาวน์โหลด
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
                @yield('content')
            </main>
        </div>
    </div>


    <div class="modal fade" id="lock_user" role="dialog" style="padding-top: calc(100vh - 520px);">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h4 class="modal-title">Static Backdrop</h4>
                </div> --}}
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/user_lock.png') }}" width="50%">
                        <br>
                        <h5>ท่านยังไม่มีสิทธิ์ในการเข้าถึงข้อมูล</h5>
                        <p>กรุณาติดต่อเจ้าหน้าที่</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> --}}

    <!-- JavaScript files-->

    {{-- <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script> --}}
    {{-- <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script> --}}
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--bootstrap select-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <!-- Data Table-->
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/cumtom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/save_info.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tqf.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/dashboard.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendor/ckeditor/adapters/jquery.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        if ({{ session('data')->is_editor }} == 0 && '{{ Request::path() }}' != 'user') {
            // $("input").attr("readonly", "true");
            $("textarea").attr("readonly", "true");
            $.each($('.formtextarea'), function(i, value) {
                $(this).summernote('disable');
            });
            $("button").prop("disabled", true);
        }

        if ({{ session('data')->is_editor }} == 0) {
            lock_user();
        }
    </script>
    @yield('script')
    @yield('script1')
</body>

</html>
