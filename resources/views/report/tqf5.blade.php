<html>

<body>

    <table>
        <thead>
            <tr>
                <td colspan="15" style="text-align: center;">ตารางสรุปผลการจัดทำรายงาน มคอ.5 และ มคอ.6 ประจำปีการศึกษา
                    {{ $year->Year }}</td>
            </tr>
            <tr>
                <td colspan="15" style="text-align: center;">หลักสูตร {{ $course->courseName }}
                    สาขาวิชา{{ $branch }}</td>
            </tr>
            <tr>
                <td colspan="15" style="text-align: center;">คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน
                    วิทยาเขตขอนแก่น</td>
            </tr>
            <tr>
                <td colspan="15" style="text-align: center;">สำหรับนักศึกษารับเข้าปี
                    {{ $year->Year + 1 - $number_year }} ประจำภาคการศึกษาที่
                    {{ $year->term }}/{{ $year->Year }}
                    ชั้นปีที่ {{ $number_year }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{!! $type == 'N' || $type == 'R' ? '&#x2611;' : '☐' !!} ภาคปกติ</td>
                <td></td>
                <td>{!! $type == 'Q' ? '&#x2611;' : '☐' !!} ภาคสมทบ</td>
                <td>(ระบุ) ................................</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="2" style="border: 1px solid black;text-align: center;">ลำดับ</th>
                <th rowspan="2" style="border: 1px solid black;text-align: center;">รหัสวิชา</th>
                <th colspan="3" rowspan="2" style="border: 1px solid black;text-align: center">ชื่อวิชา</th>
                <th rowspan="2" style="border: 1px solid black;text-align: center;">สภาพ<br>วิชา</th>
                {{-- <th rowspan="2" style="border: 1px solid black;text-align: center;width:10px;">กลุ่มเรียน</th> --}}
                <th colspan="6" style="border: 1px solid black;text-align: center;">ความถูกต้องครบถ้วนของข้อมูล</th>
                <th rowspan="2" colspan="2" style="border: 1px solid black;text-align: center;">
                    อาจารย์ผู้รับผิดชอบรายวิชา</th>
                <th rowspan="2" style="border: 1px solid black;text-align: center;">หมายเหตุ</th>
            </tr>
            <tr>
                <td style="border: 1px solid black;text-align: center;">หมวดที่ 1</td>
                <td style="border: 1px solid black;text-align: center;">หมวดที่ 2</td>
                <td style="border: 1px solid black;text-align: center;">หมวดที่ 3</td>
                <td style="border: 1px solid black;text-align: center;">หมวดที่ 4</td>
                <td style="border: 1px solid black;text-align: center;">หมวดที่ 5</td>
                <td style="border: 1px solid black;text-align: center;">หมวดที่ 6</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tqf as $key => $item)
                <tr>
                    <td style="border: 1px solid black;text-align: center;"
                        @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                        {{ $key + 1 }}</td>
                    <td style="border: 1px solid black;text-align: center;"
                        @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                        {{ $item->subsubject->subjectCode }}</td>
                    <td colspan="3" style="border: 1px solid black;"
                        @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                        {{ $item->subsubject->ENsubject }}</td>
                    {{-- <td style="border: 1px solid black;text-align: center;">{{ $item->subsubject->cradit }}</td> --}}
                    <td style="border: 1px solid black;text-align: center;"
                        @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                        {{ $item->subsubject->sub_num }}</td>
                    @if ($item->filetqf5 != '')
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif></td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif></td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif></td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif></td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif></td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif></td>
                    @else
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                            @if (isset($item->tqf5_1) && $item->tqf5_1->status == 1)
                                ✓
                            @else
                            @endif
                        </td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                            @if (isset($item->tqf5_2) && $item->tqf5_2->status == 1)
                                @if ($item->tqf5_2->data1_1 != '' && $item->tqf5_2->data1_2 != '')
                                    ✓
                                @endif
                            @else
                            @endif
                        </td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                            @if (isset($item->tqf5_3) && $item->tqf5_3->status == 1)
                                @if ($item->tqf5_3->grade != '')
                                    ✓
                                @endif
                            @else
                            @endif
                        </td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                            @if (isset($item->tqf5_4) && $item->tqf5_4->status == 1)
                                ✓
                            @else
                            @endif
                        </td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                            @if (isset($item->tqf5_5) && $item->tqf5_5->status == 1)
                                ✓
                            @else
                            @endif
                        </td>
                        <td style="border: 1px solid black;text-align: center;"
                            @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                            @if (isset($item->tqf5_6) && $item->tqf5_6->status == 1)
                                ✓
                            @else
                            @endif
                        </td>
                    @endif
                    {{-- @if (isset($item->subuser)) --}}
                    @if (count($item->subuser) > 1)
                        @foreach ($item->subuser as $key => $user)
                            @if ($key < 1)
                                <td style="border-bottom: 1px solid black;">
                                    {{ $user->Title == null ? 'อ.' : json_decode($user->Title)[0] }}{{ $user->UFName }}
                                </td>
                                <td style="border-bottom: 1px solid black;">{{ $user->ULName }}</td>
                                <td style="border: 1px solid black;"
                                    @if (count($item->subuser) > 1) rowspan="{{ count($item->subuser) }}" @endif>
                                </td>
                            @else
                <tr>
                    <td style="border-bottom: 1px solid black;">
                        {{ $user->Title == null ? 'อ.' : json_decode($user->Title)[0] }}{{ $user->UFName }}</td>
                    <td style="border-bottom: 1px solid black;">{{ $user->ULName }}</td>

                </tr>
            @endif
            @endforeach
        @else
            @if (count($item->subuser) > 0)
                @foreach ($item->subuser as $user)
                    <td style="border-bottom: 1px solid black;">
                        {{ $user->Title == null ? 'อ.' : json_decode($user->Title)[0] }}{{ $user->UFName }}</td>
                    <td style="border-bottom: 1px solid black;">{{ $user->ULName }}</td>
                @endforeach
            @else
                <td style="border-bottom: 1px solid black;"></td>
                <td style="border-bottom: 1px solid black;"></td>
            @endif

            <td style="border: 1px solid black;"></td>
            </tr>
            @endif
            {{-- @else
        <td>เจ้าหน้าที่จัดเก็บไฟล์เอง</td>
                @endif
                @if ($item->filetqf3 != '')
        <td>*กรุณาตรวจเอกสาร</td>
                @endif --}}
            @endforeach
        </tbody>
    </table>
    <table>
        <tr>
            <td colspan="2">&nbsp;&nbsp;รับรองความถูกต้อง</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2" style="text-align: center">อนุมัติ</td>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td style="text-align: center" colspan="2">(.............................................)</td>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="3">(.............................................)</td>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="3">(.............................................)</td>
            <td style="text-align: center"></td>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="2">(.............................................)</td>
        </tr>
        <tr>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="2">ประธานหลักสูตร</td>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="3">หัวหน้าสาขาวิชา/โปรแกรมวิชา</td>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="3">รองคณบดีฝ่ายวิชาการและวิจัย</td>
            <td style="text-align: center"></td>
            <td style="text-align: center"></td>
            <td style="text-align: center" colspan="2">คณบดีคณะวิศวกรรมศาสตร์</td>
        </tr>
    </table>
</body>


</html>
