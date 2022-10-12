@extends('template.officer')

@section('m2', 'active')
@section('e3', 'active')

@section('textpage', 'จัดการข้อมูลมคอ.3')

@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="showtqf3 row">

                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header align-items-center ">
                            <div class="pull-left">
                                <h4 class="h5">จัดการข้อมูลมคอ.3</h4>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-info" data-target="#addfasttqf3"
                                    data-toggle="modal">เพิ่มแบบรวดเร็ว</button>
                                <button class="btn btn-success" data-target="#addtqf3" data-toggle="modal">เพิ่ม</button>
                            </div>
                        </div>

                        <div class="card-body">
                            @include('index.search')
                            <div class="posts">
                                @include('officer.edittqf')
                            </div>

                        </div>
                        {{-- <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" style="width:100%"> 
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
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                                <td>{{ $item->subsubject->subjectCode }}</td>
                                                <td>{{ $item->subsubject->THsubject }}</td>
                                                <td>{{ $item->subsubject->cradit }}</td>
                                                <td>{{ $item->subsubject->group->groupname }}</td>
                                                @if (isset($item->subuser))
                                                    <td style="width: fit-content">
                                                        @foreach ($item->subuser as $user)
                                                            <p>{{ $user->Uprefix }}{{ $user->UFName }}
                                                                {{ $user->ULName }}</p>
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td>{{ formatDateThai($item->deadline) }}</td>
                                                <td
                                                    style="text-align: center;padding:5px!important;padding-top: 10px!important;">
                                                  
                                                    <button class="btn btn-success btn-sm rounded-1" type="button"
                                                        onclick="edit_TQF3({{ $item }})" data-toggle="modal"
                                                        data-target="#edittqf3" title="แก้ไข"><i
                                                            class="fa fa-edit"></i></button>

                                                    <button class="btn btn-danger btn-sm rounded-1" type="button"
                                                        onclick="deletetqf3({{ $item->tqf3ID }})" data-toggle="tooltip"
                                                        data-placement="top" title="ลบ"><i
                                                            class="fa fa-trash"></i></button>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
                                <div class="mx-auto row justify-content-between">
                                    <div class="col-md-auto p-0" style="text-align: -webkit-center;">แสดง
                                        {{ $data->firstItem() }} ถึง {{ $data->count() }} จาก
                                        {{ $data->total() }} รายการ</div>
                                    <div class="col-md-auto p-0" style="display: flex;justify-content: center;">
                                        {!! $data->appends(Request::all())->links() !!}</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
    </section>

    <!-- Modal -->
    <div class="addtqf modal fade bd-example-modal-xl" id="addfasttqf3" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มมคอ.3 แบบรวดเร็ว</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-control-label">วันที่สิ้นสุดการส่งมคอ.</label>
                                <input type="date" name="date" id="date" class="form-control"
                                    value="{{ isset($date->deadline) ? $date->deadline : '' }}">
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="form-group row col-md-5" style="justify-content: center;">
                                <label for="date" class="col-sm-4 col-form-label"
                                    style="text-align: end">เลือกข้อมูล</label>
                                <div class="col-sm-8">
                                    <select id="data_year" name="data_year" class="form-control">
                                        <option value="" selected disabled>เลือกปีการศึกษา</option>
                                        @foreach ($year as $k => $item)
                                            <option value="{{ $item->idYear }}">
                                                {{ $item->term }}/{{ $item->Year }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row col-md-7" style="justify-content: center;">
                                <label for="date" class="col-sm-4 col-form-label"
                                    style="text-align: end">วันที่สิ้นสุดการส่งมคอ.</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" id="date" class="form-control"
                                        value="{{ isset($date->deadline) ? $date->deadline : '' }}">
                                </div>
                            </div>
                        </div>

                        <br>
                    </form>
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-sm-5 col-form-label">
                                        <h5>ปีการศึกษาที่เลือกข้อมูล</h5>
                                    </label>
                                    {{-- <div class="col-sm-3">

                                    </div> --}}
                                </div>
                            </center>
                            {{-- <br> --}}
                            <div class="show_tqf">
                                @include('officer/manytqf')
                            </div>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-sm-5 col-form-label">
                                        <h5>ปีการศึกษาที่เพิ่มข้อมูล</h5>
                                    </label>
                                    <div class="col-sm-3">
                                        <select id="year" name="year" class="form-control">
                                            <option value="" selected disabled>เลือกปีการศึกษา...</option>
                                            @foreach ($year as $k => $item)
                                                <option value="{{ $item->idYear }}">
                                                    {{ $item->term }}/{{ $item->Year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </center>
                            {{-- <br> --}}
                            <div class="select_tqf">
                                <table id="example1" class="table table-bordered" style="width:100%">
                                    <thead class="headtable">
                                        <tr>
                                            <th style="width: 10px;">ภาคเรียนที่</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>หน่วยกิต</th>
                                            <th>กลุ่มเรียน</th>
                                            <th>ชื่ออาจารย์</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_select_tqf">
                                        {{-- @foreach ($data as $item)
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;">
                                                <input data-user="{{ $item->iduser }}"
                                                    data-subject="{{ $item->subsubject->idsubject }}"
                                                    data-id="{{ isset($item->tqf3ID) ? $item->tqf3ID : $item->tqf3ID }}"
                                                    style="width: 15px;height: 15px;" id="row-addtqf" type="checkbox"
                                                    name="row-addtqf">
                                            </td>
                                            <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                            <td>{{ $item->subsubject->subjectCode }}</td>
                                            <td>{{ $item->subsubject->THsubject }}</td>
                                            <td>{{ $item->subsubject->cradit }}</td>
                                            <td>{{ $item->subsubject->group->groupname }}</td>

                                            <td style="width: fit-content">
                                                @foreach ($item->subuser as $user)
                                                    <p>{{ $user->Uprefix }}{{ $user->UFName }}
                                                        {{ $user->ULName }}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success addfast-tqf3" type="button">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="addtqf modal fade" id="addtqf3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มมคอ.3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        @csrf
                        <input name="idtqf3" type="hidden" value="0">
                        {{-- <div class="input-group mb-3">
                            <input type="text" id="year" name="year" class="form-control"
                                placeholder="เลือกภาคเรียน...">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button" data-toggle="modal"
                                    data-target="#addyear">เลือกภาคเรียน</button>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="form-control-label">เลือกภาคเรียน</label>
                            <select name="tqf_year" id="tqf_year" class="form-control selectpicker"
                                data-live-search="true" title="กรุณาเลือกภาคเรียน">
                                @foreach ($year as $item)
                                    <option value="{{ $item->idYear }}">
                                        {{ $item->term }}/{{ $item->Year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">วันที่สิ้นสุดการส่งมคอ.</label>
                            <input type="date" name="date" id="date" class="form-control"
                                value="{{ isset($date->deadline) ? $date->deadline : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">อาจารย์ผู้รับผิดชอบรายวิชา</label>
                            <select name="tqf_teacher" id="tqf_teacher" class="form-control selectpicker"
                                data-live-search="true" title="กรุณาอาจารย์ผู้รับผิดชอบรายวิชา">
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->userID }}">
                                        {{ $item->Uprefix }}{{ $item->UFName }} {{ $item->ULName }}
                                        &nbsp;&nbsp;{{ isset($item->subfac->branchName) ? $item->subfac->branchName : 'ไม่ระบุ' }}
                                        {{-- &nbsp;&nbsp;{{ $item->subfac->subBranch->factoryName }} --}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <h6>อาจารย์ผู้สอน</h6>
                            {{-- <input type="text" id="teacher" name="teacher" class="form-control" --}}
                            {{-- placeholder="เลือกอาจารย์..."> --}}
                            {{-- <div class="input-group-append"> --}}
                            <button class="btn btn-info" type="button" data-toggle="modal"
                                data-target="#addteacher">เลือกอาจารย์</button>
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            <table id="table_user" class="table table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>คณะ</th>
                                        <th>สาขา</th>
                                    </tr>
                                </thead>
                                <tbody id="user_list">

                                    </tfoot>
                            </table>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <h6>วิชา</h6>
                            <button class="btn btn-info" type="button" data-toggle="modal"
                                data-target="#addsub">เลือกรายวิชา</button>
                        </div>
                        <div class="form-group">
                            <table id="table_sub" class="table table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        {{-- <th>กลุ่มเรียน</th> --}}
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="sub_list">

                                    </tfoot>
                            </table>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <h6>กลุ่มเรียน</h6>
                            <button class="btn btn-info" type="button" data-toggle="modal"
                                data-target="#addgroup">เลือกกลุ่มเรียน</button>
                        </div>
                        <div class="form-group">
                            <table id="table_group" class="table table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>กลุ่มเรียน</th>
                                    </tr>
                                </thead>
                                <tbody id="group_list">

                                    </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" onclick="savetqf3()">เพิ่ม</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="addsubLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsubLabel">เลือกรายวิชา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                {{-- <th>กลุ่มเรียน</th> --}}
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody id="data_sub">
                            @foreach ($sub as $item)
                                <tr>
                                    <td class="tqfstatus">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="checkbox3-{{ $item->idsubject }}" name="row-check3"
                                                value="{{ $item->idsubject }}">
                                            <label class="custom-control-label"
                                                for="checkbox3-{{ $item->idsubject }}"></label>
                                        </div>
                                        {{-- <input id="checkbox5" class="custom-control-input" type="checkbox"
                                            name="row-check5" value="{{ $item->idsubject }}"> --}}
                                    </td>
                                    <td>{{ $item->subjectCode }}</td>
                                    <td>{{ $item->THsubject }}</td>
                                    {{-- <td>{{ $item->group->groupname }}</td> --}}

                                    {{-- <td class="tqfstatus">
                                        <!-- Call to action buttons -->
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button class="btn btn-success btn-sm rounded-1" type="button">
                                                    เลือก
                                                </button>
                                            </li>
                                        </ul>
                                    </td> --}}
                                    </tfoot>
                            @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-btn btn-success" data-dismiss="modal">เลือก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addgroup" tabindex="-1" role="dialog" aria-labelledby="addgroupLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addgroupLabel">เลือกกลุ่มเรียน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example5" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>กลุ่มเรียน</th>
                                {{-- <th>กลุ่มเรียน</th> --}}
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody id="data_group">
                            @foreach ($group as $item)
                                <tr>
                                    <td class="tqfstatus">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="checkboxt3-{{ $item->groupID }}" name="row-group3"
                                                value="{{ $item->groupID }}">
                                            <label class="custom-control-label"
                                                for="checkboxt3-{{ $item->groupID }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $item->groupname }}</td>

                                    </tfoot>
                            @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-btn btn-success" data-dismiss="modal">เลือก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="edittqf modal fade" id="edittqf3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขมคอ.3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="formtqf3 form-horizontal" method="post">
                        @csrf
                        <input name="idtqf3" type="hidden" value="0">
                        <input name="sub_select" type="hidden" value="0">
                        <input name="is_file" type="hidden" value="0">
                        <div class="form-group">

                            <label for="exampleFormControlSelect1">ภาคเรียน : </label>
                            <select name="year" id="year" class="form-control">
                                @foreach ($year as $item)
                                    <option value="{{ $item->idYear }}">{{ $item->term }}/{{ $item->Year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">data-live-search="true"
                                title="Please select"
                            <label for="exampleFormControlSelect1">อาจารย์&nbsp;&nbsp; : </label>
                            <select name="teacher" id="select-testing" class="selectpicker" data-live-search="true"
                                title="Please select">
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->userID }}">{{ $item->Uprefix }}{{ $item->UFName }}
                                        {{ $item->ULName }}</option>
                                @endforeach

                            </select>
                        </div> --}}
                        <div class="form-group" id="form-deadline">
                            <label class="form-control-label">วันที่สิ้นสุดการส่งมคอ.</label>
                            <input name="dateline" type="date" class="form-control"
                                value="{{ isset($date->deadline) ? $date->deadline : '' }}">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">อาจารย์ผู้รับผิดชอบรายวิชา</label>
                            <select name="tqf_teacher" id="tqf_teacher" class="form-control selectpicker"
                                data-live-search="true" title="กรุณาอาจารย์ผู้รับผิดชอบรายวิชา">
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->userID }}">
                                        {{ $item->Uprefix }}{{ $item->UFName }} {{ $item->ULName }}
                                        &nbsp;&nbsp;{{ isset($item->subfac->branchName) ? $item->subfac->branchName : 'ไม่ระบุ' }}
                                        {{-- &nbsp;&nbsp;{{ $item->subfac->subBranch->factoryName }} --}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">เลือกกลุ่มเรียน</label>
                            <select name="tqf_group" id="tqf_group" class="form-control selectpicker"
                                data-live-search="true" title="กรุณาเลือกกลุ่มเรียน">
                                @foreach ($group as $item)
                                    <option value="{{ $item->groupID }}">{{ $item->groupname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <h6>อาจารย์ผู้สอน</h6>
                            <button class="btn btn-info" type="button" data-toggle="modal"
                                data-target="#addteacher">เลือกอาจารย์</button>
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>คณะ</th>
                                        <th>สาขา</th>
                                    </tr>
                                </thead>
                                <tbody id="user_list">
                                    </tfoot>
                            </table>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <h6>วิชา</h6>
                            <button class="btn btn-info" type="button" data-toggle="modal"
                                data-target="#selectsub">เลือกรายวิชา</button>
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        {{-- <th>กลุ่มเรียน</th> --}}
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="tabletqf">
                                    {{-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td class="tqfstatus">
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-danger btn-sm rounded-1" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </td> --}}
                                    </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="edittqf3()" class="btn btn-success">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="selectsub" tabindex="-1" role="dialog" aria-labelledby="addsubLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsubLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example4" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th>รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                {{-- <th>กลุ่มเรียน</th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub as $item)
                                <tr>
                                    <td>{{ $item->subjectCode }}</td>
                                    <td>{{ $item->THsubject }}</td>
                                    {{-- <td>{{ $item->group->groupname }}</td> --}}

                                    <td class="tqfstatus">
                                        <!-- Call to action buttons -->
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button class="btn btn-success btn-sm rounded-1" type="button"
                                                    onclick="selectsubject({{ $item }})"
                                                    id="sub-{{ $item->idsubject }}">
                                                    เลือก
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tfoot>
                            @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-btn btn-success" data-dismiss="modal">เลือก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addteacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เลือกอาจารย์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example3" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>คณะ</th>
                                <th>สาขา</th>
                            </tr>
                        </thead>
                        <tbody id="data_user">
                            @foreach ($teacher as $no => $teach)
                                <tr>
                                    <td class="tqfstatus">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="teacher3-{{ $teach->userID }}" name="row-teacher3"
                                                value="{{ $teach->userID }}">
                                            <label class="custom-control-label"
                                                for="teacher3-{{ $teach->userID }}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $teach->Uprefix }}{{ $teach->UFName }} {{ $teach->ULName }}</td>
                                    <td>{{ isset($teach->subfac->subBranch->factoryName) ? $teach->subfac->subBranch->factoryName : 'ไม่ระบุ' }}
                                    </td>
                                    <td>{{ isset($teach->subfac->branchName) ? $teach->subfac->branchName : 'ไม่ระบุ' }}
                                    </td>


                                </tr>
                            @endforeach
                            </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">เลือก</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $("#text-search").change(function(e) {
            e.preventDefault();
            setTimeout(() => {
                $('#search').submit();
            }, 300);
            console.log(this.val());

        });
        $('#year').selectize();

        // $(document).on('click', '.pagination a', function(e) {
        //     e.preventDefault();
        //     $('#load').append(
        //         '<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />'
        //         );
        //     var url = $(this).attr('href');
        //     window.history.pushState("", "", url);
        //     loadPosts(url);
        // });

        // function loadPosts(url) {
        //     $.ajax({
        //         url: url
        //     }).done(function(data) {
        //         $('.posts').html(data);
        //     }).fail(function() {
        //         console.log("Failed to load data!");
        //     });
        // }

        var input = [];
        var id = [];
        var table = $('#example1').DataTable({
            "ordering": false,
            "pageLength": 20,
            "lengthChange": false,
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
        });

        $(document).on('click', 'input:checkbox[name="row-all"]', function() {
            table.clear().draw();
            console.log(id);
            var t = $('#example').DataTable();
            t.rows().every(function(rowIdx) {
                const node = $(this.node()).first().find('[name="row-addtqf"]');
                if ($('input:checkbox[name="row-all"]').is(':checked')) {
                    var value = {
                        teacher_id: JSON.stringify(node.data('user')),
                        arr_sub: node.data('subject'),
                        arr_group: node.data('group'),
                        teacher: node.data('teacher'),
                        id_tqf3: 0
                    }
                    input.push(value);
                    id.push(node.data('id'));
                    node.prop("checked", true)
                } else {
                    var value = {
                        teacher_id: JSON.stringify(node.data('user')),
                        arr_sub: node.data('subject'),
                        arr_group: node.data('group'),
                        teacher: node.data('teacher'),
                        id_tqf3: 0
                    }
                    input.splice($.inArray(value, input), 1);
                    id.splice($.inArray(node.data('id'), id), 1);
                    node.prop("checked", false)
                }
            }); // $('.show_tqf').find('tbody tr').each(function(index, element) {
            //     var dd = $($(element).find("td:eq(0) input"));
            //     var t = $('#example1').DataTable();
            //     $.each(id, function(indexInArray, valueOfElement) {
            //         console.log(valueOfElement, $(dd).data('id'));
            //         if (valueOfElement == $(dd).data('id')) {
            //             table.row.add([$(element).find("td:eq(1)").text(), $(element)
            //                     .find(
            //                         "td:eq(2)").text(), $(element).find("td:eq(3)")
            //                     .text(), $(
            //                         element).find("td:eq(4)").text(), $(element)
            //                     .find(
            //                         "td:eq(5)").text(), $(element).find("td:eq(6)")
            //                     .text()
            //                 ]).draw()
            //                 .node();
            //         }
            //     });
            // });
            t.rows().every(function(rowIdx) {
                var dd = $(this.node()).first().find("td:eq(0) input");
                const node = $(this.node()).first();

                $.each(id, function(indexInArray, valueOfElement) {
                    // console.log(valueOfElement, $(dd).data('id'));
                    if (valueOfElement == $(dd).data('id')) {
                        table.row.add([
                            node.find("td:eq(1)").text(),
                            node.find("td:eq(2)").text(),
                            node.find("td:eq(3)").text(),
                            node.find("td:eq(4)").text(),
                            node.find("td:eq(5)").text(),
                            node.find("td:eq(6)").text()
                        ]).draw().node();
                    }
                });
            });
        });

        $(document).on('click', 'input:checkbox[name=row-addtqf]', function() {
            table.clear().draw();
            if ($(this).is(':checked')) {
                var value = {
                    teacher_id: JSON.stringify($(this).data('user')),
                    arr_sub: $(this).data('subject'),
                    arr_group: $(this).data('group'),
                    teacher: node.data('teacher'),
                    id_tqf3: 0,

                }
                input.push(value);
                id.push($(this).data('id'));
                // user.push($(this).data('user')); 
            } else {
                var value = {
                    teacher_id: JSON.stringify($(this).data('user')),
                    arr_sub: $(this).data('subject'),
                    arr_group: $(this).data('group'),
                    teacher: $(this).data('teacher'),
                    id_tqf3: 0
                }
                input.splice($.inArray(value, input), 1);
                id.splice($.inArray($(this).data('id'), id), 1);
                // user.splice($.inArray($(this).data('user'), user), 1);
            }
            var t = $('#example').DataTable();
            t.rows().every(function(rowIdx) {
                var dd = $(this.node()).first().find("td:eq(0) input");
                const node = $(this.node()).first();
                $.each(id, function(indexInArray, valueOfElement) {
                    // console.log(valueOfElement, $(dd).data('id'));
                    if (valueOfElement == $(dd).data('id')) {
                        table.row.add([
                            node.find("td:eq(1)").text(),
                            node.find("td:eq(2)").text(),
                            node.find("td:eq(3)").text(),
                            node.find("td:eq(4)").text(),
                            node.find("td:eq(5)").text(),
                            node.find("td:eq(6)").text()
                        ]).draw().node();
                    }
                });
            });

            console.log(input, id);
        });

        $('#data_year').change(function(e) {
            e.preventDefault();
            console.log($(this).val())
            load_fast_tqf3()

        });

        $('#addfasttqf3').on('show.bs.modal', function() {
            $('#addfasttqf3 select#year').val(dd_year);
            load_fast_tqf3()
        });

        $('#addtqf3').on('show.bs.modal', function() {
            $('#addtqf3 select#tqf_year').val(dd_year)
            $('select[name="tqf_year"]').selectpicker('refresh');
        })

        $('#selectsub').on('show.bs.modal', function() {
            var t = $('#example4').DataTable();
            const id = $('input[name="sub_select"]').val();
            console.log('#sub' + id);
            t.rows().every(function(rowIdx) {
                $(this.node()).first().find('#sub-' + id + '').prop('disabled', true);
                // console.log('Row ' + (rowIdx + 1) + ' first value: ' + firstVal);
            });
        });

        $('#addfasttqf3').on('hidden.bs.modal', function() {
            input = []
            id = [];
        });

        function load_fast_tqf3() {
            $.ajax({
                type: "get",
                url: "/tqf/addfastqf3?year=" + $('#data_year').val(),
                dataType: "html",
                success: function(response) {
                    $('.show_tqf').html(response);
                    $('#example').DataTable();
                    id = []
                    var table = $('#example1').DataTable();
                    table.clear().draw();
                    $(document).find('[name="row-addtqf"]').each(function(index, element) {
                        $.each(id, function(i, val) {

                            if (val == $(element).data('id')) {
                                $(element).prop("checked", true)
                                // console.log(element);
                            }
                        });

                    });
                }
            });
        }

        $('.addfast-tqf3').on('click', function() {

            var _token = $('#addfasttqf3 input[name=_token]').val();
            var term3_id = $('#addfasttqf3 select[name=year]').val();
            var date = $('#addfasttqf3 input[id=date]').val();
            // console.log(date)
            const check_date1 = $('#addfasttqf3 #data_year option:selected').text().trim().split("/");
            const check_date2 = $('#addfasttqf3 select[name=year] option:selected').text().trim().split("/");

            if (input.length == 0 || term3_id == '' || date == '') {
                Swal.fire({
                    title: 'กรุณาใส่ข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
            } else if ((check_date1[1] - 0) > (check_date2[1] - 0)) {
                Swal.fire({
                    title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
            } else if ((check_date1[1] - 0) == (check_date2[1] - 0) && (check_date1[0] - 0) >= (check_date2[0] -
                    0)) {
                Swal.fire({
                    title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
                // }
                // console.log(check_date1[0] - 0);
                // else{
                //     Swal.fire({
                //         title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                //         icon: 'error',
                //         confirmButtonText: 'ตกลง',
                //         showCloseButton: true
                //     });
                //     return;
                // }

            } else {
                var data = {
                    _token: _token,
                    term_id: term3_id,
                    date: date,
                    id_tqf3: 1,
                    data: JSON.stringify(input)
                };
                $('#loader').removeClass('hidden');
                console.log(data);
                $.ajax({
                    url: '/addfasttqf3',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    //JSON.stringify()
                    success: function(response) {
                        $('#loader').addClass('hidden');
                        if (response.success) {

                            $("input:checkbox[name=row-addtqf]").prop("checked", false);
                            Swal.fire({
                                title: 'เพิ่มข้อมูลสำเร็จ',
                                text: '',
                                icon: 'success',
                                confirmButtonText: 'ตกลง',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 300);
                        } else {
                            Swal.fire({
                                title: 'เพิ่มข้อมูลไม่สำเร็จ',
                                icon: 'error',
                                confirmButtonText: 'ตกลง',
                                showCloseButton: true
                            });
                        }
                    },
                    error: function(error) {
                        // console.log(error);
                        // Swal.fire({
                        //     title: 'PHP ERROR',
                        //     icon: 'error',
                        //     confirmButtonText: 'ตกลง',
                        //     showCloseButton: true
                        // });
                    }
                });

            }
        });
    </script>

@endsection
{{-- <form class="form-inline" id="search" action="edittqf3" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" name="search" id="text-search">
                                    <button type="submit" hidden class="btn btn-primary btn-sm ml-2">ค้นหา</button>
                                </div>
                            </form> --}}
