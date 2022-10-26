@extends('template.officer')
@section('m3', 'active')
@section('t5', 'active')
@section('textpage', 'ตรวจสอบมคอ.5')
@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header align-items-center ">
                            <div class="pull-left">
                                <h4 class="h5">ตรวจสอบมคอ.5</h4>
                            </div>
                            <div class="row exports-tqf5  align-items-center" style="float: right;margin-right: 10px">
                                {{-- <button type="button" onclick="export_tqf5()"
                                        class="btn btn-primary btn-sm">Export</button> --}}
                                <div class="row exports-tqf5  align-items-center" style="float: right;margin-right: 10px">
                                    <button type="button" data-toggle="modal" data-target="#exportTQF5"
                                        class="btn btn-primary btn-sm">สรุปผลมคอ.5</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-tqf5">
                            <div class="form-group row"
                                style="justify-content: center;align-items: center;text-align: center;">
                                <div class="col-sm-1" style="text-align: end">ค้นหา</div>
                                <label for="select_year" class="col-form-label">ภาคเรียน:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="select_year">
                                        <option data-text="" disabled value="" selected>เลือกข้อมูล</option>
                                        @foreach ($year as $item)
                                            <option data-text="{{ $item->term }}/{{ $item->Year }}"
                                                value="{{ $item->idYear }}" {{ $item->idYear == $y_id ? 'selected' : '' }}>
                                                {{ $item->term }}/{{ $item->Year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="select_branch" class="col-sm-1 col-form-label">สาขา:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="select_branch">
                                        <option data-text="" value="" selected>สาขาทั้งหมด</option>
                                        @foreach ($branch as $item)
                                            <option data-text="{{ $item->branchName }}" value="{{ $item->idBranch }}">
                                                {{ $item->branchName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"
                                style="justify-content: center;align-items: center;text-align: center;">
                                <div class="col-sm-1" style="text-align: end"></div>
                                <label for="select_group" class="col-form-label">กลุ่มเรียน:</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="select_group">
                                        <option data-text="" value="" selected>กลุ่มเรียนทั้งหมด</option>
                                        @foreach ($group as $item)
                                            <option data-text="{{ $item->groupname }}" value="{{ $item->groupID }}">
                                                {{ $item->name }} {{ $item->groupname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="select_user" class="col-sm-1 col-form-label">อาจารย์:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="select_user">
                                </div>
                            </div>
                            <br>
                            {{-- <div class="table-responsive" id="show-tqf5"> --}}
                            <div class="posts">
                                @include('officer.checktqf')
                            </div>
                            {{-- <table id="example" class="table table-bordered" style="width:100%">
                                    <thead class="headtable">
                                        <tr>
                                            <th rowspan="2" style="width: 10px;">ภาคเรียนที่</th>
                                            <th rowspan="2">รหัสวิชา</th>
                                            <th rowspan="2">ชื่อวิชา</th>
                                            <th rowspan="2" style="width: 50px">หน่วยกิต</th>
                                            <th rowspan="2" style="width: 50px">กลุ่มเรียน</th>
                                            <th colspan="6">หมวดมคอ.5</th>
                                            <th rowspan="2">ชื่ออาจารย์</th>
                                            <th rowspan="2"></th>
                                        </tr>
                                        <tr style="padding: 5px;text-align:center;">
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                        </tr>
                                    </thead>
                                    <tbody id="checktqf5">
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                                <td>{{ $item->subsubject->subjectCode }}</td>
                                                <td>{{ $item->subsubject->THsubject }}</td>
                                                <td>{{ $item->subsubject->cradit }}</td>
                                                <td>{{ $item->subsubject->group->groupname }}</td>
                                                @if ($item->filetqf5 != '')
                                                    <td colspan="6">
                                                        <center>ส่งไฟล์มคอ. 5 *กรุณาตรวจเอกสาร
                                                        </center>
                                                    </td>
                                                    <td style="display:none"> </td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>

                                                @else
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf5_1) && $item->tqf5_1->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf5_2) && $item->tqf5_2->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf5_3) && $item->tqf5_3->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf5_4) && $item->tqf5_4->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf5_5) && $item->tqf5_5->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                    <td class="tqfstatus">
                                                        @if (isset($item->tqf5_6) && $item->tqf5_6->status == 1)
                                                            <i class="fa fa-check-square successs">
                                                            @else
                                                                <i class="fa fa-times-rectangle fail">
                                                        @endif
                                                    </td>
                                                @endif
                                                @if (isset($item->subuser))
                                                    <td style="width: fit-content">
                                                        @foreach ($item->subuser as $user)
                                                            <p>{{ $user->Uprefix }}{{ $user->UFName }}
                                                                {{ $user->ULName }}</p>
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td>เจ้าหน้าที่จัดเก็บไฟล์เอง</td>
                                                @endif
                                                <td
                                                    style="text-align: center;padding:5px!important;padding-top: 10px!important;">
                                                    <a href="{{ url('filetqf5/' . $item->tqf5ID) }}"
                                                        target="_blank">ตรวจสอบ</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tfoot>
                                </table> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal fade" id="exportTQF5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สรุปผลการจัดทำรายงาน (มคอ.5)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">ปีการศึกษา</label>
                            <div class="col-sm-8">
                                <select id="select-year" name="select_year" class="form-control">
                                    <option value="" selected>เลือกข้อมูล...</option>
                                    @foreach ($year as $k => $item)
                                        <option data-text="{{ $item->term }}/{{ $item->Year }}"
                                            value="{{ $item->idYear }}">
                                            {{ $item->term }}/{{ $item->Year }}
                                        </option>
                                    @endforeach
                                </select>
                                <span style="color: red" id="export-year-empty"></span>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">กำหนดการทำมคอ. 3</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="export-date" name="date">
                                <span style="color: red" id="export-date-empty"></span>
                            </div>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="export_tqf5()">Export</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="status5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เลือกสถานะ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="text" name="id_status" hidden>
                        <div class="form-group row">
                            <label for="status5" class="col-sm-4 col-form-label">สถานะ</label>
                            <div class="col-sm-8">
                                <select id="select-status" name="status5" class="form-control">
                                    <option value="" selected disabled>เลือกข้อมูล...</option>
                                    <!--<option value="1"></option>-->
                                    <option value="2">ถูกต้อง</option>
                                    <option value="3">ส่งกลับแก้ไข</option>
                                </select>
                                {{-- <span style="color: red" id="export-year-empty"></span> --}}
                            </div>
                        </div>
                        <div class="form-group row" id="status-comment" style="display: none">
                            <label for="comment5" class="col-sm-4 col-form-label">ความคิดเห็น</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="comment5" name="comment" rows="4"></textarea>
                                {{-- <span style="color: red" id="export-year-empty"></span> --}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save_status">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var check_year = $('select[name=select_year]').val()
        $('#example').DataTable({
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
            }]
        });

        var page = 1
        $('#status5').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('text');
            $('[name="id_status"]').val(id);
            $('#status-comment').hide();
            $("textarea").each(function() {
                // console.log(this.style.height);
                this.style.height = 60 + 'px';
            });
            $('#select-status').change(function(e) {
                e.preventDefault();
                if ($(this).val() == 3) {
                    $('#status-comment').show();
                }
            });

        });
        $('#save_status').click(function(e) {
            if ($('#select-status option:selected').val() == '') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'กรุณาเลือกสถานะ',
                    showConfirmButton: false,
                    timer: 1500
                });
                return;
            }
            if ($('#select-status option:selected').val() - 0 == 3 && $('#comment5').val() == '') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'กรุณากรอกข้อมูลความคิดเห็น',
                    showConfirmButton: false,
                    timer: 1500
                });
                return;
            }
            $.ajax({
                type: "post",
                url: "update_status5",
                data: {
                    id: $('[name="id_status"]').val(),
                    status: $('#select-status option:selected').val(),
                    comment: $('#comment5').val(),
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        var group, year;
                        year = $('.table-tqf5').find('select[name=select_year]').val();
                        group = $('.table-tqf5').find('select[name=select_group]').val();

                        var url = window.location.pathname + "?group=" + group + '&&year=' +
                            year + '&&page=' + page;
                        loadPosts(url);
                        // }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'บันทึกสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#status5').modal('toggle');
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'danger',
                            title: 'บันทึกไม่สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(error) {
                    // // console.log(error);

                }
            });
        });
        $('#exportTQF5').on('show.bs.modal', function(e) {
            console.log(check_year);
            $('#exportTQF5 #select-year').val(check_year);
        });


        // load();
        $('select[name=select_year],select[name=select_group],select[name=select_branch]').change(
            function(e) {
                e.preventDefault();
                var select = $(this).attr('name');
                if (select == 'select_branch') {
                    $('select[name=select_group]').val('');
                } else {
                    $('select[name=select_branch]').val('');
                }
                check_year = $('select[name=select_year]').val()
                load();

            });

        $('[name=select_user]').on('input change', function() {
            load();
        });

        function load() {
            var year = $('.table-tqf5').find('select[name=select_year]').val();
            var group = $('.table-tqf5').find('select[name=select_group]').val();
            var user = $('.table-tqf5').find('[name=select_user]').val();
            var branch = $('.table-tqf5').find('select[name=select_branch]').val();


            console.log(year + '\n' + group);
            // if (year != '' && group != '') {
            var url = window.location.pathname + "?group=" + group + '&&year=' + year + '&&user=' + user + '&&branch=' +
                branch;
            setTimeout(() => {
                loadPosts(url);
            }, 200);

            // $.ajax({
            //     type: "get",
            //     url: "get_table_tqf5?group=" + group + '&&year=' + year,
            //     dataType: "html",
            //     success: function(response) {

            //         $('.table-tqf5').find('#show-tqf5').html(response);
            //         $('#example').DataTable({
            //             "order": [],
            //             "language": {
            //                 "sEmptyTable": "ไม่มีข้อมูลในตาราง",
            //                 "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            //                 "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
            //                 "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
            //                 "sInfoThousands": ",",
            //                 "sLengthMenu": "แสดง _MENU_ รายการ",
            //                 "sLoadingRecords": "กำลังโหลดข้อมูล...",
            //                 "sProcessing": "กำลังดำเนินการ...",
            //                 "sSearch": "ค้นหา: ",
            //                 "sZeroRecords": "ไม่พบข้อมูล",
            //                 "oPaginate": {
            //                     "sFirst": "หน้าแรก",
            //                     "sPrevious": "ก่อนหน้า",
            //                     "sNext": "ถัดไป",
            //                     "sLast": "หน้าสุดท้าย"
            //                 },
            //                 "oAria": {
            //                     "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
            //                     "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
            //                 }
            //             },
            //             columnDefs: [{
            //                 orderable: false,
            //                 targets: 3,
            //             }, {
            //                 orderable: false,
            //                 targets: 4,
            //             }, {
            //                 orderable: false,
            //                 targets: 5,
            //             }, {
            //                 orderable: false,
            //                 targets: 6,
            //             }, {
            //                 orderable: false,
            //                 targets: 7,
            //             }, {
            //                 orderable: false,
            //                 targets: 8,
            //             }, {
            //                 orderable: false,
            //                 targets: 9,
            //             }, {
            //                 orderable: false,
            //                 targets: 10,
            //             }, {
            //                 orderable: false,
            //                 targets: 11,
            //             }, {
            //                 orderable: false,
            //                 targets: 12,
            //             }, {
            //                 orderable: false,
            //                 targets: 13,
            //             }]
            //         });
            //     }
            // });
        }
    </script>
@endsection
