@extends('template.officer')

@section('m1', 'active')
@section('sub', 'active')

@section('textpage', 'เพิ่มรายวิชา')

@section('content')
    <div style="margin-top: 10px"></div>
    {{-- <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="sub-tab1" data-toggle="tab" href="#tab1" role="tab"
                aria-controls="รายวิชา" aria-selected="true">รายวิชา</a>
            <a class="nav-item nav-link" id="course-tab2" data-toggle="tab" href="#tab2" role="tab" aria-controls="หลักสูตร"
                aria-selected="true">หลักสูตร</a>
        </div>
    </nav> --}}

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    {{-- <div class="tab-content px-3 px-sm-0" id="nav-tabContent"> --}}
                    {{-- <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab"> --}}
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                <h3 class="h5">รายวิชา</h3>
                                <span>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addsub"><i
                                            class="fa fa-plus-circle"></i>
                                        เพิ่มรายวิชา</button>


                                    <button class="btn btn-success dropdown-toggle btn-sm" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        นำเข้า
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" id="import_file">นำเข้า</a>
                                        <a class="dropdown-item"
                                            href="{{ url('download/import_subject.csv') }}">ตัวอย่างไฟล์นำเข้า</a>
                                    </div>

                                </span>
                            </div>

                        </div>
                        <input type="file" id="file" name="import_file" hidden>
                        <button onclick="onImport()" id="click_import" type="button" hidden></button>

                        <div class="card-body">
                            @include('index.search')
                            <div class="posts">
                                @include('officer.edittqf')
                            </div>

                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">หลักสูตร</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group addcourse">
                                        <form class="form-horizontal">
                                            @csrf
                                            <input name="cid" value="0" hidden>
                                
                                            <div class="form-group row">
                                                <label style="text-align: end"
                                                    class="col-sm-2 form-control-label">หลักสูตร</label>
                                                <div class="col-sm-4">
                                                    <div class="form-group" style="margin-bottom: 0px">
                                                        <input class="form-control " type="text" id="course" name="course"
                                                            placeholder="วิศวกรรมศาสตรบัณฑิต (3ปี/เทียบโอน)">
                                                    </div>
                                                    <span style="color: red" id="course_empty"></span>
                                                </div>
                                                <label style="text-align: end"
                                                    class="col-sm-2 form-control-label">จำนวนปีของหลักสูตร(ปี)</label>
                                                <div class="col-sm-2">
                                                    <div class="form-group" style="margin-bottom: 0px">
                                                        <input class="form-control " type="number" id="numcourse"
                                                            placeholder="กรอกตัวเลข" name="numcourse">
                                                    </div>
                                                    <span style="color: red" id="numcourse_empty"></span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-success course-submit">เพิ่ม</button>
                                                </div>
                                            </div>
                                            <br>
                                        </form>

                                    </div>
                                    <br>
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
                                                            type="button" title="แก้ไข"
                                                            onclick="editcourse('{{ $item->c_id }}','{{ $item->courseName }}','{{ $item->courseNumber }}')"
                                                            >
                                                            <i class="fa fa-edit"></i></button>
                                                    </td>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายวิชา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="addsub" method="post">
                        @csrf
                        <input name="id" value="0" hidden>
                        <div class="form-group">
                            <label for="idsub">รหัสวิชา</label>
                            <input type="text" class="form-control" id="idsub" name="idsub" minlength="10"
                                maxlength="150" placeholder="00-000-011-001">
                            <span id="show1" style="color: red;display:none;">กรุณากรอกรหัสวิชา</span>
                        </div>
                        <div class="form-group">
                            <label for="thsub">ชื่อวิชาภาษาไทย</label>
                            <input type="text" class="form-control" id="thsub" name="thsub" maxlength="150"
                                placeholder="พลวัตทางสังคมกับการดำรงชีวิตอย่างมีความสุข">
                            <span id="show2" style="color: red;display:none;">กรุณากรอกชื่อวิชาภาษาไทย</span>
                        </div>
                        <div class="form-group">
                            <label for="ensub">ชื่อวิชาภาษาอังกฤษ</label>
                            <input type="text" class="form-control" id="ensub" name="ensub" maxlength="150"
                                placeholder="Social Dynamics and Happy Living">
                            <span id="show3" style="color: red;display:none;">กรุณากรอกชื่อวิชาภาษาอังกฤษ</span>
                        </div>
                        {{-- <div class="form-group">
                            <label for="groub">กลุ่มเรียน</label>
                            <input type="text" class="form-control" id="groub" name="groub" placeholder="ECP2N">
                            <span id="show4" style="color: red;display:none;">กรุณากรอกกลุ่มเรียน</span>
                        </div> --}}
                        <div class="form-group">
                            <label for="credit">หน่วยกิต</label>
                            <input type="text" class="form-control" maxlength="10" id="credit" name="credit"
                                placeholder="3(3-0-6)">
                            <span id="show5" style="color: red;display:none;">กรุณากรอกหน่วยกิต</span>
                        </div>
                        <div class="form-group">
                            <label for="subnum">สภาพวิชา</label>
                            <input type="text" class="form-control" id="subnum" name="subnum"
                                onkeypress="return !(event.charCode == 45)" placeholder="1.2" min="0.1"
                                maxlength="8" max="10">
                            <span id="show6" style="color: red;display:none;">กรุณากรอกสภาพวิชา</span>
                        </div>
                        {{-- <br>
                        <div class="justify-content-between">
                            <center>

                            </center>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success sub-submit">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $("input[name='idsub'], input[name='thsub'], input[name='ensub']").on('input change', function() { //[0-9]
            $(this).val($(this).val().replace(/([.'"*+?^=!;;,%฿:`${}()|\[\]\/\\])/g, ''));
        console.log(3);
    });

    $(document).on('click', '.delete-sub', function(e) {
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
                    url: "/delete_sub/" + id,
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

    $('#addsub').on('hidden.bs.modal', function(e) {
        $('.addsub').find('input').each(function(index, element) {
            $(this).removeClass('error');
            $('#show' + (index - 1)).hide();
        });
    })

    $("input[name=credit]").on("input change", function(e) {
        var num = $(this).val().replace(/\D/g, '');
        $(this).val(num);
        console.log($(this).val()); // /[^a-zA-Z0-9]/g/[^0-9()-]/g/[^0-9\.]/g/[^0-9()-]/g
        $(this).val(
            (num.substring(0, 1)) +
            (num.length > 1 ? '(' + num.substring(1, 2) : num.substring(1, 2)) +
            (num.length > 2 ? '-' + num.substring(2, 3) : num.substring(2, 3)) +
            (num.length > 3 ? '-' + num.substring(3, 4) + ')' : num.substring(3, 4))
            // +(num.length > 4 ? '-' + num.substring(4, 5) + ')' : num.substring(4, 5))
        );
    })

    $('[type="number"]').on('input change', function(e) {
        if ($(this).val() < 0) {
            $(this).val('');
        }
    });

    $('[name="subnum"]').on('input change', function() {
        var num = $(this).val().replace(/[^0-9.]/g, '');
        $(this).val(num);
        console.log($(this).val()); // /[^a-zA-Z0-9]/g/[^0-9()-]/g/[^0-9\.]/g/[^0-9()-]/g
        if (this.value.length > 10)
            this.value = this.value.slice(0, 10);
    });

    $("input[name=idsub]").on("input change", function(e) {
        var num = $(this).val().replace(/\D/g, '');
        $(this).val(
            (num.substring(0, 2)) +
            (num.length > 2 ? '-' + num.substring(2, 5) : num.substring(2, 5)) +
            (num.length > 5 ? '-' + num.substring(5, 8) : num.substring(5, 8)) +
            (num.length > 8 ? '-' + num.substring(8, 11) : num.substring(8, 11))
        );
        console.log($(this).val());
    })

    var obj = `{!! $sub !!}`;
        // console.log(obj);
        var data = JSON.parse(obj) //.replace(/&quot;/g, '"')
        let thsub = [];
        let ensub = [];
        let groub = [];
        let credit = [];
        let sub_id = [];

        $.each(data, function(key, value) {
            if (!thsub.includes(value.THsubject)) {
                thsub.push(value.THsubject);
            }
            if (!ensub.includes(value.ENsubject)) {
                ensub.push(value.ENsubject);
            }

            if (!credit.includes(value.cradit)) {
                credit.push(value.cradit);
            }
            if (!sub_id.includes(value.subjectCode)) {
                sub_id.push(value.subjectCode);
            }

            // console.log(sub_id, credit, ensub, thsub);
        });

        // var group = '{!! $group !!}';
        // var _data = JSON.parse(group)//.replace(/&quot;/g, '"')
        // $.each(_data, function(key, value) {
        //     if (!groub.includes(value.groupname)) {
        //         groub.push(value.groupname);
        //     }
        // });

        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("thsub"), thsub);
        autocomplete(document.getElementById("ensub"), ensub);
        // autocomplete(document.getElementById("groub"), groub);
        autocomplete(document.getElementById("credit"), credit);
        autocomplete(document.getElementById("idsub"), sub_id);
    </script>
@endsection
