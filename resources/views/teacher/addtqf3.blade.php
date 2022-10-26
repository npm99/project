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

@section('tqf3', 'active')
{{-- @foreach ($tqf as $tqf)

    @endforeach --}}
@section('textpage', 'บันทึกมคอ.3')

@section('pageheader')
    <div class="breadcrumb-holder">
        <ul class="breadcrumb m-0 col-md-12 mx-auto">
            {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
            <li class="breadcrumb-item align-items-center" style="width: 100%">
                <form action="{{ url('/tqf/addtqf3/' . $tqf->tqf3ID) }}" method="post">
                    @csrf
                    <h5>รายละเอียดของรายวิชา (มคอ.3) วิชา {{ $tqf->subsubject->THsubject }}</h5>
                    {{-- <br> --}}
                    <span style="margin-left: 20px;color: #17a2b8;"><b>* หากต้องการกรอกข้อมูลว่าง กรุณาใส่ - ลงในช่อง และระบบจัดเก็บข้อมูลไว้ หากยังไม่กดบันทึก (สถานะการจัดทำจะไม่แสดง หากไม่บันทึกข้อมูล)</b></span>

                    
                    {{-- <div class="row exports-tqf3 align-items-center" style="float: right;margin-right: 10px"> --}}
                    {{-- <div class="row" style="width: 300px;float: right;margin-right: 10px">
                        <input type="text" name="idtqf3" value="{{ $tqf->tqf3ID }}" hidden>
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
                        <button type="submit" id="copy-tqf3-submit" class="btn btn-primary btn-sm" hidden></button>
                        <button type="button" class="btn btn-primary btn-sm copy-tqf3">คัดลอก</button>
                    </div> --}}
                    {{-- <div class="form-group row" style="margin-right: 20px">
                        <input type="text" name="idtqf3" value="{{ $tqf->tqf3ID }}" hidden>
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
            {{-- <a class="nav-item nav-link active" id="course-tab" href="#course" role="tab"
                aria-controls="หลักสูตร" aria-selected="true">หลักสูตร</a> --}}
            <a class="nav-item nav-link active {{isset($tqf->tqf3_1)&&$tqf->status==4?'page-save':''}}" id="tqf3-tab1" href="#tqf3-1" role="tab"
                aria-controls="หมวดที่ 1" aria-selected="true" onclick="return false;">หมวดที่ 1</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_2)&&$tqf->status==4?'page-save':''}}" id="tqf3-tab2" href="#tqf3-2" onclick="return false;" role="tab" aria-controls="หมวดที่ 2"
                aria-selected="false">หมวดที่ 2</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_3)&&$tqf->status==4?'page-save':''}}" id="tqf3-tab3" href="#tqf3-3" onclick="return false;" role="tab" aria-controls="หมวดที่ 3"
                aria-selected="false">หมวดที่ 3</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_4)&&$tqf->status==4?'page-save':''}}" id="tqf3-tab4" href="#tqf3-4" onclick="return false;" role="tab" aria-controls="หมวดที่ 4"
                aria-selected="false">หมวดที่ 4</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_5->data1) && $tqf->tqf3_5->data1 !=''&&$tqf->status==4?'page-save':''}}" id="tqf3-tab5" href="#tqf3-51"onclick="return false;" role="tab"
                aria-controls="หมวดที่ 5.1" aria-selected="true">หมวดที่ 5.1</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_5->data2) && $tqf->tqf3_5->data2 !=''&&$tqf->status==4?'page-save':''}}" id="tqf3-tab6" href="#tqf3-52"onclick="return false;" role="tab"
                aria-controls="หมวดที่ 5.2" aria-selected="false">หมวดที่ 5.2</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_6)&&$tqf->status==4?'page-save':''}}" id="tqf3-tab7" href="#tqf3-6" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 6" aria-selected="false">หมวดที่ 6</a>
            <a class="nav-item nav-link {{isset($tqf->tqf3_7)&&$tqf->status==4?'page-save':''}}" id="tqf3-tab8" href="#tqf3-7" onclick="return false;" role="tab"
                aria-controls="หมวดที่ 7" aria-selected="false">หมวดที่ 7</a>
        </div>
    </nav>

    <section class="forms">
        <input type="hidden" name="idtqf3" value="{{ $tqf->tqf3ID }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 px-md-3 mx-auto px-sm-0">
                    <div class="tab-content px-0" id="nav-tabContent">
                        {{-- <div class="tab-pane fade  " id="course" role="tabpanel" aria-labelledby="tab">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">หลักสูตร</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        @csrf
                                        <div class="card-body">
                                            <label class=" form-control-label">หลักสูตร</label>
                                            <div>
                                                <select class="form-control" id="select-course" name="course">
                                                    <option selected>เลือกหลักสูตร...</option>
                                                    @foreach ($tqf->course as $item)
                                                        <option value={{ $item->c_id }}@if ($tqf->course_id) selected @endif>{{ $item->courseName }}</option>
                                                    @endforeach
                                                </select>
                                         
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <div class="col-sm-6 offset-sm-5">
                                                <button type="button"
                                                    class="btn btn-primary coursetqf3-submit">บันทึก</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                        <div class="tab-pane fade show active" id="tqf3-1" role="tabpanel" aria-labelledby="tab1">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">ข้อมูลทั่วไป</h4> 
                                    <span id="empty-tqf3-1" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                   @if ($tqf->date)
                                   <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                   @endif
                                </div>
                                <div class="card-body tqf3-1">
                                    <form id="formtqf3-1" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ชื่อรายวิชา (ภาษาไทย) <span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="thname" name="thname" maxlength="200"
                                                        @if (isset($tqf->tqf3_1)) value="{{ $tqf->tqf3_1->THname }}" 
                                                        @else
                                                        value="{{ $tqf->subsubject->THsubject }}" @endif>
                                                    <span id="empty-thname" style="display: none;color: red">กรอกข้อมูลชื่อรายวิชา
                                                        (ภาษาไทย)</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ชื่อรายวิชา (ภาษาอังกฤษ) <span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" id="enname" name="enname" maxlength="200"
                                                        @if (isset($tqf->tqf3_1)) value="{{ $tqf->tqf3_1->ENname }}" @else
                                                        value="{{ $tqf->subsubject->ENsubject }}" @endif>
                                                    <span id="empty-enname" style="display: none;color: red">กรอกข้อมูลชื่อรายวิชา
                                                        (ภาษาอังกฤษ)</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">จำนวนหน่วยกิต <span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" type="text" maxlength="200" id="credit" name="credit">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->credit }}@else{{ $tqf->subsubject->cradit }}@endif</textarea>
                                                    <span id="empty-credit"
                                                        style="display: none;color: red">กรอกข้อมูลจำนวนหน่วยกิต</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">หลักสูตรและประเภทของรายวิชา <span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" type="text" maxlength="1000" id="course" name="course">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->course }}@endif</textarea> <span id="empty-course"
                                                        style="display: none;color: red">กรอกข้อมูลหลักสูตรและประเภทของรายวิชา</span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">อาจารย์ผู้รับผิดชอบรายวิชา <span
                                                        style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="teacher" name="teacher">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->teacher }}@endif</textarea>
                                                    <span id="empty-teacher"
                                                        style="display: none;color: red">กรอกข้อมูลอาจารย์ผู้รับผิดชอบรายวิชา</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ภาคการศึกษา/ชั้นปีที่เรียน <span
                                                        style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="term" name="term">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->term }}@endif</textarea>
                                                    <span id="empty-term" style="display: none;color: red">กรอกข้อมูลภาคการศึกษา/ชั้นปีที่เรียน</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">รายวิชาที่ต้องเรียนมาก่อน
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" type="text" maxlength="500" id="pre" name="pre">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->Pre_requisite }}@endif</textarea><span id="empty-pre"
                                                        style="display: none;color: red">กรอกข้อมูลรายวิชาที่ต้องเรียนมาก่อน</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">รายวิชาที่ต้องเรียนไปพร้อม
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" type="text" maxlength="500" id="co" name="co">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->Co_requisite }}@endif</textarea><span id="empty-co"
                                                        style="display: none;color: red">กรอกข้อมูลรายวิชาที่ต้องเรียนไปพร้อม</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">สถานที่เรียน <span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="place" name="place">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->place }}@endif</textarea>
                                                    <span id="empty-place"
                                                        style="display: none;color: red">กรอกข้อมูลสถานที่เรียน</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 form-control-label">วันที่จัดทำหรือปรับปรุงรายละเอียดของรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" type="text" maxlength="500" id="date_mo" name="date_mo">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->date_modify }}@endif</textarea><span id="empty-date_mo"
                                                        style="display: none;color: red">กรอกข้อมูลวันที่จัดทำหรือปรับปรุงรายละเอียดของรายวิชา</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf3_1()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-2" role="tabpanel" aria-labelledby="tab2">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">จุดมุ่งหมายและวัตถุประสงค์</h4>
                                    <span id="empty-tqf3-2" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                    <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                    @endif
                                </div>
                                <div class="card-body tqf3-2">
                                    <form id="formtqf3-2" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1. จุดมุ่งหมายของรายวิชา <span
                                                        style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="target" name="target">@if (isset($tqf->tqf3_2)){{ $tqf->tqf3_2->target }}@endif</textarea><span id="empty-target"
                                                        style="display: none;color: red">กรอกข้อมูลจุดมุ่งหมายของรายวิชา</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">2.
                                                    วัตถุประสงค์ในการพัฒนา/ปรับปรุงรายวิชา <span style="color: red">*</span> </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="objective" name="objective">@if (isset($tqf->tqf3_2)){{ $tqf->tqf3_2->objective }}@endif</textarea>
                                                    <span id="empty-objective"
                                                        style="display: none;color: red">กรอกข้อมูลวัตถุประสงค์ในการพัฒนา/ปรับปรุงรายวิชา</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf3_2()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-3" role="tabpanel" aria-labelledby="tab3">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">ลักษณะและการดำเนินการ</h4>
                                    <span id="empty-tqf3-3" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                    <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                    @endif
                                </div>
                                <div class="card-body tqf3-3">
                                    <form id="formtqf3-3" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1. คำอธิบายรายวิชา <span
                                                        style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="course_desc" name="course_desc">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->course_desc }}@endif</textarea> 
                                                    <span id="empty-course_desc" style="display: none;color: red">กรอกข้อมูลคำอธิบายรายวิชา</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label">2.จำนวนชั่วโมงที่ใช้ต่อภาคการศึกษา <span style="color: red">*</span></label>
                                                
                                                <div class="row">
                                                    <div class="col-lg-3 col md-6 col-sm-12 text-center">
                                                        <label class="form-control-label">บรรยาย</label> 
                                                        <textarea class="form-control" type="text" maxlength="300" name="hour_lecture" id="hour_lecture">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_lecture }}@endif</textarea>
                                                        <span id="empty-hour_lecture" style="display: none;color: red">กรอกข้อมูลบรรยาย</span>
                                                    </div>
                                                    <div class="col-lg-3 col md-6 col-sm-12 text-center">
                                                        <label class="form-control-label">สอนเสริม</label> 
                                                        <textarea class="form-control" type="text" maxlength="300" id="hour_tu" name="hour_tu">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_tu }}@endif</textarea>
                                                        <span id="empty-hour_tu" style="display: none;color: red">กรอกข้อมูลสอนเสริม</span>
                                                    </div>
                                                    <div class="col-lg-3 col md-6 col-sm-12 text-center">
                                                        <label class="form-control-label">การฝึกปฏิบัติ/งานภาคสนาม/การฝึกงาน</label> 
                                                        <textarea class="form-control" type="text" maxlength="300" name="houre_practice" id="houre_practice">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->houre_practice }}@endif</textarea>
                                                        <span id="empty-houre_practice" style="display: none;color: red">กรอกข้อมูลการฝึกปฏิบัติ/งานภาคสนาม/การฝึกงาน</span>
                                                    </div>
                                                    <div class="col-lg-3 col md-6 col-sm-12 text-center">
                                                        <label class="form-control-label">การศึกษาด้วยตนเอง</label> 
                                                        <textarea class="form-control" type="text" maxlength="300" name="hour_selhflearn" id="hour_selhflearn">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_selhflearn }}@endif</textarea>
                                                        <span id="empty-hour_selhflearn" style="display: none;color: red">กรอกข้อมูลการศึกษาด้วยตนเอง</span>
                                                    </div>

                                                </div>
                                                {{-- <table class="table table-borderless">
                                                    <thead>
                                                        <tr style="text-align: center">
                                                            <td scope="col">บรรยาย</td>
                                                            <td scope="col"></td>
                                                            <td scope="col">การฝึกปฏิบัติ/งานภาคสนาม/การฝึกงาน</td>
                                                            <td scope="col">การศึกษาด้วยตนเอง</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="hour_term">
                                                        <tr>
                                                            <td>
                                                               
                                                            </td>
                                                            <td>
                                                               
                                                            </td>
                                                            <td>
                                                               
                                                            <td>
                                                               
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table> --}}
                                                {{-- <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">บรรยาย</label>
                                                    <div class="col-sm-6">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">สอนเสริม</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" type="text" maxlength="2500" id="hour_tu"
                                                            name="hour_tu">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_tu }}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">การฝึกปฏิบัติ/งานภาคสนาม/การฝึกงาน</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" type="text" maxlength="2500" id="houre_practice"
                                                            name="houre_practice">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->houre_practice }}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">การศึกษาด้วยตนเอง</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" type="text" maxlength="2500" id="hour_selhflearn"
                                                            name="hour_selhflearn">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_selhflearn }}@endif</textarea>
                                                    </div>
                                                </div> --}}
                                            </div>


                                            <div class="form-group">
                                                <label class="form-control-label">3.
                                                    จำนวนชั่วโมงต่อสัปดาห์ที่อาจารย์ให้คำปรึกษา
                                                    และแนะนำทางวิชาการแก่นักศึกษาเป็นรายบุคคล <span style="color: red">*</span></label>

                                                <div class="col-sm-12">
                                                    <textarea class="form-control form-control" maxlength="1000" type="text" id="hour_recom" name="hour_recom">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_recom }}@endif</textarea>
                                                    <span id="empty-hour_recom" style="display: none;color: red">กรอกข้อมูลจำนวนชั่วโมงต่อสัปดาห์</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf3_3()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-4" role="tabpanel" aria-labelledby="tab4">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">การพัฒนาการเรียนรู้ของนักศึกษา</h4>
                                    <span id="empty-tqf3-4" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                    <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                    @endif
                                </div>
                                <div class="card-body tqf3-4">
                                    <form id="formtqf3-4" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-control-label">1. คุณธรรม จริยธรรม <span
                                                        style="color: red">*</span></label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 form-control-label">1.1 คุณธรรม
                                                            จริยธรรมที่ต้องพัฒนา
                                                        </label>

                                                        <div class="col-sm-11" style="padding-left: 30px;">
                                                            <table class="table table-borderless" style="width: 100%">
                                                                <tbody id="ku_1">
                                                                    @if (isset($tqf->tqf3_4))
                                                                        @foreach ($tqf->tqf3_4->morality as $key => $item)
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control" type="text" maxlength="1000" id="morality" name="morality">{{ $item }}</textarea>
                                                                                </td>
                                                                                @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px">
                                                                                        <button class="btn add-rowku_1"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td
                                                                                style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                <i class="bi bi-dash-lg"></i>
                                                                            </td>
                                                                            <td style="padding-left: 0px">
                                                                                <textarea class="form-control" type="text" id="morality" name="morality" maxlength="1000"></textarea>
                                                                            </td>
                                                                            <td class="px-0" style="width: 5px;">
                                                                                <button class="btn add-rowku_1"
                                                                                    type="button"><i
                                                                                        class="bi bi-plus-square-fill"
                                                                                        style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                            </td>
                                                                        </tr>

                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                            {{-- <textarea class="form-control" type="text" maxlength="2500" id="morality"
                                                                name="morality">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->morality }}@endif</textarea> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        {{-- <button class="btn btn-primary btn-sm add-rowku_2"
                                                            type="button">เพิ่มรายการ</button> --}}
                                                        <label class="col-sm-12 form-control-label">1.2 วิธีการสอน
                                                        </label>
                                                        <div class="col-sm-11" style="padding-left: 30px;">
                                                            <table class="table table-borderless" style="width: 100%">
                                                                <tbody id="ku_2">
                                                                    @if (isset($tqf->tqf3_4))
                                                                        @foreach ($tqf->tqf3_4->morality2 as $key => $item)
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control" type="text"maxlength="1000" id="morality2" name="morality2">{{ $item }}</textarea>
                                                                                </td>
                                                                                 @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_2"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                            </tr>
                                                                           
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td
                                                                                style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                <i class="bi bi-dash-lg"></i>
                                                                            </td>
                                                                            <td style="padding-left: 0px">
                                                                                <textarea class="form-control " type="text" id="morality2" name="morality2" maxlength="1000"></textarea>
                                                                            </td>
                                                                            <td class="px-0" style="width: 5px;">
                                                                                <button class="btn add-rowku_2"
                                                                                    type="button"><i
                                                                                        class="bi bi-plus-square-fill"
                                                                                        style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                            </td>
                                                                        </tr>

                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                            {{-- <div class="col-sm-8">
                                                            <textarea class="form-control" type="text" maxlength="2500" id="morality2"
                                                                name="morality2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->morality2 }}@endif</textarea>
                                                            </div> --}}
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        {{-- <button class="btn btn-primary btn-sm add-rowku_3"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                        <label class="col-sm-12 form-control-label">1.3 วิธีการประเมินผล
                                                        </label>
                                                        <div class="col-sm-11" style="padding-left: 30px;">
                                                            <table class="table table-borderless" style="width: 100%">
                                                                <tbody id="ku_3">
                                                                    @if (isset($tqf->tqf3_4))
                                                                        @foreach ($tqf->tqf3_4->morality3 as $key => $item)
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control" type="text" maxlength="1000" id="morality3" name="morality3">{{ $item }}</textarea>
                                                                                </td>
                                                                                @if ($key == 0) 
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_3"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <td
                                                                                style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                <i class="bi bi-dash-lg"></i>
                                                                            </td>
                                                                            <td style="padding-left: 0px">
                                                                                <textarea class="form-control " type="text" id="morality3" name="morality3" maxlength="1000"></textarea>
                                                                            </td>
                                                                            <td class="px-0" style="width: 5px;">
                                                                                <button class="btn add-rowku_3"
                                                                                    type="button"><i
                                                                                        class="bi bi-plus-square-fill"
                                                                                        style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                            </td>
                                                                        </tr>

                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                            {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="morality3"
                                                                name="morality3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->morality3 }}@endif</textarea> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="form-group">
                                                    <label class="form-control-label">2. ความรู้ <span
                                                            style="color: red">*</span></label>
                                                    <div style="margin-left: 40px">
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_4"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">2.1
                                                                ความรู้ที่ต้องได้รับ
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_4">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->knowledge as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="knowledge" name="knowledge">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_4"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="knowledge" name="knowledge" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_4"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="knowledge"
                                                                name="knowledge">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->knowledge }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_5"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">2.2 วิธีการสอน
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_5">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->knowledge2 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="knowledge2" name="knowledge2">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_5"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="knowledge2" name="knowledge2" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_5"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="knowledge2"
                                                                name="knowledge2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->knowledge2 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_6"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">2.3 วิธีการประเมินผล
                                                            </label>

                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_6">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->knowledge3 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="knowledge3" name="knowledge3">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_6"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="knowledge3" name="knowledge3" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_6"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="knowledge3"
                                                                name="knowledge3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->knowledge3 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="form-control-label">3. ทักษะทางปัญญา <span
                                                            style="color: red">*</span></label>
                                                    <div style="margin-left: 40px">
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_7"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">3.1
                                                                ทักษะทางปัญญาที่ต้องพัฒนา
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_7">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->intel_skill as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="intel_skill" name="intel_skill">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_7"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="intel_skill" name="intel_skill" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_7"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="intel_skill"
                                                                name="intel_skill">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->intel_skill }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_8"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">3.2 วิธีการสอน
                                                            </label>

                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_8">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->intel_skill2 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="intel_skill2" name="intel_skill2">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_8"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="intel_skill2" name="intel_skill2" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_8"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="intel_skill2"
                                                                name="intel_skill2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->intel_skill2 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_9"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">3.3 วิธีการประเมินผล
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_9">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->intel_skill3 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="intel_skill3" name="intel_skill3">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_9"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="intel_skill3" name="intel_skill3" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_9"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="intel_skill3"
                                                                name="intel_skill3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->intel_skill3 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="form-control-label">4.
                                                        ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ <span
                                                            style="color: red">*</span></label>
                                                    <div style="margin-left: 40px">
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_10"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">4.1
                                                                ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบที่ต้องพัฒนา
                                                            </label>

                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_10">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->respon_skill as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="respon_skill" name="respon_skill">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_10"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="respon_skill" name="respon_skill" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_10"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="respon_skill"
                                                                name="respon_skill">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->respon_skill }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_11"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">4.2 วิธีการสอน
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_11">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->respon_skill2 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="respon_skill2" name="respon_skill2">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_11"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="respon_skill2" name="respon_skill2" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_11"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="respon_skill2"
                                                                name="respon_skill2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->respon_skill2 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_12"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">4.3 วิธีการประเมินผล
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_12">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->respon_skill3 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="respon_skill3" name="respon_skill3">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_12"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="respon_skill3" name="respon_skill3" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_12"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="respon_skill3"
                                                                name="respon_skill3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->respon_skill3 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="form-control-label">5. ทักษะการวิเคราะห์เชิงตัวเลข
                                                        การสื่อสาร
                                                        และการใช้เทคโนโลยีสารสนเทศ <span style="color: red">*</span></label>
                                                    <div style="margin-left: 40px">
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_13"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">5.1
                                                                ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร
                                                                และการใช้เทคโนโลยีสารสนเทศที่ต้องพัฒนา
                                                            </label>

                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_13">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->num_skill as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="num_skill" name="num_skill">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_13"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="num_skill" name="num_skill" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_13"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="num_skill"
                                                                name="num_skill">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->num_skill }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_14"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">5.2 วิธีการสอน
                                                            </label>
                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_14">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->num_skill2 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="num_skill2" name="num_skill2">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_14"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="num_skill2" name="num_skill2" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_14"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                                <textarea class="form-control" type="text" maxlength="2500" id="num_skill2"
                                                                name="num_skill2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->num_skill2 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{-- <button class="btn btn-primary btn-sm add-rowku_15"
                                                                type="button">เพิ่มรายการ</button> --}}
                                                            <label class="col-sm-12 form-control-label">5.3 วิธีการประเมินผล
                                                            </label>

                                                            <div class="col-sm-11" style="padding-left: 30px;">
                                                                <table class="table table-borderless" style="width: 100%">
                                                                    <tbody id="ku_15">
                                                                        @if (isset($tqf->tqf3_4))
                                                                            @foreach ($tqf->tqf3_4->num_skill3 as $key => $item)
                                                                                <tr>
                                                                                    <td
                                                                                        style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                        <i class="bi bi-dash-lg"></i>
                                                                                    </td>
                                                                                    <td style="padding-left: 0px">
                                                                                        <textarea class="form-control" type="text" maxlength="1000" id="num_skill3" name="num_skill3">{{ $item }}</textarea>
                                                                                    </td>
                                                                                    @if ($key == 0)
                                                                                    <td class="px-0" style="width: 5px;">
                                                                                        <button class="btn add-rowku_15"
                                                                                            type="button"><i
                                                                                                class="bi bi-plus-square-fill"
                                                                                                style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                    </td>
                                                                                    @else
                                                                                    <td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>
                                                                            @endif
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                            <tr>
                                                                                <td
                                                                                    style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;">
                                                                                    <i class="bi bi-dash-lg"></i>
                                                                                </td>
                                                                                <td style="padding-left: 0px">
                                                                                    <textarea class="form-control " type="text" id="num_skill3" name="num_skill3" maxlength="1000"></textarea>
                                                                                </td>
                                                                                <td class="px-0" style="width: 5px;">
                                                                                    <button class="btn add-rowku_15"
                                                                                        type="button"><i
                                                                                            class="bi bi-plus-square-fill"
                                                                                            style="font-size: 17px;color:#1e3dd3"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                                {{-- <div class="col-sm-8">
                                                            <textarea class="form-control" type="text" maxlength="2500" id="num_skill3"
                                                                name="num_skill3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->num_skill3 }}@endif</textarea> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 offset-sm-5">
                                                        <button type="button" onclick="add_tqf3_4()"
                                                            {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                            class="btn btn-primary">บันทึก</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}

                        <div class="tab-pane fade" id="tqf3-51" role="tabpanel" aria-labelledby="tab5">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <div class="col-sm-12 d-flex justify-content-between">
                                        <div>
                                            <h4 class="h5">แผนการสอน <span style="color: red">*</span></h4>
                                            <span id="empty-tqf3-51" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                            <span>* กรอกแผนการสอนอย่างต่ำ 15 สัปดาห์</span>
                                            @if ($tqf->date)
                                            <div style="position: absolute;right: 125px;top: 5px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                            @endif
                                        </div>

                                        <span>
                                            <button class="add-row351 btn btn-primary btn-sm"><i
                                                    class="fa fa-plus-circle"></i>&nbsp;เพิ่มรายการ</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formtqf351" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>สัปดาห์ที่</th>
                                                        <th>รายละเอียด</th>
                                                        <th style="width: 90px">จำนวน<br>ชั่วโมง</th>
                                                        <th>กิจกรรมการเรียน การสอน สื่อที่ใช้</th>
                                                        <th>ผู้สอน</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tqf3_51">
                                                    @if (isset($tqf->tqf3_5) && $tqf->tqf3_5->data1 != '')
                                                        @foreach ($tqf->tqf3_5->data1 as $item)
                                                            <tr>
                                                                <th><input
                                                                        class="form-control" value="{{ $item->week }}"
                                                                        name="week" min="1" max="20" type="number" onkeypress="return !(event.charCode == 45||event.charCode == 46)">
                                                                </th>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="content">{{ $item->content }}</textarea>
                                                                </td>
                                                                <td><input class="form-control" name="hour"
                                                                        value="{{ $item->hour }}" type="number" onkeypress="return !(event.charCode == 45||event.charCode == 46)">
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="intuction">{{ $item->intuction }}</textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="assid">{{ $item->assid }}</textarea>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        @for ($i = 0; $i < 2; $i++)
                                                            <tr>
                                                                <th><input
                                                                        class="form-control" value="{{ $i + 1 }}"
                                                                        name="week" type="number" min="1" max="20" onkeypress="return !(event.charCode == 45||event.charCode == 46)">
                                                                </th>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="content"></textarea>
                                                                </td>
                                                                <td><input class="form-control" name="hour"
                                                                        value="{{ $tqf->tqf3_51 }}" type="number"
                                                                        min="1" onkeypress="return !(event.charCode == 45||event.charCode == 46)">
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="intuction"></textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="assid"></textarea>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 offset-sm-5">
                                                <button type="button" onclick="add_tqf3_5_1()"
                                                    {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                    class="btn btn-primary">บันทึก</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-52" role="tabpanel" aria-labelledby="tab6">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <div class="col-sm-12 d-flex justify-content-between">
                                        <h4 class="h5">แผนการประเมินผลการเรียนรู้ <span style="color: red">*</span></h4>
                                        
                                        <span>
                                            <button class="add-row352 btn btn-primary btn-sm"><i
                                                    class="fa fa-plus-circle"></i>&nbsp;เพิ่มรายการ</button>
                                        </span>
                                        @if ($tqf->date)
                                        <div style="position: absolute;right: 125px;top: 5px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                        @endif
                                    </div>
                                    <span id="empty-tqf3-52" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                </div>


                                <div class="card-body">
                                    <form id="formtqf3-52" class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ผลการเรียนรู้</th>
                                                        <th>วิธีการประเมิน</th>
                                                        <th>สัปดาห์ที่ประเมิน</th>
                                                        <th>สัดส่วนของการประเมินผล</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tqf3_52">
                                                    @if (isset($tqf->tqf3_5) && $tqf->tqf3_5->data2 != '')
                                                        @foreach ($tqf->tqf3_5->data2 as $item)
                                                            <tr>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" id="no" name="no">{{ $item->no }}</textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" id="howto" name="howto">{{ $item->howto }}</textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" name="week">{{ $item->week }}</textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" type="text" maxlength="1000" id="percent" name="percent">{{ $item->percent }}</textarea>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td>
                                                                <textarea class="form-control" type="text" maxlength="1000" id="no" name="no"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" type="text" maxlength="1000" id="howto" name="howto"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" type="text" maxlength="1000" name="week"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control" type="text" maxlength="1000" id="percent" name="percent"></textarea>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf3_5_2()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tqf3-6" role="tabpanel" aria-labelledby="tab7">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">ทรัพยากรประกอบการเรียนการสอน</h4>
                                    <span id="empty-tqf3-6" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                    <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                    @endif
                                </div>
                                <div class="card-body tqf3-6">
                                    <form id="formtqf3-6" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1. เอกสารและตำราหลัก <span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" class="form-control formtextarea" type="text" id="detail1" name="detail1">@if (isset($tqf->tqf3_6)){{ $tqf->tqf3_6->detail1 }}@endif</textarea>
                                                    <span id="empty-detail1" style="display: none;color: red">กรอกข้อมูลเอกสารและตำราหลัก</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">2. เอกสารและข้อมูลสำคัญ <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" class="form-control formtextarea" type="text" id="detail2" name="detail2">@if (isset($tqf->tqf3_6)){{ $tqf->tqf3_6->detail2 }}@endif</textarea><span id="empty-detail2"
                                                        style="display: none;color: red">กรอกข้อมูลเอกสารและข้อมูลสำคัญ</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">3. เอกสารและข้อมูลแนะนำ <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" class="form-control formtextarea" type="text" id="detail3" name="detail3">@if (isset($tqf->tqf3_6)){{ $tqf->tqf3_6->detail3 }}@endif</textarea><span id="empty-detail3"
                                                        style="display: none;color: red">กรอกข้อมูลเอกสารและข้อมูลสำคัญ</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf3_6()"
                                                        {{-- @if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date) disabled @endif --}}
                                                        class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-7" role="tabpanel" aria-labelledby="tab8">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h4 class="h5">การประเมินและปรับปรุงการดำเนินการของรายวิชา</h4>
                                    <span id="empty-tqf3-7" style="display: none;color: red;">* กรุณาบันทึกข้อมูล</span>
                                    @if ($tqf->date)
                                    <div style="position: absolute;right: 60px;top: 15px;"><span class="badge badge-danger" style="font-size: 12px;">สิ้นสุดกำหนดส่ง</span></div>
                                    @endif
                                </div>
                                <div class="card-body tqf3-7">
                                    <form id="formtqf3-7" class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1.
                                                    กลยุทธ์การประเมินประสิทธิผลของรายวิชาโดยนักศึกษา <span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="detail71" name="detail1">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail1 }}@endif</textarea><span id="empty-detail71"
                                                        style="display: none;color: red">กรอกข้อมูลกลยุทธ์การประเมินประสิทธิผลของรายวิชาโดยนักศึกษา</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">2. กลยุทธ์การประเมินการสอน <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="detail72" name="detail2">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail2 }}@endif</textarea><span id="empty-detail72"
                                                        style="display: none;color: red">กรอกข้อมูลกลยุทธ์การประเมินการสอน</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">3. การปรับปรุงการสอน <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" id="detail73" name="detail3">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail3 }}@endif</textarea><span id="empty-detail73"
                                                        style="display: none;color: red">กรอกข้อมูลการปรับปรุงการสอน</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">4.
                                                    การทวนสอบมาตรฐานผลสัมฤทธิ์ของนักศึกษาในรายวิชา <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="detail74" name="detail4">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail4 }}@endif</textarea><span id="empty-detail74"
                                                        style="display: none;color: red">กรอกข้อมูลการทวนสอบมาตรฐานผลสัมฤทธิ์ของนักศึกษาในรายวิชา</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">5.
                                                    การดำเนินการทบทวนและการวางแผนปรับปรุงประสิทธิผลของรายวิชา <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control formtextarea" type="text" id="detail75" name="detail5">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail5 }}@endif</textarea><span id="empty-detail75"
                                                        style="display: none;color: red">กรอกข้อมูลการดำเนินการทบทวนและการวางแผนปรับปรุงประสิทธิผลของรายวิชา</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 offset-sm-5">
                                                    <button type="button" onclick="add_tqf3_7()"
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
            '#tqf3-1': '<?php echo isset($tqf->tqf3_1); ?>',

            '#tqf3-2': '<?php echo isset($tqf->tqf3_2); ?>',

            '#tqf3-3': '<?php echo isset($tqf->tqf3_3); ?>',

            '#tqf3-4': '<?php echo isset($tqf->tqf3_4); ?>',

            '#tqf3-51': '<?php echo isset($tqf->tqf3_5->data1) && $tqf->tqf3_5->data1 !=''; ?>',

            '#tqf3-52': '<?php echo isset($tqf->tqf3_5->data2) && $tqf->tqf3_5->data2 !=''; ?>',

            '#tqf3-6': '<?php echo isset($tqf->tqf3_6); ?>',

            '#tqf3-7': '<?php echo isset($tqf->tqf3_7); ?>',
        };

        '<?php if ($tqf->status == 1 || $tqf->status == 2 || $tqf->date ) { ?>'

        $("input").attr("readonly", "true");
        $("textarea").attr("readonly", "true");
        $.each($('.formtextarea'), function(i, value) {
            $(this).summernote('disable');
        });
        $("button").prop("disabled", true);
        localStorage.removeItem("tqf3_" + '{{ $tqf->tqf3ID }}');
        '<?php } ?>'

        $(document).on('change input', 'input, textarea', function() {
            // console.log('change');
            if ($(this).attr('type') == 'number' ) {
                var num = $(this).val().replace(/[^0-9()]/g, '');
            $(this).val(num);
            }
            if ($(this).attr('type')=='number' && $(this).val() < 0) {
                $(this).val('');
            }
            if ($(this).attr('name')=='hour'  && $(this).val()> 24) {
                $(this).val(24);
            }
            if ($(this).attr('name')=='week'  && $(this).val()> 20) {
                $(this).val(20);
            }
            change_add();
        });

        $(document).on('click', 'button', function() {
            // console.log('change'); 
            change_add();
           
        });
 
        if (localStorage.getItem("tqf3_" + '{{ $tqf->tqf3ID }}') !== null) {
            var item = JSON.parse(localStorage.getItem("tqf3_" + '{{ $tqf->tqf3ID }}'));
            $.each(item, function(index, value) {
                if (index == '#formtqf3-4' || index == '#formtqf351' || index == '#formtqf3-52') {
                    if (index == '#formtqf3-4' && sa['#tqf3-4'] != '1') {
                        $.each(value, function(i, v) {
                        $(index).find(i).html($(v)); 
                    });
                    }
                    if (index == '#formtqf3-51' && sa['#tqf3-51'] != '1') {
                        $.each(value, function(i, v) {
                        $(index).find(i).html($(v));
                    });
                    }if (index == '#formtqf3-52' && sa['#tqf3-52'] != '1') {
                        $.each(value, function(i, v) {
                        $(index).find(i).html($(v));
                    });
                    }
                    
                } else {
                    $.each(value, function(i, v) {
                    if (index == '#formtqf3-1' && sa['#tqf3-1'] != '1') {
                        if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                            if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {
                            }
                                $(index).find('[name="' + i + '"]').text(v);
                        } else {
                            $(index).find('[name="' + i + '"]').val(v);
                        }
                    }
                    if (index == '#formtqf3-2' && sa['#tqf3-2'] != '1') {
                        if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                            if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {
                            }
                                $(index).find('[name="' + i + '"]').text(v);
                        } else {
                            $(index).find('[name="' + i + '"]').val(v);
                        }
                    }if (index == '#formtqf3-3' && sa['#tqf3-3'] != '1') {
                        if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                            if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {
                            }
                                $(index).find('[name="' + i + '"]').text(v);
                        } else {
                            $(index).find('[name="' + i + '"]').val(v);
                        }
                    }if (index == '#formtqf3-6' && sa['#tqf3-6'] != '1') {
                        if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                            if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {
                            }
                                $(index).find('[name="' + i + '"]').text(v);
                        } else {
                            $(index).find('[name="' + i + '"]').val(v);
                        }
                    }if (index == '#formtqf3-7' && sa['#tqf3-7'] != '1') {
                        if ($(index).find('[name="' + i + '"]')[0].localName == 'textarea') {
                            if ($(index).find('.formtextarea[name="' + i + '"]')[0] != undefined) {
                            }
                                $(index).find('[name="' + i + '"]').text(v);
                        } else {
                            $(index).find('[name="' + i + '"]').val(v);
                        }
                    }
                        
                    });
                }

            });

        }

        function change_add() {
            var add = {};

            $('.forms').find('form').each(function(index, element) {
                var id = '#' + $(this).attr('id');
                add[id] = {};
                if (id == '#formtqf3-4') {
                    $(id).find('tbody').each(function(i, val) {
                        $(this).find("tr td:eq(1) textarea").each(function(key, value) {
                            var va = $(this).val();
                            $(this).text(va);
                        });
                        add[id]['#' + $(this).attr('id')] = $(this)[0].innerHTML;

                    });
                } else if (id == '#formtqf351') {
                    $(id).find('tbody').each(function(i, val) {
                        $(this).find("tr textarea").each(function(key, value) {
                            var va = $(this).val();
                            $(this).text(va);
                        });
                        $(this).find("tr input").each(function(key, value) {
                            var nu = $(this).val();
                            $(this).attr('value', nu);
                        });
                        add[id]['#' + $(this).attr('id')] = $(this)[0].innerHTML;

                    });
                } else if (id == '#formtqf3-52') {
                    $(id).find('tbody').each(function(i, val) {
                        $(this).find("tr [type='text']").each(function(key, value) {
                            var va = $(this).val();
                            $(this).text(va);
                            // console.log(va);
                        });
                        add[id]['#' + $(this).attr('id')] = $(this)[0].innerHTML;

                    });
                } else {
                    $(id).find('[type="text"]').each(function(i, val) {
                        var name = $(this).attr('name');
                        if ($(this).attr('name')) {
                            add[id][name] = $(this).val();
                            // console.log(name);
                        }

                    });
                }
                localStorage.setItem("tqf3_" + '{{ $tqf->tqf3ID }}', JSON.stringify(add));
            });
        }

        $('.nav-tabs a').on('hide.bs.tab', function(e) {
            var id = e.relatedTarget.hash;
            hide_input_empty("#" + $(id + ' form')[0].id);
        });

        $('.nav-tabs a').on('click', function(e) {
            // console.log(e);
            var fill = 0;
            var c = 1;
            var id = $($('.nav-link.active')[1]).attr('href');
            $(id).find('[type="text"],[type="number"],[type="radio"]:checked').each(function(index, element) {
                if ($(this).attr('name')) {
                    if ($(this).val() != '' && $(this).val() != '<p><br></p>'&&$(this).val() != '<br>' ) {
                        fill += 1;
                        if (id == '#tqf3-51' && $(this).attr('name') == 'week') {
                            fill -= 1;
                        }
                    }
                }
            });
            if (id == '#tqf3-1') {
                c = 4;
            }
            // if (id == '#tqf3-51') {
            //     <?php if (isset($tqf->tqf3_5->data1)) { ?>
            //     if ({{ count($tqf->tqf3_5->data1) }} < $(id).find('tbody > tr').length) {
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
            // if (id == '#tqf3-52') {
            //     <?php if (isset($tqf->tqf3_5->data2)) { ?>
            //     if ({{ count($tqf->tqf3_5->data2) }} < $(id).find('tbody > tr').length) {
            //         $('a[href="' + id + '"]').trigger('click');
            //         check_input_empty("#" + $(id + ' form')[0].id);
            //         Swal.fire({
            //             title: 'หมวดที่ 5.2',
            //             html: '<p>กรุณาตรวจสอบข้อมูล แล้วบันทึก<p><p style="font-size:13px">ระบบจะไม่บันทึกข้อมูล หากไม่กดบันทึก<p>',
            //             icon: 'warning',
            //             confirmButtonText: 'ตกลง',
            //             showCloseButton: true
            //         });
            //     }
            //     <?php } ?>
            // }
            if (fill >= c && sa[id] != '1') {
                $.ajax({
                    type: "POST",
                    url: "check_save/" + {{ $tqf->tqf3ID }},
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            check_input_empty("#" + $(id + ' form')[0].id);
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
                                    $($('.nav-link.active')).addClass('unsave'); 
                                    $('#empty-'+id.replace("#", "")).show();
                                     console.log($('.nav-link.active'));
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
                        }else{
                            
                            $('#empty-'+id.replace("#", "")).hide();
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
                    console.log(this.style.height);
                    this.style.height = 60 + 'px';
                });

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

        $('.copy-tqf3').click(function(e) {
            e.preventDefault();
            var year = $('select[name=year]').val();
            var idtqf3 = $('input[name=idtqf3]').val();
            // var year = $('input[name=year]').val();
            var term = $('input[name=term]').val();
            var sub = $('input[name=sub]').val();


            var data = {
                idtqf3: idtqf3,
                year: year,
                // term: term,
                sub: sub
            }
            // console.log(data)

            $.ajax({
                type: "post",
                url: "/check_copytqf3",
                data: data,
                // dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // console.log(response)
                        $("#copy-tqf3-submit").click();
                    } else {
                        Swal.fire({
                            title: 'ไม่พบมคอ.3 ปีการศึกษา ' + response.message,
                            text: response.sub,
                            icon: 'error',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        });
                    }
                    // $('#copy_form_tqf3').modal('show');
                }
            });
        });
    </script>
@endsection
