<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MTQF3;
use App\Models\Subject;
use App\Models\TQF3;
use App\Models\TQF5;
use App\Models\TQF3_1;
use App\Models\TQF3_2;
use App\Models\TQF3_3;
use App\Models\TQF3_4;
use App\Models\TQF3_5_1;
use App\Models\TQF3_5_2;
use App\Models\TQF3_6;
use App\Models\TQF3_7;
use App\Models\TQF3_5;
use App\Models\USER_TQF3;
use App\Models\USER_TQF5;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DateTime;

class TQF3Controller extends Controller
{

    public function check_save($id, Request $request)
    {
        // dd($request->id);
        $check = false;
        $mes = "";
        $tqf = TQF3::where('tqf3ID', $id)->first();
        // dd($tqf->tqf3_3);
        if ($request->id == '#tqf3-1') {
            if (!isset($tqf->tqf3_1)) {
                $check = true;
                $mes = 'หมวดที่ 1';
            }
        }
        if ($request->id == '#tqf3-2') {
            if (!isset($tqf->tqf3_2)) {
                $check = true;
                $mes = 'หมวดที่ 2';
            }
        }
        if ($request->id == '#tqf3-3') {
            if (!isset($tqf->tqf3_3)) {
                $check = true;
                $mes = 'หมวดที่ 3';
            }
        }
        if ($request->id == '#tqf3-4') {
            if (!isset($tqf->tqf3_4)) {
                $check = true;
                $mes = 'หมวดที่ 4';
            }
        }
        if ($request->id == '#tqf3-51') {
            if (!isset($tqf->tqf3_5->data1)) {
                $check = true;
                $mes = 'หมวดที่ 5.1';
            } else {
                if ($tqf->tqf3_5->data1 == '') {
                    $check = true;
                    $mes = 'หมวดที่ 5.1';
                }
            }
        }
        if ($request->id == '#tqf3-52') {
            if (!isset($tqf->tqf3_5->data2)) {
                $check = true;
                $mes = 'หมวดที่ 5.2';
            } else {
                if ($tqf->tqf3_5->data2 == '') {
                    $check = true;
                    $mes = 'หมวดที่ 5.2';
                }
            }
        }
        if ($request->id == '#tqf3-6') {
            if (!isset($tqf->tqf3_6)) {
                $check = true;
                $mes = 'หมวดที่ 6';
            }
        }
        if ($request->id == '#tqf3-7') {
            if (!isset($tqf->tqf3_7)) {
                $check = true;
                $mes = 'หมวดที่ 7';
            }
        }
        return response()->json(
            [
                'success' => $check,
                'message' => $mes
            ]
        );
    }

    public function check_status(Request $request)
    {
        $text = "";
        $tqf = TQF3::where('tqf3ID', $request->id)->first();
        if (isset($tqf->tqf3_1) && isset($tqf->tqf3_2) && isset($tqf->tqf3_3) && isset($tqf->tqf3_4) && isset($tqf->tqf3_5) && isset($tqf->tqf3_6)) {
            if (count(json_decode(unserialize($tqf->tqf3_5->data1))) >= 15) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success',
                    ]
                );
            }
        }
        if (!isset($tqf->tqf3_1)) {
            $text .= " หมวดที่ 1";
        }
        if (!isset($tqf->tqf3_2)) {
            $text .= " หมวดที่ 2";
        }
        if (!isset($tqf->tqf3_3)) {
            $text .= " หมวดที่ 3";
        }
        if (!isset($tqf->tqf3_4)) {
            $text .= " หมวดที่ 4";
        }
        if (!isset($tqf->tqf3_5)) {
            $text .= " หมวดที่ 5";
        }
        if (!isset($tqf->tqf3_6)) {
            $text .= " หมวดที่ 6";
        }
        if (!isset($tqf->tqf3_7)) {
            $text .= " หมวดที่ 7";
        }
        if (isset($tqf->tqf3_5)) {
            if (count(json_decode(unserialize($tqf->tqf3_5->data1))) < 15) {
                $text .= " แผนการสอนอย่างน้อย 15 สัปดาห์";
            }
        }


        return response()->json(
            [
                'success' => false,
                'message' => $text,
            ]
        );
    }

    public function copy_tqf3($from, $to)
    {
        TQF3::where('tqf3ID', $to)->update(['status' => 4]);
        $tqf = TQF3::where('tqf3ID', $from)->first();
        $t = TQF3::where('tqf3ID', $to)->first();
        try {
            if (isset($tqf) > 0) {
                if (isset($tqf->tqf3_1)) {
                    if (isset($t->tqf3_1)) {
                        unset($tqf->tqf3_1->tqf3_tqf3ID);
                        TQF3_1::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_1), true));
                    } else {
                        $tqf->tqf3_1->tqf3_tqf3ID = $to;
                        TQF3_1::create(json_decode(json_encode($tqf->tqf3_1), true));
                    }
                }
                if (isset($tqf->tqf3_2)) {
                    if (isset($t->tqf3_2)) {
                        unset($tqf->tqf3_2->tqf3_tqf3ID);
                        TQF3_2::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_2), true));
                    } else {
                        $tqf->tqf3_2->tqf3_tqf3ID = $to;
                        TQF3_2::create(json_decode(json_encode($tqf->tqf3_2), true));
                    }
                }
                if (isset($tqf->tqf3_3)) {
                    if (isset($t->tqf3_3)) {
                        unset($tqf->tqf3_3->tqf3_tqf3ID);
                        TQF3_3::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_3), true));
                    } else {
                        $tqf->tqf3_3->tqf3_tqf3ID = $to;
                        TQF3_3::create(json_decode(json_encode($tqf->tqf3_3), true));
                    }
                }
                if (isset($tqf->tqf3_4)) {
                    if (isset($t->tqf3_4)) {
                        unset($tqf->tqf3_4->tqf3_tqf3ID);
                        TQF3_4::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_4), true));
                    } else {
                        $tqf->tqf3_4->tqf3_tqf3ID = $to;
                        TQF3_4::create(json_decode(json_encode($tqf->tqf3_4), true));
                    }
                }
                if (isset($tqf->tqf3_5)) {
                    if (isset($t->tqf3_5)) {
                        unset($tqf->tqf3_5->tqf3_tqf3ID);
                        TQF3_5::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_5), true));
                    } else {
                        $tqf->tqf3_5->tqf3_tqf3ID = $to;
                        TQF3_5::create(json_decode(json_encode($tqf->tqf3_5), true));
                    }
                }
                if (isset($tqf->tqf3_6)) {
                    if (isset($t->tqf3_6)) {
                        unset($tqf->tqf3_6->tqf3_tqf3ID);
                        TQF3_6::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_6), true));
                    } else {
                        $tqf->tqf3_6->tqf3_tqf3ID = $to;
                        TQF3_6::create(json_decode(json_encode($tqf->tqf3_6), true));
                    }
                }
                if (isset($tqf->tqf3_7)) {
                    if (isset($t->tqf3_7)) {
                        unset($tqf->tqf3_7->tqf3_tqf3ID);
                        TQF3_7::where('tqf3_tqf3ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf3_7), true));
                    } else {
                        $tqf->tqf3_7->tqf3_tqf3ID = $to;
                        TQF3_7::create(json_decode(json_encode($tqf->tqf3_7), true));
                    }
                }
            }
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'error',
                ]
            );
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'success',
            ]
        );
    }

    public function check_copy_tqf3($id)
    {
        $i = session()->get('data');
        $t = TQF3::where('tqf3ID', $id)->first();
        $tqf = array();
        if ($t) {
            $tqf = TQF3::join('user_tqf3', 'tqf3.tqf3ID', '=', 'user_tqf3.tqf3ID')
                // ->has('tqf3_1')->has('tqf3_2')->has('tqf3_3')->has('tqf3_4')->has('tqf3_5')->has('tqf3_6')->has('tqf3_7')
                ->where('tqf3.status', 2)->where('send_file', 0)->where('user_tqf3.userID', $i->userID)
                ->where('tqf3.subject_idSubject', $t->subject_idSubject)->where('tqf3.tqf3ID', '!=', $id)->get();
        }


        if (count($tqf) > 0) {
            $text = '<table class="table table-bordered">
            <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">ภาคเรียน</th>
              <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="table-copy" style="text-align: center;">';
            foreach ($tqf as $key => $value) {
                $text .= '<tr>
                <th scope="row">' . (intval($key) + 1) . '</th>
                <td>' . $value->subyear->term . '/' . $value->subyear->Year . '</td>
                <td><button class="btn btn-success btn-sm select-copy" type="button" data-to="' . $id . '" data-id="' . $value->tqf3ID . '">คัดลอก</button></td>
              </tr>';
            }
            // return $text;
            return response()->json(
                [
                    'success' => true,
                    'sub' => $t->subsubject->THsubject,
                    'message' => $text,
                ]
            );
        }
        return response()->json(
            [
                'success' => false,
                'message' => "ไม่พบข้อมูล",
            ]
        );
        // $t = $request->term-1;
        // $year = Year::where('Year', '=', $request->year)->where('term', '=', $t)->first();
        // $year = Year::where('idYear', '=', $request->year)->first();
        // // dd($request->year.'\n'.$y);
        // $sub = Subject::where('idSubject', '=', $request->sub)->first();
        // $tqf = TQF3::where('Year_idYear', '=', $year->idYear)->where('subject_idSubject', '=', $request->sub)->first();
        // // dd($sub);
        // if ($tqf) {
        //     return response()->json(
        //         [
        //             'success' => true,
        //             'message' => 'success',
        //             'sub' => ''
        //         ]
        //     );
        // }
        // return response()->json(
        //     [
        //         'success' => false,
        //         'message' => $year->term . '/' . $year->Year,
        //         'sub' => 'รายวิชา ' . $sub->THsubject . ' กลุ่มเรียน ' . $sub->group->groupname
        //     ]
        // );
    }

    public function get_tqf3(Request $request)
    {
        $tqf = TQF3::where('tqf3ID', '=', $request->id)->first();
        $tqf->subuser = $tqf->subuser;
        $tqf->subsubject = $tqf->subsubject;
        $tqf->subyear = $tqf->subyear;
        $tqf->subsubject->group = $tqf->subsubject->group;
        foreach ($tqf->subuser as $item) {
        }
        return $tqf;
        //    return $request->all();
    }

    public function upfile(Request $request)
    {
        if ($request->hasFile('filetqf')) {
            $now = new DateTime();
            $files = $request->file('filetqf');
            $fileName = [];

            foreach ($files as $key => $file) {
                $clientOriginalName = $file->getClientOriginalName();
                $name = $now->format('Y-m-d H-i') . '_' . $clientOriginalName;
                Storage::putFileAs('fileTQF', $file, $name);
                // $path = $request->file('filetqf')->storeAs('fileTQF', $name, 'public');
                $fileName[] = $name;
                // echo $file;
            }
        }

        $tqf = TQF3::find($request->id_tqf3);
        $tqf->filetqf3 = serialize($fileName);
        $tqf->status = 1;
        $tqf->send_file = 1;
        $tqf->update_date = date('Y-m-d H:i:s');
        $tqf->save();

        if ($tqf->save()) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addcourse(Request $request)
    {

        $count = TQF3::where('tqf3ID', '=', $request->id)->count();
        if ($count > 0) {
            $tqf = TQF3::find($request->id);
            $tqf->course_id = $request->c_id;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'success',
            ]
        );
    }

    public function add_fast_tqf3(Request $request)
    {

        // if ($request->id_tqf3 + 0 == 1) {
        DB::beginTransaction();
        $data = json_decode($request->data);
        // dd($data);
        //     // echo $data;
        for ($i = 0; $i < count($data); $i++) {
            $count = TQF3::where('Year_idYear', '=', $request->term_id)->where('subject_idSubject', '=', $data[$i]->arr_sub)
                ->where('group_sub', '=', $data[$i]->arr_group)->count();
            if ($count == 0) {
                // var_dump($data[$i]->teacher_id);
                $user = json_decode($data[$i]->teacher_id);
                $tqf3 = new TQF3;
                $tqf3->Year_idYear = $request->term_id;
                $tqf3->subject_idSubject = $data[$i]->arr_sub;
                $tqf3->group_sub = $data[$i]->arr_group;
                $tqf3->filetqf3 = '';
                $tqf3->deadline = $request->date;
                $tqf3->create_date = date('Y-m-d H:i:s');
                $tqf3->save();
                $tqf5 = new TQF5;
                $tqf5->Year_idYear = $request->term_id;
                $tqf5->subject_idSubject = $data[$i]->arr_sub;
                $tqf5->group_sub = $data[$i]->arr_group;
                $tqf5->filetqf5 = '';
                $tqf5->deadline = date('Y-m-d', strtotime($request->date . ' + 6 month'));
                $tqf5->create_date = date('Y-m-d H:i:s');
                $tqf5->save();
                for ($j = 0; $j < count($user); $j++) {
                    // var_dump($user[$j]->userID);
                    $u_tqf3 = new USER_TQF3;
                    $u_tqf3->tqf3ID = $tqf3->tqf3ID;
                    $u_tqf3->userID = $user[$j]->userID;
                    $u_tqf3->save();
                    $u_tqf5 = new USER_TQF5;
                    $u_tqf5->tqf5ID = $tqf5->tqf5ID;
                    $u_tqf5->userID = $user[$j]->userID;
                    $u_tqf5->save();
                }
                TQF5::where('tqf5ID', $tqf5->tqf5ID)->update(['id_tqf3' => $tqf3->tqf3ID]);
                TQF3::where('tqf3ID', $tqf3->tqf3ID)->update(['id_tqf5' => $tqf5->tqf5ID]);
            }
        }

        // if ($tqf->save() && $u_tqf->save()) {
        DB::commit();
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
        // }
    }

    public function addtqf3(Request $request)
    {
        $request->validate([
            'term_id' => 'required',
            'teacher_id' => 'nullable',
            'arr_sub' => 'required',
            'id_tqf3' => 'required'
        ]);

        if ($request->hasFile('filetqf')) {
            $now = new DateTime();
            $filePath = $request->file('filetqf');
            $clientOriginalName = $request->filetqf->getClientOriginalName();
            $fileName = $now->format('Y-m-d H-i') . '_' . $clientOriginalName;
            // echo $filePath;
            Storage::putFileAs('fileTQF', $filePath, $fileName);
            // $path = $request->file('filetqf')->storeAs('fileTQF', $fileName, 'public');
        }

        DB::beginTransaction();
        if ($request->id_tqf3 - 0 != 0) {
            $u_tqf = USER_TQF3::where('tqf3ID', '=', $request->id_tqf3);
            $u_tqf->delete();
            $tqf = TQF3::find($request->id_tqf3);
            $tqf->Year_idYear = $request->term_id;
            $tqf->group_sub = $request->group;
            // $tqf->user_userID = $request->teacher_id;
            $tqf->subject_idSubject = $request->arr_sub;
            if ($request->hasFile('filetqf') && $fileName != '') {
                $tqf->filetqf3 = serialize([$fileName]);;
                $tqf->status = 2;
                $tqf->send_file = 1;
                $tqf->is_file = 1;
            }
            $tqf->deadline = $request->date;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();
            for ($j = 0; $j < count($request->teacher_id); $j++) {
                $u_tqf = new USER_TQF3;
                $u_tqf->tqf3ID = $tqf->tqf3ID;
                $u_tqf->userID = $request->teacher_id[$j];
                $u_tqf->save();
            }

            DB::commit();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }

        try {
            foreach ($request->arr_sub as $value) {
                foreach (json_decode($request->arr_group) as $val) {

                    $check_add = TQF3::where('Year_idYear', '=', $request->term_id)
                        ->where('subject_idSubject', '=', $value)
                        ->where('group_sub', '=', $request->group)->count();

                    if ($check_add == 0) {
                        $data = array(
                            'Year_idYear' => $request->term_id,
                            'subject_idSubject' => $value,
                            'create_date' => date('Y-m-d H:i:s'),
                            'deadline' => $request->date,
                            'group_sub' => $val
                        );
                        if ($request->hasFile('filetqf') && $fileName != '') {
                            $data['filetqf3'] = serialize([$fileName]);
                            $data['status'] = 2;
                            $data['send_file'] = 1;
                        }
                        $tqf = TQF3::create($data);

                        // echo $tqf->tqf3ID;
                        for ($j = 0; $j < count($request->teacher_id); $j++) {
                            $u_tqf = new USER_TQF3;
                            $u_tqf->tqf3ID = $tqf->tqf3ID;
                            $u_tqf->userID = $request->teacher_id[$j];
                            $u_tqf->save();
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(
                [
                    'success' => false,
                    'message' => 'success'
                ]
            );
        }

        DB::commit();
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );


        // for ($i = 0; $i < count($request->arr_sub); $i++) {
        //     $check_add = TQF3::where('Year_idYear', '=', $request->term_id)
        //         ->where('subject_idSubject', '=', $request->arr_sub[$i])
        //         ->where('group_sub', '=', $request->group)->count();

        //     if ($check_add == 0) {
        //         // $answers[] = [
        //         //     'Year_idYear' => $request->term_id,
        //         //     'user_userID' => $request->teacher_id,
        //         //     'subject_idSubject' => $request->arr_sub[$i],
        //         //     'deadline' => $request->date,
        //         // ];
        //         // if ($request->hasFile('filetqf') && $fileName != '') {
        //         //     $answers[0]['filetqf3'] = $fileName;
        //         // }
        //         // print_r($answers) ;
        //         $tqf = new TQF3;
        //         $tqf->Year_idYear = $request->term_id;
        //         // $tqf->user_userID = $request->teacher_id;
        //         $tqf->subject_idSubject = $request->arr_sub[$i];
        //         if ($request->hasFile('filetqf') && $fileName != '') {
        //             $tqf->filetqf3 = serialize([$fileName]);
        //             $tqf->status = 2;
        //             $tqf->send_file = 1;
        //         }
        //         $tqf->create_date = date('Y-m-d H:i:s');
        //         $tqf->deadline = $request->date;
        //         $tqf->group_sub = $request->group;
        //         $tqf->save();
        //         // echo $tqf->tqf3ID;
        //         for ($j = 0; $j < count($request->teacher_id); $j++) {
        //             $u_tqf = new USER_TQF3;
        //             $u_tqf->tqf3ID = $tqf->tqf3ID;
        //             $u_tqf->userID = $request->teacher_id[$j];
        //             $u_tqf->save();
        //         }
        //     } else {
        //         return response()->json(
        //             [
        //                 'success' => false,
        //                 'message' => 'ข้อมูลซ้ำ'
        //             ]
        //         );
        //     }
        // }

        // TQF3::insert($answers);
        // $tqf = new TQF3;
        // $tqf->Year_idYear = $request->term_id;
        // $tqf->user_userID = $request->teacher_id;
        // $tqf->subject_idSubject = json_encode($request->arr_sub);
        // // $tqf->filetqf3 = $request->filetqf;
        // $tqf->deadline = $request->date;
        // $tqf->save();

        // if ($tqf->save() && $u_tqf->save()) {
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
        // }
        // }
    }

    public function addtqf3_new(Request $request)
    {
        $request->validate([
            'term_id' => 'required',
            'teacher_id' => 'nullable',
            'arr_sub' => 'required',
            'id_tqf3' => 'required'
        ]);


        DB::beginTransaction();
        try {
            foreach ($request->arr_sub as $value) {
                foreach (json_decode($request->arr_group) as $val) {

                    $check_add = TQF3::where('Year_idYear', '=', $request->term_id)
                        ->where('subject_idSubject', '=', $value)
                        ->where('group_sub', '=', $request->group)->count();

                    if ($check_add == 0) {
                        $data1 = array(
                            'Year_idYear' => $request->term_id,
                            'subject_idSubject' => $value,
                            'create_date' => date('Y-m-d H:i:s'),
                            'deadline' => $request->date,
                            'group_sub' => $val
                        );
                        $tqf3 = TQF3::create($data1);
                        $id_tqf3 = $tqf3->tqf3ID;
                        // echo $tqf->tqf3ID;
                        for ($j = 0; $j < count($request->teacher_id); $j++) {
                            $u_tqf3 = new USER_TQF3;
                            $u_tqf3->tqf3ID = $tqf3->tqf3ID;
                            $u_tqf3->userID = $request->teacher_id[$j];
                            $u_tqf3->save();
                        }

                        $data2 = array(
                            'Year_idYear' => $request->term_id,
                            'subject_idSubject' => $value,
                            'create_date' => date('Y-m-d H:i:s'),
                            'deadline' => date('Y-m-d', strtotime($request->date . ' + 6 month')),
                            'group_sub' => $val
                        );
                        $tqf5 = TQF5::create($data2);
                        for ($j = 0; $j < count($request->teacher_id); $j++) {
                            $u_tqf5 = new USER_TQF5;
                            $u_tqf5->tqf5ID = $tqf5->tqf5ID;
                            $u_tqf5->userID = $request->teacher_id[$j];
                            $u_tqf5->save();
                        }
                        TQF5::where('tqf5ID', $tqf5->tqf5ID)->update(['id_tqf3' => $tqf3->tqf3ID]);
                        TQF3::where('tqf3ID', $tqf3->tqf3ID)->update(['id_tqf5' => $tqf5->tqf5ID]);
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ERROR PHP'
                ]
            );
        }

        DB::commit();
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );


        // for ($i = 0; $i < count($request->arr_sub); $i++) {
        //     $check_add = TQF3::where('Year_idYear', '=', $request->term_id)
        //         ->where('subject_idSubject', '=', $request->arr_sub[$i])
        //         ->where('group_sub', '=', $request->group)->count();

        //     if ($check_add == 0) {
        //         // $answers[] = [
        //         //     'Year_idYear' => $request->term_id,
        //         //     'user_userID' => $request->teacher_id,
        //         //     'subject_idSubject' => $request->arr_sub[$i],
        //         //     'deadline' => $request->date,
        //         // ];
        //         // if ($request->hasFile('filetqf') && $fileName != '') {
        //         //     $answers[0]['filetqf3'] = $fileName;
        //         // }
        //         // print_r($answers) ;
        //         $tqf = new TQF3;
        //         $tqf->Year_idYear = $request->term_id;
        //         // $tqf->user_userID = $request->teacher_id;
        //         $tqf->subject_idSubject = $request->arr_sub[$i];
        //         if ($request->hasFile('filetqf') && $fileName != '') {
        //             $tqf->filetqf3 = serialize([$fileName]);
        //             $tqf->status = 2;
        //             $tqf->send_file = 1;
        //         }
        //         $tqf->create_date = date('Y-m-d H:i:s');
        //         $tqf->deadline = $request->date;
        //         $tqf->group_sub = $request->group;
        //         $tqf->save();
        //         // echo $tqf->tqf3ID;
        //         for ($j = 0; $j < count($request->teacher_id); $j++) {
        //             $u_tqf = new USER_TQF3;
        //             $u_tqf->tqf3ID = $tqf->tqf3ID;
        //             $u_tqf->userID = $request->teacher_id[$j];
        //             $u_tqf->save();
        //         }
        //     } else {
        //         return response()->json(
        //             [
        //                 'success' => false,
        //                 'message' => 'ข้อมูลซ้ำ'
        //             ]
        //         );
        //     }
        // }

        // TQF3::insert($answers);
        // $tqf = new TQF3;
        // $tqf->Year_idYear = $request->term_id;
        // $tqf->user_userID = $request->teacher_id;
        // $tqf->subject_idSubject = json_encode($request->arr_sub);
        // // $tqf->filetqf3 = $request->filetqf;
        // $tqf->deadline = $request->date;
        // $tqf->save();

        // if ($tqf->save() && $u_tqf->save()) {
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
        // }
        // }
    }

    public function edittqf3_new(Request $request)
    {

        $request->validate([
            'term_id' => 'required',
            'teacher_id' => 'nullable',
            'arr_sub' => 'required',
            'id_tqf3' => 'required'
        ]);

        DB::beginTransaction();
        if ($request->id_tqf3 - 0 != 0) {
            $u_tqf = USER_TQF3::find($request->id_tqf3);
            $u_tqf->delete();
            $tqf3 = TQF3::find($request->id_tqf3);
            $tqf3->Year_idYear = $request->term_id;
            $tqf3->group_sub = $request->group;
            // $tqf3->user_userID = $request->teacher_id;
            $tqf3->subject_idSubject = $request->arr_sub;
            $tqf3->update_date = date('Y-m-d H:i:s');
            $tqf3->deadline = $request->date;
            $tqf3->save();

            $tqf5 = TQF5::where('id_tqf3', '=', $request->id_tqf3)->first();
            $u_tqf5 = USER_TQF5::find($tqf5->tqf5ID);
            $u_tqf5->delete();
            $tqf5->Year_idYear = $request->term_id;
            $tqf5->group_sub = $request->group;
            // $tqf5->user_userID = $request->teacher_id;
            $tqf5->subject_idSubject = $request->arr_sub;
            $tqf5->update_date = date('Y-m-d H:i:s');
            $tqf5->save();
            for ($j = 0; $j < count($request->teacher_id); $j++) {
                $u_tqf = new USER_TQF3;
                $u_tqf->tqf3ID = $tqf3->tqf3ID;
                $u_tqf->userID = $request->teacher_id[$j];
                $u_tqf->save();
                $u_tqf = new USER_TQF5;
                $u_tqf->tqf5ID = $tqf5->tqf5ID;
                $u_tqf->userID = $request->teacher_id[$j];
                $u_tqf->save();
                // return $request->teacher_id[$j];
            }
            DB::commit();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function deletetqf3(Request $request)
    {
        $c = TQF3::where('status', 0)->where('tqf3ID', '=', $request->id_tqf3)->count();
        if ($c > 0) {
            $tqf3 = TQF3::where('tqf3ID', '=', $request->id_tqf3)->delete();
            $u_tqf = USER_TQF3::where('tqf3ID', '=', $request->id_tqf3)->delete();
            $c = TQF5::where('id_tqf3', '=', $request->id_tqf3)->first();
            $tqf5 = TQF5::where('id_tqf3', '=', $request->id_tqf3)->delete();
            $u_tqf = USER_TQF5::where('tqf5ID', '=', $c->tqf5ID)->delete();
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'มคอ.นี้ถูกจัดทำแล้ว'
                ]
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function addtqf3_1(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        // ]);
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF3_1::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF3_1::find($request->id);
            $tqf->THname = $request->thname;
            $tqf->ENname = $request->enname;
            $tqf->credit = $request->credit;
            $tqf->course = $request->course;
            $tqf->teacher = $request->teacher;
            $tqf->term = $request->term;
            $tqf->Pre_requisite = $request->pre;
            $tqf->Co_requisite = $request->co;
            $tqf->place = $request->place;
            $tqf->date_modify = $request->date_mo;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->status = 1;
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_1;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->THname = $request->thname;
            $tqf->ENname = $request->enname;
            $tqf->credit = $request->credit;
            $tqf->course = $request->course;
            $tqf->teacher = $request->teacher;
            $tqf->term = $request->term;
            $tqf->Pre_requisite = $request->pre;
            $tqf->Co_requisite = $request->co;
            $tqf->place = $request->place;
            $tqf->date_modify = $request->date_mo;
            $tqf->status = 1;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addtqf3_2(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'nullable|string',
        // ]);
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF3_2::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF3_2::find($request->id);
            $tqf->target = $request->target;
            $tqf->objective = $request->objective;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->status = 1;
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_2;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->target = $request->target;
            $tqf->objective = $request->objective;
            $tqf->status = 1;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addtqf3_3(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'nullable|string',
        // ]);
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF3_3::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF3_3::find($request->id);
            $tqf->course_desc = $request->course_desc;
            $tqf->hour_lecture = $request->hour_lecture;
            $tqf->houre_practice = $request->houre_practice;
            $tqf->hour_selhflearn = $request->hour_selhflearn;
            $tqf->hour_tu = $request->hour_tu;
            $tqf->hour_recom = $request->hour_recom;
            $tqf->status = 1;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_3;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->course_desc = $request->course_desc;
            $tqf->hour_lecture = $request->hour_lecture;
            $tqf->houre_practice = $request->houre_practice;
            $tqf->hour_selhflearn = $request->hour_selhflearn;
            $tqf->hour_tu = $request->hour_tu;
            $tqf->hour_recom = $request->hour_recom;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->status = 1;
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addtqf3_4(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        // ]);
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF3_4::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF3_4::find($request->id);
            $tqf->morality = serialize($request->morality);
            $tqf->morality2 = serialize($request->morality2);
            $tqf->morality3 = serialize($request->morality3);
            $tqf->knowledge = serialize($request->knowledge);
            $tqf->knowledge2 = serialize($request->knowledge2);
            $tqf->knowledge3 = serialize($request->knowledge3);
            $tqf->intel_skill = serialize($request->intel_skill);
            $tqf->intel_skill2 = serialize($request->intel_skill2);
            $tqf->intel_skill3 = serialize($request->intel_skill3);
            $tqf->respon_skill = serialize($request->respon_skill);
            $tqf->respon_skill2 = serialize($request->respon_skill2);
            $tqf->respon_skill3 = serialize($request->respon_skill3);
            $tqf->num_skill = serialize($request->num_skill);
            $tqf->num_skill2 = serialize($request->num_skill2);
            $tqf->num_skill3 = serialize($request->num_skill3);
            $tqf->status = 1;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_4;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->morality = serialize($request->morality);
            $tqf->morality2 = serialize($request->morality2);
            $tqf->morality3 = serialize($request->morality3);
            $tqf->knowledge = serialize($request->knowledge);
            $tqf->knowledge2 = serialize($request->knowledge2);
            $tqf->knowledge3 = serialize($request->knowledge3);
            $tqf->intel_skill = serialize($request->intel_skill);
            $tqf->intel_skill2 = serialize($request->intel_skill2);
            $tqf->intel_skill3 = serialize($request->intel_skill3);
            $tqf->respon_skill = serialize($request->respon_skill);
            $tqf->respon_skill2 = serialize($request->respon_skill2);
            $tqf->respon_skill3 = serialize($request->respon_skill3);
            $tqf->num_skill = serialize($request->num_skill);
            $tqf->num_skill2 = serialize($request->num_skill2);
            $tqf->num_skill3 = serialize($request->num_skill3);
            $tqf->status = 1;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addtqf3_5(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        // ]);
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF3_5::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($request->form == 1) {
            if ($count > 0) {
                $tqf = TQF3_5::find($request->id);
                $tqf->data1 = serialize($request->data1);
                $tqf->update_date = date('Y-m-d H:i:s');
                $tqf->status = 1;
                $tqf->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                );
            } else {
                $tqf = new TQF3_5;
                $tqf->tqf3_tqf3ID = $request->id;
                $tqf->data1 = serialize($request->data1);
                $tqf->status = 1;
                $tqf->create_date = date('Y-m-d H:i:s');
                $tqf->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                );
            }
        }

        if ($count > 0) {
            $tqf = TQF3_5::find($request->id);
            $tqf->data2 = serialize($request->data2);
            $tqf->status = 1;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_5;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->data2 = serialize($request->data2);
            $tqf->status = 1;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addtqf3_6(Request $request)
    {
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'nullable|blob',
        // ]);

        $count = TQF3_6::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF3_6::find($request->id);
            $tqf->detail1 = $request->detail1;
            $tqf->detail2 = $request->detail2;
            $tqf->detail3 = $request->detail3;
            $tqf->status = 1;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_6;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->detail1 = $request->detail1;
            $tqf->detail2 = $request->detail2;
            $tqf->detail3 = $request->detail3;
            $tqf->status = 1;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addtqf3_7(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'nullable|blob',
        // ]);
        $tqf = TQF3::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF3_7::where('tqf3_tqf3ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF3_7::find($request->id);
            $tqf->detail1 = $request->detail1;
            $tqf->detail2 = $request->detail2;
            $tqf->detail3 = $request->detail3;
            $tqf->detail4 = $request->detail4;
            $tqf->detail5 = $request->detail5;
            $tqf->status = 1;
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF3_7;
            $tqf->tqf3_tqf3ID = $request->id;
            $tqf->detail1 = $request->detail1;
            $tqf->detail2 = $request->detail2;
            $tqf->detail3 = $request->detail3;
            $tqf->detail4 = $request->detail4;
            $tqf->detail5 = $request->detail5;
            $tqf->status = 1;
            $tqf->create_date = date('Y-m-d H:i:s');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    function status(Request $request)
    {
        $tqf = TQF3::find($request->id);
        if ($tqf->status == 4) {
            $tqf->send_file = 0;
        }
        $tqf->status = $request->status;
        $tqf->update_date = date('Y-m-d H:i:s');
        $tqf->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }
}
