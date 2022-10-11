@extends('template.teacher')
@section('d1', 'active')
@section('d5', 'active')

@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center" style="justify-content: space-between">
                            <div class="col-lg-12 row">
                                <div class="col-lg-9 col-md-9 p-0">
                                    <h4 class="h5">ดาวน์โหลดมคอ.5</h4>
                                    <span><span style="color: red">*</span> การดาวน์โหลดเอกสารมคอ. จะต้องมีสถานะถูกต้อง จึงสามารถดาวน์โหลดได้</span>
                                </div>
                                <div class="col-lg-3 col-md-3 p-0">
                                    <form class="form-inline" id="search" action="downloadtqf5" method="POST">
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
                                            <button type="submit" hidden class="btn btn-primary btn-sm ml-2">ค้นหา</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row exports-tqf5" style="margin-right: 10px">
                                {{-- <div class="form-row" style="margin-right: 20px">
                                    <label for="select_year" class="control-label">ภาคเรียน:</label>
                                    <div class="col-sm-2">
                                        <select id="select_year" name="select_year" style="width: 100px"
                                            class="form-control">
                                            <option data-text="" value="" selected></option>
                                            @foreach ($year as $item)
                                                <option data-text="{{ $item->term }}/{{ $item->Year }}">
                                                    {{ $item->term }}/{{ $item->Year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-row" style="margin-right: 10px">
                                <label for="select_sub" class="control-label">วิชา:</label>
                                <div class="col-sm-2">
                                    <select id="select_sub" name="select_sub" style="width: 100px" class="form-control">
                                        <option data-text="" value="" selected></option>
                                        @foreach ($sub as $item)
                                            <option data-text="{{ $item->THsubject }}">{{ $item->THsubject }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                                {{-- <div class="form-row" style="margin-right: 10px">
                                    <label for="select_group" class="control-label">กลุ่มเรียน :</label>
                                    <div class="col-sm-2">
                                        <select id="select_group" name="select_group" style="width: 100px"
                                            class="form-control">
                                            <option data-text="" value="" selected></option>
                                            @foreach ($group as $item)
                                                <option data-text="{{ $item->groupname }}">{{ $item->groupname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example" class="table table-bordered" style="width:100%">
                                <thead class="headtable">
                                    <tr>
                                        <th>ภาคเรียนที่</th>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        <th>กลุ่มเรียน</th>
                                        <th>อาจารย์ผู้สอน</th>
                                        <th>ดาวน์โหลด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tqf as $item)
                                        <tr>
                                            <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                            <td>{{ isset($item->subsubject->subjectCode) ? $item->subsubject->subjectCode : 'ไม่ระบุ' }}
                                            </td>
                                            <td>{{ isset($item->subsubject->THsubject) ? $item->subsubject->THsubject : 'ไม่ระบุ' }}
                                            </td>
                                            <td>{{ isset($item->group->groupname) ? $item->group->groupname : 'ไม่ระบุ' }}
                                            </td>

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
                                            <td
                                                style="text-align: center;padding:5px!important;padding-top: 10px!important;">
                                                @if ($item->send_file == 1)
                                                    @foreach (unserialize($item->filetqf5) as $key => $value)
                                                        <a href="/showfile/{{ $value }}" target="_blank"><i
                                                                class="fa fa-download"></i></a><br />
                                                    @endforeach
                                                @else
                                                    <a href="filetqf5/{{ $item->tqf5ID }}" target="_blank"><i
                                                            class="fa fa-download"></i></a>
                                                @endif
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
@endsection
