<div class="table-responsive">

    <table id="example" class="table table-bordered" style="width:100%">
        <thead class="headtable">
            <tr>
                <th>
                    {{-- <input style="width: 15px;height: 15px;" id="row-all" type="checkbox" name="row-all"> --}}
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="row-all" name="row-all">
                        <label class="custom-control-label" for="row-all"></label>
                    </div>
                </th>
                <th style="width: 10px;">ภาคเรียนที่</th>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th>หน่วยกิต</th>
                <th>กลุ่มเรียน</th>
                <th>ชื่ออาจารย์</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="text-align: center;vertical-align: middle;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                id="row-addtqf-{{ isset($item->tqf3ID) ? $item->tqf3ID : $item->tqf5ID }}"
                                name="row-addtqf" data-user="{{ $item->iduser }}" data-group="{{ $item->group_sub }}"
                                data-subject="{{ $item->subsubject->idsubject }}"
                                data-id="{{ isset($item->tqf3ID) ? $item->tqf3ID : $item->tqf5ID }}"
                                data-teacher="{{ $item->teacher }}">
                            <label class="custom-control-label"
                                for="row-addtqf-{{ isset($item->tqf3ID) ? $item->tqf3ID : $item->tqf5ID }}"></label>
                        </div>
                        {{-- <input data-user="{{ $item->iduser }}" data-subject="{{ $item->subsubject->idsubject }}"
                            data-id="{{ isset($item->tqf3ID) ? $item->tqf3ID : $item->tqf5ID }}"
                            style="width: 15px;height: 15px;" id="row-addtqf" type="checkbox" name="row-addtqf"> --}}
                    </td>
                    <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                    <td>{{ $item->subsubject->subjectCode }}</td>
                    <td>{{ $item->subsubject->THsubject }}</td>
                    <td>{{ $item->subsubject->cradit }}</td>
                    <td>{{ isset($item->group->groupname) ? $item->group->groupname : '' }}</td>

                    <td style="width: fit-content">
                        @foreach ($item->subuser as $user)
                            <div>{{ $user->Uprefix }}{{ $user->UFName }}
                                {{ $user->ULName }}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tfoot>
    </table>
</div>
