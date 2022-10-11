@extends('template.teacher')

@section('head_course', 'active')
@section('course5', 'active')

@section('textpage', 'รายงานมคอ.5')

@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-lg-12 row">
                                <div class="col-lg-10 col-md-12">
                                    <h4 class="h5">รายงานมคอ.5</h4>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <form class="form-inline" id="search" action="course5" method="POST">
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
                                            <button hidden type="submit" class="btn btn-primary btn-sm ml-2">ค้นหา</button>
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
                                            <th style="width: 50px">ภาคเรียนที่</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th style="width: 50px">หน่วยกิต</th>
                                            <th style="width: 50px">กลุ่มเรียน</th>
                                            {{-- <th style="width: 50px">ชื่ออาจารย์</th> --}}
                                            {{-- <th colspan="7">สถานะหมวดหมู่ มคอ.3</th> --}}
                                            {{-- <th>วันที่สิ้นสุด<br>การส่งมคอ.</th> --}}
                                            <th>อาจารย์ผู้สอน</th>
                                            <th style="width: 10px">สถานะ</th>
                                            <th></th>
                                        </tr>
                                        {{-- <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                        </tr> --}}
                                    </thead>
                                    <tbody>
                                        @foreach ($tqf as $item)
                                            <tr>
                                                <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                                <td>{{ $item->subsubject->subjectCode }}</td>
                                                <td>{{ $item->subsubject->THsubject }}<br>{{ $item->subsubject->ENsubject }}
                                                </td>
                                                <td>{{ $item->subsubject->cradit }}</td>
                                                <td>{{ $item->group->groupname }}</td>
                                                {{-- <td></td> --}}
                                                {{-- @if ($item->filetqf3 != '')
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
                                                            <i class="fa fa-check-square successs">
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
                                                @endif --}}

                                                {{-- <td>{{ formatDateThai($item->deadline) }}</td> --}}
                                                @if (isset($item->subuser))
                                                    <td style="width: fit-content">
                                                        @foreach ($item->subuser as $user)
                                                            <p>{{ $user->Uprefix }}{{ $user->UFName }}
                                                                {{ $user->ULName }}</p>
                                                        @endforeach
                                                    </td>
                                                @endif
                                                <td class="tqfstatus" style="font-size: 14px">
                                                    @if ($item->status == 0)
                                                        ยังไม่จัดทำ
                                                    @endif
                                                    @if ($item->status == 1)
                                                        รอการตรวจสอบ
                                                    @endif
                                                    @if ($item->status == 2)
                                                        ถูกต้อง
                                                    @endif
                                                    @if ($item->status == 3)
                                                        ส่งกลับแก้ไข
                                                    @endif
                                                    @if ($item->status == 4)
                                                        กำลังจัดทำ
                                                    @endif
                                                </td>
                                                <td class="tqfstatus">
                                                    <!-- Call to action buttons -->
                                                    <ul class="list-inline m-0">
                                                        @if ($item->status == 2 || $item->status == 1)
                                                            @if (unserialize($item->filetqf5) != 1 && $item->send_file == 1)
                                                                @foreach (unserialize($item->filetqf5) as $val)
                                                                    {{-- {{$val}} --}}
                                                                    <a href="{{ url('showfile/' . $val) }}"
                                                                        data-toggle="tooltip"
                                                                        class="btn btn-info btn-sm rounded-1" type="button"
                                                                        target="_blank" data-placement="top"
                                                                        title="ไฟล์มคอ.5">
                                                                        <i class="bi bi-file-earmark-text"></i></a>
                                                                @endforeach
                                                            @else
                                                                @if ($item->status == 2 && $item->send_file == 0)
                                                                    <li class="inline-item">
                                                                        <a href="{{ url('filetqf5/' . $item->tqf5ID) }}"
                                                                            data-toggle="tooltip"
                                                                            class="btn btn-info btn-sm rounded-1"
                                                                            type="button" target="_blank"
                                                                            data-placement="top" title="ไฟล์มคอ.5">
                                                                            <i class="bi bi-file-earmark-text"></i></a>
                                                                    </li>
                                                                @endif
                                                            @endif
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

    <div class="modal fade" id="addtqf3" tabindex="-1" role="dialog" aria-labelledby="addtqf3Label" aria-hidden="true">
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
                                <input type="text" name="term" disabled="" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 ">รหัสวิชา</label>
                            <div class="col-sm-9">
                                <input type="text" name="codesubject" disabled="" placeholder="" class="form-control">
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
                                    <input type="file" id="filetqf" accept=".doc, .docx,.pdf" name="file">
                                </button>
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
@endsection

@section('script')
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        $('#save_status').click(function(e) {
            var id = $(this).data('id');
            console.log(id)
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
                                    title: 'ยืนยันมคอ.3 ไม่สำเร็จ',
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
            }
            // ,columnDefs: [{
            //     orderable: false,
            //     targets: 5,
            // }, {
            //     orderable: false,
            //     targets: 6,
            // }, {
            //     orderable: false,
            //     targets: 7,
            // }, {
            //     orderable: false,
            //     targets: 8,
            // }, {
            //     orderable: false,
            //     targets: 9,
            // }, {
            //     orderable: false,
            //     targets: 10,
            // }, {
            //     orderable: false,
            //     targets: 11,
            // }, {
            //     orderable: false,
            //     targets: 12,
            // }, {
            //     orderable: false,
            //     targets: 13,
            // }]
        });
    </script>
@endsection
