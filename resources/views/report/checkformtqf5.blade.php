<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>มคอ.5 {!! nl2br(e(isset($tqf->subsubject->subjectCode)?$tqf->subsubject->subjectCode:'ไม่ระบุ')) !!}&nbsp;{!! nl2br(e(isset($tqf->subsubject->THsubject)?$tqf->subsubject->THsubject:'ไม่ระบุ')) !!}</title>
</head>
<style>
    /* @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ asset('fonts/THSarabun.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("{{ asset('fonts/THSarabun Bold.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src: url("{{ asset('fonts/THSarabun Italic.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("{{ asset('fonts/THSarabun BoldItalic.ttf') }}") format('truetype');
    } */

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
        font-family: 'thsarabun';
    }

    table.table-print {
        width: 100%;
        border-collapse: collapse;
        /* page-break-inside: avoid; */
        table-layout: initial;
        font-family: 'thsarabun';
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
        /* word-wrap: break-word; */
        /* All browsers since IE 5.5+ */
        /* overflow-wrap: break-word; */
        /* word-break: break-all; */
    }

    p {
            margin:0in !important;
            font-size:21px !important;
            /* margin-top:2.0pt; */
            
            /* color: rgb(255, 0, 0) !important !important; */
        }

        .indent{
            margin-left: 25px;
        }

    .text-newline {
        white-space: pre-wrap;
        font-family: 'thsarabun';
        /* font-family: "TH SarabunPSK", sans-serif; */
    }

    body {
        font-family: 'thsarabun';
        /* font-family: "TH SarabunPSK", sans-serif; */
    }

</style>

<body>
    <div class="doc-border">
        <table style="width: 60px; margin-left: 100%;">
            <tbody>
                <tr>
                    <td>
                        <div>
                            <p style='font-size: 16px;'>
                                <strong><span style='font-size:27px;'>มคอ.5</span></strong>
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin:0in;font-size:16px;text-align:center;'><img
                src="{{ asset('assets/img/logo/logo-university.png') }}"
                style="text-align: left; width: 97.15pt; height: 168.3pt;" alt="image"><strong><span
                    style='font-size:48px;'>&nbsp;</span></strong></p>
        <!-- <p><br></p>
                                                                                        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:48px;'>&nbsp;</span></strong></p>
                                                                                        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:48px;'>&nbsp;</span></strong></p>
                                                                                        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:48px;'>&nbsp;</span></strong></p>
                                                                                        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:13px;'>&nbsp;</span></strong></p> -->
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                    style='font-size:37px;'>รายงานผลการดำเนินการของรายวิชา</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                    style='font-size:35px;'>รหัส&nbsp;{!! nl2br(e(isset($tqf->subsubject->subjectCode)?$tqf->subsubject->subjectCode:'ไม่ระบุ')) !!}&nbsp;วิชา{!! nl2br(e(isset($tqf->subsubject->THsubject)?$tqf->subsubject->THsubject:'ไม่ระบุ')) !!}</span></strong><strong><span
                    style='color:red;'>&nbsp;</span></strong></p>


        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                    style='font-size:35px;'>{!! nl2br(e(isset($tqf->subsubject->ENsubject)?$tqf->subsubject->ENsubject:'ไม่ระบุ')) !!}</span></strong>
        </p>

        {{-- <p style='margin:0in;font-size:21px;text-align:center;'><strong><span>&nbsp;</span></strong></p> --}}
        <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:29px;'>&nbsp;</span></p>
        <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
        <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
        <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
        <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
        <!-- <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p>
                                                                                            <p style='margin:0in;font-size:21px;text-align:center;'><span style='font-size:11px;'>&nbsp;</span></p> -->
        <div style="margin-bottom: 2.1in"></div>
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                    style='font-size:40px;'>มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:37px;'>กระทรวงอุดมศึกษา
                    วิทยาศาสตร์ วิจัยและนวัตกรรม</span></strong></p>
        <div class="pagebreak">
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                    style='font-size:24px;'>การรายงานผลการดำเนินการของรายวิชา</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span>&nbsp;</span></strong></p>
        <p style='margin:0in;font-size:21px;'><strong><span>ชื่อสถานบันอุดมศึกษา</span></strong><span
                style='margin:0in;font-size:21px;margin-left:15px;text-indent:.5in;'>&nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน</span>
        </p>
        <p style='margin:0in;font-size:21px;'><strong><span>วิทยาเขต/คณะ/สาขาวิชา</span></strong><span>&nbsp;
                &nbsp; &nbsp; &nbsp;วิทยาเขตขอนแก่น</span>
        </p>
        <p style='margin:0in;font-size:21px;margin-left:95px;text-indent:.5in;'>
            <span>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;คณะวิศวกรรมศาสตร์</span>
        </p>
        <p style='margin:0in;font-size:21px;margin-left:95px;text-indent:.5in;'>
            <span>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;สาขาวิชา{!! nl2br(e(isset($tqf->branchName)?$tqf->branchName:"ไม่ระบุ")) !!}</span>
        </p>
        <p style='margin:0in;font-size:21px;margin-left:1.5in;text-indent:.5in;'>
            <span>&nbsp; &nbsp;</span>
        </p>
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:24px;'>หมวดที่ 1
                    ข้อมูลโดยทั่วไป</span></strong></p>
        <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                    style='font-size:13px;'>&nbsp;</span></strong></p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>1.&nbsp; รหัสและชื่อรายวิชา</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;margin-left:25px;'>
            @if (isset($tqf->tqf5_1) && $tqf->tqf5_1->THname)
                <span class="text-newline">{!! nl2br(e($tqf->subsubject->subjectCode)) !!}&nbsp;&nbsp;&nbsp;&nbsp;{!! nl2br(e($tqf->tqf5_1->THname)) !!}</span>
            @endif
        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;margin-left:120px;'>
            @if (isset($tqf->tqf5_1) && $tqf->tqf5_1->ENname)
                <span class="text-newline">{!! nl2br(e($tqf->tqf5_1->ENname)) !!}</span>
            @endif

        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>&nbsp;</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>2. &nbsp;รายวิชาที่ต้องเรียนก่อนรายวิชานี้
                    (ถ้ามี)&nbsp;</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;margin-left:25px;'>
            @if (isset($tqf->tqf5_1) && $tqf->tqf5_1->pre_req)
                <span class="text-newline">{!! nl2br(e($tqf->tqf5_1->pre_req)) !!}</span>
            @endif

        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>&nbsp;</span></strong>
        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>3. &nbsp;อาจารย์ผู้รับผิดชอบรายวิชา
                    อาจารย์ผู้สอน และกลุ่มเรียน (section)&nbsp;</span></strong>
        </p>
        <div class="indent">
            @if (isset($tqf->tqf5_1) && $tqf->tqf5_1->teacher)
                {!! $tqf->tqf5_1->teacher !!}
            @endif
        </div>
            
        <p style='margin:0in;font-size:21px;'><span>&nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp;<strong>&nbsp;</strong></span></p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>4.
                    &nbsp;ภาคการศึกษา/ปีการศึกษาที่เปิดสอนรายวิชา&nbsp;</span></strong>
        </p>
        <div class="indent">
            @if (isset($tqf->tqf5_1) && $tqf->tqf5_1->term)
                <span class="text-newline">{!! $tqf->tqf5_1->term !!}</span>
            @endif

        </div>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
            <span style='font-size:19px;'>&nbsp;</span>
        </p>
        <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
            <strong><span>5. &nbsp;สถานที่เรียน&nbsp;</span></strong>
        </p>
        <div class="indent">
            @if (isset($tqf->tqf5_1) && $tqf->tqf5_1->place)
                <span class="text-newline">{!! $tqf->tqf5_1->place !!}</span>
            @endif

        </div>
        </div>
        <div class="pagebreak">
            <p style='margin:0in;font-size:21px;text-align:center;margin-top:50px'><strong><span
                        style='font-size:24px;'>หมวดที่ 2
                        การจัดการเรียนการสอนที่เปรียบเทียบกับแผนการสอน</span></strong></p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>1.
                        &nbsp;รายงานชั่วโมงการสอนจริงเทียบกับแผนการสอน</span></strong>
            </p>
            <div align="center" class="col-12" style='margin:0in;font-size:21px;'>
                <table class="table-print" style="width:100%;">
                    <thead>
                        <tr>
                            <td style="padding:5.4pt;width:250;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>หัวข้อ</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>จำนวนชั่วโมง<br>ตามแผนการสอน</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>จำนวนชั่วโมง<br>ที่ได้สอนจริง</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ระบุสาเหตุที่การสอนจริง<br>ต่างจากแผนการสอน<br>หากมีความแตกต่างเกิน
                                            25%</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tqf->tqf5_2) && $tqf->tqf5_2->data1_1)
                            @foreach ($tqf->tqf5_2->data1_1 as $item)
                                <tr>
                                    <td style="padding: 5.4pt 5.4pt;vertical-align: top;">
                                        <span style='margin:0in;font-size:21px;'
                                            class="text-newline">{!! nl2br(e(isset($item->detail)?$item->detail:'')) !!}</span>
                                    </td>
                                    <td style="padding: 5.4pt 5.4pt;vertical-align: top;text-align:center;">
                                        <span style='margin:0in;font-size:21px;'>{!! nl2br(e(isset($item->hour1)?$item->hour1:'')) !!}</span>
                                    </td>
                                    <td style="padding: 5.4pt 5.4pt;vertical-align: top;text-align:center;">
                                        <span style='margin:0in;font-size:21px;'>{!! nl2br(e(isset($item->hour2)?$item->hour2:'')) !!}</span>
                                    </td>
                                    <td style="padding: 5.4pt 5.4pt;vertical-align: top;">
                                        <span style='margin:0in;font-size:21px;'
                                            class="text-newline">{!! nl2br(e(isset($item->reason)?$item->reason:'')) !!}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
            <br>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>2. &nbsp;หัวข้อที่สอนไม่ครอบคลุมตามแผน
                        &nbsp;(ถ้ามี)</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%">
                    <thead>
                        <tr>
                            <td style="padding:5.4pt;">
                                <p style='margin:0in;font-size:21px;text-align:center;line-height:17.8pt;'>
                                    <strong><span>หัวข้อที่สอนไม่ครอบคลุมตามแผน&nbsp;</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>นัยสำคัญของหัวข้อที่สอนไม่ครอบคลุม<br>ตามแผน</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>แนวทางชดเชย</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0in 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;'>
                                    @if (isset($tqf->tqf5_2) && $tqf->tqf5_2->data2_1)
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_2->data2_1)) !!}</span>
                                    @endif
                                </p>
                            </td>
                            <td style="padding: 0in 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;'>
                                    @if (isset($tqf->tqf5_2) && $tqf->tqf5_2->data2_2)
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_2->data2_2)) !!}</span>
                                    @endif
                                </p>
                            </td>
                            <td style="padding: 0in 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;'>
                                    @if (isset($tqf->tqf5_2) && $tqf->tqf5_2->data2_3)
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_2->data2_3)) !!}</span>
                                    @endif
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagebreak">
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span
                    style='font-size:12px;color:blue;'>&nbsp;</span></p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>3.
                        &nbsp;ประสิทธิผลของวิธีสอนที่ทำให้เกิดผลการเรียนรู้ตามที่ระบุในรายละเอียดของรายวิชา</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%">
                    <thead>
                        <tr>
                            <td rowspan="2" style="padding:5.4pt;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span style='font-size:19px;'>ผลการเรียนรู้</span></strong>
                                </p>
                            </td>
                            <td rowspan="2" style="padding:5.4pt;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span
                                            style='font-size:19px;'>วิธีสอนที่ระบุในรายละเอียดรายวิชา</span></strong>
                                </p>
                            </td>
                            <td colspan="2" style="padding:5.4pt;width:70pt">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span style='font-size:19px;'>ประสิทธิผล</span></strong>
                                </p>
                            </td>
                            <td rowspan="2" style="padding:5.4pt;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span style='font-size:19px;'>ปัญหาของการใช้วิธีสอน
                                            (ถ้ามี)<br> พร้อมข้อเสนอแนะในการแก้ไข</span></strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span style='font-size:19px;'>มี</span></strong>
                                </p>
                            </td>
                            <td style="padding: 2pt 5.4pt;vertical-align: top;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span style='font-size:19px;'>ไม่มี</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tqf->tqf5_2) && $tqf->tqf5_2->data1_2)
                            @foreach ($tqf->tqf5_2->data1_2 as $item)
                                <tr>
                                    <td style="padding: 0in 5.4pt;vertical-align: top;">
                                        <p style='margin:0in;font-size:21px;'><span
                                                class="text-newline">{!! nl2br(e(isset($item->learn_outcome)?$item->learn_outcome:'')) !!}</span>
                                        </p>
                                    </td>
                                    <td style="padding: 0in 5.4pt;vertical-align: top;">
                                        <p style='margin:0in;font-size:21px;'><span
                                                class="text-newline">{!! nl2br(e(isset($item->description)?$item->description:'')) !!}</span>
                                        </p>
                                    </td>
                                    @if (isset($item->effect))
                                    @if ($item->effect == 'yes')
                                        <td style="padding: 0in 5.4pt;vertical-align: top;">
                                            <p style='margin:0in;font-size:21px;text-align:center;'>
                                                <span class="text-newline">/</span>
                                            </p>
                                        </td>
                                        <td style="padding: 0in 5.4pt;vertical-align: top;">
                                            <p style='margin:0in;font-size:21px;'><span class="text-newline"></span>
                                            </p>
                                        </td>
                                    @else
                                        <td style="padding: 0in 5.4pt;vertical-align: top;">
                                            <p style='margin:0in;font-size:21px;text-align:center;'>
                                                <span class="text-newline"></span>
                                            </p>
                                        </td>
                                        <td style="padding: 0in 5.4pt;vertical-align: top;">
                                            <p style='margin:0in;font-size:21px;'><span class="text-newline">/</span>
                                            </p>
                                        </td>
                                    @endif
                                    @else
                                    <td style="padding: 0in 5.4pt;vertical-align: top;">
                                        <p style='margin:0in;font-size:21px;text-align:center;'>
                                            <span class="text-newline"></span>
                                        </p>
                                    </td>
                                    <td style="padding: 0in 5.4pt;vertical-align: top;">
                                        <p style='margin:0in;font-size:21px;'><span class="text-newline"></span>
                                        </p>
                                    </td>
                                    @endif
                                    <td style="padding: 0in 5.4pt;vertical-align: top;">
                                        <p style='margin:0in;font-size:21px;'><span
                                                class="text-newline">{!! nl2br(e($item->problem)) !!}</span>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>
            </div>
            <p style='margin:0in;font-size:21px;line-height:17.8pt;'><strong><span>&nbsp;</span></strong></p>
            <p style='margin:0in;font-size:21px;line-height:17.8pt;'><strong><span>4.
                        &nbsp;ข้อเสนอการดำเนินการเพื่อปรับปรุงวิธีสอน</span></strong></p>
            <p style='margin:0in;font-size:21px;text-indent:.2in;'>
                @if (isset($tqf->tqf5_2) && $tqf->tqf5_2->data4)
                    <span class="text-newline">{!! $tqf->tqf5_2->data4 !!}</span>
                @endif
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span
                    style='font-size:11px;color:blue;'>&nbsp;</span></p>
        </div>

        <div class="pagebreak">
            <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:24px;'>หมวดที่ 3
                        สรุปผลการจัดการเรียนการสอนของรายวิชา</span></strong></p>
            <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                        style='font-size:11px;'>&nbsp;</span></strong></p>
            <p
                style='margin:0in;font-size:21px;margin-top:3.0pt;margin-right:-59.6pt;margin-bottom:.0001pt;margin-left:0in;line-height:17.8pt;'>
                <strong><span>1. &nbsp;จำนวนนักศึกษาที่ลงทะเบียนเรียน&nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;</span></strong>
                @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->num_regis)
                    <span>{!! nl2br(e($tqf->tqf5_3->num_regis)) !!}&nbsp; คน</span>
                @endif
                <span>&nbsp;&nbsp;</span>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>2.
                        &nbsp;จำนวนนักศึกษาที่คงอยู่เมื่อสิ้นสุดภาคการศึกษา</span></strong>
                @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->num_end)
                    <span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{!! nl2br(e($tqf->tqf5_3->num_end)) !!}&nbsp; คน</span>
                @endif
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>3. &nbsp;จำนวนนักศึกษาที่ถอน
                        (</span></strong><strong><span>W)&nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;&nbsp;</span></strong>
                @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->num_w)
                    <span>{!! nl2br(e($tqf->tqf5_3->num_w)) !!}&nbsp; คน</span>
                @endif
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>4. &nbsp;การกระจายของระดับคะแนน
                        (</span></strong><strong><span>GRADE)</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                <em><span style='font-size:19px;color:red;'>&nbsp;</span></em>
            </p>
            <div class="col-12">
                <table class="table-print" style="width: 100%;">
                    <thead>
                        <tr>
                            <td colspan="2" style="width:4.0in;padding:5.4pt;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span>ระดับคะแนน</span></strong><strong><span>&nbsp;(GRADE)</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span>จำนวน (คน)</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span>คิดเป็นร้อยละ</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade)
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>ก</span><span>&nbsp; &nbsp; &nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; A</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>4.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[0]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[0]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>ข</span><sup><span>+</span></sup><span>&nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; B<sup>+</sup></span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>3.50</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[1]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[1]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ข</span><span>&nbsp; &nbsp; &nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; B</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>3.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[2]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[2]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ค</span><sup><span>+</span></sup><span>&nbsp; &nbsp; &nbsp; หรือ&nbsp;
                                            &nbsp;
                                            &nbsp; C<sup>+</sup></span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>2.50</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[3]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[3]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ค</span><span>&nbsp; &nbsp; &nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; C</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>2.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[4]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[4]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ง</span><sup><span>+&nbsp;</span></sup><span>&nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; D<sup>+</sup></span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>1.50</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[5]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[5]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ง</span><span>&nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp; &nbsp; &nbsp; D</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>1.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[6]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[6]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ต</span><span>&nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp; &nbsp; &nbsp; F</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;text-align:center;'>
                                        <span>0.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[7]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[7]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>ก</span><span>&nbsp; &nbsp; &nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; A</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>4.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>ข</span><sup><span>+</span></sup><span>&nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; B<sup>+</sup></span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>3.50</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ข</span><span>&nbsp; &nbsp; &nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; B</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>3.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ค</span><sup><span>+</span></sup><span>&nbsp; &nbsp; &nbsp; หรือ&nbsp;
                                            &nbsp;
                                            &nbsp; C<sup>+</sup></span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>2.50</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ค</span><span>&nbsp; &nbsp; &nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; C</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>2.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ง</span><sup><span>+&nbsp;</span></sup><span>&nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp; D<sup>+</sup></span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>1.50</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ง</span><span>&nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp; &nbsp; &nbsp; D</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>1.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ต</span><span>&nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp;หรือ&nbsp; &nbsp; &nbsp; F</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;text-align:center;'>
                                        <span>0.00</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div style="margin-top: 20px"></div>
                <table class="table-print" style="width: 100%;">
                    <thead>
                        <tr>
                            <td colspan="2" style="width:4.0in;padding:5.4pt;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span>ระดับคะแนน&nbsp;</span></strong><strong><span>(GRADE)</span></strong>
                                </p>
                            </td>
                            <td style="width: 73.5pt;padding:5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span>จำนวน (คน)</span></strong>
                                </p>
                            </td>
                            <td style="width: 70.85pt;padding:5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;text-align:center;'>
                                    <strong><span>คิดเป็นร้อยละ</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade)
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ถ</span><span>&nbsp; &nbsp; &nbsp; &nbsp; หรือ&nbsp;
                                            &nbsp; &nbsp;W</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[8]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[8]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ม</span><span>.ส&nbsp; &nbsp;&nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp;I</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[9]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[9]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>พ</span><span>.จ&nbsp; &nbsp;&nbsp;หรือ&nbsp; &nbsp;
                                            &nbsp; &nbsp;S</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[10]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[10]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ม</span><span>.จ&nbsp; &nbsp; หรือ&nbsp; &nbsp; &nbsp;
                                            &nbsp;U</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[11]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[11]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ม</span><span>.น&nbsp; &nbsp; หรือ&nbsp; &nbsp; &nbsp;
                                            AU</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[12]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[12]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>น</span><span>.ท&nbsp; &nbsp; หรือ&nbsp; &nbsp; &nbsp;
                                            TC</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[13]->count)) !!}</span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span>{!! nl2br(e($tqf->tqf5_3->grade[13]->percent)) !!}</span>
                                    </p>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ถ</span><span>&nbsp; &nbsp; &nbsp; &nbsp; หรือ&nbsp;
                                            &nbsp; &nbsp;W</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ม</span><span>.ส&nbsp; &nbsp;&nbsp; &nbsp;หรือ&nbsp;
                                            &nbsp; &nbsp;I</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>พ</span><span>.จ&nbsp; &nbsp;&nbsp;หรือ&nbsp; &nbsp;
                                            &nbsp; &nbsp;S</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ม</span><span>.จ&nbsp; &nbsp; หรือ&nbsp; &nbsp; &nbsp;
                                            &nbsp;U</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>ม</span><span>.น&nbsp; &nbsp; หรือ&nbsp; &nbsp; &nbsp;
                                            AU</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 153pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>น</span><span>.ท&nbsp; &nbsp; หรือ&nbsp; &nbsp; &nbsp;
                                            TC</span>
                                    </p>
                                </td>
                                <td style="width: 135pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span>-</span>
                                    </p>
                                </td>
                                <td style="width: 73.5pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;text-align:center;'>
                                        <span></span>
                                    </p>
                                </td>
                                <td style="width: 70.85pt;padding: 0in 5.4pt;vertical-align: top;text-align:center;">
                                    <p style='margin:0in;font-size:21px;'>
                                        <span></span>
                                    </p>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <br>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>5.
                        &nbsp;ปัจจัยที่ทำให้ระดับคะแนนผิดปกติ&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;text-indent:.2in;'>
                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail5)) !!}</span>
                @endif
            </p>
            <p style='margin:0in;font-size:14px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span style='color:red;'>&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>6. &nbsp;
                        ความคลาดเคลื่อนจากแผนการประเมินที่กำหนดไว้ในรายละเอียดของรายวิชา
                        (มคอ.</span></strong><strong><span>3)</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>&nbsp; &nbsp; &nbsp;6.1
                        ความคลาดเคลื่อนด้านกำหนดเวลาการประเมิน</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span>ความคลาดเคลื่อน</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.7in;'>

                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail6_1['discrepancy'])) !!}</span>
                @endif

            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span>เหตุผล</span>
            </p>
            <p style='margin:0in;font-size:21px;margin-left:70px;'>

                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail6_1['reason'])) !!}</span>
                @endif

            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><strong><span>&nbsp;</span></strong></p>
            <p style='margin:0in;font-size:21px;'><strong><span>&nbsp; &nbsp; &nbsp;6.2
                        ความคลาดเคลื่อนด้านวิธีการประเมินผลการเรียนรู้ (ถ้ามี)</span></strong></p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;text-indent:.5in;'>
                <span>ความคลาดเคลื่อน</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.7in;'>

                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail6_2['discrepancy'])) !!}</span>
                @endif

            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span>เหตุผล</span></p>
            <p style='margin:0in;font-size:21px;text-indent:.7in;'>

                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail6_2['reason'])) !!}</span>
                @endif

            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span>&nbsp;</span></p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>7.
                        &nbsp;การทวนสอบผลสัมฤทธิ์ของนักศึกษา</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <span>&nbsp; &nbsp; &nbsp;วิธีการทวนสอบ</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'>

                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail7['method'])) !!}</span>
                @endif

            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <span>&nbsp; &nbsp; &nbsp; สรุปผล</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'>

                @if (isset($tqf->tqf5_3))
                    <span class="text-newline">{!! nl2br(e($tqf->tqf5_3->detail7['conclude'])) !!}</span>
                @endif

            </p>
        </div>

        <div class="pagebreak">
            <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:24px;'>หมวดที่ 4
                        ปัญหาและผลกระทบต่อการดำเนินการ</span></strong></p>
            <p style='margin:0in;font-size:21px;text-align:center;'><strong><span
                        style='font-size:11px;'>&nbsp;</span></strong></p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>1.
                        &nbsp;ประเด็นด้านทรัพยากรประกอบการเรียนและสิ่งอำนวยความสะดวก</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%">
                    <thead>
                        <tr>
                            <td style="padding:5.4pt 5.4pt 5.4pt 5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ปัญหาในการใช้แหล่งทรัพยากร<br>ประกอบการเรียนการสอน
                                            (ถ้ามี)</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt 5.4pt 5.4pt 5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ผลกระทบ</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td style="width: 221.4pt;padding: 2.5pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>

                                    @if (isset($tqf->tqf5_4))
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_4->detail1_1)) !!}</span>
                                    @endif

                                </p>
                            </td>
                            <td style="width: 2.75in;padding: 2.5pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>

                                    @if (isset($tqf->tqf5_4))
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_4->detail1_2)) !!}</span>
                                    @endif

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>2.
                        &nbsp;ประเด็นด้านการบริหารและองค์กร</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%">
                    <thead>
                        <tr>
                            <td style="padding:5.4pt 5.4pt 5.4pt 5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ประเด็นด้านการบริหารและองค์กร
                                            (ถ้ามี)</span></strong>
                                </p>
                            </td>
                            <td style="padding:5.4pt 5.4pt 5.4pt 5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ผลกระทบต่อผลการเรียนรู้ของนักศึกษา</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td style="width: 221.4pt;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>

                                    @if (isset($tqf->tqf5_4))
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_4->detail2_1)) !!}</span>
                                    @endif

                                </p>
                            </td>
                            <td style="width: 2.75in;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>

                                    @if (isset($tqf->tqf5_4))
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_4->detail2_2)) !!}</span>
                                    @endif

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pagebreak">
            <p style='margin:0in;font-size:21px;text-align:center;'><strong><span style='font-size:24px;'>หมวดที่ 5
                        การประเมินรายวิชา</span></strong></p>
            <p style='margin:0in;font-size:21px;'><strong><span style='font-size:11px;'>&nbsp;</span></strong></p>
            <p style='margin:0in;font-size:21px;'><strong><span>1. &nbsp;
                        ผลการประเมินรายวิชาโดยนักศึกษา&nbsp;</span></strong><em><span
                        style='color:red;'>(แนบเอกสาร)</span></em></p>
            <p
                style='margin:0in;font-size:21px;margin-top:3.0pt;margin-right:-31.25pt;margin-bottom:.0001pt;margin-left:0in;line-height:17.8pt;'>
                <strong><span>&nbsp; &nbsp; &nbsp;1.1 &nbsp;
                        &nbsp;ข้อวิพากษ์ที่สำคัญจากผลการประเมินโดยนักศึกษา</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span>
                    @if (isset($tqf->tqf5_5)){!! nl2br(e($tqf->tqf5_5->detail1_1)) !!}
                    @endif
                </span>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <strong><span>&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>&nbsp; &nbsp; &nbsp;1.2 &nbsp; &nbsp;ความเห็นของอาจารย์ผู้สอนต่อผลการประเมินตามข้อ
                        1.1</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span>
                    @if (isset($tqf->tqf5_5)){!! nl2br(e($tqf->tqf5_5->detail1_2)) !!}
                    @endif
                </span>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <strong><span>&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>2.
                        &nbsp;ผลการประเมินรายวิชาโดยวิธีอื่น</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>&nbsp; &nbsp; &nbsp;2.1 &nbsp;
                        &nbsp;ข้อวิพากษ์ที่สำคัญจากผลการประเมินโดยวิธีอื่น</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span>
                    @if (isset($tqf->tqf5_5)){!! nl2br(e($tqf->tqf5_5->detail2_1)) !!}
                    @endif
                </span>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <strong><span>&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>&nbsp; &nbsp; &nbsp;2.2 &nbsp;
                        &nbsp;ความเห็นชอบของอาจารย์ผู้สอนต่อผลการประเมินตามข้อ 2.1</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span>
                    @if (isset($tqf->tqf5_5)){!! nl2br(e($tqf->tqf5_5->detail2_2)) !!}
                    @endif
                </span>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.5in;line-height:17.8pt;'>
                <span style=''>&nbsp;</span>
            </p>
        </div>

        <div class="pagebreak">
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                <strong><span style='font-size:24px;'>หมวดที่ 6
                        แผนการปรับปรุง</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>1. &nbsp;
                        ความก้าวหน้าของการปรับปรุงการเรียนการสอนตามที่เสนอในรายงาน/รายวิชาครั้งที่ผ่านมา</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%;margin-bottom:10pt;">
                    <thead>
                        <tr>
                            <td style="width:221.4pt;padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>แผนการปรับปรุงที่เสนอในภาคการศึกษา/ปีการศึกษาที่ผ่านมา</span></strong>
                                </p>
                            </td>
                            <td style="width:207.0pt;border-left:  none;padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ผลการดำเนินการ</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 221.4pt;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>

                                    @if (isset($tqf->tqf5_6))
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_6->detail1_1)) !!}</span>
                                    @endif

                                </p>
                            </td>
                            <td style="width: 207pt;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>

                                    @if (isset($tqf->tqf5_6))
                                        <span class="text-newline">{!! nl2br(e($tqf->tqf5_6->detail1_2)) !!}</span>
                                    @endif

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p style='margin:0in;font-size:21px;line-height:17.8pt;'><strong><span>2. &nbsp;การดำเนินการอื่น ๆ
                        ในการปรับปรุงรายวิชา</span></strong></p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.2in;line-height:17.8pt;'>
                <span>
                    @if (isset($tqf->tqf5_6)){!! nl2br(e($tqf->tqf5_6->detail2)) !!}
                    @endif
                </span>
            </p>
            <div style="margin-top: 10pt"></div>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>3. &nbsp;
                        ข้อเสนอแผนการปรับปรุงสำหรับภาคการศึกษา/ปีการศึกษาต่อไป</span></strong>
            </p>
            <div class="col-12">
                <table class="table-print" style="width:100%;">
                    <thead>
                        <tr>
                            <td style="width: 2.2in;border: 1pt solid windowtext;padding:5.4pt;vertical-align: top;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ข้อเสนอ</span></strong>
                                </p>
                            </td>
                            <td style="width:1.75in;border-left:  none;padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>กำหนดเวลาที่แล้วเสร็จ</span></strong>
                                </p>
                            </td>
                            <td style="width:2.0in;border-left:  none;padding:5.4pt;">
                                <p
                                    style='margin:0in;font-size:21px;margin-top:3.0pt;text-align:center;line-height:17.8pt;'>
                                    <strong><span>ผู้รับผิดชอบ</span></strong>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td style="width: 2.2in;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                                    <span>
                                        @if (isset($tqf->tqf5_6))
                                            {!! nl2br(e($tqf->tqf5_6->detail3_1)) !!}@endif
                                    </span>
                                </p>
                            </td>
                            <td style="width: 1.75in;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                                    <span>
                                        @if (isset($tqf->tqf5_6))
                                            {!! nl2br(e($tqf->tqf5_6->detail3_2)) !!}@endif
                                    </span>
                                </p>
                            </td>
                            <td style="width: 2in;padding: 2pt 5.4pt;vertical-align: top;">
                                <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                                    <span>
                                        @if (isset($tqf->tqf5_6))
                                            {!! nl2br(e($tqf->tqf5_6->detail3_3)) !!}@endif
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>&nbsp;</span></strong>
            </p>
            {{-- <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                        <strong><span>&nbsp;</span></strong>
                    </p>
                    <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                        <strong><span>&nbsp;</span></strong>
                    </p> --}}
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>4.</span></strong><strong><span>&nbsp; ข้อเสนอแนะของอาจารย์ผู้สอน
                        ต่ออาจารย์ผู้รับผิดชอบรายวิชา&nbsp;</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;text-indent:.2in;line-height:17.8pt;'>
                <span>
                    @if (isset($tqf->tqf5_6)){!! nl2br(e($tqf->tqf5_6->detail4)) !!}
                    @endif
                </span>
            </p>

            <p style='margin:0in;font-size:21px;text-indent:.5in;'><strong><span>&nbsp;</span></strong></p>
            <p style='margin:0in;font-size:21px;margin-left:2.5in;text-indent:.5in;'>
                <span>&nbsp;
                    &nbsp;(.............................................)</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><strong><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        อาจารย์ผู้สอน</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;วัน.....เดือน................พ.ศ.....</span></p>
            <br>
            <p style='margin:0in;font-size:21px;margin-top:3.0pt;line-height:17.8pt;'>
                <strong><span>5.&nbsp;
                        ข้อเสนอแนะของอาจารย์ผู้รับผิดชอบรายวิชา ต่ออาจารย์ผู้รับผิดชอบหลักสูตร</span></strong>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;margin-top:10pt;'>
                <span>..................................................................................................................................................................................................................................................................................................................................................</span>
            </p>
            <p style='margin:0in;font-size:21px;'><strong><span>&nbsp;</span></strong></p>
            <p style='margin:0in;font-size:21px;margin-left:2.5in;text-indent:.5in;'>
                <span>&nbsp;
                    &nbsp;(.............................................)</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><strong><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; อาจารย์ผู้รับผิดชอบรายวิชา</span></strong></p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;วัน.....เดือน................พ.ศ.....</span></p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span>&nbsp;</span></p>
            <p style='margin:0in;font-size:21px;margin-left:2.5in;text-indent:.5in;'>
                <span>&nbsp;
                    &nbsp;(.............................................)</span>
            </p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><strong><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; อาจารย์ผู้รับผิดชอบหลักสูตร</span></strong></p>
            <p style='margin:0in;font-size:21px;text-indent:.5in;'><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;วัน.....เดือน................พ.ศ.....</span></p>
            <p style='margin:0in;font-size:10px;'><span>&nbsp;</span></p>
        </div>
    </div>
    {{-- <script type="text/javascript">
        // $(document).ready(function() {
        //     $(".text-newline").each(function() {
        //         var text = $(this).text();
        //         // text = text.replace("\n", "<br>");
        //         // $(this).text(text);
        //         console.log('aa');
        //     });
        // });
        try {
            this.print();
            var els = document.getElementsByClassName("text-newline");
            var searchValue = "\n";

            for (var i = 0; i < els.length; i++) {
                if (els[i].innerHTML.indexOf(searchValue) > -1) {
                    html = els[i].innerHTML.replace(/\n/g, '<br/>');
                    console.log(els[i].innerHTML);
                    els[i].innerHTML = html;
                }
            }
        } catch (e) {
            window.onload = window.print;
        }

    </script> --}}
</body>


</html>


{{-- @endsection --}}
