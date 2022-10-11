{{-- <form class="form-inline" id="search" action="edittqf3" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" name="search" id="text-search">
                                    <button type="submit" hidden class="btn btn-primary btn-sm ml-2">ค้นหา</button>
                                </div>
                            </form> --}}
<div class="table-responsive" id="load">
    @if ($form == 'edit3' || $form == 'edit5')
        <table class="table table-bordered" style="width:100%"> {{-- id="example" --}}
            <thead class="headtable">
                <tr>
                    <th style="width: 10px;">ภาคเรียนที่</th>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th style="width: 60px">หน่วยกิต</th>
                    <th style="width: 50px">กลุ่มเรียน</th>
                    <th>ชื่ออาจารย์</th>
                    <th>วันที่สิ้นสุดการส่งมคอ.</th>
                    <th style="width: 15px"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                            <td>{{ $item->subsubject->subjectCode }}</td>
                            <td>{{ $item->subsubject->THsubject }}</td>
                            <td>{{ $item->subsubject->cradit }}</td>
                            <td>{{ isset($item->group->groupname) ? $item->group->groupname : '' }}</td>
                            @if (isset($item->subuser))
                                <td style="width: fit-content">
                                    @foreach ($item->subuser as $user)
                                        <p>{{ $user->Uprefix }}{{ $user->UFName }}
                                            {{ $user->ULName }}
                                            @if ($user->userID == $item->teacher)
                                                <span class="badge bg-primary"
                                                    style="color: white;">อาจารย์ผู้รับผิดชอบรายวิชา</span>
                                            @endif

                                        </p>
                                    @endforeach
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td>{{ $item->deadline == '' ? '-' : formatDateThai($item->deadline) }}</td>
                            <td style="text-align: center;padding:5px!important;padding-top: 10px!important;">
                                <!-- Call to action buttons <i class="fa fa-edit"></i>-->
                                <button class="btn btn-success btn-sm rounded-1 m-1" type="button"
                                    @if (isset($item->tqf3ID)) onclick="edit_TQF3({{ $item }})"  data-target="#edittqf3"
                                     @else onclick="edit_TQF5({{ $item }})"  data-target="#edittqf5" @endif
                                    data-toggle="modal" title="แก้ไข">แก้ไข</button>

                                <button class="btn btn-danger btn-sm rounded-1" type="button"
                                    @if (isset($item->tqf3ID)) onclick="deletetqf3({{ $item->tqf3ID }})"
                                  @else
                                  onclick="deletetqf5({{ $item->tqf5ID }})" @endif
                                    data-toggle="tooltip" data-placement="top" title="ลบ"><i
                                        class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" style="text-align: center">ไม่พบข้อมูล</td>
                    </tr>
                @endif

                </tfoot>
        </table>
    @endif
    @if ($form == 'user')
        <table class="table table-bordered" style="width:100%">
            <thead>
                @csrf
                <tr>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ประเภทผู้ใช้งาน</th>
                    <th>คณะ</th>
                    <th>สาขา</th>
                    <th>สิทธิ์การเข้าถึง</th>
                    <th style="width: 120px"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->Uprefix }}{{ $row->UFName }} {{ $row->ULName }}</td>
                            <td>{{ $row->sublevel->levelName }}</td>
                            <td>{{ !isset($row->subfac->subBranch->factoryName) ? 'ไม่ระบุ' : $row->subfac->subBranch->factoryName }}
                            </td>
                            <td>{{ !isset($row->subfac->branchName) ? 'ไม่ระบุ' : $row->subfac->branchName }}</td>
                            @if ($row->level_LevelID == 2)
                                <td>-</td>
                            @else
                                <td>{{ $row->is_editor == 1 ? 'สามารถแก้ไขได้' : 'ดูอย่างเดียว' }}</td>
                            @endif
                            <td style="text-align: center">
                                <!-- Call to action buttons<i class="fa fa-edit"></i> -->
                                <button type="button" class="btn btn-success btn-sm rounded-1 edit_data m-1"
                                    data-toggle="modal" data-target="#edit-modal" data-placement="top"
                                    @if (session('data')->is_editor == 0) {{ session('data')->is_editor == $row->is_editor ? '' : 'disabled' }} @endif
                                    title="Edit" onclick="edituser({{ $row }})">
                                    แก้ไข</button>
                                @if (session('data')->userID != $row->userID)
                                    <button type="button" class="btn btn-danger btn-sm rounded-1 del_data"
                                        data-id="{{ $row->userID }}"
                                        {{ session('data')->is_editor == 1 ? '' : 'disabled' }}>
                                        <i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align: center">ไม่พบข้อมูล</td>
                    </tr>
                @endif

                </tfoot>
        </table>
    @endif
    @if ($form == 'subject')
        <table class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>หน่วยกิต</th>
                    {{-- <th>กลุ่มเรียน</th> --}}
                    <th style="width: 120px"></th>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr>{{-- <i class="fa fa-edit"></i> --}}
                            <td>{{ $item->subjectCode }}</td>
                            <td>{{ $item->THsubject }}</td>
                            <td>{{ $item->cradit }}</td>
                            {{-- <td>{{ $item->group->groupname }}</td> --}}
                            <td style="text-align: center">
                                <button class="btn btn-success btn-sm rounded-1 text-center" type="button"
                                    data-toggle="modal" data-target="#addsub" title="แก้ไข" data-sub=""
                                    onclick="editsub({{ $item }})">แก้ไข</button>
                                <button class="btn btn-danger btn-sm rounded-1 text-center delete-sub"
                                    data-id="{{ $item->idsubject }}" type="button">
                                    <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align: center">ไม่พบข้อมูล</td>
                    </tr>
                @endif


                </tfoot>
        </table>
    @endif
    @if ($form == 'year')
        <table class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ภาคเรียน</th>
                    <th>ปีการศึกษา</th>
                    {{-- <th>สถานะ</th> --}}
                    <th style="width: 120px;"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $item->term }} </td>
                            <td>{{ $item->Year }} </td>
                            {{-- <td class="text-center">
                                @if ($item->active == 0)
                                    <span class="badge badge-danger">not active</span>
                                @else
                                    <span class="badge badge-success">active</span>
                                @endif
                            </td> --}}
                            {{-- <i class="fa fa-edit"></i> --}}
                            <td style="text-align: center">
                                <button class="btn btn-success btn-sm rounded-1 text-center" type="button"
                                    data-toggle="modal" data-target="#editYear{{ $key }}" title="แก้ไข">
                                    แก้ไข</button>
                                <div class="modal fade" id="editYear{{ $key }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalYear" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalYear">
                                                    เพิ่มปีการศึกษา</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="addyear">
                                                    <form class="form-horizontal">
                                                        @csrf
                                                        <input name="id" value="{{ $item->idYear }}" hidden>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label style="text-align: end"
                                                                class="col-sm-2 form-control-label">ปีการศึกษา:</label>
                                                            <div class="col-sm-3">
                                                                <div class="form-group" style="margin-bottom: 0px">
                                                                    <select class="form-control" name="term"
                                                                        id="textTerm">
                                                                        <option value="1"
                                                                            {{ $item->term == 1 ? 'selected="selected"' : '' }}>
                                                                            1 </option>
                                                                        <option
                                                                            value="2"{{ $item->term == 2 ? 'selected="selected"' : '' }}>
                                                                            2 </option>
                                                                        <option value="3"
                                                                            {{ $item->term == 3 ? 'selected="selected"' : '' }}>
                                                                            3 </option>
                                                                    </select>
                                                                </div>
                                                                <span style="color: red" id="term_empty"></span>
                                                            </div>
                                                            <label style="text-align: end"
                                                                class="form-control-label">/</label>
                                                            <div class="col-sm-6">
                                                                <div class="form-group" style="margin-bottom: 0px">
                                                                    <select class="form-control" name="year"
                                                                        id="textYear">
                                                                        {{ $date = date('Y', strtotime(date('y-m-d') . '-3 year')) + 543 }}
                                                                        @for ($i = 1; $i < 6; $i++)
                                                                            <option
                                                                                {{ $item->Year == $date + $i ? 'selected' : '' }}
                                                                                value="{{ $date + $i }}">
                                                                                {{ $date + $i }}
                                                                            </option>
                                                                        @endfor
                                                                    </select>
                                                                    {{-- <input class="form-control "
                                                                type="number" name="year"
                                                                id="textYear" placeholder="2563"
                                                                value="{{ $item->Year }}"> --}}
                                                                </div>
                                                                <span style="color: red" id="year_empty"></span>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group row">
                                                            <label for="inputPassword"
                                                                class="col-sm-2 col-form-label">สถานะ</label>
                                                            <div class="col-sm-10">
                                                                <select id="active" name="active"
                                                                    class="form-control">
                                                                    <option value="1"
                                                                        {{ $item->active == 1 ? 'selected' : '' }}>
                                                                        active
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ $item->active == 0 ? 'selected' : '' }}>not
                                                                        active</option>
                                                                </select>
                                                            </div>
                                                        </div> --}}
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-success term-submit"
                                                    data-data="{{ $key }}">บันทึก</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">ปิดออก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger btn-sm rounded-1 text-center delete"
                                    data-id="{{ $item->idYear }}" type="button">
                                    <i class="fa fa-trash"></i></button>
                            </td>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" style="text-align: center">ไม่พบข้อมูล</td>
                    </tr>
                @endif

                </tfoot>
        </table>
    @endif
    @if ($form == 'group')
        <div class="table-responsive">
            <table id="" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>กลุ่มเรียน</th>
                        <th style="width: 120px"></th>
                </thead>
                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $item->groupname }}</td>
                                <td style="text-align: center;"><button
                                        class="editGroup btn btn-success btn-sm rounded-1 text-center" type="button"
                                        data-toggle="modal" data-target="#editGroup{{ $key }}">แก้ไข
                                    </button> {{-- <i class="fa fa-edit"></i> --}}
                                    <div class="modal fade" id="editGroup{{ $key }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modalFac" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalFac">แก้ไขกลุ่มเรียน
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="addgroup">
                                                        <input name="id" value="{{ $item->groupID }}"
                                                            type="hidden">
                                                        <form class="form-horizontal" method="POST">
                                                            <!-- if there are creation errors, they will show here -->
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label style="text-align: end"
                                                                    class="col-sm-3 form-control-label">กลุ่มเรียน</label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group"
                                                                        style="margin-bottom: 0px">
                                                                        <input id="group" type="text"
                                                                            class="form-control" name="group"
                                                                            placeholder="กลุ่มเรียน"
                                                                            value="{{ $item->groupname }}"
                                                                            maxlength="10">
                                                                    </div>
                                                                    <span style="color: red" id="group_empty"></span>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-sm-2">
                                                        <button class="btn btn-success add-group"
                                                            data-data="{{ $key }}">
                                                            บันทึก</button>
                                                    </div> <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">ปิดออก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="editGroup btn btn-danger btn-sm rounded-1 text-center"
                                        onclick="delete_group_sub({{ $item->groupID }})" type="button"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" style="text-align: center">ไม่พบข้อมูล</td>
                        </tr>
                    @endif

                    </tfoot>
            </table>
        </div>
    @endif


    <div class="mx-auto row justify-content-between">
        <div class="col-md-auto p-0" style="text-align: -webkit-center;">แสดง
            {{ $data->firstItem() }} ถึง {{ $data->lastItem() }} จาก
            {{ $data->total() }} รายการ</div>
        <div class="col-md-auto p-0" style="display: flex;justify-content: center;">
            @if ($data->total() > 20)
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
</div>
@section('script1')
    <script>
        var dd_year = $('.search_bar #year').val();
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            // window.history.pushState("", "", url);
            loadPosts(url);
        });

        $(document).on('change', ".search_bar #year", function(e) {
            e.preventDefault();
            // console.log($(this).val())
            var url = window.location.href + '?year=' + $(this).val() + '&&search=' + $('#search').val();
            // window.history.pushState("", "", url);
            // console.log(url);
            dd_year = $(this).val();
            setTimeout(() => {
                loadPosts(url);
            }, 300);
        });

        // $(document).fi("input[name='search']").change(function(e) {
        // your code
        $(document).on('input', ".search_bar #search", function(e) {
            e.preventDefault();
            // console.log($(this).val())
            var year = $('#year').val() == undefined ? '' : $('#year').val()
            var url = window.location.href + '?year=' + $('#year').val() + '&&search=' + $(this).val();
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

        function loadPosts(url) {
            $.ajax({
                url: url
            }).done(function(data) {
                $('.posts').html(data);
                if ({{ Request::is('subject') ? 1 : 0 }} == 1 && {{ session('data')->is_editor }} == 0) {
                    // $("input").attr("readonly", "true");
                    console.log(322);
                    $("button").prop("disabled", true);

                }
            }).fail(function() {
                console.log("Failed to load data!");
            });
        }
    </script>
@endsection
