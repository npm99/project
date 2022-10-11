<div class="table-responsive" id="load">
    @if ($form == 'tqf3')
        <table id="" class="table table-bordered" style="width:100%">
            <thead class="headtable">
                <tr>
                    <th rowspan="2" style="width: 10px">ภาคเรียนที่</th>
                    <th rowspan="2">รหัสวิชา</th>
                    <th rowspan="2">ชื่อวิชา</th>
                    <th rowspan="2" style="width: 50px">หน่วยกิต</th>
                    <th rowspan="2" style="width: 50px">กลุ่มเรียน</th>
                    <th colspan="7">หมวดมคอ.3</th>
                    <th rowspan="2">ชื่ออาจารย์</th>
                    <th rowspan="2" style="width: 10px">สถานะ</th>
                    <th rowspan="2"></th>
                </tr>
                <tr style="width:5px;padding: 0px;text-align:center;">
                    <td class="px-2">1</td>
                    <td class="px-2">2</td>
                    <td class="px-2">3</td>
                    <td class="px-2">4</td>
                    <td class="px-2">5</td>
                    <td class="px-2">6</td>
                    <td class="px-2">7</td>
                </tr>
            </thead>
            <tbody id="checktqf3">
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr id="{{ $item->tqf3ID }}">
                            <td> {{ $item->subyear->term }} / {{ $item->subyear->Year }} </td>
                            <td> {{ $item->subsubject->subjectCode }}</td>
                            <td> {{ $item->subsubject->THsubject }}</td>
                            <td> {{ $item->subsubject->cradit }}</td>
                            <td> {{ $item->group->groupname }}</td>
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
                            @if (isset($item->subuser))
                                <td>
                                    @foreach ($item->subuser as $user)
                                        <p> {{ $user->Uprefix }} {{ $user->UFName }}
                                            {{ $user->ULName }}
                                            @if ($user->userID == $item->teacher)
                                                <span class="badge bg-primary"
                                                    style="color: white;">อาจารย์ผู้รับผิดชอบรายวิชา</span>
                                            @endif
                                        </p>
                                    @endforeach
                                </td>
                            @else
                                <td>เจ้าหน้าที่จัดเก็บไฟล์เอง</td>
                            @endif

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
                                    <span class="badge bg-danger">ส่งกลับแก้ไข</span>
                                </td>
                            @elseif ($item->status == 4)
                                <td style="text-align: center;font-size:14px;">
                                    <span class="badge bg-info">กำลังจัดทำ</span>
                                </td>
                            @endif

                            <td style="text-align: center;padding:5px!important;padding-top: 10px!important;">
                                @if ($item->status != 0 && $item->status != 4)
                                    @if ($item->send_file == 1)
                                        @foreach (unserialize($item->filetqf3) as $key => $value)
                                            <a class="btn btn-outline-primary btn-sm mb-2" style="font-size: 12px;"
                                                href="showfile/{{ $value }}"
                                                target="_blank">{{ $item->status == 1 ? 'ตรวจสอบไฟล์มคอ.' : 'ดาวน์โหลดไฟล์มคอ.' }}</a><br />
                                        @endforeach
                                    @else
                                        <a class="btn btn-outline-primary btn-sm mb-2" style="font-size: 12px;"
                                            href="filetqf3/{{ $item->tqf3ID }}"
                                            target="_blank">{{ $item->status == 1 ? 'ตรวจสอบไฟล์มคอ.' : 'ดาวน์โหลดไฟล์มคอ.' }}
                                        </a>
                                    @endif
                                @endif

                                {{-- <a href="filetqf3/ {{ $item->tqf3ID }}" target="_blank">ตรวจสอบ</a> --}}
                                {{-- <div style="height: 15px;"></div> --}}
                                <a href="#status3" data-toggle="modal"
                                    class="btn btn-outline-dark btn-sm {{ $item->status != 0 && $item->status != 4 && $item->status != 3 ? '' : 'disabled' }}"
                                    style="font-size: 12px;" data-text="{{ $item->tqf3ID }}">สถานะ</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="15" style="text-align: center">ไม่พบข้อมูล</td>
                    </tr>
                @endif
                </tfoot>
        </table>
    @endif
    @if ($form == 'tqf5')
        <table id="" class="table table-bordered" style="width:100%">
            <thead class="headtable">
                <tr>
                    <th rowspan="2" style="width: 10px">ภาคเรียนที่</th>
                    <th rowspan="2">รหัสวิชา</th>
                    <th rowspan="2">ชื่อวิชา</th>
                    <th rowspan="2" style="width: 50px">หน่วยกิต</th>
                    <th rowspan="2" style="width: 50px">กลุ่มเรียน</th>
                    <th colspan="6">หมวดมคอ.5</th>
                    <th rowspan="2">ชื่ออาจารย์</th>
                    <th rowspan="2" style="width: 10px">สถานะ</th>
                    <th rowspan="2"></th>
                </tr>
                <tr style="width:5px;padding: 0px;text-align:center;">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
            </thead>
            <tbody id="checktqf5">
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr id="{{ $item->tqf5ID }}">
                            <td> {{ $item->subyear->term }} / {{ $item->subyear->Year }} </td>
                            <td> {{ $item->subsubject->subjectCode }} </td>
                            <td> {{ $item->subsubject->THsubject }} </td>
                            <td> {{ $item->subsubject->cradit }} </td>
                            <td> {{ $item->group->groupname }} </td>
                            @if ($item->filetqf5 != '' && $item->send_file == 1)
                                <td colspan="6">
                                    <center>ส่งไฟล์มคอ. 5 แล้ว</center>
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
                                        @if ($item->tqf5_2->data1_1 == '' || $item->tqf5_2->data1_2 == '')
                                            <i class="fa fa-times-rectangle fail">
                                            @else
                                                <i class="fa fa-check-square successs">
                                        @endif
                                    @else
                                        <i class="fa fa-times-rectangle fail">
                                    @endif
                                </td>
                                <td class="tqfstatus">
                                    @if (isset($item->tqf5_3) && $item->tqf5_3->status == 1)
                                        @if ($item->tqf5_3->grade == '')
                                            <i class="fa fa-times-rectangle fail">
                                            @else
                                                <i class="fa fa-check-square successs">
                                        @endif
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
                                        <p> {{ $user->Uprefix }} {{ $user->UFName }}
                                            {{ $user->ULName }}
                                            @if ($user->userID == $item->teacher)
                                                <span class="badge bg-primary"
                                                    style="color: white;">อาจารย์ผู้รับผิดชอบรายวิชา</span>
                                            @endif
                                        </p>
                                    @endforeach
                                </td>
                            @else
                                <td>เจ้าหน้าที่จัดเก็บไฟล์เอง</td>
                            @endif

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
                                    <span class="badge bg-danger">ส่งกลับแก้ไข</span>
                                </td>
                            @elseif ($item->status == 4)
                                <td style="text-align: center;font-size:14px;">
                                    <span class="badge bg-info">กำลังจัดทำ</span>
                                </td>
                            @endif

                            <td style="text-align: center;padding:5px!important;padding-top: 10px!important;">
                                @if ($item->status != 0 && $item->status != 4)
                                    @if ($item->send_file == 1)
                                        @foreach (unserialize($item->filetqf5) as $key => $value)
                                            <a class="btn btn-outline-primary btn-sm mb-2" style="font-size: 12px;"
                                                href="showfile/{{ $value }}"
                                                target="_blank">{{ $item->status == 1 ? 'ตรวจสอบไฟล์มคอ.' : 'ดาวน์โหลดไฟล์มคอ.' }}</a><br />
                                        @endforeach
                                    @else
                                        <a class="btn btn-outline-primary btn-sm mb-2" style="font-size: 12px;"
                                            href="filetqf5/{{ $item->tqf5ID }}"
                                            target="_blank">{{ $item->status == 1 ? 'ตรวจสอบไฟล์มคอ.' : 'ดาวน์โหลดไฟล์มคอ.' }}</a>
                                    @endif
                                @endif

                                {{-- <a href="filetqf5/ {{ $item->tqf5ID }}" target="_blank">ตรวจสอบ</a> --}}
                                {{-- <div style="height: 15px;"></div> --}}
                                <a href="#status5" data-toggle="modal"
                                    class="btn btn-outline-dark btn-sm {{ $item->status != 0 && $item->status != 4 && $item->status != 3 ? '' : 'disabled' }}"
                                    style="font-size: 12px;" data-text="{{ $item->tqf5ID }}">สถานะ</a>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="15" style="text-align: center">ไม่พบข้อมูล</td>
                    </tr>
                @endif

                </tfoot>
        </table>


    @endif
</div>

<div class="mx-auto row justify-content-between">
    <div class="col-md-auto p-0" style="text-align: -webkit-center;">แสดง
        {{ $data->firstItem() }} ถึง {{ $data->lastItem() }} จาก
        {{ $data->total() }} รายการ</div>
    <div class="col-md-auto p-0" style="display: flex;justify-content: center;">
        @if ($data->total() > 10)
            {!! $data->links() !!}
        @else
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                        <span class="page-link" aria-hidden="true">‹</span>
                    </li>
                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                    <li class="page-item disabled">
                        <a class="page-link" aria-disabled="true" aria-label="Next »">›</a>
                    </li>
                </ul>
            </nav>
        @endif

    </div>

</div>

@section('script1')
    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var u = new URL(url);
            page = u.searchParams.get("page");
            // window.history.pushState("", "", url);
            loadPosts(url);
        });

        $(document).on('change', ".search_bar #year", function(e) {
            e.preventDefault();
            // console.log($(this).val())
            var url = window.location.href + '?search=' + $('#search').val();
            // window.history.pushState("", "", url);
            // console.log(url);
            setTimeout(() => {
                loadPosts(url);
            }, 300);
        });

        // $(document).fi("input[name='search']").change(function(e) {
        // your code
        $(document).on('input', ".search_bar #search", function(e) {
            e.preventDefault();
            // console.log($(this).val())
            var url = window.location.href + '?search=' + $(this).val();
            // window.history.pushState("", "", url);
            // console.log(url);
            setTimeout(() => {
                loadPosts(url);
            }, 300);

        });

        function loadPosts(url) {
            const urlParams = new URLSearchParams(url);
            page = urlParams.get('page');
            $.ajax({
                url: url
            }).done(function(data) {
                $('.posts').html(data);
            }).fail(function() {
                console.log("Failed to load data!");
            });
        }
    </script>
@endsection
