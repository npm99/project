@extends('template.officer')

@section('m1', 'active')
@section('course', 'active')

@section('textpage', 'เพิ่มหลักสูตร')

@section('content')
    <div style="margin-top: 10px"></div>
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="sub-tab1" data-toggle="tab" href="#tab1" role="tab"
                aria-controls="หลักสูตร" aria-selected="true">หลักสูตร</a>
            <a class="nav-item nav-link" id="course-tab2" data-toggle="tab" href="#tab2" role="tab"
                aria-controls="หลักสูตร" aria-selected="true">จัดกลุ่มหลักสูตร</a>
        </div>
    </nav>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="tab-content px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                        <h3 class="h5">หลักสูตร</h3>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editCourse">
                                            เพิ่ม
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <span>หากผู้ใช้งานเพิ่มหลักสูตรแล้ว
                                            กรุณาจัดกลุ่มหลักสูตรให้เรียบร้อย</span><br>
                                        <span>**หากกลุ่มเรียนไม่ถูกจัดกลุ่ม
                                            กลุ่มเรียนนั้นจะไม่แสดงในการสรุปผลการจัดทำรายงาน มคอ.5 และ มคอ.6</span>
                                    </div>
                                    <br>
                                    <table id="example" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อหลักสูตร</th>
                                                <th>จำนวนปีของหลักสูตร(ปี)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($course as $key => $item)
                                                <tr>
                                                    <td style="text-align:center;">{{ $key + 1 }}</td>
                                                    <td>{{ $item->courseName }}</td>
                                                    <td style="text-align:center;">{{ $item->courseNumber }}</td>

                                                    <td style="text-align: center">
                                                        <button class="btn btn-success btn-sm rounded-1 text-center"
                                                            type="button" title="แก้ไข" data-toggle="modal"
                                                            data-target="#editCourse{{ $key }}">แก้ไข
                                                            {{-- <i class="fa fa-edit"></i> --}}
                                                        </button>
                                                        <button
                                                            class="btn btn-danger btn-sm rounded-1 text-center delete-course"
                                                            type="button" title="ลบ" data-key="{{ $item->c_id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <div class="modal fade" id="editCourse{{ $key }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">เพิ่มหลักสูตร</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group addcourse">
                                                                            <form class="form-horizontal">
                                                                                @csrf
                                                                                <input name="cid"
                                                                                    value="{{ $item->c_id }}" hidden>
                                                                                <div class="form-group row">
                                                                                    <label style="text-align: end"
                                                                                        class="col-sm-4 form-control-label">หลักสูตร</label>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="form-group"
                                                                                            style="margin-bottom: 0px">
                                                                                            <input class="form-control "
                                                                                                maxlength="80"
                                                                                                type="text"
                                                                                                id="course"
                                                                                                name="course"
                                                                                                value="{{ $item->courseName }}">
                                                                                        </div>
                                                                                        <span style="color: red"
                                                                                            class="course_empty"
                                                                                            id="course_empty"></span>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label style="text-align: end"
                                                                                        class="col-sm-4 form-control-label">จำนวนปีของหลักสูตร(ปี)</label>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="form-group"
                                                                                            style="margin-bottom: 0px">
                                                                                            <input class="form-control "
                                                                                                type="number"
                                                                                                id="numcourse"
                                                                                                value="{{ $item->courseNumber }}"
                                                                                                name="numcourse"
                                                                                                min="1"
                                                                                                max="10"
                                                                                                onkeypress="return !(event.charCode == 45||event.charCode == 46)">
                                                                                        </div>
                                                                                        <span style="color: red"
                                                                                            class="numcourse_empty"
                                                                                            id="numcourse_empty"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success course-submit"
                                                                            data-key="{{ $key }}">บันทึก</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ปิดออก</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- <p>{{ print_r($course) }}</p> --}}

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">จัดกลุ่มหลักสูตร</h4>
                                </div>
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อหลักสูตร</th>
                                                <th>จำนวนปีของหลักสูตร(ปี)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($course as $key => $item)
                                                <tr>
                                                    <td style="text-align:center;">{{ $key + 1 }}</td>
                                                    <td>{{ $item->courseName }}</td>
                                                    <td style="text-align:center;">{{ $item->courseNumber }}</td>

                                                    <td style="text-align: center">
                                                        <button class="btn btn-success btn-sm rounded-1 text-center"
                                                            type="button" title="จัดกลุ่ม" data-toggle="modal"
                                                            data-target="#addgroupcorse"
                                                            data-arr="{{ json_encode($item->group_course) }}"
                                                            data-text="{{ $item->courseName }}"
                                                            data-course-id="{{ $item->c_id }}">
                                                            <i class="bi bi-collection"></i></i></button>
                                                    </td>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- <p>{{ print_r($course) }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addgroupcorse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">จัดกลุ่มหลักสูตร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="padding:0 20px;display: flex;justify-content: space-between;">
                        <span id="text-course" style="color: rgb(29, 29, 255)"></span>
                        <div>
                            <button class="btn btn-primary btn-sm" id="show-modal-groupcorse" type="button"
                                data-toggle="modal" data-target="#groupcorse">เลือกกลุ่มเรียน</button>
                            <button style="display: none;" class="btn btn-danger btn-sm" id="edit-course"
                                type="button">แก้ไข</button>
                        </div>

                    </div>

                    <form class="groupcourse" method="post">
                        @csrf
                        <input name="courseid" id="courseid" value="0" hidden>
                        <table class="table-sm table-borderless" style="margin: 10px 60px;width: 70%;">
                            <tbody id="list-course">

                            </tbody>
                        </table>
                        <br>
                        <div class="justify-content-between">
                            <center>
                                <button class="btn btn-success btn-sm" id="groubcourse-submit">บันทึกการจัดกลุ่ม</button>
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">ปิดออก</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="groupcorse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เลือกกลุ่มเรียน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>กลุ่มเรียน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="list-group-select">
                            @foreach ($group as $key => $item)
                                <tr data-group-id="{{ $item->groupID }}">
                                    {{-- <td style="text-align:center;">{{ $key + 1 }}</td> --}}
                                    <td style="text-align: center">
                                        {{ $item->groupname }}</td>
                                    {{-- <td style="text-align:center;">{{ $item->courseNumber }}</td> --}}

                                    <td style="text-align: center">
                                        <button class="btn btn-success btn-sm rounded-1 text-center select-group"
                                            data-group="{{ $item }}" type="button"
                                            title="เลือก">เลือก</button>
                                        {{-- @if ($item->course_id != '')
                                            <span>จัดกลุ่มแล้ว</span>
                                        @endif --}}
                                    </td>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="justify-content-between">
                        <center>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">ปิดออก</button>
                        </center>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เพิ่มหลักสูตร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group addcourse">
                        <form class="form-horizontal">
                            @csrf
                            <input name="cid" value="0" hidden>
                            {{-- <label class="form-control-label" for="course" id="inputcode">หลักสูตร</label>
                            <input type="text" name="course" id="course" placeholder="หลักสูตร" required>
                            <button class="btn btn-success term-submit">เพิ่ม</button></br> --}}
                            <div class="form-group row">
                                <label style="text-align: end" class="col-sm-4 form-control-label">หลักสูตร</label>
                                <div class="col-sm-8">
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <input class="form-control " type="text" id="course" name="course"
                                            maxlength="80" placeholder="วิศวกรรมศาสตรบัณฑิต (3ปี/เทียบโอน)">
                                    </div>
                                    <span style="color: red" class="course_empty" id="course_empty"></span>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label style="text-align: end"
                                    class="col-sm-4 form-control-label">จำนวนปีของหลักสูตร(ปี)</label>
                                <div class="col-sm-8">
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <input class="form-control " type="number" id="numcourse"
                                            placeholder="กรอกตัวเลข" name="numcourse" min="1" max="10"
                                            onkeypress="return !(event.charCode == 45)||!(event.charCode == 46)">
                                    </div>

                                    <span style="color: red" class="numcourse_empty" id="numcourse_empty"></span>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success course-submit" data-key="">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var outData = [];
        $('.modal').on('hidden.bs.modal', function(e) {
            $(document).find('.numcourse_empty').each(function(index, element) {
                $(this).text('');
                console.log($(this));
            });
            $(document).find('.course_empty').each(function(index, element) {
                $(this).text('');
                console.log($(this));
            });
        });

        $("input[name='course']").on('input change', function() { //[0-9]
            $(this).val($(this).val().replace(/([-.'"*+?^=!;;,%฿:`${}|\[\]\\])/g, ''));
    });

    $('[name="numcourse"]').on('input change', function() {
        $(this).val($(this).val().replace(/([-.'"*+?^=!;;,%฿:`${}()|\[\]\/\\])/g, ''));
            if ($(this).val() > 10) {
                $(this).val(10)
            }
        });

        $(document).on('click', '.delete-course', function(e) {
            e.preventDefault();
            const id = $(this).data('key');
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
                        url: "/delete_course/" + id,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'ลบข้อมูลสำเร็จ',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                }).then((result) => {
                                    location.reload();
                                });
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

        $('#addgroupcorse').on('click', 'table tbody tr', function(e) {
            e.preventDefault();
            // var data = $(e.currentTarget).data('group');
            // console.log(this.id);
            if (this.id == 'delete') {
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
                        var data = $(this).data('id');
                        var text = $(this).find('td:nth-child(1)').text();
                        // console.log(text)
                        $(this).remove();
                        if (!outData.includes(data)) {
                            outData.push(data)
                        }
                    }
                });


                // $.ajax({
                //     type: "post",
                //     url: "/del_groupcourse",
                //     data: {
                //         id: data
                //     },
                //     dataType: "json",
                //     success: function(response) {

                //     }
                // });
            } else {
                // $(this).remove();
                // var data = $(e.currentTarget).data('id');
                // // console.log(data)
                // $('#list-group-select').find('tr').each(function(index, element) {
                //     // element == this
                //     var row = $(element).data('group-id');
                //     // console.log(this)
                //     if (row == data) {
                //         $(this).show();
                //     }
                //     // if()
                // });
            }

        });



        $('#addgroupcorse').on('show.bs.modal', function(e) {
            //get data-id attribute of the clicked element
            var text = $(e.relatedTarget).data('text');
            var c_id = $(e.relatedTarget).data('course-id');
            var arr = $(e.relatedTarget).data('arr');

            //populate the textbox
            $(e.currentTarget).find('#text-course').text('เลือกกลุ่มเรียนที่อยู่ในหลักสูตร' + text);
            $(e.currentTarget).find('#courseid').val(c_id);
            if (arr.length != 0) {
                $('#edit-course ').attr('data-course-arr', JSON.stringify(arr));
                $('#edit-course').show();
                for (let index = 0; index < arr.length; index++) {
                    const data = arr[index];
                    var row = '<tr data-id="' + data.groupID + '" >' +
                        '<td><i style="color: #0548c1d1;" class="bi bi-check-circle-fill"></i>&nbsp;&nbsp;' + data
                        .groupname + '</td>' +
                        '<td></td>' +
                        '</tr>';
                    $('#list-course').append(row);
                    $('#list-group-select').find('tr').each(function(index, element) {
                        // element == this
                        var row = $(element).data('group-id');
                        // console.log(this)
                        if (row == data.groupID) {
                            $(this).hide();
                        }

                        // if()
                    });

                }
            } else {
                $('#edit-course').hide();
            }
        });

        $('#addgroupcorse').on('hidden.bs.modal', function(e) {

            $('#list-course tr').remove();
            $('#show-modal-groupcorse').show();
            outData = [];
            $('#groubcourse-edit').attr("id", "groubcourse-submit");
            $('#groubcourse-submit:contains("บันทึกการแก้ไข")').text('บันทึกการจัดกลุ่ม');
        });

        $('.select-group').click(function(e) {
            e.preventDefault();
            var data = $(e.currentTarget).data('group');
            // console.log(data.groupname)
            var row = '<tr data-id="' + data.groupID + '" >' +
                '<td><i style="color: #0548c1d1;" class="bi bi-check-circle-fill"></i>&nbsp;&nbsp;' + data
                .groupname + '</td>' +
                '<td id="delele-group"><button type="button" class="btn"><i style="color: red;" class="bi bi-x-square"></i></button></td>' +
                '</tr>';
            $('#list-course').append(row);
            $('#list-group-select').find('tr').each(function(index, element) {
                // element == this
                var row = $(element).data('group-id');
                // console.log(this)
                if (row == data.groupID) {
                    $(this).hide();
                }

                // if()
            });
        });

        $(document).on('click', '#groubcourse-submit', function(e) {
            var group_data = [];
            var id_course = $('.groupcourse').find('#courseid').val()
            e.preventDefault();
            $('#list-course').find('tr').each(function(index, element) {
                // element == this
                var id = $(this).data('id');

                if (!group_data.includes(id)) {
                    group_data.push(id);
                }
            });

            var data = {
                idcourse: id_course,
                arr_group: JSON.stringify(group_data)
            }
            // console.log(data)
            $.ajax({
                type: "post",
                url: "/add_groupcourse",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'จัดกลุ่มหลักสูตรสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            sessionStorage.setItem('save_course', true);
                            location.reload();
                        }, 300);
                    } else {
                        Swal.fire({
                            title: 'จัดกลุ่มหลักสูตรไม่สำเร็จ',
                            icon: 'error',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        })
                    }
                }
            });
        });

        $('#edit-course').click(function(e) {
            e.preventDefault();
            var arr = $(this).data('course-arr');
            // $(e.currentTarget).find('.').val(c_id);
            // console.log(arr)
            if (arr.length != 0) {
                $('#show-modal-groupcorse').hide();
                $('#list-course  tr').remove();
                for (let index = 0; index < arr.length; index++) {
                    const data = arr[index];
                    var row = '<tr id="delete" data-id="' + data.groupID + '" >' +
                        '<td><i style="color: #0548c1d1;" class="bi bi-check-circle-fill"></i>&nbsp;&nbsp;' + data
                        .groupname + '</td>' +
                        '<td><button type="button" class="btn btn-danger btn-sm"><small>นำออก</small></button></td>' +
                        '</tr>';
                    $('#list-course').append(row);
                    // $('#groubcourse-submit').removeClass('groubcourse-submit').addClass('groubcourse-edit');
                    $('#groubcourse-submit').attr("id", "groubcourse-edit");
                    $('#groubcourse-edit:contains("บันทึกการจัดกลุ่ม")').text('บันทึกการแก้ไข');

                }
            }
        });

        $(document).on('click', '#groubcourse-edit', function(e) {
            e.preventDefault();
            console.log(outData)

            $.ajax({
                type: "post",
                url: "/del_groupcourse",
                data: {
                    id: JSON.stringify(outData)
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'แก้ไขกลุ่มหลักสูตรสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            sessionStorage.setItem('save_course', true);
                            location.reload();
                        }, 300);


                    } else {
                        Swal.fire({
                            title: 'แก้ไขกลุ่มหลักสูตรไม่สำเร็จ',
                            icon: 'error',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        })
                    }

                }
            });
        });
    </script>
@endsection
