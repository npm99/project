@extends('template.teacher')

{{-- @section('textscript')
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            Swal.fire({
                title: msg,
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        }

    </script>
@endsection --}}
@section('tqf5', 'active')
{{-- @foreach ($tqf as $item)

    @endforeach --}}
@section('textpage', 'บันทึกมคอ.5')

@section('pageheader')
    <div class="breadcrumb-holder">
        <ul class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
            <li class="breadcrumb-item align-items-center" style="width: 100%">
                <form action="{{ url('/tqf/addtqf5/' . $tqf->tqf5ID) }}" method="post">
                    @csrf
                    <h5>รายงานผลการดำเนินการของรายวิชา (มคอ.5) วิชา {{ $tqf->subsubject->THsubject }}</h5>
                    <span style="margin-left: 20px;color: #17a2b8;"><b>* หากต้องการกรอกข้อมูลว่าง กรุณาใส่ - ลงในช่อง และระบบจัดเก็บข้อมูลไว้ หากยังไม่กดบันทึก (สถานะการจัดทำจะไม่แสดง หากไม่บันทึกข้อมูล)</b></span>
                    
                    {{-- <div class="row exports-tqf5 align-items-center" style="float: right;margin-right: 10px"> --}}
                    {{-- <div class="row" style="width: 300px;float: right;margin-right: 10px">
                        <input type="text" name="idtqf5" value="{{ $tqf->tqf5ID }}" hidden>
                        <input type="text" name="sub" value="{{ $tqf->subject_idSubject }}" hidden>
                        <input type="text" name="year" value="{{ $tqf->subyear->Year }}" hidden>
                        <input type="text" name="term" value="{{ $tqf->subyear->term }}" hidden>
                        <label for="staticEmail" class="col-sm-4 col-form-label"
                            style="padding-right: 5px;padding-left: 10px;text-align: end;">ปีการศึกษา: </label>
                        <div class="col-md-5">
                            <select id="year" class="form-control" name="year">
                                <option value="" selected></option>
                                @foreach ($year as $item)
                                    <option value="{{ $item->idYear }}">{{ $item->term }}/{{ $item->Year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" id="copy-tqf5-submit" class="btn btn-primary btn-sm" hidden></button>
                        <button type="button" class="btn btn-primary btn-sm copy-tqf5">คัดลอก</button>
                    </div> --}}
                    {{-- <div class="form-group row" style="margin-right: 20px">
                        <input type="text" name="idtqf5" value="{{ $tqf->tqf5ID }}" hidden>
                        <input type="text" name="sub" value="{{ $tqf->subject_idSubject }}" hidden>
                        <input type="text" name="year" value="{{ $tqf->subyear->Year }}" hidden>
                        <input type="text" name="term" value="{{ $tqf->subyear->term }}" hidden>
                        <div class=""></div>
                        <label for="select_year" class="control-label">ภาคเรียน:</label>
                        <div class="col-sm-6">
                        <select id="year" class="form-control" name="year">
                                    <option value="" selected></option>
                                    @foreach ($year as $item)
                                        <option value="{{ $item->idYear }}">{{ $item->term }}/{{ $item->Year }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                    </div> --}}

                    {{-- </div> --}}
                </form>
            </li>
        </ul>


    </div>
@endsection

@section('content')
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            {{-- <a class="nav-item nav-link " id="course-tab" data-toggle="tab" href="#course" role="tab"
                aria-controls="หลักสูตร" aria-selected="true">หลักสูตร</a> --}}
            <a class="nav-item nav-link active {{isset($tqf->tqf5_1)&&$tqf->status==4?'page-save':''}}" id="tqf5-tab1" href="#tqf5-1" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 2" aria-selected="true">หมวดที่ 1</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_2)&&$tqf->status==4?'page-save':''}}" id="tqf5-tab2" href="#tqf5-2" onclick="return false;" role="tab" aria-controls="หมวดที่ 2"
                aria-selected="false">หมวดที่ 2</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_2->data1_1) && $tqf->tqf5_2->data1_1 != ''&&$tqf->status==4?'page-save':''}}" id="tqf5-tab3" href="#tqf5-21" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 2.1" aria-selected="false">หมวดที่ 2.1</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_2->data1_2) && $tqf->tqf5_2->data1_2 != ''&&$tqf->status==4?'page-save':''}}" id="tqf5-tab4" href="#tqf5-22" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 2.2" aria-selected="false">หมวดที่ 2.2</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_3)&&$tqf->status==4?'page-save':''}}" id="tqf5-tab5" href="#tqf5-3" onclick="return false;" role="tab" aria-controls="หมวดที่ 3"
                aria-selected="false">หมวดที่ 3</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_3->grade) && $tqf->tqf5_3->grade != ''&&$tqf->status==4?'page-save':''}}" id="tqf5-tab6" href="#tqf5-31" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 3.1" aria-selected="false">หมวดที่ 3.1</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_4)&&$tqf->status==4?'page-save':''}}" id="tqf5-tab7" href="#tqf5-4" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 4" aria-selected="true">หมวดที่ 4</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_5)&&$tqf->status==4?'page-save':''}}" id="tqf5-tab8" href="#tqf5-5" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 5" aria-selected="false">หมวดที่ 5</a>
            <a class="nav-item nav-link {{isset($tqf->tqf5_6)&&$tqf->status==4?'page-save':''}}" id="tqf5-tab9" href="#tqf5-6" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 6" aria-selected="false">หมวดที่ 6</a>
        </div>
    </nav>

    <section class="forms">
        <input type="hidden" name="idtqf5" value="{{ $tqf->tqf5ID }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="tab-content px-md-3 px-sm-0" id="nav-tabContent">
                        {{-- <div class="tab-pane fade " id="course" role="tabpanel" aria-labelledby="tab">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">หลักสูตร</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class=" form-control-label">หลักสูตร</label>
                                                <select id="select-course" class="form-control" name="course">
                                                    <option selected>เลือกหลักสูตร...</option>
                                                    @foreach ($tqf->course as $item)
                                                        <option value={{ $item->c_id }} @if ($tqf->course_id) selected @endif>{{ $item->courseName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="col-sm-6 offset-sm-5">
                                                <button type="button"
                                                    class="btn btn-primary coursetqf5-submit">บันทึก</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                        <div class="tab-pane fade show active" id="tqf5-1" role="tabpanel" aria-labelledby="tqf5-tab1">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">ข้อมูลทั่วไป</h4>
                                    <span id="empty-tqf5-1" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-1">
                                    <form id="formtqf5-1" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ชื่อรายวิชา (ภาษาไทย) <span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" maxlength="500" type="text" id="thname" name="thname">@if (isset($tqf->tqf5_1)){{ $tqf->tqf5_1->THname }}@else{{ $tqf->subsubject->THsubject }}@endif
                                                    </textarea>
                                                    <span id="empty-thname"
                                                        style="display: none;color: red">กรอกข้อมูลชื่อรายวิชา
                                                        (ภาษาไทย)</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ชื่อรายวิชา (ภาษาอังกฤษ) <span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" maxlength="500" type="text" id="enname" name="enname">@if (isset($tqf->tqf5_1)){{ $tqf->tqf5_1->ENname }}@else{{ $tqf->subsubject->ENsubject }}@endif
                                                    </textarea>
                                                    <span id="empty-enname"
                                                        style="display: none;color: red">กรอกข้อมูลชื่อรายวิชา
                                                        (ภาษาอังกฤษ)</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">รายวิชาที่ต้องเรียนก่อนรายวิชานี้
                                                    (ถ้ามี)</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" maxlength="500" type="text" id="pre" name="pre">@if (isset($tqf->tqf5_1)){{ $tqf->tqf5_1->pre_req }}@endif</textarea>
                                                    <span id="empty-pre"
                                                        style="display: none;color: red">กรอกข้อมูลรายวิชาที่ต้องเรียนก่อนรายวิชานี้</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">อาจารย์ผู้รับผิดชอบรายวิชา
                                                    อาจารย์ผู้สอน และกลุ่มเรียน (section) <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="teacher" name="teacher">@if (isset($tqf->tqf5_1)){{ $tqf->tqf5_1->teacher }}@endif</textarea>
                                                    <span id="empty-teacher"
                                                        style="display: none;color: red">กรอกข้อมูลอาจารย์ผู้รับผิดชอบรายวิชา
                                                        อาจารย์ผู้สอน และกลุ่มเรียน</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 form-control-label">ภาคการศึกษา/ปีการศึกษาที่เปิดสอนรายวิชา <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="term" name="term">@if (isset($tqf->tqf5_1)){{ $tqf->tqf5_1->term }}@endif</textarea>
                                                    <span id="empty-term"
                                                        style="display: none;color: red">กรอกข้อมูลภาคการศึกษา/ปีการศึกษาที่เปิดสอนรายวิชา</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">สถานที่เรียน <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="place" name="place">@if (isset($tqf->tqf5_1)){{ $tqf->tqf5_1->place }}@endif</textarea>
                                                    <span id="empty-place"
                                                        style="display: none;color: red">กรอกข้อมูลสถานที่เรียน</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_1()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-2" role="tabpanel" aria-labelledby="tqf5-tab2">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    {{-- <div class="col-sm-12 d-flex justify-content-between"> --}}
                                    <h4 class="h5">การจัดการเรียนการสอนที่เปรียบเทียบกับแผนการสอน</h4>
                                    <span id="empty-tqf5-2" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    {{-- <span> --}}
                                    {{-- <button class="add-rowtqf52 btn btn-primary btn-sm"><i
                                    class="fa fa-plus-circle"></i>&nbsp;เพิ่มแถว</button> --}}
                                    {{-- </span> --}}
                                    {{-- </div> --}}
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-2">
                                    <form id="formtqf5-2" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{-- <label class="form-control-label">หัวข้อที่สอนไม่ครอบคลุมตามแผน</label> --}}
                                                {{-- <div style="margin-left: 40px"> --}}
                                                <div class="form-group row">
                                                    <label class="col-sm-3 form-control-label">หัวข้อที่สอนไม่ครอบคลุมตามแผน <span style="color: red">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" maxlength="2500" type="text" id="data1" name="data1">@if (isset($tqf->tqf5_2)){{ $tqf->tqf5_2->data2_1 }}@endif</textarea>
                                                        <span id="empty-data1"
                                                            style="display: none;color: red">กรอกข้อมูลหัวข้อที่สอนไม่ครอบคลุมตามแผน</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 form-control-label">นัยสำคัญของหัวข้อที่สอน <span style="color: red">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" maxlength="1000" type="text" id="data2" name="data2">@if (isset($tqf->tqf5_2)){{ $tqf->tqf5_2->data2_2 }}@endif</textarea>
                                                        <span id="empty-data2"
                                                            style="display: none;color: red">กรอกข้อมูลนัยสำคัญของหัวข้อที่สอน</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 form-control-label">แนวทางชดเชย <span style="color: red">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" maxlength="100" type="text" id="data3" name="data3">@if (isset($tqf->tqf5_2)){{ $tqf->tqf5_2->data2_3 }}@endif</textarea>
                                                        <span id="empty-data3"
                                                            style="display: none;color: red">กรอกข้อมูลแนวทางชดเชย</span>
                                                    </div>
                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-3 form-control-label">ข้อเสนอการดำเนินการเพื่อปรับปรุงวิธีสอน <span style="color: red">*</span>
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control formtextarea" type="text" id="data4" name="data4">@if (isset($tqf->tqf5_2)){{ $tqf->tqf5_2->data4 }}@endif</textarea>
                                                        <span id="empty-data4"
                                                            style="display: none;color: red">กรอกข้อมูลข้อเสนอการดำเนินการเพื่อปรับปรุงวิธีสอน</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_2()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-21" role="tabpanel" aria-labelledby="tqf5-tab2">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    {{-- <div class="col-sm-12 d-flex justify-content-between"> --}}
                                    <h4 class="h5">การจัดการเรียนการสอนที่เปรียบเทียบกับแผนการสอน</h4>
                                    <span id="empty-tqf5-21" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                    {{-- <span> --}}
                                    {{-- <button class="add-rowtqf52 btn btn-primary btn-sm"><i
                                    class="fa fa-plus-circle"></i>&nbsp;เพิ่มแถว</button> --}}
                                    {{-- </span> --}}
                                    {{-- </div> --}}
                                </div>
                                <div class="card-body">
                                    <form id="formtqf5-21" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="col-sm-12 d-flex justify-content-between">
                                                    <label class="form-control-label">
                                                        รายงานชั่วโมงการสอนจริงเทียบกับแผนการสอน <span style="color: red">*</span></label>
                                                    <span>
                                                        <button type="button"
                                                            class="add-rowtqf521 btn btn-primary btn-sm"><i
                                                                class="fa fa-plus-circle"></i>&nbsp;เพิ่มรายการ</button>
                                                    </span>
                                                </div>
                                                <br>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" style="min-width: 400px;">
                                                        <thead>
                                                            <tr>
                                                                <th>หัวข้อ</th>
                                                                <th style="width: 90px">จำนวนชั่วโมง<br>ตามแผนการสอน</th>
                                                                <th style="width: 90px">จำนวน<br>ชั่วโมงที่ได้สอนจริง</th>
                                                                <th>เหตุผลที่การสอนจริงต่างจากแผนการสอน<br>หากมีความแตกต่างเกิน
                                                                    25%
                                                                </th>
                                                                {{-- <th></th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tqf521">
                                                            @if (isset($tqf->tqf5_2->data1_1) && $tqf->tqf5_2->data1_1 != '')
                                                                @foreach ($tqf->tqf5_2->data1_1 as $item)
                                                                    <tr>
                                                                        <td>
                                                                            <textarea class="form-control" maxlength="1000" type="text" name="detail">{{ $item->detail }}</textarea>
                                                                        </td>
                                                                        <td><input class="form-control" type="number" min="1"  max="24" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                                                name="hour1" value="{{ $item->hour1 }}">
                                                                        </td>
                                                                        <td><input class="form-control" type="number" min="1"  max="24" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                                                name="hour2" value="{{ $item->hour2 }}">
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control" maxlength="1000" type="text" name="reason">{{ $item->reason }}</textarea>
                                                                        </td>
                                                                        {{-- <td></td> --}}
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td>
                                                                        <textarea class="form-control" maxlength="1000" type="text" name="detail"></textarea>
                                                                    </td>
                                                                    <td><input class="form-control" type="number" min="1"  max="24" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                                            name="hour1">
                                                                    </td>
                                                                    <td><input class="form-control" type="number" min="1"  max="24" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                                            name="hour2">
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" maxlength="1000" type="text" name="reason"></textarea>
                                                                    </td>
                                                                    {{-- <td></td> --}}
                                                                </tr>

                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_2_1()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-22" role="tabpanel" aria-labelledby="tqf5-tab3">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">การจัดการเรียนการสอนที่เปรียบเทียบกับแผนการสอน</h4>
                                    <span id="empty-tqf5-22" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body">
                                    <form id="formtqf5-22" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group">
                                                {{-- <div class="col-sm-12 d-flex justify-content-between"> --}}
                                                <label class="form-control-label">
                                                    ประสิทธิผลของวิธีสอนที่ทำให้เกิดผลการเรียนรู้ตามที่ระบุในรายละเอียดของรายวิชา <span style="color: red">*</span></label>
                                                {{-- <span>
                                                        <button type="button"
                                                            class="add-rowtqf522 btn btn-primary btn-sm"><i
                                                                class="fa fa-plus-circle"></i>&nbsp;เพิ่มแถว</button>
                                                    </span> --}}
                                                {{-- </div> --}}
                                                <br>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" style="min-width: 400px;">
                                                        <thead>
                                                            <tr>
                                                                <th>ผลการเรียนรู้</th>
                                                                <th>วิธีสอนที่ระบุในรายละเอียดของรายวิชา</th>
                                                                <th>ประสิทธิผล</th>
                                                                <th>ปัญหาของการใช้วิธีสอน(ถ้ามี) พร้อมข้อเสนอแนะในการแก้ไข
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tqf522">
                                                            @if (isset($tqf->tqf5_2->data1_2) && $tqf->tqf5_2->data1_2 != '')
                                                                @foreach ($tqf->tqf5_2->data1_2 as $i => $item)
                                                                    <tr>
                                                                        <td>
                                                                            <textarea class="form-control" maxlength="1000" type="text" name="learn_outcome">{{ $item->learn_outcome }}</textarea>
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control" maxlength="1000" type="text" name="description">{{ $item->description }}</textarea>
                                                                        </td>

                                                                        @if (!isset($item->effect))
                                                                            <td>
                                                                                <fieldset id="group{{ $i }}">
                                                                                    <input type="radio"
                                                                                        name="effect{{ $i }}"
                                                                                        value="yes">
                                                                                    <label for="yes">มี</label><br>
                                                                                    <input type="radio"
                                                                                        name="effect{{ $i }}"
                                                                                        value="no">
                                                                                    <label for="no">ไม่มี</label>
                                                                                </fieldset>
                                                                            </td>
                                                                        @else<td>
                                                                                <fieldset id="group{{ $i }}">
                                                                                    <input type="radio"
                                                                                        name="effect{{ $i }}"
                                                                                        value="yes"
                                                                                        @if ($item->effect == 'yes') checked @endif>
                                                                                    <label for="yes">มี</label><br>
                                                                                    <input type="radio"
                                                                                        name="effect{{ $i }}"
                                                                                        value="no"
                                                                                        @if ($item->effect == 'no') checked @endif>
                                                                                    <label for="no">ไม่มี</label>
                                                                                </fieldset>
                                                                            </td>
                                                                        @endif


                                                                        <td>
                                                                            <textarea class="form-control" maxlength="1000" type="text" name="problem">{{ $item->problem }}</textarea>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <td>
                                                                        <textarea class="form-control" maxlength="1000" type="text" name="learn_outcome"></textarea>
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" maxlength="1000" type="text" name="description"></textarea>
                                                                    </td>
                                                                    <td>
                                                                        <fieldset id="group{{ $i }}">
                                                                            <input type="radio"
                                                                                name="effect{{ $i }}"
                                                                                value="yes" checked>
                                                                            <label for="yes">มี</label><br>
                                                                            <input type="radio"
                                                                                name="effect{{ $i }}"
                                                                                value="no">
                                                                            <label for="no">ไม่มี</label>
                                                                        </fieldset>
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" maxlength="1000" type="text" name="problem"></textarea>
                                                                    </td>
                                                                    </tr>
                                                                @endfor
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_2_2()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-3" role="tabpanel" aria-labelledby="tqf5-tab4">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">สรุปผลการจัดการเรียนการสอนของรายวิชา</h4>
                                    <span id="empty-tqf5-3" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-3">
                                    <form id="formtqf5-3" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">จำนวนนักศึกษาที่ลงทะเบียนเรียน <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="number" min="1"  max="1000" id="num_regis" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                        name="num_regis"
                                                        @if (isset($tqf->tqf5_3)) value="{{ $tqf->tqf5_3->num_regis }}" @endif>
                                                </div>
                                                <label class="col-sm-3 form-control-label">&nbsp; คน</label>  
                                                <div class="col-sm-3"></div><span id="empty-num_regis" style="display: none;color: red;">  กรอกข้อมูลจำนวนนักศึกษาที่ลงทะเบียนเรียน</span>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 form-control-label">จำนวนนักศึกษาที่คงอยู่เมื่อสิ้นสุดภาคการศึกษา <span style="color: red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="number" min="1"  max="1000" id="num_end" name="num_end" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                        @if (isset($tqf->tqf5_3)) value="{{ $tqf->tqf5_3->num_end }}" @endif>
                                                </div>
                                                <label class="col-sm-3 form-control-label">&nbsp; คน</label>
                                                <div class="col-sm-3"></div><span id="empty-num_end" style="display: none;color: red;">  กรอกข้อมูลจำนวนนักศึกษาที่คงอยู่เมื่อสิ้นสุดภาคการศึกษา</span>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">จำนวนนักศึกษาที่ถอน (W) <span style="color: red">*</span></label>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="number" min="1"  max="1000" id="num_w" name="num_w" onkeypress="return !(event.charCode == 45||event.charCode == 46)"
                                                        @if (isset($tqf->tqf5_3)) value="{{ $tqf->tqf5_3->num_w }}" @endif>
                                                        
                                                </div>
                                                <label class="col-sm-3 form-control-label">&nbsp; คน</label>
                                                <div class="col-sm-3"></div><span id="empty-num_w" style="display: none;color: red;">  กรอกข้อมูลจำนวนนักศึกษาที่ถอน</span>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">
                                                    ปัจจัยที่ทำให้ระดับคะแนนผิดปกติ <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" maxlength="2500" class="form-control" type="text" id="detail5" name="detail5">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail5 }}@endif</textarea>
                                                    <span id="empty-detail5" style="display: none;color: red;">  กรอกข้อมูลปัจจัยที่ทำให้ระดับคะแนนผิดปกติ</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">
                                                    ความคลาดเคลื่อนจากแผนการประเมินที่กำหนดไว้ในรายละเอียดรายวิชา
                                                    (มคอ.3)</label>

                                                <div>
                                                    <div class="form-group">
                                                        <label style="margin-left: 40px" class="form-control-label">1.
                                                            ความคลาดเคลื่อนด้านกำหนดเวลาการประเมิน <span style="color: red">*</span></label>
                                                        <div class="row" style="text-align: center">
                                                            <div class="col-md-6 col-sm-6">
                                                                <p>ความคลาดเคลื่อน</p>
                                                                <textarea type="text" class="form-control" maxlength="1000" id="detail6_1_1" name="detail6_1_1">@if (isset($tqf->tqf5_3))@if (isset($tqf->tqf5_3->detail6_1['discrepancy'] )){{ $tqf->tqf5_3->detail6_1['discrepancy'] }}@endif @endif</textarea>
                                                                <span id="empty-detail6_1_1" style="display: none;color: red;">  กรอกข้อมูลความคลาดเคลื่อน</span>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <p>เหตุผล</p>
                                                                <textarea type="text" class="form-control" maxlength="1000" id="detail6_1_2" name="detail6_1_2">@if (isset($tqf->tqf5_3))@if (isset($tqf->tqf5_3->detail6_1['reason'] )){{ $tqf->tqf5_3->detail6_1['reason'] }}@endif @endif</textarea>
                                                                <span id="empty-detail6_1_2" style="display: none;color: red;">  กรอกข้อมูลเหตุผล</span>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <label class="col-sm-3 form-control-label"
                                                                for="detail6_1_1">ความคลาดเคลื่อน</label>
                                                            <textarea type="text" class="form-control" maxlength="2500" id="detail6_1_1"
                                                                name="detail6_1_1">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail6_1['discrepancy'] }}@endif</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 form-control-label"
                                                                for="detail6_1_2">เหตุผล</label>
                                                            <textarea type="text" class="form-control" maxlength="2500" 
                                                                name="detail6_1_2">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail6_1['reason'] }}@endif</textarea>
                                                        </div> --}}
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="margin-left: 40px" class="form-control-label">2.
                                                            ความคลาดเคลื่อนด้านวิธีการประเมินผลการเรียนรู้ <span style="color: red">*</span></label>
                                                        <div class="row" style="text-align: center">
                                                            <div class="col-md-6 col-sm-6">
                                                                <p>ความคลาดเคลื่อน</p>
                                                                <textarea type="text" class="form-control" maxlength="1000" id="detail6_2_1"  name="detail6_2_1">@if (isset($tqf->tqf5_3))@if (isset($tqf->tqf5_3->detail6_2['discrepancy'])){{ $tqf->tqf5_3->detail6_2['discrepancy'] }}@endif @endif</textarea>
                                                                <span id="empty-detail6_2_1" style="display: none;color: red;">  กรอกข้อมูลความคลาดเคลื่อน</span>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <p>เหตุผล</p>
                                                                <textarea type="text" class="form-control" maxlength="1000" id="detail6_2_2" name="detail6_2_2">@if (isset($tqf->tqf5_3))@if (isset($tqf->tqf5_3->detail6_2['reason'])){{ $tqf->tqf5_3->detail6_2['reason'] }}@endif @endif</textarea>
                                                                <span id="empty-detail6_2_2" style="display: none;color: red;">  กรอกข้อมูลเหตุผล</span>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label class="col-sm-3 form-control-label"
                                                                for="detail6_1">ความคลาดเคลื่อน</label>
                                                            <textarea type="text" class="form-control" maxlength="2500" 
                                                                name="detail6_2_1">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail6_2['discrepancy'] }}@endif</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 form-control-label"
                                                                for="detail6_1">เหตุผล</label>
                                                            <textarea type="text" class="form-control" maxlength="2500" 
                                                                name="detail6_2_2">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail6_2['reason'] }}@endif</textarea>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">การทวนสอบผลสัมฤทธิ์ของนักศึกษา <span style="color: red">*</span> 
                                                </label>
                                                <div class="row" style="text-align: center">
                                                    <div class="col-md-6 col-sm-6">
                                                        <p>วิธีการทวนสอบ</p>
                                                        <textarea type="text" class="form-control" maxlength="1000" id="detail7_1" name="detail7_1">@if (isset($tqf->tqf5_3))@if (isset($tqf->tqf5_3->detail7['method'])){{ $tqf->tqf5_3->detail7['method'] }}@endif @endif</textarea>
                                                        <span id="empty-detail7_1" style="display: none;color: red;">  กรอกข้อมูลวิธีการทวนสอบ</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <p>สรุปผล</p>
                                                        <textarea type="text" class="form-control" maxlength="1000" id="detail7_2" name="detail7_2">@if (isset($tqf->tqf5_3))@if (isset($tqf->tqf5_3->detail7['conclude'])){{ $tqf->tqf5_3->detail7['conclude'] }}@endif @endif</textarea>
                                                        <span id="empty-detail7_2" style="display: none;color: red;">  กรอกข้อมูลสรุปผล</span>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label class="col-sm-3 form-control-label"
                                                        for="detail7_1">วิธีการทวนสอบ</label>
                                                    <textarea type="text" class="form-control" maxlength="2500" 
                                                        name="detail7_1">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail7['method'] }}@endif</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 form-control-label"
                                                        for="detail7_2">สรุปผล</label>
                                                    <textarea type="text" class="form-control" maxlength="2500" id="detail7_2"
                                                        name="detail7_2">@if (isset($tqf->tqf5_3)){{ $tqf->tqf5_3->detail7['conclude'] }}@endif</textarea>
                                                </div> --}}
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_3()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-31" role="tabpanel" aria-labelledby="tqf5-tab5">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">สรุปผลการจัดการเรียนการสอนของรายวิชา</h4>
                                    <span id="empty-tqf5-31" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-31">
                                    <form id="formtqf5-31" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-control-label">การกระจายของระดับคะแนน (GRADE) <span style="color: red">*</span>
                                                </label>
                                                <br>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" style="min-width: 400px;">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">ระดับคะแนน (GRADE)</th>
                                                                {{-- <th>First Name</th> --}}
                                                                <th>จำนวน (คน)</th>
                                                                <th>คิดเป็นร้อยละ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="grade">
                                                            <tr>
                                                                <td>ก หรือ A</td>
                                                                <td>4.00</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[0]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[0]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ข+ หรือ B+</td>
                                                                <td>3.50</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[1]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[1]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ข หรือ B</td>
                                                                <td>3.00</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[2]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[2]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ค+ หรือ C+</td>
                                                                <td>2.50</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[3]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[3]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ค หรือ C</td>
                                                                <td>2.00</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[4]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[4]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ง+ หรือ D+</td>
                                                                <td>1.50</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[5]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[5]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ง หรือ D</td>
                                                                <td>1.00</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[6]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[6]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ต หรือ F</td>
                                                                <td>0.00</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[7]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[7]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ถ หรือ W</td>
                                                                <td>-</td>
                                                                <td><input class="form-control" name="count" id="number_w"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[8]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[8]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ม.ส หรือ I</td>
                                                                <td>-</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[9]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[9]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>พ.จ หรือ S</td>
                                                                <td>-</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[10]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[10]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ม.จ หรือ U</td>
                                                                <td>-</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[11]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[11]->percent }}" @endif>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>ม.น หรือ AU</td>
                                                                <td>-</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[12]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[12]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>น.ท หรือ TC</td>
                                                                <td>-</td>
                                                                <td><input class="form-control" name="count"
                                                                        type="number" min="1" max="1000" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[13]->count }}" @endif>
                                                                </td>
                                                                <td><input class="form-control" name="percent"
                                                                        type="number" min="1" onkeypress="return !(event.charCode == 45)"
                                                                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade != '') value="{{ $tqf->tqf5_3->grade[13]->percent }}" @endif>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_3_1()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-4" role="tabpanel" aria-labelledby="tqf5-tab6">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">ปัญหาและผลกระทบต่อการดำเนินการ</h4>
                                    <span id="empty-tqf5-4" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-4">
                                    <form id="formtqf5-4" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-control-label">1.
                                                    ประเด็นด้านทรัพยากรประกอบการเรียนและสิ่งอำนวยความสะดวก <span style="color: red">*</span></label>
                                                <div class="row" style="text-align: center">
                                                    <div class="col-md-6 col-sm-6">
                                                        <p>ปัญหาในการใช้แหล่งทรัพยากรประกอบการเรียนการสอน</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="4_detail1_1" name="detail1_1">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail1_1 }}@endif</textarea>
                                                        <span id="empty-4_detail1_1" style="display: none;color: red;">  กรอกปัญหาในการใช้แหล่งทรัพยากรประกอบการเรียนการสอน</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <p>ผลกระทบ</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="4_detail1_2" name="detail1_2">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail1_2 }}@endif</textarea>
                                                        <span id="empty-4_detail1_2" style="display: none;color: red;">  กรอกผลกระทบ</span>
                                                    </div>
                                                </div>
                                                {{-- <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 form-control-label">ปัญหาในการใช้แหล่งทรัพยากรประกอบการเรียนการสอน
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                
                                                                name="detail1_1">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail1_1 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">ผลกระทบ</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                
                                                                name="detail1_2">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail1_2 }}@endif</textarea>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">2.
                                                    ประเด็นด้านการบริหารและองค์กร <span style="color: red">*</span></label>
                                                <table class="table table-borderless">
                                                    <thead style="text-align: center">
                                                        <tr>
                                                            <td style="width: 50%">ประเด็นด้านการบริหารและองค์กร</td>
                                                            <td>ผลกระทบต่อผลการเรียนรู้ของนักศึกษา</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <textarea style="height: 70px" maxlength="1000" class="form-control" type="text"  id="4_detail2_1" name="detail2_1">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail2_1 }}@endif</textarea>
                                                                <span id="empty-4_detail2_1" style="display: none;color: red;">  กรอกประเด็นด้านการบริหารและองค์กร</span>
                                                            </td>
                                                            <td>
                                                                <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="4_detail2_2" name="detail2_2">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail2_2 }}@endif</textarea>
                                                                <span id="empty-4_detail2_2" style="display: none;color: red;">  กรอกผลกระทบต่อผลการเรียนรู้ของนักศึกษา</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                {{-- <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 form-control-label">ประเด็นด้านการบริหารและองค์กร</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                
                                                                name="detail2_1">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail2_1 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 form-control-label">ผลกระทบต่อผลการเรียนรู้ของนักศึกษา</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                
                                                                name="detail2_2">@if (isset($tqf->tqf5_4)){{ $tqf->tqf5_4->detail2_2 }}@endif</textarea>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div><br>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_4()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-5" role="tabpanel" aria-labelledby="tqf5-tab7">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">การประเมินรายวิชา</h4>
                                    <span id="empty-tqf5-5" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-5">
                                    <form id="formtqf5-5" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-control-label">1.
                                                    ผลการประเมินรายวิชาโดยนักศึกษา <span style="color: red">*</span></label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">1.1
                                                            ข้อวิพากษ์ที่สำคัญจากผลการประเมินโดยนักศึกษา</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="5_detail1_1" name="detail1_1">@if (isset($tqf->tqf5_5)){{ $tqf->tqf5_5->detail1_1 }}@endif</textarea>
                                                            <span id="empty-5_detail1_1" style="display: none;color: red;">  กรอกข้อมูลข้อ 1.1</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">1.2
                                                            ความเห็นของอาจารย์ผู้สอนต่อผลการประเมินตามข้อ 1.1</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="5_detail1_2" name="detail1_2">@if (isset($tqf->tqf5_5)){{ $tqf->tqf5_5->detail1_2 }}@endif</textarea>
                                                            <span id="empty-5_detail1_2" style="display: none;color: red;">  กรอกข้อมูลข้อ 1.2</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">2.
                                                    ผลการประเมินรายวิชาโดยวิธีอื่น <span style="color: red">*</span></label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">2.1
                                                            ข้อวิพากษ์ที่สำคัญจากผลการประเมินโดยวิธีอื่น</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="5_detail2_1" name="detail2_1">@if (isset($tqf->tqf5_5)){{ $tqf->tqf5_5->detail2_1 }}@endif</textarea>
                                                            <span id="empty-5_detail2_1" style="display: none;color: red;">  กรอกข้อมูลข้อ 2.1</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">2.2
                                                            ความเห็ตชอบของอาจารย์ผู้สอนต่อผลการประเมินตามข้อ 2.1</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="5_detail2_2" name="detail2_2">@if (isset($tqf->tqf5_5)){{ $tqf->tqf5_5->detail2_2 }}@endif</textarea>
                                                            <span id="empty-5_detail2_2" style="display: none;color: red;">  กรอกข้อมูลข้อ 2.2</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><br>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_5()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf5-6" role="tabpanel" aria-labelledby="tqf5-tab8">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">ทรัพยากรประกอบการเรียนการสอน</h4>
                                    <span id="empty-tqf5-6" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf5-6">
                                    <form id="formtqf5-6" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-control-label">1.
                                                    ความก้าวหน้าของการปรับปรุงการเรียนการสอนตามที่เสนอในรายงาน/รายวิชาครั้งที่
                                                    ผ่านมา <span style="color: red">*</span>
                                                </label>
                                                <div class="row" style="text-align: center">
                                                    <div class="col-md-6 col-sm-6">
                                                        <p>แผนการปรับปรุงที่เสนอในภาคการศึกษา/ปีการศึกษาที่ผ่านมา</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="6_detail1_1" name="detail1_1">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail1_1 }}@endif</textarea>
                                                        <span id="empty-6_detail1_1" style="display: none;color: red;">  กรอกข้อมูลแผนการปรับปรุงที่เสนอในภาคการศึกษา/ปีการศึกษาที่ผ่านมา</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <p>ผลการดำเนินการ</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text"id="6_detail1_2" name="detail1_2">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail1_2 }}@endif</textarea>
                                                        <span id="empty-6_detail1_2" style="display: none;color: red;">  กรอกข้อมูลแผนการปรับปรุงที่เสนอในภาคการศึกษา/ปีการศึกษาที่ผ่านมา</span>
                                                    </div>
                                                </div>
                                                {{-- <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 form-control-label">แผนการปรับปรุงที่เสนอในภาคการศึกษา/ปีการศึกษาที่ผ่านมา</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="1000" class="form-control" type="text"
                                                                id="detail1_1"
                                                                name="detail1_1">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail1_1 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">ผลการดำเนินการ</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="1000" class="form-control" type="text"
                                                                
                                                                name="detail1_2">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail1_2 }}@endif</textarea>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">2. การดำเนินการอื่น ๆ ในการปรับปรุงรายวิชา <span style="color: red">*</span></label>
                                                {{-- <div class="col-sm-9col-sm-3  row"> --}}
                                                <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="6_detail2" name="detail2">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail2 }}@endif</textarea>
                                                <span id="empty-6_detail2" style="display: none;color: red;">  กรอกข้อมูลการดำเนินการอื่น ๆในการปรับปรุงรายวิชา</span>
                                                {{-- </div> --}}
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="form-control-label">3.
                                                    ข้อเสนอแผนการปรับปรุงสำหรับภาคการศึกษา/ปีการศึกษาต่อไป <span style="color: red">*</span></label>
                                                <div class="row" style="text-align: center">
                                                    <div class="col-md-4 col-sm-12">
                                                        <p>ข้อเสนอ</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="6_detail3_1" name="detail3_1">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail3_1 }}@endif</textarea>
                                                        <span id="empty-6_detail3_1" style="display: none;color: red;">  กรอกข้อมูลข้อเสนอ</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <p>กำหนดเวลาที่แล้วเสร็จ</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="6_detail3_2" name="detail3_2" placeholder="1 เดือนหลังสิ้นสุดภาคการศึกษา / ไม่มี">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail3_2 }}@endif</textarea>
                                                        <span id="empty-6_detail3_2" style="display: none;color: red;">  กรอกข้อมูลข้อเสนอ</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <p>ผู้รับผิดชอบ</p>
                                                        <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="6_detail3_3" name="detail3_3">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail3_3 }}@endif</textarea>
                                                        <span id="empty-6_detail3_3" style="display: none;color: red;">  กรอกข้อมูลผู้รับผิดชอบ</span>
                                                    </div>
                                                </div>
                                                {{-- <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">ข้อเสนอ</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                id="detail3_1"
                                                                name="detail3_1">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail3_1 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-3 form-control-label">กำหนดเวลาที่แล้วเสร็จ</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                id="detail3_2"
                                                                name="detail3_2">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail3_2 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">ผู้รับผิดชอบ</label>
                                                        <div class="col-sm-8">
                                                            <textarea style="height: 70px" maxlength="2500" class="form-control" type="text"
                                                                id="detail3_3"
                                                                name="detail3_3">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail3_3 }}@endif</textarea>
                                                        </div>
                                                    </div>

                                                </div> --}}
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">4.
                                                    ข้อเสนอแนะของอาจารย์ผู้รับผิดชอบรายวิชา
                                                    ต่ออาจารย์ผู้รับผิดชอบหลักสูตร <span style="color: red">*</span></label>
                                                {{-- <div class="col-sm-9col-sm-3  row"> --}}
                                                <textarea style="height: 70px" maxlength="1000" class="form-control" type="text" id="6_detail4" name="detail4">@if (isset($tqf->tqf5_6)){{ $tqf->tqf5_6->detail4 }}@endif</textarea>
                                                <span id="empty-6_detail4" style="display: none;color: red;">  กรอกข้อมูลข้อเสนอแนะของอาจารย์ผู้รับผิดชอบรายวิชาต่ออาจารย์ผู้รับผิดชอบหลักสูตร</span>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf5_6()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $('#select-course').selectize();

        var sa = {
            '#tqf5-1': '<?php echo isset($tqf->tqf5_1); ?>',
            '#tqf5-2': '<?php echo isset($tqf->tqf5_2); ?>',
            '#tqf5-21': '<?php echo isset($tqf->tqf5_2->data1_1) && $tqf->tqf5_2->data1_1 != ''; ?>',
            '#tqf5-22': '<?php echo isset($tqf->tqf5_2->data1_2) && $tqf->tqf5_2->data1_2 != ''; ?>',
            '#tqf5-3': '<?php echo isset($tqf->tqf5_3); ?>',
            '#tqf5-31': '<?php echo isset($tqf->tqf5_3->grade) && $tqf->tqf5_3->grade != ''; ?>',
            '#tqf5-4': '<?php echo isset($tqf->tqf5_4); ?>',
            '#tqf5-7': '<?php echo isset($tqf->tqf5_5); ?>',
            '#tqf5-7': '<?php echo isset($tqf->tqf5_6); ?>',
        };



        '<?php if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) { ?>'
        // console.log({{ $tqf->status }} == 1 || {{ $tqf->status }} == 2 || '{{ $tqf->date }}')
        $("input").attr("readonly", "true");
        $("textarea").attr("readonly", "true");
        $.each($('.formtextarea'), function(i, value) {
            $(this).summernote('disable');
        });
        $("button").prop("disabled", true);
        localStorage.removeItem("tqf5_" + '{{ $tqf->tqf5ID }}');
        '<?php } ?>'



        if (localStorage.getItem("tqf5_" + '{{ $tqf->tqf5ID }}') !== null) {
            var item = JSON.parse(localStorage.getItem("tqf5_" + '{{ $tqf->tqf5ID }}'));
            $.each(item, function(index, value) {
                if (index == '#formtqf5-21' || index == '#formtqf5-22' || index == '#formtqf5-31') {
                    if (index == '#formtqf5-21' && sa['#tqf5-21'] != '1') {
                        $.each(value, function(i, v) {
                            $(index).find(i).html($(v));
                        });
                    }
                    if (index == '#formtqf5-22' && sa['#tqf5-22'] != '1') {
                        $.each(value, function(i, v) {
                            $(index).find(i).html($(v));
                        });
                    }
                    if (index == '#formtqf5-31' && sa['#tqf5-31'] != '1') {
                        $.each(value, function(i, v) {
                            $(index).find(i).html($(v));
                        });
                    }
                } else {
                    $.each(value, function(i, v) {
                        if (index == '#formtqf5-1' && sa['#tqf5-1'] != '1') {
                            if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                                if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {}
                                $(index).find('[name="' + i + '"]').text(v);
                            } else {
                                $(index).find('[name="' + i + '"]').val(v);
                            }
                        }
                        if (index == '#formtqf5-2' && sa['#tqf5-2'] != '1') {
                            if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                                if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {}
                                $(index).find('[name="' + i + '"]').text(v);
                            } else {
                                $(index).find('[name="' + i + '"]').val(v);
                            }
                        }
                        if (index == '#formtqf5-3' && sa['#tqf5-3'] != '1') {
                            if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                                if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {}
                                $(index).find('[name="' + i + '"]').text(v);
                            } else {
                                $(index).find('[name="' + i + '"]').val(v);
                            }
                        }
                        if (index == '#formtqf5-4' && sa['#tqf5-4'] != '1') {
                            if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                                if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {}
                                $(index).find('[name="' + i + '"]').text(v);
                            } else {
                                $(index).find('[name="' + i + '"]').val(v);
                            }
                        }
                        if (index == '#formtqf5-5' && sa['#tqf5-5'] != '1') {
                            if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                                if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {}
                                $(index).find('[name="' + i + '"]').text(v);
                            } else {
                                $(index).find('[name="' + i + '"]').val(v);
                            }
                        }
                        if (index == '#formtqf5-6' && sa['#tqf5-6'] != '1') {
                            if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                                if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {}
                                $(index).find('[name="' + i + '"]').text(v);
                            } else {
                                $(index).find('[name="' + i + '"]').val(v);
                            }
                        }
                    });
                    // console.log()
                }
            });

        }

        $(document).on('change input', 'input, textarea', function() {
            // console.log('change');
            change_add();
            // console.log($(this).val());
            // console.log($(this).attr('type'));
            if ($(this).attr('type') == 'number') {
                var num = $(this).val().replace(/[^0-9()]/g, '');
                $(this).val(num);
            }
            if ($(this).attr('type') == 'number' && $(this).val() < 0) {
                $(this).val('');
            } else if ($(this).attr('type') == 'number' && $(this).val() == 0 && $(this).val() != '') {
                $(this).val(0);
            }
            // else if ($(this).attr('type') == 'number' && $(this).val() == 25) {
            //     $(this).val(24);
            // }
        });

        $(document).on('change input', 'table tr input', function() {
            // console.log('change');
            change_add();
            if ($(this).attr('type') == 'number') {
                var num = $(this).val().replace(/[^0-9()]/g, '');
                $(this).val(num);
            }

            if ($(this).attr('type') == 'number' && $(this).val() == '') {
                $(this).val('');
            } else if ($(this).attr('type') == 'number' && $(this).val() < 0) {
                $(this).val('');
            } else if ($(this).attr('type') == 'number' && $(this).val() == 0) {
                $(this).val(0);
            } else if (($(this).attr('name') == 'hour1' || $(this).attr('name') == 'hour2') && $(this).val() > 24) {
                $(this).val(24);
            }

        });

        $(document).on('click', 'button', function() {
            // console.log('change'); 
            change_add();
        });

        function change_add() {
            var add = {};

            $('.forms').find('form').each(function(index, element) {
                var id = '#' + $(this).attr('id');
                add[id] = {};
                if (id == '#formtqf5-21' || id == '#formtqf5-22' || id == '#formtqf5-31') {
                    $(id).find('tbody').each(function(i, val) {
                        $(this).find("tr textarea").each(function(key, value) {
                            var va = $(this).val();
                            $(this).text(va);
                        });
                        $(this).find("tr input").each(function(key, value) {
                            if ($(this)[0].type == "radio") {
                                if ($(this)[0].checked) {
                                    $(this).attr('checked', true);
                                }
                            } else {
                                var nu = $(this).val();
                                $(this).attr('value', nu);
                            }
                        });
                        add[id]['#' + $(this).attr('id')] = $(this)[0].innerHTML;
                    });

                } else {
                    $(id).find('[type="text"],[type="number"]').each(function(i, val) {
                        var name = $(this).attr('name');
                        if ($(this).attr('name')) {
                            add[id][name] = $(this).val();
                        }

                    });
                }
                localStorage.setItem("tqf5_" + '{{ $tqf->tqf5ID }}', JSON.stringify(add));
            });
        }

        $('.nav-tabs a').on('hide.bs.tab', function(e) {
            var id = e.relatedTarget.hash;
            hide_input_empty("#" + $(id + ' form')[0].id);
        });

        var back = false;
        $('#nav-tab a').on('click', function(e) {
            // console.log(e.currentTarget);
            var fill = 0;
            var c = 1;
            var id = $($('.nav-link.active')[1]).attr('href');

            $(id).find('[type=text], [type=number], [type="radio"]:checked').each(function(index, element) {
                if ($(this).attr('name')) {
                    if ($(this).val() != '' && $(this).val() != '<p><br></p>' && $(this).val() != '<br>') {
                        fill += 1;
                        // console.log($(this).attr('name'),$(this).val())
                        if (id == '#tqf5-1' && $(this).attr('name') == 'pre') {
                            fill -= 1;
                        }
                    }
                }
            });
            if (id == "#tqf5-1") {
                c = 3;
            }
            // if (id == '#tqf5-21') {
            //     <?php if (isset($tqf->tqf5_2->data1_1) && $tqf->tqf5_2->data1_1 != '') { ?>
            //     if ({{ count($tqf->tqf5_2->data1_1) }} < $(id).find('tbody > tr').length) {
            //         $('a[href="' + id + '"]').trigger('click');
            //         check_input_empty("#" + $(id + ' form')[0].id);
            //         Swal.fire({
            //             title: 'หมวดที่ 5.1',
            //             html: '<p>กรุณาตรวจสอบข้อมูล แล้วบันทึก<p><p style="font-size:13px">ระบบจะไม่บันทึกข้อมูล หากไม่กดบันทึก<p>',
            //             icon: 'warning',
            //             confirmButtonText: 'ตกลง',
            //             showCloseButton: true
            //         });
            //     }
            //     <?php } ?>
            // }
            console.log(c, fill)
            //
            if (fill >= c && sa[id] != '1') {
                $.ajax({
                    type: "POST",
                    url: "check_save/" + {{ $tqf->tqf5ID }},
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            check_input_empty("#" + $(id + ' form')[0].id);
                            // $('a[href="' + id + '"]').trigger('click');
                            Swal.fire({
                                title: 'คุณต้องการไปหน้าถัดไปหรือไม่',
                                text: "* ระบบจะไม่บันทึกข้อมูล หากไม่กดบันทึก",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ใช่',
                                cancelButtonText: 'ไม่'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#empty-' + id.replace("#", "")).show();
                                    $($('.nav-link.active')).addClass('unsave');
                                    $($(e.currentTarget)).tab('show')
                                    // console.log($(this)[0].hash);
                                    $($(e.currentTarget)[0].hash + " textarea").each(
                                        function() {
                                            // console.log(this.style.height);
                                            this.style.height = 60 + 'px';
                                        });

                                }
                                // console.log(e);
                            })
                            // $('a[href="' + id + '"]').trigger('click');

                            // Swal.fire({
                            //     title: response.message,
                            //     html: '<p>กรุณาตรวจสอบข้อมูล แล้วบันทึก<p><p style="font-size:13px">ระบบจะไม่บันทึกข้อมูล หากไม่กดบันทึก<p>',
                            //     icon: 'warning',
                            //     confirmButtonText: 'ตกลง',
                            //     showCloseButton: true
                            // });
                        } else {
                            $('#empty-' + id.replace("#", "")).hide();
                            $($('.nav-link.active')).removeClass('unsave');
                            $($(e.currentTarget)).tab('show')
                            $($(e.currentTarget)[0].hash + " textarea").each(
                                function() {
                                    // console.log(this.style.height);
                                    this.style.height = 60 + 'px';
                                });
                        }
                    }
                });
            } else {
                $(this).tab('show')
                // console.log($(this)[0].hash);
                $($(this)[0].hash + " textarea").each(function() {
                    // console.log(this.style.height);
                    this.style.height = 60 + 'px';
                });

            }

        });

        function change_tap() {
            $('.nav-tabs a').on('hide.bs.tab', function(e) {
                var id = e.relatedTarget.hash;
                hide_input_empty("#" + $(id + ' form')[0].id);
            });
        }

        $('input[name="num_regis"],input[name="num_end"],input[name="num_w"]').on('keyup change', function(e) {
            const id = $(this).attr('id');
            const end = $('#num_end').val() - 0;
            const w = $('#num_w').val() - 0;
            const regis = $('#num_regis').val() - 0;

            if ($(this).val() < 0) {
                $(this).val('');
            }

            if ($(this).val() > 1000) {
                $(this).val(1000);
            }
            if (id == 'num_regis') {
                var sum1 = 0;
                if ($(this).val() > 1000) {
                    $(this).val(1000);
                    regis = 1000;
                }
                $.each($('#grade').find('input[name="count"]'), function(i, val) {
                    sum1 += ($(val).val() - 0);
                });
                $.each($('#grade').find('tr'), function(i, val) {
                    if (($('#num_regis').val() - 0) > 0) {
                        var count = $(val).find('input[name="count"]').val();
                        var regis = $('#num_regis').val();
                        // console.log(count);
                        if (count >= 0 && count != '') {
                            $(val).find('input[name="percent"]').val(((count * 100) / regis).toFixed(2));
                        }
                    }
                });
                if (regis >= 0 && end >= 0 && regis != '' && end != '') {
                    if (end > regis) {
                        $('[name="num_w"]').val('')
                    } else {
                        $('[name="num_w"]').val(regis - end)
                    }
                }
            }
            if (id == 'num_end') {
                if ($(this).val() > 1000) {
                    $(this).val(1000);
                    end = 1000;
                }
                if (regis >= 0 && end >= 0) {
                    if (end > regis) {
                        $('[name="num_w"]').val('')
                    } else {
                        $('[name="num_w"]').val(regis - end)
                    }
                }
            }
            if (regis == '' && end == '') {
                $('[name="num_w"]').val('')
            }
            if (id == 'num_end' && end > regis) {
                $('#empty-' + id).show();
                $('#empty-' + id).text('กรุณากรอกจำนวนให้สัมพันธ์กับจำนวนนักศึกษาที่ลงทะเบียนเรียน ');
                $(this).val(regis);
                $('[name="num_w"]').val('')

            }
            if (id == 'num_w' && w > regis) {
                $('#empty-' + id).show();
                $('#empty-' + id).text('กรุณากรอกจำนวนให้สัมพันธ์กับจำนวนนักศึกษาที่ลงทะเบียนเรียน ');
                $(this).val(0);

            }

            if ($('[name="num_w"]').val() != '') {
                $('#number_w').val($('[name="num_w"]').val());
            }
            // if (id == 'num_w' && w > end) {
            //     $('#empty-'+id).show();
            //     $('#empty-'+id).text('กรุณากรอกจำนวนให้สัมพันธ์กับจำนวนนักศึกษาที่คงอยู่เมื่อสิ้นสุดภาคการศึกษา');
            //     $(this).val(0);
            //     console.log(w,end);
            //     console.log(w>end);
            // }
            if (end <= regis) $('#empty-num_end').hide();
            if (w <= regis) $('#empty-num_w').hide();
            //   console.log(id);
            //    console.log($(this).val());
            change_add();
        });

        $('#grade tr input[name="count"]').on('keyup change', function(e) {
            var sum = 0;
            var va = $('#num_regis').val();
            var ch = true;
            console.log(ch);
            if ($(this).val() == '') {
                $(this).val('');
            }
            
            if ($('#num_regis').val() != '' && $('#num_end').val() != '') {
                if (($(this).val() - 0) > ($('#num_regis').val() - 0)) {
                $(this).val($('#num_regis').val());
            }
                $.each($('#grade').find('tr'), function(i, val) {
                    if (ch) {
                        if (($('#num_regis').val() - 0) > 0) {
                            var count = $(val).find('input[name="count"]').val();
                            var regis = $('#num_regis').val();
                            if (count >= 0 && count != '') {
                                $(val).find('input[name="percent"]').val(((count * 100) / regis).toFixed(
                                2));
                            } else {
                                $(val).find('input[name="percent"]').val('');
                            }
                        }
                        va -= $(val).find('input[name="count"]').val();
                        if (($(val).find('input[name="count"]').val()- 0) > 0 && $(val).find(
                                'input[name="count"]').val() !== '' && i != 8) {
                            // if (i == 0) {
                            //     sum += $('#number_w').val() - 0;
                            // }
                            sum += ($(val).find('input[name="count"]').val() - 0);
                        }
                        if (($(val).find('input[name="count"]').val() - 0) > $('#num_regis').val() && i !== 8) {
                            const _num = sum - $('#num_regis').val()
                            $(val).find('input[name="count"]').val(sum - _num)

                        }
                        console.log(sum);
                        if (sum > ($('#num_end').val()-0) && i != 8) {
                            ch = false;
                            console.log('ww');
                            $(val).find('input[name="count"]').val('')
                            $(val).find('input[name="percent"]').val('')
                        }
                    }
                });
                if (!ch) {
                    Swal.fire(
                        '',
                        'กรุณากรอกข้อมูลจำนวนให้สัมพันธ์กับจำนวนนักศึกษาที่ลงทะเบียนเรียน',
                        'warning'
                    );
                }
            }

            if (sum > $('#num_regis').val()) {

            }

        });

        if ('{{ $tqf->course_id }}' == '') {
            $('#select-course').selectize({
                items: ["เลือกหลักสูตร..."], // initializing selected value to nothing
                plugins: ['remove_button', 'restore_on_backspace']
            });

        } else {
            // console.log('{{ $tqf->course_id }}');
            $('#select-course').data('selectize').setValue('{{ $tqf->course_id }}');
        }

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        var option_set = {
            placeholder: 'กรอกข้อความ  ( ย่อหน้ากด Tab )',
            // tabsize: 2,
            // height: 100
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'clear']],
                // ['font', ['strikethrough', 'superscript', 'subscript']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                // ['height', ['height']],
                ['view', ['undo', 'redo', 'help']],
            ],
            tabDisable: true,
            callbacks: {
                onPaste: function(e) {
                    //  console.log('rfewf')
                    // if (document.queryCommandSupported("insertText")) {
                    //     var text = $(e.currentTarget).html();
                    //     var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData(
                    //         'Text');

                    //     setTimeout(function() {
                    //         document.execCommand('insertText', false, bufferText);
                    //     }, 10);
                    //     e.preventDefault();
                    // } else {
                    //     var text = window.clipboardData.getData("text")
                    //     if (trap) {
                    //         trap = false;
                    //     } else {
                    //         trap = true;
                    //         setTimeout(function() {
                    //             document.execCommand('paste', false, text);
                    //         }, 10);
                    //         e.preventDefault();
                    //     }
                    // }
                    var t = e.currentTarget.innerText;
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    var maxPaste = bufferText.length;
                    if (t.length + bufferText.length > 2500) {
                        maxPaste = 2500 - t.length;
                    }
                    if (maxPaste > 0) {
                        document.execCommand('insertText', false, bufferText.substring(0, maxPaste));
                    }
                    $('#maxContentPost').text(2500 - t.length);

                },
                onKeydown: function(e) {
                    var t = e.currentTarget.innerText;
                    if (t.trim().length >= 2500) {
                        //delete keys, arrow keys, copy, cut, select all
                        if (e.keyCode != 8 && !(e.keyCode >= 37 && e.keyCode <= 40) && e.keyCode != 46 && !(e
                                .keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode ==
                                65 && e.ctrlKey))
                            e.preventDefault();
                    }
                },
                onKeyup: function(e) {
                    var t = e.currentTarget.innerText;
                    $('#maxContentPost').text(2500 - t.trim().length);
                },
                onChange: function(contents, $editable) {
                    ////  console.log('onChange:', contents, $editable);
                    change_add();
                }
            },

        };
        $('.formtextarea').summernote(option_set);
    </script>
@endsection