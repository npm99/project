@extends('template.officer')

@section('user', 'active')
@section('textpage', 'ผู้ใช้งาน')

@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="h5">ผู้ใช้งาน</h4>
                        </div>
                        <div class="card-body">
                            <div class="row search_bar">
                                <div class="col-lg-8 col-md-8 px-0">
                                    <div class="row col-md-12">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group mb-2 mr-2">
                                                <label for="search_level" class="mr-2">ประเภทผู้ใช้งาน</label>
                                                <select id="search_level" name="search_level" class="form-control"
                                                    style="min-width: 150px">
                                                    <option value="" selected>ทั้งหมด</option>
                                                    @foreach ($level as $levels)
                                                        <option value='{{ $levels->levelID }}'>{{ $levels->levelName }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group mb-2 mr-2">
                                                <label for="search_fac" class="mr-2">คณะ</label>
                                                <select id="search_fac" name="search_fac" class="form-control"
                                                    style="min-width: 150px">
                                                    <option selected value="">ทั้งหมด</option>
                                                    @foreach ($fac as $facs)
                                                        <option value='{{ $facs->idfactory }}'>{{ $facs->factoryName }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group mb-2 mr-2">
                                                <label for="search_bench" class="mr-2">สาขา</label>
                                                <select id="search_bench" name="search_bench"
                                                    class="form-control search-branch" style="min-width: 150px">
                                                    <option selected value="">ทั้งหมด</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 px-0 row text-right">
                                    <label for="search-user" class="col-3 px-0 col-form-label">ค้นหา: </label>
                                    <div class="col-9 pr-0">
                                        <input type="text" class="form-control" id="search-user" name="search-user">
                                    </div>
                                </div>
                            </div>

                            <div class="posts">
                                @include('officer.edittqf')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">แก้ไขข้อมูลผู้ใช้งาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="edituser modal-body">
                    <form class="form-horizontal" method="post">
                        @csrf
                        <input type="hidden" id="session" name="session" value="{{ session('data')->userID }}">
                        <input type="hidden" id="uid" name="uid" value="0">
                        <input type="hidden" id="username" name="username">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="form-control-label" for="prefix">คำนำหน้า</label>
                                <input type="text" id="prefix" name="prefix" class="form-control">
                                {{-- <select name="prefix" id="prefix" class="form-control">
                                    <option value='นาย'>นาย</option>
                                    <option value='นางสาว'>นางสาว</option>
                                    <option value='นาง'>นาง</option>
                                </select> --}}
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-control-label">ชื่อ</label>
                                <input type="text" id="fname" name="fname" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label class="form-control-label">นามสกุล</label>
                                <input type="text" id="lname" name="lname" class="form-control">
                            </div>
                        </div>
                        <div id="formtitle" class="form-group" style="display: none">
                            <label for="title">ตำแหน่งทางวิชาการ</label>
                            <select class="form-control" id="title" name="title">
                                <option selected disabled value="">เลือก...</option>
                                {{-- @foreach ($level as $item) --}}
                                <option value="{{ json_encode(['อ.', 'อาจารย์']) }}">อาจารย์</option>
                                <option value="{{ json_encode(['ผศ.', 'ผู้ช่วยศาสตราจารย์']) }}">ผู้ช่วยศาสตราจารย์
                                </option>
                                <option value="{{ json_encode(['รศ.', 'รองศาสตราจารย์']) }}">รองศาสตราจารย์</option>
                                <option value="{{ json_encode(['ศ.', 'ศาสตราจารย์']) }}">ศาสตราจารย์</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="fac">คณะ</label>
                            <select name="fac" id="fac" class="form-control">
                                <option selected disabled value="">เลือกคณะ...</option>
                                @foreach ($fac as $facs)
                                    <option value='{{ $facs->idfactory }}'>{{ $facs->factoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="ben">สาขา</label>
                            <select name="ben" id="ben" class="form-control branch">
                                <option selected disabled value="">เลือกสาขา...</option>
                                @foreach ($ben as $bens)
                                    <option value='{{ $bens->idBranch }}'>{{ $bens->branchName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="formchairman" style="display: none">
                            <label class="form-control-label" for="chairman">สิทธิ์เข้าใช้งาน</label>
                            <select name="chairman" id="chairman" class="form-control">
                                <option selected disabled value="">เลือกข้อมูล</option>
                                <option value='0'>ผู้รับผิดชอบรายวิชา</option>
                                <option value='1'>ประธานหลักสูตร</option>
                            </select>
                        </div>
                        <div class="form-group" style="display: none" id="form_is_editor">
                            <label class="form-control-label" for="level">สิทธิ์การเข้าถึง</label>
                            <select name="is_editor" id="is_editor" class="form-control">
                                <option value='0'>ดูอย่างเดียว</option>
                                @if (session('data')->is_editor == 1)
                                    <option value='1'>สามารถแก้ไขได้</option>
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="level">ประเภทผู้ใช้งาน</label>
                            <select name="level" id="level" class="form-control" disabled>
                                @foreach ($level as $levels)
                                    <option value='{{ $levels->levelID }}'>{{ $levels->levelName }}</option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="edituser-submit btn btn-success">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $('#fac').change(function() {
            if ($(this).val() != '') {
                var select = $(this).val();
                var _token = $('input[name=_token]').val();
                console.log(select);
                $.ajax({
                    url: "/fetch_branch",
                    method: "post",
                    data: {
                        _token: _token,
                        select: select
                    },
                    success: function(res) {
                        $('.branch').html(res);
                    }
                });
            }

        });

        $('#search_fac').change(function() {
            // if ($(this).val() != '') {
                var select = $(this).val();
                var _token = $('input[name=_token]').val();
                console.log(select);
                $.ajax({
                    url: "/fetch_branch?search=1",
                    method: "post",
                    data: {
                        _token: _token,
                        select: select
                    },
                    success: function(res) {
                        $('.search-branch').html(res);
                    }
                });
            // }

        });

        $(document).on('change', ".search_bar select", function(e) {
            e.preventDefault();
            // console.log($(this).val())
            var url = window.location.href + '?search=' + $('#search-user').val() + '&&fac=' +
                $('#search_fac').val() + '&&branch=' + $('#search_bench').val() +
                '&&level=' + $('#search_level').val();
            // window.history.pushState("", "", url);
            // console.log(url);
            setTimeout(() => {
                loadPosts(url);
            }, 500);
        });

        $(document).on('input', ".search_bar #search-user", function(e) {
            e.preventDefault();
            // console.log($(this).val())
            var url = window.location.href + '?search=' + $(this).val();
            // window.history.pushState("", "", url);
            // console.log(url);
            setTimeout(() => {
                loadPosts(url);
                if ({{ Request::is('user') ? 1 : 0 }} == 1 && {{ session('data')->is_editor }} == 0) {
                    // $("input").attr("readonly", "true");
                    $("#edit-modal button").prop("disabled", false);
                    // $("#edit-modal input").prop("readonly", true);
                    $(".edit_data").prop("disabled", false);
                    console.log(322);

                }
                if ({{ Request::is('subject') ? 1 : 0 }} == 1 && {{ session('data')->is_editor }} == 0) {
                    // $("input").attr("readonly", "true");
                    console.log(322);
                    $("button").prop("disabled", true);

                }
            }, 300);

        });

        $(document).on('click', '.del_data', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'ยืนยันการลบ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "/delete_user/" + id,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'ลบข้อมูลสำเร็จ',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 300);
                            } else {
                                Swal.fire({
                                    title: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                });
                            }

                        }
                    });
                }
            })

        });

        if ({{ Request::is('user') }} == 1) {
            // if ({{ session('data')->is_editor }} == 0) {
            // $("input").attr("readonly", "true");
            // $("#edit-modal button").prop("disabled", false);
            // $("#edit-modal input").prop("readonly", true);
            // $(".edit_data").prop("disabled", false);
            // }
        }
    </script>
@endsection
