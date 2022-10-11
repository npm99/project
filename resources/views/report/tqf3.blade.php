<html>
<tr style="height: 50px">
    <td style="height: 45px"></td>
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
    <td colspan="10" style="text-align: center;">แบบสรุปผลการจัดทำรายละเอียดของรายวิชา (มคอ.3)
        หรือรายละเอียดของประสบการณ์ภาคสนาม (มคอ.4) </td>
</tr>
<tr>
    <td colspan="10" style="text-align: center;">สาขาวิชา{{ $branch->branchName }}</td>
</tr>
<tr>
    <td colspan="10" style="text-align: center;">คณะ{{isset($branch->subBranch->factoryName)?$branch->subBranch->factoryName:''}} มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน
        วิทยาเขตขอนแก่น</td>
</tr>
<tr>
    <td colspan="10" style="text-align: center;">ประจำภาคการศึกษาที่ {{$year->term}} ปีการศึกษา {{$year->Year}}</td>
</tr>
<table>
    <thead>
        <tr>
            <th rowspan="2" style="border: 1px solid black;text-align: center;"><b>ลำดับ</b>
            </th>
            <th rowspan="2" colspan="4" style="border: 1px solid black;text-align: center;">
                <b>รหัส-ชื่อวิชา</b>
            </th>
            <th colspan="2" style="border: 1px solid black;text-align: center;height:45px">
                <b>มีการจัดกิจกรรมเน้น<br>ผู้เรียนเป็นสำคัญ</b>
            </th>
            <th rowspan="2" style="border: 1px solid black;text-align: center;">
                <b>ชั้นปีที่เรียน</b>
            </th>
            <th rowspan="2" colspan="2" style="border: 1px solid black;text-align: center;">
                อาจารย์ผู้รับผิดชอบรายวิชา/<br>อาจารย์ผู้สอน</th>
            {{-- <th rowspan="2"></th> --}}
        </tr>
        <tr>
            <td style="border: 1px solid black;text-align: center;">มี</td>
            <td style="border: 1px solid black;text-align: center;">ไม่มี</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($tqf as $key => $item)
       {{-- @if (count($item->subuser) > 1) --}}
            <tr>
                <td style="border: 1px solid black;text-align: center;" @if (count($item->subuser) > 1) rowspan="{{count($item->subuser)}}" @endif>
                    {{ $key + 1 }}
                </td>
                <td style="border: 1px solid black;text-align: center;" @if (count($item->subuser) > 1) rowspan="{{count($item->subuser)}}" @endif>
                    {{ $item->subsubject->subjectCode }}</td>
                <td style="border: 1px solid black;" colspan="3" @if (count($item->subuser) > 1) rowspan="{{count($item->subuser)}}" @endif>
                    {{ $item->subsubject->ENsubject }}</td>
                <td style="border: 1px solid black;text-align: center;" @if (count($item->subuser) > 1) rowspan="{{count($item->subuser)}}" @endif>
                @if ($item->status == 2)
                ✓  
                @endif
                </td>
                <td style="border: 1px solid black;text-align: center;" @if (count($item->subuser) > 1) rowspan="{{count($item->subuser)}}" @endif>
                    @if ($item->status != 2)
                    ✓  
                    @endif
                </td>
                <td style="border: 1px solid black;text-align: center;" @if (count($item->subuser) > 1) rowspan="{{count($item->subuser)}}" @endif>
                    {{ $item->group->groupname }}</td>
                    @if (count($item->subuser) > 1)
                        @foreach ($item->subuser as $key => $user)
                            @if ($key < 1)
                                <td style="border-bottom: 1px solid black;">
                                    {{ $user->Title==null?'อ.':json_decode($user->Title)[0] }}{{ $user->UFName }}</td>
                                <td style="border-bottom: 1px solid black;border-right: 1px solid black;">{{ $user->ULName }}</td>
                            @else
                                <tr>
                                    <td style="border-bottom: 1px solid black;">{{ $user->Title==null?'อ.':json_decode($user->Title)[0] }}{{ $user->UFName }}</td>
                                    <td style="border-bottom: 1px solid black;border-right: 1px solid black;">{{ $user->ULName }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        @foreach ($item->subuser as $user)
                            <td style="border-bottom: 1px solid black;">{{ $user->Title==null?'อ.':json_decode($user->Title)[0] }}{{ $user->UFName }}</td>
                            <td style="border-bottom: 1px solid black;border-right: 1px solid black;">{{ $user->ULName }}</td>
                        @endforeach
                        </tr>
                    @endif
                {{-- <tr/> --}}
                {{-- @endif --}}
        @endforeach
    </tbody>
</table>
<table>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="5">หมายเหตุ ให้ใส่เครื่องหมาย ✓ ลงในช่อง “มี / ไม่มี” </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td style="text-align: center;" colspan="5">ลงนาม ........................................... ประธานหลัก</td>
        <td></td>
        <td style="text-align: center;" colspan="4">ลงนาม .......................................... หัวหน้าสาขาวิชา
        </td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="5">(…………………………………………..)</td>
        <td></td>
        {{-- <td></td> --}}
        <td style="text-align: center;" colspan="4">(…………………………………………..)</td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="5">วันที่ {{$date}}</td>

    </tr>
    <tr></tr>
    <tr>
        <td style="text-align: center;" colspan="5">ลงนาม ....................................... รองคณบดีฝ่ายวิชาการฯ
        </td>
        <td></td>
        <td style="text-align: center;" colspan="4">ลงนาม ................................ คณบดีคณะวิศวกรรมศาสตร์</td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="5">(ผศ.ดร.ศักดิ์ระวี ระวีกุล)</td>
        {{-- <td></td> --}}
        <td></td>
        <td style="text-align: center;" colspan="4">(นายปริญ นาชัยสิทธิ์)</td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="5">วันที่ {{$date}}</td>
        {{-- <td></td> --}}
        <td></td>
        <td style="text-align: center;" colspan="4">วันที่ {{$date}}</td>
    </tr>
</table>

</html>
