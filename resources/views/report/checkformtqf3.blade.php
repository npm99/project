{{-- @extends('template.officer')
@section('m2', 'active')
@section('t3', 'active')
@section('textpage', 'ตรวจสอบมคอ.3')
@section('content')

    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="tqf3-tab1" data-toggle="tab" href="#tqf3-1" role="tab"
                aria-controls="หมวดที่ 1" aria-selected="true">หมวดที่ 1</a>
            <a class="nav-item nav-link" id="tqf3-tab2" data-toggle="tab" href="#tqf3-2" role="tab"
                aria-controls="หมวดที่ 2" aria-selected="false">หมวดที่ 2</a>
            <a class="nav-item nav-link" id="tqf3-tab3" data-toggle="tab" href="#tqf3-3" role="tab"
                aria-controls="หมวดที่ 3" aria-selected="false">หมวดที่ 3</a>
            <a class="nav-item nav-link" id="tqf3-tab4" data-toggle="tab" href="#tqf3-4" role="tab"
                aria-controls="หมวดที่ 4" aria-selected="false">หมวดที่ 4</a>
            <a class="nav-item nav-link" id="tqf3-tab5" data-toggle="tab" href="#tqf3-51" role="tab"
                aria-controls="หมวดที่ 5.1" aria-selected="true">หมวดที่ 5.1</a>
            <a class="nav-item nav-link" id="tqf3-tab6" data-toggle="tab" href="#tqf3-52" role="tab"
                aria-controls="หมวดที่ 5.2" aria-selected="false">หมวดที่ 5.2</a>
            <a class="nav-item nav-link" id="tqf3-tab7" data-toggle="tab" href="#tqf3-6" role="tab"
                aria-controls="หมวดที่ 6" aria-selected="false">หมวดที่ 6</a>
            <a class="nav-item nav-link" id="tqf3-tab8" data-toggle="tab" href="#tqf3-7" role="tab"
                aria-controls="หมวดที่ 7" aria-selected="false">หมวดที่ 7</a>
        </div>
    </nav>

    <section class="forms">
        <input type="hidden" name="idtqf3" value="{{ $tqf->tqf3ID }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tqf3-1" role="tabpanel" aria-labelledby="tab1">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h3 class="h4">ข้อมูลทั่วไป</h3>
                                </div>
                                <div class="card-body tqf3-1">
                                    <form class="form-horizontal" method="post">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ชื่อรายวิชา (ภาษาไทย) </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control " type="text" id="thname" name="thname" @if (isset($tqf->tqf3_1)) value="{{ $tqf->tqf3_1->THnamesubject }}" @endif>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ชื่อรายวิชา (ภาษาอังกฤษ) </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control " type="text" id="enname" name="enname" @if (isset($tqf->tqf3_1)) value="{{ $tqf->tqf3_1->ENnamesubject }}" @endif>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">จำนวนหน่วยกิต </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="credit"
                                                        name="credit">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->credit }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">หลักสูตรและประเภทของรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " id="course"
                                                        name="course">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->course }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">อาจารย์ผู้รับผิดชอบรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="teacher"
                                                        name="teacher">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->teacher }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">ภาคการศึกษา/ชั้นปีที่เรียน
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="term"
                                                        name="term">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->term }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">รายวิชาที่ต้องเรียนมาก่อน
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="pre"
                                                        name="pre">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->Pre_requisite }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">รายวิชาที่ต้องเรียนไปพร้อม
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="co"
                                                        name="co">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->Co_requisite }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">สถานที่เรียน </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="place"
                                                        name="place">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->place }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 form-control-label">วันที่จัดทำหรือปรับปรุงรายละเอียดของรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="date" id="date_mo"
                                                        name="date_mo">@if (isset($tqf->tqf3_1)){{ $tqf->tqf3_1->date_modify }}@endif</textarea>
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
                                    <h3 class="h4">จุดมุ่งหมายและวัตถุประสงค์</h3>
                                </div>
                                <div class="card-body tqf3-2">
                                    <form class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1. จุดมุ่งหมายของรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="target"
                                                        name="target">@if (isset($tqf->tqf3_2)){{ $tqf->tqf3_2->target }}@endif</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">2.
                                                    วัตถุประสงค์ในการพัฒนา/ปรับปรุงรายวิชา </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="objective"
                                                        name="objective">@if (isset($tqf->tqf3_2)){{ $tqf->tqf3_2->objective }}@endif</textarea>
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
                                    <h3 class="h4">ลักษณะและการดำเนินการ</h3>
                                </div>
                                <div class="card-body tqf3-3">
                                    <form class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1. คำอธิบายรายวิชา </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="course_desc"
                                                        name="course_desc">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->course_desc }}@endif</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label">2.จำนวนชั่วโมงที่ใช้ต่อภาคการศึกษา</label>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">บรรยาย</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control " type="text" id="hour_lecture"
                                                            name="hour_lecture">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_lecture }}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">สอนเสริม</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control " type="text" id="hour_tu"
                                                            name="hour_tu">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_tu }}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">การฝึกปฏิบัติ/งานภาคสนาม/การฝึกงาน</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control " type="text" id="houre_practice"
                                                            name="houre_practice">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->houre_practice }}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="margin-left: 30px"
                                                        class="col-sm-3 form-control-label">การศึกษาด้วยตนเอง</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control " type="text" id="hour_selhflearn"
                                                            name="hour_selhflearn">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_selhflearn }}@endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">3.
                                                    จำนวนชั่วโมงต่อสัปดาห์ที่อาจารย์ให้คำปรึกษา
                                                    และแนะนำทางวิชาการแก่นักศึกษาเป็นรายบุคคล</label>

                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="hour_recom"
                                                        name="hour_recom">@if (isset($tqf->tqf3_3)){{ $tqf->tqf3_3->hour_recom }}@endif</textarea>
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
                                    <h3 class="h4">การพัฒนาการเรียนรู้ของนักศึกษา</h3>
                                </div>
                                <div class="card-body tqf3-4">
                                    <form class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-control-label">1. คุณธรรม จริยธรรม</label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">1.1 คุณธรรม
                                                            จริยธรรมที่ต้องพัฒนา
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="morality"
                                                                name="morality">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->morality }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">1.2 วิธีการสอน
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="morality2"
                                                                name="morality2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->morality2 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">1.3 วิธีการประเมินผล
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="morality3"
                                                                name="morality3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->morality3 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">2. ความรู้</label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">2.1 ความรู้ที่ต้องได้รับ
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="knowledge"
                                                                name="knowledge">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->knowledge }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">2.2 วิธีการสอน
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="knowledge2"
                                                                name="knowledge2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->knowledge2 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">2.3 วิธีการประเมินผล
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="knowledge3"
                                                                name="knowledge3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->knowledge3 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">3. ทักษะทางปัญญา</label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">3.1
                                                            ทักษะทางปัญญาที่ต้องพัฒนา
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="intel_skill"
                                                                name="intel_skill">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->intel_skill }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">3.2 วิธีการสอน
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="intel_skill2"
                                                                name="intel_skill2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->intel_skill2 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">3.3 วิธีการประเมินผล
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="intel_skill3"
                                                                name="intel_skill3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->intel_skill3 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">4.
                                                    ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">4.1
                                                            ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบที่ต้องพัฒนา
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="respon_skill"
                                                                name="respon_skill">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->respon_skill }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">4.2 วิธีการสอน
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="respon_skill2"
                                                                name="respon_skill2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->respon_skill2 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">4.3 วิธีการประเมินผล
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="respon_skill3"
                                                                name="respon_skill3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->respon_skill3 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <label class="form-control-label">5. ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร
                                                    และการใช้เทคโนโลยีสารสนเทศ</label>
                                                <div style="margin-left: 40px">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">5.1
                                                            ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร
                                                            และการใช้เทคโนโลยีสารสนเทศที่ต้องพัฒนา
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="num_skill"
                                                                name="num_skill">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->num_skill }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">5.2 วิธีการสอน
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="num_skill2"
                                                                name="num_skill2">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->num_skill2 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 form-control-label">5.3 วิธีการประเมินผล
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control " type="text" id="num_skill3"
                                                                name="num_skill3">@if (isset($tqf->tqf3_4)){{ $tqf->tqf3_4->num_skill3 }}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-51" role="tabpanel" aria-labelledby="tab5">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h3 class="h4">แผนการสอน</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post">
                                        @csrf
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
                                                            <th style="width: 10px"><input disabled class="form-control"
                                                                    value="{{ $item->week }}" id="week" name="week"
                                                                    type="text"></th>
                                                            <td><textarea class="form-control " type="text" id="content"
                                                                    name="content">{{ $item->content }}</textarea>
                                                            </td>
                                                            <td><input class="form-control" id="hour" name="hour"
                                                                    value="{{ $item->hour }}" type="number">
                                                            </td>
                                                            <td><textarea class="form-control " type="text" id="intuction"
                                                                    name="intuction">{{ $item->intuction }}</textarea>
                                                            </td>
                                                            <td><textarea class="form-control " type="text" id="assid"
                                                                    name="assid">{{ $item->assid }}</textarea>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                @else
                                                    @for ($i = 0; $i < 17; $i++)
                                                        <tr>
                                                            <th style="width: 10px"><input disabled class="form-control"
                                                                    value="{{ $i + 1 }}" id="week" name="week"
                                                                    type="text"></th>
                                                            <td><textarea class="form-control " type="text" id="content"
                                                                    name="content"></textarea>
                                                            </td>
                                                            <td><input class="form-control" id="hour" name="hour"
                                                                    value="{{ $tqf->tqf3_51 }}" type="number">
                                                            </td>
                                                            <td><textarea class="form-control " type="text" id="intuction"
                                                                    name="intuction"></textarea>
                                                            </td>
                                                            <td><textarea class="form-control " type="text" id="assid"
                                                                    name="assid"></textarea>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                @endif

                                            </tbody>
                                        </table>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tqf3-52" role="tabpanel" aria-labelledby="tab6">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <div class="col-sm-12 d-flex justify-content-between">
                                        <h3 class="h4">2. แผนการประเมินผลการเรียนรู้</h3>
                                        <span>
                                            <button class="add-row352 btn btn-primary btn-sm"><i
                                                    class="fa fa-plus-circle"></i>&nbsp;เพิ่มแถว</button>
                                        </span>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <form class="form-horizontal" method="post">
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
                                                                <td><textarea class="form-control" type="text" id="no"
                                                                        name="no">{{ $item->no }}</textarea></td>
                                                                <td><textarea class="form-control" type="text" id="howto"
                                                                        name="howto">{{ $item->howto }}</textarea></td>
                                                                <td><textarea class="form-control" type="text" id="week"
                                                                        name="week">{{ $item->howto }}</textarea></td>
                                                                <td><textarea class="form-control" type="text" id="percent"
                                                                        name="percent">{{ $item->howto }}</textarea></td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td><textarea class="form-control " type="text" id="no"
                                                                    name="no"></textarea></td>
                                                            <td><textarea class="form-control " type="text" id="howto"
                                                                    name="howto"></textarea></td>
                                                            <td><textarea class="form-control " type="text" id="week"
                                                                    name="week"></textarea></td>
                                                            <td><textarea class="form-control " type="text" id="percent"
                                                                    name="percent"></textarea></td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="tqf3-6" role="tabpanel" aria-labelledby="tab7">
                            <div class="card">
                                <div class="card-header align-items-center">
                                    <h3 class="h4">ทรัพยากรประกอบการเรียนการสอน</h3>
                                </div>
                                <div class="card-body tqf3-6">
                                    <form class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1. เอกสารและตำราหลัก </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" class="form-control " type="text"
                                                        id="detail1"
                                                        name="detail1">@if (isset($tqf->tqf3_6)){{ $tqf->tqf3_6->detail1 }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">2. เอกสารและข้อมูลสำคัญ
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" class="form-control " type="text"
                                                        id="detail2"
                                                        name="detail2">@if (isset($tqf->tqf3_6)){{ $tqf->tqf3_6->detail2 }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">3. เอกสารและข้อมูลแนะนำ
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height: 70px" class="form-control " type="text"
                                                        id="detail3"
                                                        name="detail3">@if (isset($tqf->tqf3_6)){{ $tqf->tqf3_6->detail3 }}@endif</textarea>
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
                                    <h3 class="h4">การประเมินและปรับปรุงการดำเนินการของรายวิชา</h3>
                                </div>
                                <div class="card-body tqf3-7">
                                    <form class="form-horizontal" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">1.
                                                    กลยุทธ์การประเมินประสิทธิผลของรายวิชาโดยนักศึกษา </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="detail1"
                                                        name="detail1">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail1 }}@endif</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">2. กลยุทธ์การประเมินการสอน
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="detail2"
                                                        name="detail2">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail2 }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">3. การปรับปรุงการสอน
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " id="detail3"
                                                        name="detail3">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail3 }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">4.
                                                    การทวนสอบมาตรฐานผลสัมฤทธิ์ของนักศึกษาในรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="detail4"
                                                        name="detail4">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail4 }}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">5.
                                                    การดำเนินการทบทวนและการวางแผนปรับปรุงประสิทธิผลของรายวิชา
                                                </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control " type="text" id="detail5"
                                                        name="detail5">@if (isset($tqf->tqf3_7)){{ $tqf->tqf3_7->detail5 }}@endif</textarea>
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

@endsection --}}

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>มคอ.3 {!! nl2br(e($tqf->subsubject->subjectCode)) !!}&nbsp;{!! nl2br(e($tqf->subsubject->THsubject)) !!}</title>
    <style>
        @page {
            /* size: A4 portrait; */
            margin: 25.4mm 25.4mm 25.4mm 25.4mm;
        }

        /* /* @media print { */
        .pagebreak {
            /* page-break-inside: avoid;  */
            page-break-before: always;
            /* page-break-after: always;  */
        }

        /* }  */

        .doc-border {
            /* font-family: "TH SarabunPSK", sans-serif; */
        }

        table.table-print {
            width: 100%;
            border-collapse: collapse;
            /* page-break-inside: avoid; */
            /* table-layout: initial; */
            /* overflow: wrap; */
            font-size: 16pt;
            /* word-wrap: break-word; */
        }

        thead:before,
        thead:after {
            display: none;
        }

        tbody:before,
        tbody:after {
            display: none;
        }

        table.table-print td,
        th {
            border: 1px solid black;
            font-family: 'thsarabun';
            /* font-family: "TH SarabunPSK", sans-serif; */
            /* word-wrap: break-word; */
            /* All browsers since IE 5.5+ */
            /* overflow-wrap: break-word; */
            /* word-break: break-all; */
        }

        table.table-print thead td {
            text-align: center;
            font-family: 'thsarabun';
            /* font-family: "TH SarabunPSK", sans-serif; */

        }

        .indent{
            margin-left: 25px;
        }

        p {
            margin:0in !important;
            font-size:21px !important;
            /* margin-top:2.0pt; */
            
            /* color: rgb(255, 0, 0) !important !important; */
        }

        ol li {
            margin:0in !important;
            font-size:21px !important;
            /* margin-top:2.0pt; */
        }

        .text-newline {
            font-family: 'thsarabun';
            white-space: pre-wrap;
            /* overflow: wrap; */
            hyphens: auto;
            font-size:21px !important;
            /* text-indent: 5em each-line; */
            /* word-wrap: normal; */
            /* font-size: 16pt; */
            /* font-family: "TH SarabunPSK", sans-serif; */
            /* color: rgb(255, 0, 0); */
        }

        ol {
  /* list-style-type: upper-roman; */
            /* list-style-position: inside; */
            /* margin-left: 0px; */
            /* padding-left: 30px; */
            }

        body {
            font-family: 'thsarabun';
            /* font-family: "TH SarabunPSK", sans-serif; */
        }

    </style>
</head>

<body>
    <div class="doc-border">
        <table style="width: 60px; margin-left:100%;">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <p style="margin: 0in; font-size: 16px; text-align: center;">
                                <strong><span style="font-size:27px;">มคอ.3</span></strong>
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin:0in;font-size:16px;text-align:center;"><img
                src="{{ asset('assets/img/logo/logo-university.png') }}"
                style="text-align: left; width: 97.15pt; height: 168.3pt;" alt="image"></p>
        <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                    style="font-size:37px;">รายละเอียดของรายวิชา</span></strong>
        </p>
        <p style="text-align:center;"><strong><span style="font-size:35px;">รหัส&nbsp;{!! nl2br(e($tqf->subsubject->subjectCode)) !!}&nbsp;
            วิชา{!! nl2br(e($tqf->subsubject->THsubject)) !!}</span></strong><strong><span
                    style="color:red;">&nbsp;</span></strong></p>
        <p style="text-align:center;"><strong><span style="font-size:35px;">{!! nl2br(e($tqf->subsubject->ENsubject)) !!}</span></strong></p>
        <p><span style="font-size:11px;">&nbsp;</span></p>
        <div style="margin-top: 120pt;"></div>
        <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                    style="font-size:37px;">คณะวิศวกรรมศาสตร์</span></strong></p>
        <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                    style="font-size:40px;">มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน&nbsp;</span></strong>
        </p>
        <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                    style="font-size:40px;">วิทยาเขตขอนแก่น</span></strong></p>
        <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                    style="font-size:37px;">กระทรวงอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม</span></strong></p>
        
        <div class="pagebreak">
        <p style="margin:0in;font-size:16px;text-align:center;text-indent:.5in;"><strong><span
                    style="font-size:24px;">รายละเอียดของรายวิชา</span></strong>
        </p>
        <p style="margin:0in;font-size:16pt;text-align:center;"><strong><span
                    style="font-size:11px;">&nbsp;</span></strong></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span
                    style="font-size:16pt;">ชื่อสถาบันอุดมศึกษา&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;</span></strong><span style="font-size:16pt;">มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน</span></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span
                    style="font-size:16pt;">วิทยาเขต/คณะ/สาขาวิชา&nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;</span></strong><span style="font-size:16pt;"> วิทยาเขตขอนแก่น</span></p>
        <p style="margin:0in;font-size:16pt;margin-left:1.5in;text-indent:.5in;"><span style="font-size:16pt;">&nbsp;
                คณะวิศวกรรมศาสตร์</span></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="font-size:16pt;">&nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp;สาขาวิชา{!! nl2br(e(!isset($tqf->branchName)?'':$tqf->branchName)) !!}</span></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
        <p style="margin:0in;font-size:16px;text-align:center;"><strong><span style="font-size:24px;">หมวดที่ &nbsp;1
                    &nbsp;
                    ข้อมูลโดยทั่วไป</span></strong></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span
                    style="font-size:11px;">&nbsp;</span></strong></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span style="font-size:16pt;">1.
                    รหัสและชื่อรายวิชา&nbsp;</span></strong></p>
        <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->THname)
                <span class="text-newline">{!! nl2br(e($tqf->subsubject->subjectCode)) !!}&nbsp;&nbsp;&nbsp;&nbsp;{!! nl2br(e($tqf->tqf3_1->THname)) !!}</span>
            @endif
        </p>
        <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:120px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->ENname)
                <span class="text-newline">{!! nl2br(e($tqf->tqf3_1->ENname)) !!}</span>
            @endif

        </p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span style="font-size:16pt;">2.
                    จํานวนหน่วยกิต&nbsp;</span></strong></p>
        <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->credit)
                <span class="text-newline">{!! nl2br(e($tqf->tqf3_1->credit)) !!}</span>
            @endif

        </p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="color:black;">&nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp;</span></p>

        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span style="font-size:16pt;">3.
                    หลักสูตรและประเภทของรายวิชา&nbsp;</span></strong></p>
        <p style="margin:0;font-size:21px;margin-top:3.0pt;margin-left:25px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->course)
                <span class="text-newline">{!! nl2br(e($tqf->tqf3_1->course)) !!}</span>
            @endif

        </p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
        <p style="margin:0in;font-size:21px;margin-right:-45.4pt;"><strong><span style="font-size:16pt;">4.
                    อาจารย์ผู้รับผิดชอบรายวิชาและอาจารย์ผู้สอน&nbsp;</span></strong></p>
        <div class="indent">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->teacher)
                {!! $tqf->tqf3_1->teacher !!}
            @endif
        </div>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span style="font-size:16pt;">5. ภาคการศึกษา /
                    ชั้นปีที่เรียน&nbsp;</span></strong></p>
        <div class="indent">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->term)
                {!! $tqf->tqf3_1->term !!}
            @endif

        </div>
        <p style="margin:0in;font-size:16px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;"><span
                style="font-size:19px;">&nbsp;</span></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span style="font-size:16pt;">6.
                    รายวิชาที่ต้องเรียนมาก่อน (Pre-requisite)</span></strong></p>
        <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->Pre_requisite)
                <span class="text-newline">{!! nl2br(e($tqf->tqf3_1->Pre_requisite)) !!}</span>
            @endif

        </p>
        <p style="margin:0in;font-size:16px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;"><span
                style="font-size:19px;">&nbsp;</span></p>
        <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span style="font-size:16pt;">7.
                    รายวิชาที่ต้องเรียนพร้อมกัน (Co-requisites)</span></strong></p>
        <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->Co_requisite)
                <span class="text-newline">{!! nl2br(e($tqf->tqf3_1->Co_requisite)) !!}</span>
            @endif

        </p>
        <p style="margin:0in;font-size:16px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;"><span
                style="font-size:19px;">&nbsp;</span></p>
        <p style="margin:0in;font-size:16px;line-height:17.8pt;"><strong><span style="font-size:16pt;">8.
                    สถานที่เรียน&nbsp;</span></strong></p>
        <div class="indent"><p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:30px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->place)
                <span class="text-newline">{!! $tqf->tqf3_1->place !!}</span>
            @endif
        </p></div>
        <p style="margin:0in;font-size:16px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;"><span
                style="font-size:19px;">&nbsp;</span></p>
        <p style="margin:0in;font-size:16px;line-height:17.8pt;"><strong><span style="font-size:16pt;">9.
                    วันที่จัดทําหรือปรับปรุงรายละเอียดของรายวิชาครั้งล่าสุด&nbsp;</span></strong></p>
        <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
            @if (isset($tqf->tqf3_1) && $tqf->tqf3_1->date_modify)
                <span class="text-newline">{!! nl2br(e($tqf->tqf3_1->date_modify)) !!}</span>
            @endif

        </p>
        </div>
        <div class="pagebreak">
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span style="font-size:24px;">หมวดที่
                        &nbsp;2
                        &nbsp;
                        จุดมุ่งหมายและวัตถุประสงค์</span></strong></p>
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                        style="font-size:11px;">&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>1.
                        &nbsp;จุดมุ่งหมายของรายวิชา</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_2) && $tqf->tqf3_2->target)
                    <span class="text-newline">{!! $tqf->tqf3_2->target !!}</span>
                @endif

            </p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>2.
                        &nbsp;วัตถุประสงค์ในการพัฒนา/ปรับปรุงรายละเอียดของรายวิชา</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_2) && $tqf->tqf3_2->objective)
                    <span class="text-newline">{!! $tqf->tqf3_2->objective !!}</span>
                @endif

            </p>
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                        style="font-size:13px;">&nbsp;</span></strong></p>
        </div>
        <div class="pagebreak">
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span style="font-size:24px;">หมวดที่
                        &nbsp;3
                        &nbsp;
                        ลักษณะและการดำเนินการ</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span
                        style="font-size:11px;">&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>1.
                        &nbsp;คำอธิบายรายวิชา</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_3) && $tqf->tqf3_3->course_desc)
                    <span class="text-newline">{!! $tqf->tqf3_3->course_desc !!}</span>
                @endif

            </p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;"><span style="color:black;">&nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>2.
                        &nbsp;จำนวนชั่วโมงที่ใช้ต่อภาคการศึกษา</span></strong><strong><span>&nbsp;&nbsp;</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%;">
                    <thead>
                        <tr>
                            <td style="width:92.2pt;padding:5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">บรรยาย&nbsp;</span></strong>
                                </p>
                            </td>
                            <td style="width:120.45pt;border-left:  none;padding:5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">สอนเสริม</span></strong>
                                </p>
                            </td>
                            <td style="width:117.0pt;border-left:  none;padding:5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span
                                            style="font-size:16pt;">การฝึกปฏิบัติ/งานภาคสนาม/การฝึกงาน</span></strong>
                                </p>
                            </td>
                            <td style="width:106.55pt;border-left:  none;padding:5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">การศึกษาด้วยตนเอง</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding:5.4pt;vertical-align: top;">
                                <p>
                                    @if (isset($tqf->tqf3_3) && $tqf->tqf3_3->hour_lecture)
                                        <span style="font-size:16pt;">{!! nl2br(e($tqf->tqf3_3->hour_lecture)) !!}</span>
                                    @endif
                                </p>
                            </td>
                            <td style="padding: 5.4pt;vertical-align: top;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    @if (isset($tqf->tqf3_3) && $tqf->tqf3_3->hour_tu)
                                        <span style="font-size:16pt;">{!! nl2br(e($tqf->tqf3_3->hour_tu)) !!}</span>
                                    @endif
                                </p>
                            </td>
                            <td style="padding:5.4pt;vertical-align: top;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    @if (isset($tqf->tqf3_3) && $tqf->tqf3_3->houre_practice)
                                        <span style="font-size:16pt;">{!! nl2br(e($tqf->tqf3_3->houre_practice)) !!}</span>
                                    @endif
                                </p>
                            </td>
                            <td style="padding: 5.4pt;vertical-align: top;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    @if (isset($tqf->tqf3_3) && $tqf->tqf3_3->hour_selhflearn)
                                        <span style="font-size:16pt;">{!! nl2br(e($tqf->tqf3_3->hour_selhflearn)) !!}</span>
                                    @endif
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>3.
                        &nbsp;จำนวนชั่วโมงต่อสัปดาห์ที่อาจารย์ให้คำปรึกษา
                        และแนะนำทางวิชาการแก่นักศึกษาเป็นรายบุคคล</span></strong></p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;">
                @if (isset($tqf->tqf3_3) && $tqf->tqf3_3->hour_recom)
                    <span style="font-size:16pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! nl2br(e($tqf->tqf3_3->hour_recom)) !!}</span>
                @endif
            </p>
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span
                        style="font-size:15px;">&nbsp;</span></strong></p>
        </div>
        <div class="pagebreak">
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span style="font-size:24px;">หมวดที่
                        &nbsp;4
                        &nbsp;
                        การพัฒนาการเรียนรู้ของนักศึกษา</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>1. &nbsp;คุณธรรม &nbsp;
                        จริยธรรม</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;1.1
                    &nbsp; คุณธรรม
                    จริยธรรมที่ต้องพัฒนา</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->morality)
                @foreach ($tqf->tqf3_4->morality as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">1.1.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->morality)) !!}</span> --}}
                @endif

            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;1.2
                    &nbsp; วิธีการสอน</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->morality2)
                @foreach ($tqf->tqf3_4->morality2 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">1.2.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->morality2)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:16px;text-indent:.5in;line-height:17.8pt;"><span
                    style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;1.3
                    &nbsp; วิธีการประเมินผล</span>
            </p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->morality3)
                @foreach ($tqf->tqf3_4->morality3 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">1.3.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->morality3)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>2.
                        &nbsp;ความรู้</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;2.1
                    &nbsp; ความรู้ที่ต้องได้รับ</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->knowledge)
                @foreach ($tqf->tqf3_4->knowledge as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">2.1.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->knowledge)) !!}</span> --}}
                @endif

            </p>
            <p style="margin:0in;font-size:16px;text-indent:.5in;line-height:17.0pt;"><span
                    style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;2.2
                    &nbsp; วิธีการสอน</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->knowledge2)
                @foreach ($tqf->tqf3_4->knowledge2 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">2.2.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->knowledge2)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;2.3
                    &nbsp; วิธีการประเมินผล</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->knowledge3)
                @foreach ($tqf->tqf3_4->knowledge3 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">2.3.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->knowledge3)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>3.
                        &nbsp;ทักษะทางปัญญา</span></strong>
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;3.1
                    &nbsp; ทักษะทางปัญญาที่ต้องพัฒนา</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->intel_skill)
                @foreach ($tqf->tqf3_4->intel_skill as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">3.1.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->intel_skill)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:16px;text-indent:.5in;line-height:17.0pt;"><span
                    style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;3.2
                    &nbsp; วิธีการสอน</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->intel_skill2)
                @foreach ($tqf->tqf3_4->intel_skill2 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">3.2.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->intel_skill2)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span>
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;3.3
                    &nbsp;วิธีการประเมินผล</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->intel_skill3)
                @foreach ($tqf->tqf3_4->intel_skill3 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">3.3.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->intel_skill3)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>4.
                        &nbsp;ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;4.1
                    &nbsp; ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบที่ต้องพัฒนา</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->respon_skill)
                @foreach ($tqf->tqf3_4->respon_skill as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">4.1.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->respon_skill)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span>
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;4.2
                    &nbsp; วิธีการสอน</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->respon_skill2)
                @foreach ($tqf->tqf3_4->respon_skill2 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">4.2.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->respon_skill2)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span>
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;4.3
                    &nbsp; วิธีการประเมินผล</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->respon_skill3)
                @foreach ($tqf->tqf3_4->respon_skill3 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">4.3.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->respon_skill3)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>5.
                        &nbsp;ทักษะการวิเคราะห์เชิงตัวเลข
                        การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;5.1
                    ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศที่ต้องพัฒนา</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->num_skill)
                @foreach ($tqf->tqf3_4->num_skill as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">5.1.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->num_skill)) !!}</span> --}}
                @endif

            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span style="color:black;">&nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;5.2
                    &nbsp; วิธีการสอน</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->num_skill2)
                @foreach ($tqf->tqf3_4->num_skill2 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">5.2.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->num_skill2)) !!}</span> --}}
                @endif
            </p>
            <p style="margin:0in;font-size:16px;text-indent:.5in;line-height:17.0pt;"><span
                    style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp;5.3
                    &nbsp; วิธีการประเมินผล</span></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;">
                @if (isset($tqf->tqf3_4) && $tqf->tqf3_4->num_skill3)
                @foreach ($tqf->tqf3_4->num_skill3 as $key => $item)
                <p style="margin:0in;font-size:21px;">
                <span>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span><span class="text-newline">5.3.{{$key+1}} {!! nl2br(e($item)) !!}</span>
                </p>
                @endforeach
                    {{-- <span class="text-newline">{!! nl2br(e($tqf->tqf3_4->num_skill3)) !!}</span> --}}
                @endif
            </p>
            {{-- <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span
                        style="font-size:11px;">&nbsp;</span></strong></p> --}}
        </div>
        <div class="pagebreak">
            <p style="margin:0in;font-size:16pt;text-align:center;"><strong><span style="font-size:24px;">หมวดที่
                        &nbsp;5
                        &nbsp;
                        แผนการสอนและการประเมินผล</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>1. &nbsp;แผนการสอน</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%;">
                    <thead>
                        <tr>
                            <td style="padding:5.4pt;">
                                <p style="margin:0in;font-size:16pt;text-align:center;">
                                    <strong><span>สัปดาห์ที่</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p style="margin:0in;font-size:16pt;text-align:center;">
                                    <strong><span>รายละเอียด</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p style="margin:0in;font-size:16pt;text-align:center;">
                                    <strong><span>จำนวนชั่วโมง</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p style="margin:0in;font-size:16pt;text-align:center;">
                                    <strong><span>กิจกรรมการเรียน&nbsp;</span></strong>
                                </p>
                                <p style="margin:0in;font-size:16pt;text-align:center;"><strong><span>การสอน
                                            &nbsp;สื่อที่ใช้</span></strong></p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p style="margin:0in;font-size:16pt;text-align:center;">
                                    <strong><span>ผู้สอน</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tqf->tqf3_5) && $tqf->tqf3_5->data1)
                            @foreach ($tqf->tqf3_5->data1 as $item)
                                <tr>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;text-align:center;">
                                        <p style="margin:0in;font-size:16pt;">
                                            <span>{!! nl2br(e(isset($item->week)?$item->week:'')) !!}</span>
                                        </p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span>{!! nl2br(e(isset($item->content)?$item->content:'')) !!}</span></p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;text-align:center;">
                                        <p><span>{!! nl2br(e(isset($item->hour)?$item->hour:'')) !!}</span></p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span>{!! nl2br(e(isset($item->intuction)?$item->intuction:'')) !!}</span></p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span>{!! nl2br(e(isset($item->assid)?$item->assid:'')) !!}</span>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>2.
                        &nbsp;แผนการประเมินผลการเรียนรู้&nbsp;</span></strong></p>
            <div class="col-12">
                <table class="table-print" style="width: 100%">
                    <thead>
                        <tr>
                            <td style="padding: 5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">ผลการเรียนรู้&nbsp;</span></strong>
                                </p>
                            </td>
                            <td style="padding: 5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">วิธีการประเมิน</span></strong>
                                </p>
                            </td>
                            <td style="padding: 5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">สัปดาห์ที่ประเมิน</span></strong>
                                </p>
                            </td>
                            <td style="padding: 5.4pt;">
                                <p style="margin:0in;font-size:16px;text-align:center;">
                                    <strong><span style="font-size:16pt;">สัดส่วนของการประเมินผล</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tqf->tqf3_5) && $tqf->tqf3_5->data2)
                            @foreach ($tqf->tqf3_5->data2 as $item)
                                <tr>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span style="font-size:16pt;">{!! nl2br(e(isset($item->no)?$item->no:'')) !!}</span></p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span style="font-size:16pt;">{!! nl2br(e(isset($item->howto)?$item->no:'')) !!}</span></p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span style="font-size:16pt;">{!! nl2br(e(isset($item->week)?$item->week:'')) !!}</span></p>
                                    </td>
                                    <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                        <p><span style="font-size:16pt;">{!! nl2br(e(isset($item->percent)?$item->percent:'')) !!}</span></p>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

            <p><em><span style="font-size:19px;color:red;">&nbsp;</span></em></p>
        </div>
        <div class="pagebreak">
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span style="font-size:24px;">หมวดที่
                        &nbsp;6
                        &nbsp;
                        ทรัพยากรประกอบการเรียนการสอน</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>1.
                        &nbsp;เอกสารและตำราหลัก</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                @if (isset($tqf->tqf3_6) && $tqf->tqf3_6->detail1)
                    <span class="text-newline">{!! $tqf->tqf3_6->detail1 !!}</span>
                @endif

            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>2.
                        &nbsp;เอกสารและข้อมูลสำคัญ</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                @if (isset($tqf->tqf3_6) && $tqf->tqf3_6->detail2)
                    <span class="text-newline">{!! $tqf->tqf3_6->detail2 !!}</span>
                @endif
            </p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>&nbsp;</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>3.
                        &nbsp;เอกสารและข้อมูลแนะนำ</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                @if (isset($tqf->tqf3_6) && $tqf->tqf3_6->detail3)
                    <span class="text-newline">{!! $tqf->tqf3_6->detail3 !!}</span>
                @endif
            </p>
            <p style="margin:0in;font-size:16px;text-indent:.5in;line-height:17.8pt;"><span
                    style="color:black;">&nbsp;</span></p>
        </div>
        <div class="pagebreak">
            <p style="margin:0in;font-size:16px;text-align:center;"><strong><span style="font-size:24px;">หมวดที่
                        &nbsp;7
                        &nbsp;
                        การประเมินและปรับปรุงการดำเนินการของรายวิชา</span></strong></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><span>&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>1.
                        &nbsp;การประเมินประสิทธิผลของรายวิชาโดยนักศึกษา</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                <div class="indent">
                @if (isset($tqf->tqf3_7) && $tqf->tqf3_7->detail1)
                    <span class="text-newline">{!! $tqf->tqf3_7->detail1 !!}</span>
                @endif                    
                </div>
            </p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>2.
                        &nbsp;การประเมินการสอน</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                <div class="indent">
                @if (isset($tqf->tqf3_7) && $tqf->tqf3_7->detail2)
                    <span class="text-newline">{!! $tqf->tqf3_7->detail2 !!}</span>
                @endif                    
                </div>
            </p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>3.
                        &nbsp;การปรับปรุงการสอน</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                <div class="indent">
                @if (isset($tqf->tqf3_7) && $tqf->tqf3_7->detail3)
                    <span class="text-newline">{!! $tqf->tqf3_7->detail3 !!}</span>
                @endif
                </div>
            </p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>4. &nbsp;
                        การทวนสอบมาตรฐานผลสัมฤทธิ์ของนักศึกษาในรายวิชา</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
                <div class="indent">
                @if (isset($tqf->tqf3_7) && $tqf->tqf3_7->detail4)
                    <span class="text-newline">{!! $tqf->tqf3_7->detail4 !!}</span>
                @endif
                </div>
            </p>
            <p style="margin:0in;font-size:16px;line-height:17.8pt;"><span style="color:black;">&nbsp;</span></p>
            <p style="margin:0in;font-size:21px;line-height:17.8pt;"><strong><span>5.
                        &nbsp;การดำเนินการทบทวนและการวางแผนปรับปรุงประสิทธิผลของรายวิชา</span></strong></p>
            <p style="margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;">
               <div class="indent">
                @if (isset($tqf->tqf3_7) && $tqf->tqf3_7->detail5)
                    <span class="text-newline">{!! $tqf->tqf3_7->detail5 !!}</span>
                @endif
               </div>
            </p>
        </div>

    </div>
</body>

</html>
