@extends('template.teacher')

@section('tqf3', 'active')

@section('textpage', 'บันทึกมคอ.3')

@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-lg-12 row">
                                <div class="col-lg-10 col-md-12">
                                    <h4 class="h5">รายละเอียดรายวิชา (มคอ.3)</h4>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <form class="form-inline" id="search" action="tqf3" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="year">ภาคเรียน</label>
                                            <select class="form-control ml-2" id="year" name="year">
                                                <option selected disabled>เลือกข้อมูล</option>
                                                @foreach ($year as $y)
                                                    <option value="{{ $y->idYear }}"
                                                        @if ($y_id == $y->idYear) selected @endif>
                                                        {{ $y->term }} /
                                                        {{ $y->Year }}</option>
                                                @endforeach

                                            </select>
                                            <button type="submit" hidden class="btn btn-primary btn-sm ml-2">ค้นหา</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead class="headtable">
                                        <tr>
                                            <th rowspan="2" style="width: 50px">ภาคเรียนที่</th>
                                            <th rowspan="2">รหัสวิชา</th>
                                            <th rowspan="2">ชื่อวิชา</th>
                                            <th rowspan="2" style="width: 50px">หน่วยกิต</th>
                                            <th rowspan="2" style="width: 50px">กลุ่มเรียน</th>
                                            {{-- <th rowspan="2" style="width: 50px">ชื่ออาจารย์</th> --}}
                                            <th colspan="7">สถานะหมวดหมู่ มคอ.3</th>
                                            <!--                                            <th rowspan="2">อาจารย์ผู้สอน</th>-->
                                            <th rowspan="2">วันที่สิ้นสุด<br>การส่งมคอ.</th>
                                            <th rowspan="2" style="width: 10px">สถานะ</th>
                                            <th rowspan="2"></th>
                                        </tr>
                                        <tr>
                                            <td class="px-2">1</td>
                                            <td class="px-2">2</td>
                                            <td class="px-2">3</td>
                                            <td class="px-2">4</td>
                                            <td class="px-2">5</td>
                                            <td class="px-2">6</td>
                                            <td class="px-2">7</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tqf as $item)
                                            <tr>
                                                <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                                <td>{{ isset($item->subsubject->subjectCode) ? $item->subsubject->subjectCode : 'ไม่พบรายวิชา' }}
                                                </td>
                                                <td>{{ isset($item->subsubject->THsubject) ? $item->subsubject->THsubject : '' }}<br>{{ isset($item->subsubject->ENsubject) ? $item->subsubject->ENsubject : '' }}
                                                </td>
                                                <td>{{ isset($item->subsubject->cradit) ? $item->subsubject->cradit : '' }}
                                                </td>
                                                <td>{{ isset($item->group->groupname) ? $item->group->groupname : '' }}
                                                </td>
                                                {{-- <td></td> --}}
                                                @if ($item->filetqf3 != '' && $item->send_file == 1)
                                                    <td colspan="7">
                                                        <center>ส่งไฟล์มคอ. 3 แล้ว</center>
                                                    </td>
                                                    <td style="display:none"> </td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                @else
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_1) && $item->tqf3_1->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_2) && $item->tqf3_2->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_3) && $item->tqf3_3->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_4) && $item->tqf3_4->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_5) && $item->tqf3_5->status == 1)
                                                            @if (isset($item->tqf3_5) && $item->tqf3_5->status == 1)
                                                                @if (isset($item->tqf3_5->data1))
                                                                    @if (count(json_decode(unserialize($item->tqf3_5->data1))) < 15 || $item->tqf3_5->data2 == '')
                                                                        <i class="fa fa-times-rectangle fail">
                                                                        @else
                                                                            <i class="fa fa-check-square successs">
                                                                    @endif
                                                                @else
                                                                    <i class="fa fa-times-rectangle fail">
                                                                @endif
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                            @endif
                                                        @else
                                                            <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_6) && $item->tqf3_6->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf3_7) && $item->tqf3_7->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                @endif
                                                <td class="text-center">{{ formatDateThai($item->deadline) }}
                                                    <br>
                                                    @if (strtotime($item->deadline) < strtotime(date('Y-m-d')))
                                                        <span class="badge badge-danger">สิ้นสุดกำหนดส่ง</span>
                                                    @endif
                                                </td>
                                                @if ($item->status == 0)
                                                    <td style="text-align: center;font-size:14px;color:white">
                                                        <span class="badge bg-secondary">ยังไม่จัดทำ</span>
                                                    </td>
                                                @elseif ($item->status == 1)
                                                    <td style="text-align: center;font-size:14px;">
                                                        <span class="badge bg-warning">รอการตรวจสอบ</span>
                                                    </td>
                                                @elseif ($item->status == 2)
                                                    <td style="text-align: center;font-size:14px;color:white">
                                                        <span class="badge bg-success">ถูกต้อง</span>
                                                    </td>
                                                @elseif ($item->status == 3)
                                                    <td style="text-align: center;font-size:14px;">
                                                        <span class="badge bg-danger mb-1">ส่งกลับแก้ไข</span>
                                                        <a href="#status{{ $item->tqf3ID }}" data-toggle="modal"
                                                            class="btn btn-secondary btn-sm"
                                                            style="font-size: 12px;">ความคิดเห็น</a>
                                                        <div class="modal fade" id="status{{ $item->tqf3ID }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            รายละเอียดการแก้ไข</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="text-left">{{ $item->comment }}</div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ปิดออก</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @elseif ($item->status == 4)
                                                    <td style="text-align: center;font-size:14px;">
                                                        <span class="badge bg-info">กำลังจัดทำ</span>
                                                    </td>
                                                @endif
                                                <td class="tqfstatus">
                                                    <!-- Call to action buttons -->
                                                    <ul class="list-inline m-0">
                                                        {{-- @if ($item->status != 2) --}}
                                                        {{-- @if ($item->filetqf3 == '' || $item->filetqf3 == null) --}}
                                                        @if (!($item->send_file == 1 && $item->status == 1))
                                                            <li class="inline-item mb-1">
                                                                <a href="{{ url('tqf/addtqf3/' . $item->tqf3ID) }}"
                                                                    class="btn btn-success btn-sm rounded-1"
                                                                    type="button" data-toggle="tooltip"
                                                                    data-placement="top" title="บันทึกมคอ.3">
                                                                    <i class="fa fa-table"></i></a>
                                                            </li>
                                                        @endif {{-- @if ($item->status == 1) disabled="disabled" @endif --}}
                                                        @if ($item->status == 4)
                                                            <li class="inline-item mb-1">
                                                                <button
                                                                    class="btn btn-success btn-sm rounded-1 save_status"
                                                                    type="button" data-toggle="tooltip"
                                                                    style="background-color: #4ea711b5;"
                                                                    data-id="{{ $item->tqf3ID }}" title="ยืนยันมคอ.3">
                                                                    <svg width="15" height="20" version="1.1"
                                                                        viewBox="120 0 450 600"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="white">
                                                                        <g>
                                                                            <path
                                                                                d="m559.98 17.5c9.6719-0.007812 17.516 7.8281 17.516 17.5v140.04c0 23.344-35.016 23.344-35.016 0v-122.54h-262.5v70.016c0 28.781-23.668 52.449-52.449 52.449h-70.016v332.52h384.96v-122.45c0-23.344 35.016-23.344 35.016 0v139.96c0 9.6719-7.8477 17.508-17.516 17.5l-419.97 0.003906c-9.6641 0-17.5-7.8359-17.5-17.5v-367.46c-0.015625-4.6484 1.8164-9.1133 5.0938-12.406l122.54-122.54c3.2969-3.2773 7.7578-5.1094 12.406-5.0938zm-314.93 59.73-62.805 62.805h45.289c10 0 17.516-7.5195 17.516-17.516z">
                                                                            </path>
                                                                            <path
                                                                                d="m437.86 175c-4.7031-0.097656-9.2461 1.7031-12.605 4.9961-3.3594 3.293-5.2539 7.8008-5.2539 12.504v35h-35c-40.832 0-73.32 21.559-93.309 51.543-19.988 29.984-29.191 68.039-29.191 105.96 0 5.293 2.3984 10.305 6.5234 13.625 4.1211 3.3242 9.5273 4.5977 14.703 3.4727 5.1719-1.1289 9.5586-4.5352 11.93-9.2734 0 0 31.012-60.328 89.348-60.328h35v35l-0.003906 0.003906c0.003906 4.3047 1.5938 8.4609 4.4688 11.668 2.8711 3.207 6.8281 5.2422 11.109 5.7148 4.2812 0.47656 8.5859-0.64453 12.09-3.1484l122.5-87.5c4.5938-3.2852 7.3203-8.5859 7.3203-14.234s-2.7266-10.949-7.3203-14.238l-122.5-87.5c-2.8672-2.0508-6.2852-3.1875-9.8086-3.2617zm17.141 51.492 74.906 53.508-74.906 53.508v-18.508c0-4.6406-1.8438-9.0938-5.125-12.375s-7.7344-5.125-12.375-5.125h-52.5c-33.027 0-57.25 13.836-76.562 29.359 3.582-10.047 7-20.344 12.371-28.402 15.012-22.516 35.023-35.957 64.191-35.957h52.5c4.6406 0 9.0938-1.8438 12.375-5.125s5.125-7.7344 5.125-12.375z">
                                                                            </path>
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                            </li>
                                                        @endif
                                                        {{-- @endifdata-toggle="tooltip" --}}
                                                        {{-- @endif $item->status != 3 && --}}
                                                        @if ($item->status != 2 && $item->status != 1)
                                                            <li class="inline-item mb-1">
                                                                <button class="btn btn-primary btn-sm rounded-1"
                                                                    type="button" data-placement="top"
                                                                    data-toggle="modal" data-target="#addtqf3"
                                                                    onclick="formFileTqf3({{ $item }})"
                                                                    title="ส่งไฟล์มคอ.3"
                                                                    @if ($item->status == 1) disabled @endif>
                                                                    <i class="bi bi-file-earmark-fill"></i>
                                                                </button>
                                                            </li>
                                                        @endif

                                                        @if (unserialize($item->filetqf3) != 1 && $item->send_file == 1)
                                                            @foreach (unserialize($item->filetqf3) as $val)
                                                                {{-- {{$val}} --}}
                                                                <a href="{{ url('showfile/' . $val) }}"
                                                                    data-toggle="tooltip"
                                                                    class="btn btn-info btn-sm rounded-1 mb-1"
                                                                    type="button" target="_blank" data-placement="top"
                                                                    title="ไฟล์มคอ.3">
                                                                    <i class="bi bi-file-earmark-text"></i></a>
                                                            @endforeach
                                                        @else
                                                            @if ($item->status == 2 && $item->send_file == 0)
                                                                <li class="inline-item mb-1">
                                                                    <a href="{{ url('filetqf3/' . $item->tqf3ID) }}"
                                                                        data-toggle="tooltip"
                                                                        class="btn btn-info btn-sm rounded-1"
                                                                        type="button" target="_blank"
                                                                        data-placement="top" title="ไฟล์มคอ.3">
                                                                        <i class="bi bi-file-earmark-text"></i></a>
                                                                </li>
                                                            @endif
                                                        @endif
                                                        @if ($item->status != 2 && $item->status != 1)
                                                            <li class="inline-item mb-2">
                                                                <button class="btn btn-dark btn-sm rounded-1 copy-tqf3"
                                                                    type="button" data-toggle="tooltip"
                                                                    data-id="{{ $item->tqf3ID }}" data-placement="top"
                                                                    title="คัดลอกมคอ.3">
                                                                    <i class="bi bi-clipboard"></i></button>
                                                            </li>
                                                        @endif

                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal fade" id="addtqf3" tabindex="-1" role="dialog" aria-labelledby="addtqf3Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addtqf3Label">บันทึกมคอ. 3 แบบไฟล์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body addtqf3">
                    <form class="form-horizontal" method="post">
                        @csrf
                        <input name="data" type="hidden" value="0" class="form-control">
                        <div class="form-group row">
                            <label class="col-sm-3 ">ภาคเรียนที่</label>
                            <div class="col-sm-9">
                                <input type="text" name="term" disabled="" placeholder=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 ">รหัสวิชา</label>
                            <div class="col-sm-9">
                                <input type="text" name="codesubject" disabled="" placeholder=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 ">ชื่อวิชา</label>
                            <div class="col-sm-9">
                                <input type="text" name="namesubject" disabled="" placeholder=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 ">วันที่สิ้นสุดการส่งมคอ.</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" disabled="" placeholder=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="filetqf" class="col-sm-3">ไฟล์มคอ.</label>
                            <div class="col-sm-9">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="filetqf" accept=".doc, .docx, .pdf" name="file[]"
                                        data-show-upload="false" data-show-caption="true" multiple>
                                </button>
                                <div id="selectedFiles"></div>
                            </div>
                        </div>

                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" onclick="teacherFileTqf3()">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="copytqf3" tabindex="-1" role="dialog" aria-labelledby="copytqf5Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="copytqf3Label">คัดลอกมคอ. 3 <span id="title"></span></h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="copytqf3">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $('#addtqf3').on('hidden.bs.modal', function(e) {
            $('#selectedFiles').html('');
        })

        $('input[type="file"]').change(function(e) {
            var files = e.target.files;
            var text = '<div>ไฟล์ที่เลือก :<div/>';
            console.log(files);
            if (files.length > 3) {
                $("#filetqf").val(null);
                text = '<div>เลือกไฟล์สูงสุด 3 ไฟล์</div>';
            }
            $.each(files, function(i, val) {
                text += '<div>' + val.name + '<div/>'
            });
            $('#selectedFiles').html(text);
        });

        $(document).on("click", ".select-copy", function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var to = $(this).data('to');
            Swal.fire({
                title: 'ต้องการยืนยันใช่ไหม',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: "/copy_tqf3/" + id + '/' + to,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "คัดลอกข้อมูลสำเร็จ",
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 300);
                            } else {
                                Swal.fire({
                                    title: "คัดลอกข้อมูลไม่สำเร็จ",
                                    icon: 'error',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                });
                            }
                            $('#copytqf3').modal('toggle');
                        }
                    });
                }
            });
        });

        $('.copy-tqf3').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "/check_copytqf3/" + id,
                // data: data,
                // dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // console.log(response)
                        $('#copytqf3').modal();
                        $("#title").text('วิชา ' + response.sub);
                        $(".copytqf3").append(response.message);
                        // $("#copy-tqf3-submit").click();
                    } else {
                        Swal.fire({
                            title: response.message,
                            icon: 'error',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        });
                    }
                    // $('#copy_form_tqf3').modal('show');
                }
            });
        });

        $('#copytqf3').on('hidden.bs.modal', function(e) {
            $(".copytqf3").empty();
        })

        $('.save_status').click(function(e) {
            var id = $(this).data('id');
            console.log(id)
            $.ajax({
                type: "post",
                url: "check_update_status3",
                data: {
                    id: id,
                    status: 1
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'ยืนยันการส่งมคอ. 3',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ยืนยัน'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "post",
                                    url: "update_status3",
                                    data: {
                                        id: id,
                                        status: 1
                                    },
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.success) {

                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'ยืนยันมคอ.3 สำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then(() => {
                                                location.reload()
                                            });
                                        } else {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'danger',
                                                title: response.message,
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        }
                                    },
                                    error: function(error) {
                                        // // console.log(error);

                                    }
                                });
                            }
                        })

                    } else {
                        Swal.fire({
                            text: "กรุณากรอก " + response.message,
                            icon: 'warning',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        });
                    }
                },
                error: function(error) {
                    // // console.log(error);

                }
            });
        });

        $('#example').DataTable({
            "ordering": false,
            "pageLength": 20,
            "lengthChange": false,
            "order": [],
            "language": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ รายการ",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            },
            columnDefs: [{
                orderable: false,
                targets: 5,
            }, {
                orderable: false,
                targets: 6,
            }, {
                orderable: false,
                targets: 7,
            }, {
                orderable: false,
                targets: 8,
            }, {
                orderable: false,
                targets: 9,
            }, {
                orderable: false,
                targets: 10,
            }, {
                orderable: false,
                targets: 11,
            }, {
                orderable: false,
                targets: 12,
            }, {
                orderable: false,
                targets: 13,
            }]
        });
    </script>
@endsection
