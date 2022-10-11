@extends('template.officer')
@section('manage', 'active')
@section('textpage', 'เพิ่มไฟล์มคอ.')

@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header align-items-center">
                            <h3 class="h4">เพิ่มไฟล์รายงานมคอ.</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="idtqf" value="0">
                                <div class="form-group row">
                                    <label for="tqf" class="col-sm-2">ไฟล์มคอ </label>
                                    <div class="col-sm-8">
                                        <select name="tqf" id="tqf" class="form-control col-4"
                                            title="Please select">
                                            <option value="tqf3">มคอ. 3</option>
                                            <option value="tqf5">มคอ. 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="year" class="col-sm-2">ภาคเรียน </label>
                                    <select name="year" id="year" class="selectpicker ml-3" data-live-search="true"
                                        title="กรุณาเลือกภาคเรียน">
                                        @foreach ($year as $k => $item)
                                            <option value="{{ $item->idYear }}"
                                                @if (session('data_year') == $item->idYear) selected @endif>
                                                {{ $item->term }}/{{ $item->Year }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="subject" class="col-sm-2">วิชา </label>
                                    <select name="subject" id="subject" class="selectpicker ml-3" data-live-search="true"
                                        title="กรุณาเลือกวิชา">
                                        @foreach ($sub as $item)
                                            <option value="{{ $item->idsubject }}">{{ $item->subjectCode }}
                                                {{ $item->THsubject }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="group" class="col-sm-2">กลุ่มเรียน </label>
                                    <select name="group" id="group" class="selectpicker ml-3" data-live-search="true"
                                        title="กรุณาเลือกกลุ่มเรียน">
                                        @foreach ($group as $item)
                                            <option value="{{ $item->groupID }}">{{ $item->groupname }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="teacher" class="col-sm-2">อาจารย์ </label>
                                    <select name="teacher" id="teacher" class="selectpicker ml-3" data-live-search="true"
                                        title="กรุณาเลือกอาจารย์">
                                        @foreach ($teach as $item)
                                            <option value="{{ $item->userID }}">
                                                {{ $item->Uprefix }}{{ $item->UFName }} {{ $item->ULName }}
                                                &nbsp;&nbsp;{{ isset($item->subfac->branchName) ? $item->subfac->branchName : 'ไม่ระบุ' }}
                                                {{-- &nbsp;&nbsp;{{ $item->subfac->subBranch->factoryName }} --}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="filetqf" class="col-sm-2">ไฟล์มคอ.</label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-primary btn-sm" type="button">
                                            <input type="file" id="filetqf" accept=".doc, .docx,.pdf" name="file">
                                        </button>
                                        <div style="font-size: 13px">* ขนาดไฟล์ไม่เกิน 10M </div>
                                    </div>
                                </div>

                                <br>
                                <center>
                                    <button class="btn btn-success" type="button" onclick="addFileTqf()">เพิ่ม</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
