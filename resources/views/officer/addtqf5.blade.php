@extends('template.officer')
@section('m3', 'active')
@section('a5', 'active')
@section('textpage', 'เพิ่มมคอ.5')

@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="h5">เพิ่มมคอ.5</h4>
                        </div>
                        <div class="card-body formtqf5">
                            <form class="form-horizontal" method="post">
                                @csrf
                                <input name="idtqf5" type="hidden" value="0">
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
                                    <select name="year" id="year" class="form-control selectpicker"
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
                                <div class="form-group d-flex justify-content-between">
                                    <h6>อาจารย์ผู้สอน</h6>
                                    {{-- <input type="text" id="teacher" name="teacher" class="form-control"
                                        placeholder="เลือกอาจารย์...">
                                    <div class="input-group-append"> --}}
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
                                                <th>กลุ่มเรียน</th>
                                                {{-- <th></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody id="sub_list">

                                            </tfoot>
                                    </table>
                                </div>
                                <br>
                                <center>
                                    <button class="btn btn-success w-100" type="button" onclick="savetqf5()">เพิ่ม</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addyear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เลือกภาคเรียน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ภาคเรียน</th>
                                <th>ปีการศึกษา</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($year as $item)
                                <tr>
                                    <td>{{ $item->term }}</td>
                                    <td>{{ $item->Year }}</td>

                                    <td class="tqfstatus">
                                        <!-- Call to action buttons -->
                                        <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button id="selectyear" class="btn btn-success btn-sm rounded-1"
                                                    type="button"
                                                    onclick="select5_term({{ $item->idYear }},'{{ $item->term }}/{{ $item->Year }}');">
                                                    เลือก
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                    </tfoot>
                            @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">เลือก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="addsubLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                                <th>กลุ่มเรียน</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub as $item)
                                <tr>
                                    <td><input id="checkbox5" type="checkbox" name="row-check5"
                                            value="{{ $item->idsubject }}"></td>
                                    <td>{{ $item->subjectCode }}</td>
                                    <td>{{ $item->THsubject }}</td>
                                    <td>{{ $item->group->groupname }}</td>

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
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">เลือก</button>
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
                                <th>ลำดับ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>คณะ</th>
                                <th>สาขา</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teach as $no => $teacher)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $teacher->Uprefix }}{{ $teacher->UFName }} {{ $teacher->ULName }}</td>
                                    <td>{{ isset($teacher->subfac->subBranch->factoryName) ? $teacher->subfac->subBranch->factoryName : 'ไม่ระบุ' }}
                                    </td>
                                    <td>{{ isset($teacher->subfac->branchName) ? $teacher->subfac->branchName : 'ไม่ระบุ' }}
                                    </td>

                                    <td class="tqfstatus">
                                        <!-- Call to action buttons -->
                                        <input id="checkboxt5" type="checkbox" name="row-teacher5"
                                            value="{{ $teacher->userID }}">
                                        {{-- <ul class="list-inline m-0">
                                            <li class="list-inline-item">
                                                <button id="selectteacher" class="btn btn-success btn-sm rounded-1"
                                                    type="button"
                                                    onclick="select5_teacher({{ $teacher->userID }},'{{ $teacher->Uprefix }}{{ $teacher->UFName }} {{ $teacher->ULName }}')">
                                                    เลือก
                                                </button>
                                            </li>
                                        </ul> --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">เลือก</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // $("#table_user").hide();
        // $("#table_sub").hide();
    </script>
@endsection
