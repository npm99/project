@extends('template.homepage')
@section('tqf3', 'active')
@section('content')
<div class="main-body">
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center" style="justify-content: space-between">
                            <h4 class="h5">ดาวน์โหลดมคอ.3</h4>
                            <div class="row exports-tqf5" style="margin-right: 10px">
                                <div class="form-row" style="margin-right: 20px">
                                    <label for="select_year" class="control-label">ภาคเรียน:</label>
                                    <div class="col-sm-2">
                                        <select id="select_year" name="select_year">
                                            <option value="" selected></option>
                                            @foreach ($year as $item)
                                                <option value="{{ $item->idYear }}">{{ $item->term }}/{{ $item->Year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-right: 10px">
                                    <label for="select_sub" class="control-label">วิชา:</label>
                                    <div class="col-sm-2">
                                        <select id="select_sub" name="select_sub" style="width: 100px">
                                            <option value="" selected></option>
                                            @foreach ($sub as $item)
                                                <option value="{{ $item->idsubject }}">{{ $item->THsubject }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                                        <th>ดาวน์โหลด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tqf as $item)

                                        <tr>
                                            <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                            <td>{{ $item->subsubject->subjectCode }}</td>
                                            <td>{{ $item->subsubject->THsubject }}</td>
                                            <td>{{ $item->group->groupname }}</td>
                                            <td class="tqfstatus">
                                                <a href="{{ url('filetqf3/' . $item->tqf3ID) }}" target="_blank"><i
                                                        class="fa fa-download"></i></a>

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
</div>
    
@endsection
