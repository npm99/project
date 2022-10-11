<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\TQF5;
use App\Models\TQF3;
use App\Models\TQF5_1;
use App\Models\TQF5_2;
use App\Models\TQF5_2_1;
use App\Models\TQF5_2_2;
use App\Models\TQF5_3;
use App\Models\TQF5_4;
use App\Models\TQF5_5;
use App\Models\TQF5_6;
use App\Models\USER_TQF5;
use App\Models\USER_TQF3;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DateTime;

class TQF5Controller extends Controller
{
    public function check_save($id, Request $request)
    {
        // dd($request->id);
        $check = false;
        $mes = "";
        $tqf = TQF5::where('tqf5ID', $id)->first();
        // dd($tqf->tqf5_3);
        if ($request->id == '#tqf5-1') {
            if (!isset($tqf->tqf5_1)) {
                $check = true;
                $mes = 'หมวดที่ 1';
            }
        }
        if ($request->id == '#tqf5-2') {
            if (!isset($tqf->tqf5_2)) {
                $check = true;
                $mes = 'หมวดที่ 2';
            }
        }
        if ($request->id == '#tqf5-21') {
            if (!isset($tqf->tqf5_2->data1_1)) {
                $check = true;
                $mes = 'หมวดที่ 2.1';
            } else {
                if ($tqf->tqf5_2->data1_1 == "") {
                    $check = true;
                    $mes = 'หมวดที่ 2.1';
                }
            }
        }
        if ($request->id == '#tqf5-22') {
            if (!isset($tqf->tqf5_2->data1_2)) {
                $check = true;
                $mes = 'หมวดที่ 2.2';
            } else {
                if ($tqf->tqf5_2->data1_2 == "") {
                    $check = true;
                    $mes = 'หมวดที่ 2.2';
                }
            }
        }
        if ($request->id == '#tqf5-3') {
            if (!isset($tqf->tqf5_3)) {
                $check = true;
                $mes = 'หมวดที่ 3';
            }
        }
        if ($request->id == '#tqf5-31') {
            if (isset($tqf->tqf5_3) && $tqf->tqf5_3->grade == '') {
                $check = true;
                $mes = 'หมวดที่ 3.1';
            }
            // else {
            //     // if (!isset($tqf->tqf5_3->grade)) {
            //     //     $check = true;
            //     //     $mes = 'หมวดที่ 3.1';
            //     // }
            // }
        }
        if ($request->id == '#tqf5-4') {
            if (!isset($tqf->tqf5_4)) {
                $check = true;
                $mes = 'หมวดที่ 4';
            }
        }
        if ($request->id == '#tqf5-5') {
            if (!isset($tqf->tqf5_5)) {
                $check = true;
                $mes = 'หมวดที่ 5';
            }
        }
        if ($request->id == '#tqf5-6') {
            if (!isset($tqf->tqf5_6)) {
                $check = true;
                $mes = 'หมวดที่ 6';
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
        $tqf = TQF5::where('tqf5ID', $request->id)->first();
        if (isset($tqf->tqf5_1) && isset($tqf->tqf5_2) && isset($tqf->tqf5_3) && isset($tqf->tqf5_4) && isset($tqf->tqf5_5) && isset($tqf->tqf5_6)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success',
                ]
            );
        }
        if (!isset($tqf->tqf5_1)) {
            $text .= " หมวดที่ 1";
        }
        if (!isset($tqf->tqf5_2)) {
            $text .= " หมวดที่ 2";
        }
        if (!isset($tqf->tqf5_3)) {
            $text .= " หมวดที่ 3";
        }
        if (!isset($tqf->tqf5_4)) {
            $text .= " หมวดที่ 4";
        }
        if (!isset($tqf->tqf5_5)) {
            $text .= " หมวดที่ 5";
        }
        if (!isset($tqf->tqf5_6)) {
            $text .= " หมวดที่ 6";
        }

        return response()->json(
            [
                'success' => false,
                'message' => $text,
            ]
        );
    }

    public function copy_tqf5($from, $to)
    {
        TQF5::where('tqf5ID', $to)->update(['status' => 4]);
        $tqf = TQF5::where('tqf5ID', $from)->first();
        $t = TQF5::where('tqf5ID', $to)->first();
        // dd($tqf);
        try {
            if (isset($tqf) > 0) {
                if (isset($tqf->tqf5_1)) {
                    if (isset($t->tqf5_1)) {
                        unset($tqf->tqf5_1->tqf5_tqf5ID);
                        TQF5_1::where('tqf5_tqf5ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf5_1), true));
                    } else {
                        $tqf->tqf5_1->tqf5_tqf5ID = $to;
                        TQF5_1::create(json_decode(json_encode($tqf->tqf5_1), true));
                    }
                }
                if (isset($tqf->tqf5_2)) {
                    if (isset($t->tqf5_2)) {
                        unset($tqf->tqf5_2->tqf5_tqf5ID);
                        TQF5_2::where('tqf5_tqf5ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf5_2), true));
                    } else {
                        $tqf->tqf5_2->tqf5_tqf5ID = $to;
                        TQF5_2::create(json_decode(json_encode($tqf->tqf5_2), true));
                    }
                }
                if (isset($tqf->tqf5_3)) {
                    if (isset($t->tqf5_3)) {
                        unset($tqf->tqf5_3->tqf5_tqf5ID);
                        TQF5_3::where('tqf5_tqf5ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf5_3), true));
                    } else {
                        $tqf->tqf5_3->tqf5_tqf5ID = $to;
                        TQF5_3::create(json_decode(json_encode($tqf->tqf5_3), true));
                    }
                }
                if (isset($tqf->tqf5_4)) {
                    if (isset($t->tqf5_4)) {
                        unset($tqf->tqf5_4->tqf5_tqf5ID);
                        TQF5_4::where('tqf5_tqf5ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf5_4), true));
                    } else {
                        $tqf->tqf5_4->tqf5_tqf5ID = $to;
                        TQF5_4::create(json_decode(json_encode($tqf->tqf5_4), true));
                    }
                }
                if (isset($tqf->tqf5_5)) {
                    if (isset($t->tqf5_5)) {
                        unset($tqf->tqf5_5->tqf5_tqf5ID);
                        TQF5_5::where('tqf5_tqf5ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf5_5), true));
                    } else {
                        $tqf->tqf5_5->tqf5_tqf5ID = $to;
                        TQF5_5::create(json_decode(json_encode($tqf->tqf5_5), true));
                    }
                }
                if (isset($tqf->tqf5_6)) {
                    if (isset($t->tqf5_6)) {
                        unset($tqf->tqf5_6->tqf5_tqf5ID);
                        TQF5_6::where('tqf5_tqf5ID', $to)
                            ->update(json_decode(json_encode($tqf->tqf5_6), true));
                    } else {
                        $tqf->tqf5_6->tqf5_tqf5ID = $to;
                        TQF5_6::create(json_decode(json_encode($tqf->tqf5_6), true));
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

    public function check_copy_tqf5($id)
    {
        $i = session()->get('data');
        $t = TQF5::where('tqf5ID', $id)->first();
        // dd($t);
        $tqf = array();
        if ($t) {
            $tqf = TQF5::join('user_tqf5', 'tqf5.tqf5ID', '=', 'user_tqf5.tqf5ID')
                // ->has('tqf5_1')->has('tqf5_2')->has('tqf5_3')->has('tqf5_4')->has('tqf5_5')->has('tqf5_6')->has('tqf5_7')
                ->where('tqf3.status', 2)->where('send_file', 0)->where('user_tqf5.userID', $i->userID)
                ->where('tqf5.subject_idSubject', $t->subject_idSubject)->where('tqf5.tqf5ID', '!=', $id)->get();
        }
        if (count($tqf) > 0) {
            $text = '<table class="table table-bordered">
            <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">ปีการศึกษา</th> 
              <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="table-copy" style="text-align: center;">';
            foreach ($tqf as $key => $value) {
                $text .= '<tr>
                <th scope="row">' . (intval($key) + 1) . '</th>
                <td>' . $value->subyear->term . '/' . $value->subyear->Year . '</td>
                <td><button class="btn btn-success btn-sm select-copy" type="button"  data-to="' . $id . '" data-id="' . $value->tqf5ID . '">คัดลอก</button></td>
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
        // $t = $request->term-1;->where('tqf5ID', '!=', $id)
        // $year = Year::where('Year', '=', $request->year)->where('term', '=', $t)->first();
        // $year = Year::where('idYear', '=', $request->year)->first();
        // // dd($request->year.'\n'.$y);
        // $sub = Subject::where('idSubject', '=', $request->sub)->first();
        // $tqf = TQF5::where('Year_idYear', '=', $year->idYear)->where('subject_idSubject', '=', $request->sub)->first();

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
                $fileName[] = $name;
            }
        }

        $tqf = TQF5::find($request->id_tqf5);
        $tqf->filetqf5 = serialize($fileName);
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

    public function get_tqf5(Request $request)
    {
        $tqf = TQF5::where('tqf5ID', '=', $request->id)->first();
        $tqf->subuser = $tqf->subuser;
        $tqf->subsubject = $tqf->subsubject;
        $tqf->subyear = $tqf->subyear;
        return $tqf;
        //    return $request->all();
    }

    public function addcourse(Request $request)
    {
        $count = TQF5::where('tqf5ID', '=', $request->id)->count();
        if ($count > 0) {
            $tqf = TQF5::find($request->id);
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

    public function add_fast_tqf5(Request $request)
    {
        DB::beginTransaction();
        if ($request->id_tqf5 - 0 == 1) {
            $data = json_decode($request->data);
            // echo count($data);
            for ($i = 0; $i < count($data); $i++) {
                $count = TQF5::where('Year_idYear', '=', $request->term_id)->where('subject_idSubject', '=', $data[$i]->arr_sub)
                    ->where('group_sub', '=', $data[$i]->arr_group)->count();
                if ($count == 0) {
                    // var_dump($data[$i]->teacher_id);
                    $user = json_decode($data[$i]->teacher_id);
                    $tqf5 = new TQF5;
                    $tqf5->Year_idYear = $request->term_id;
                    $tqf5->subject_idSubject = $data[$i]->arr_sub;
                    $tqf5->group_sub = $data[$i]->arr_group;
                    $tqf5->filetqf5 = '';
                    $tqf5->deadline = $request->date;
                    $tqf5->create_date = date('Y-m-d H:i:s');
                    $tqf5->save();
                    $tqf3 = new TQF3;
                    $tqf3->Year_idYear = $request->term_id;
                    $tqf3->subject_idSubject = $data[$i]->arr_sub;
                    $tqf3->group_sub = $data[$i]->arr_group;
                    $tqf3->filetqf3 = '';
                    $tqf3->deadline = date('Y-m-d', strtotime($request->date . ' - 6 month'));
                    $tqf3->create_date = date('Y-m-d H:i:s');
                    $tqf3->save();
                    for ($j = 0; $j < count($user); $j++) {
                        // var_dump($user[$j]->userID);
                        $u_tqf5 = new USER_TQF5;
                        $u_tqf5->tqf5ID = $tqf5->tqf5ID;
                        $u_tqf5->userID = $user[$j]->userID;
                        $u_tqf5->save();
                        $u_tqf3 = new USER_TQF3;
                        $u_tqf3->tqf3ID = $tqf3->tqf3ID;
                        $u_tqf3->userID = $user[$j]->userID;
                        $u_tqf3->save();
                    }
                    TQF5::where('tqf5ID', $tqf5->tqf5ID)->update(['id_tqf3' => $tqf3->tqf3ID]);
                    TQF3::where('tqf3ID', $tqf3->tqf3ID)->update(['id_tqf5' => $tqf5->tqf5ID]);
                }
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

    public function addtqf5(Request $request)
    {

        $request->validate([
            'term_id' => 'required',
            'teacher_id' => 'nullable',
            'arr_sub' => 'required',
            'id_tqf5' => 'required'
        ]);

        if ($request->hasFile('filetqf')) {
            $now = new DateTime();
            $filePath = $request->file('filetqf');
            $clientOriginalName = $request->filetqf->getClientOriginalName();
            $fileName = $now->format('Y-m-d H-i') . '_' . $clientOriginalName;
            Storage::putFileAs('fileTQF', $filePath, $fileName);
        }

        DB::beginTransaction();
        if ($request->id_tqf5 - 0 != 0) {
            $u_tqf = USER_TQF5::find($request->id_tqf5);
            $u_tqf->delete();
            $tqf = TQF5::find($request->id_tqf5);
            $tqf->Year_idYear = $request->term_id;
            $tqf->group_sub = $request->group;
            // $tqf->user_userID = $request->teacher_id;
            $tqf->subject_idSubject = $request->arr_sub;
            if ($request->hasFile('filetqf') && $fileName != '') {
                $tqf->filetqf5 = serialize([$fileName]);
                $tqf->status = 2;
                $tqf->send_file = 1;
                $tqf->is_file = 1;
            }
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->deadline = $request->date;
            $tqf->save();
            for ($j = 0; $j < count($request->teacher_id); $j++) {
                $u_tqf = new USER_TQF5;
                $u_tqf->tqf5ID = $tqf->tqf5ID;
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

        try {
            foreach ($request->arr_sub as $value) {
                foreach (json_decode($request->arr_group) as $val) {
                    $check_add = TQF5::where('Year_idYear', '=', $request->term_id)
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
                            $data['filetqf5'] = serialize([$fileName]);
                            $data['status'] = 2;
                            $data['send_file'] = 1;
                        }
                        $tqf = TQF5::create($data);

                        // echo $tqf->tqf5ID;
                        for ($j = 0; $j < count($request->teacher_id); $j++) {
                            $u_tqf = new USER_TQF5;
                            $u_tqf->tqf5ID = $tqf->tqf5ID;
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
        //     $check_add = TQF5::where('Year_idYear', '=', $request->term_id)
        //         ->where('subject_idSubject', '=', $request->arr_sub[$i])
        //         ->where('group_sub', '=', $request->group)->count();

        //     if ($check_add == 0) {
        //         $tqf = new TQF5;
        //         $tqf->Year_idYear = $request->term_id;
        //         $tqf->subject_idSubject = $request->arr_sub[$i];
        //         if ($request->hasFile('filetqf') && $fileName != '') {
        //             $tqf->filetqf5 = serialize([$fileName]);
        //             $tqf->status = 2;
        //             $tqf->send_file = 1;
        //         }
        //         $tqf->create_date = date('Y-m-d H:i:s');
        //         $tqf->deadline = $request->date;
        //         $tqf->group_sub = $request->group;
        //         $tqf->save();
        //         // echo $tqf->tqf5ID;
        //         for ($j = 0; $j < count($request->teacher_id); $j++) {
        //             $u_tqf = new USER_TQF5;
        //             $u_tqf->tqf5ID = $tqf->tqf5ID;
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

        // TQF5::insert($answers);
        // $tqf = new TQF5;
        // $tqf->Year_idYear = $request->term_id;
        // $tqf->user_userID = $request->teacher_id;
        // $tqf->subject_idSubject = json_encode($request->arr_sub);
        // // $tqf->filetqf5 = $request->filetqf;
        // $tqf->deadline = $request->date;
        // $tqf->save();

        // if ($u_tqf->save() && $tqf->save()) {

        // }


        // }
    }

    public function addtqf5_new(Request $request)
    {
        $request->validate([
            'term_id' => 'required',
            'teacher_id' => 'nullable',
            'arr_sub' => 'required',
            'id_tqf5' => 'required'
        ]);


        DB::beginTransaction();
        try {
            foreach ($request->arr_sub as $value) {
                foreach (json_decode($request->arr_group) as $val) {

                    $check_add = TQF5::where('Year_idYear', '=', $request->term_id)
                        ->where('subject_idSubject', '=', $value)
                        ->where('group_sub', '=', $request->group)->count();

                    if ($check_add == 0) {
                        $data1 = array(
                            'Year_idYear' => $request->term_id,
                            'subject_idSubject' => $value,
                            'create_date' => date('Y-m-d H:i:s'),
                            'deadline' => $request->date,
                            'group_sub' => $val,
                            'teacher' => $request->teach,
                        );
                        $tqf5 = TQF5::create($data1);
                        // echo $tqf->tqf3ID;
                        for ($j = 0; $j < count($request->teacher_id); $j++) {
                            $u_tqf5 = new USER_TQF5;
                            $u_tqf5->tqf5ID = $tqf5->tqf5ID;
                            $u_tqf5->userID = $request->teacher_id[$j];
                            $u_tqf5->save();
                        }

                        $data2 = array(
                            'Year_idYear' => $request->term_id,
                            'subject_idSubject' => $value,
                            'create_date' => date('Y-m-d H:i:s'),
                            'deadline' => date('Y-m-d', strtotime($request->date . ' - 6 month')),
                            'group_sub' => $val,
                            'teacher' => $request->teach,
                        );
                        $tqf3 = TQF3::create($data2);
                        for ($j = 0; $j < count($request->teacher_id); $j++) {
                            $u_tqf3 = new USER_TQF3;
                            $u_tqf3->tqf3ID = $tqf3->tqf3ID;
                            $u_tqf3->userID = $request->teacher_id[$j];
                            $u_tqf3->save();
                        }
                        TQF5::where('tqf5ID', $tqf5->tqf5ID)->update(['id_tqf3' => $tqf3->tqf3ID]);
                        TQF3::where('tqf3ID', $tqf3->tqf3ID)->update(['id_tqf5' => $tqf5->tqf5ID, 'teacher' => $request->teach,]);
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(
                [
                    'success' => false,
                    'message' => $e
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

    public function edittqf5_new(Request $request)
    {

        $request->validate([
            'term_id' => 'required',
            'teacher_id' => 'nullable',
            'arr_sub' => 'required',
            'id_tqf5' => 'required'
        ]);

        DB::beginTransaction();
        if ($request->id_tqf5 - 0 != 0) {
            $u_tqf = USER_TQF5::find($request->id_tqf5);
            $u_tqf->delete();
            $tqf5 = TQF5::find($request->id_tqf5);
            $tqf5->Year_idYear = $request->term_id;
            $tqf5->group_sub = $request->group;
            // $tqf5->user_userID = $request->teacher_id;
            $tqf5->subject_idSubject = $request->arr_sub;
            $tqf5->update_date = date('Y-m-d H:i:s');
            $tqf5->deadline = $request->date;
            $tqf5->teacher = $request->teach;
            $tqf5->save();

            $tqf3 = TQF3::where('id_tqf5', '=', $request->id_tqf5)->first();
            $u_tqf3 = USER_TQF3::find($tqf3->tqf3ID);
            $u_tqf3->delete();
            $tqf3->Year_idYear = $request->term_id;
            $tqf3->group_sub = $request->group;
            // $tqf3->user_userID = $request->teacher_id;
            $tqf3->subject_idSubject = $request->arr_sub;
            $tqf3->teacher = $request->teach;
            $tqf3->update_date = date('Y-m-d H:i:s');
            $tqf3->save();
            for ($j = 0; $j < count($request->teacher_id); $j++) {
                $u_tqf = new USER_TQF5;
                $u_tqf->tqf5ID = $tqf5->tqf5ID;
                $u_tqf->userID = $request->teacher_id[$j];
                $u_tqf->save();
                $u_tqf = new USER_TQF3;
                $u_tqf->tqf3ID = $tqf3->tqf3ID;
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

    public function deletetqf5(Request $request)
    {
        $c = TQF5::where('status', 0)->where('tqf5ID', '=', $request->id_tqf5)->count();
        if ($c > 0) {
            $tqf5 = TQF5::where('tqf5ID', '=', $request->id_tqf5)->delete();
            $u_tqf = USER_TQF5::where('tqf5ID', '=', $request->id_tqf5)->delete();
            $c = TQF3::where('id_tqf5', '=', $request->id_tqf5)->first();
            $tqf3 = TQF3::where('id_tqf5', '=', $request->id_tqf5)->delete();
            $u_tqf = USER_TQF3::where('tqf3ID', '=', $c->tqf3ID)->delete();
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

    public function addtqf5_1(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_1::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_1::find($request->id);
            $tqf->THname = $request->thname;
            $tqf->ENname = $request->enname;
            $tqf->pre_req = $request->pre;
            $tqf->teacher = $request->teacher;
            $tqf->term = $request->term;
            $tqf->place = $request->place;
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

            $tqf = new TQF5_1;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->THname = $request->thname;
            $tqf->ENname = $request->enname;
            $tqf->pre_req = $request->pre;
            $tqf->teacher = $request->teacher;
            $tqf->term = $request->term;
            $tqf->place = $request->place;
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
    public function addtqf5_2(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'nullable|string',
        // ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_2::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_2::find($request->id);
            $tqf->data2_1 = $request->data1;
            $tqf->data2_2 = $request->data2;
            $tqf->data2_3 = $request->data3;
            $tqf->data4 = $request->data4;
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

            $tqf = new TQF5_2;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->data2_1 = $request->data1;
            $tqf->data2_2 = $request->data2;
            $tqf->data2_3 = $request->data3;
            $tqf->data4 = $request->data4;
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
    public function addtqf5_2_1(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        // $data_input = json_decode($request->data, true);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_2::where('tqf5_tqf5ID', '=', $request->id)->count();
        // $count_input = count($data_input);

        if ($count > 0) {
            $tqf = TQF5_2::find($request->id);
            $tqf->data1_1 = serialize($request->data);
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();
            // $tqf = TQF5_2_1::where('tqf5_tqf5ID', $request->id)->orderBy('id', 'ASC')->get();
            // for ($i = 0; $i < $count_input; $i++) {

            //     // $data = [
            //     //     'detail' => $data_input[$i]['detail'],
            //     //     'hour1' => $data_input[$i]['hour1'],
            //     //     'hour2' => $data_input[$i]['hour2'],
            //     //     'reason' => $data_input[$i]['reason'],
            //     //     'status' => 1

            //     // ];
            //     $tqf = TQF5_2_1::find($tqf[$i]['id']);
            //     echo $tqf;
            //     // $tqf[$i]->update($data);
            //     // printf($tqf[$i]);
            //     // var_dump($data);
            // }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {
            $tqf = new TQF5_2;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->data1_1 = serialize($request->data);
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();
            // $tqf->detail = $request->get('');
            // $tqf->hour1 = $request->get('');
            // $tqf->hour2 = $request->get('');
            // $tqf->reason = $request->get('');
            // $tqf->status = $request->get('');
            // $tqf->save();
            // for ($i = 0; $i < $count_input; $i++) {
            //     // var_dump($count($data_input)[$i]) ;
            //     $data[] = [
            //         'tqf5_tqf5ID' => $request->id,
            //         'detail' => $data_input[$i]['detail'],
            //         'hour1' => $data_input[$i]['hour1'],
            //         'hour2' => $data_input[$i]['hour2'],
            //         'reason' => $data_input[$i]['reason'],
            //         'status' => 1

            //     ];
            // }
            // // var_dump($data);
            // TQF5_2_1::insert($data);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }
    public function addtqf5_2_2(Request $request)
    {
        // $request->validate([
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'required|string',
        //     '' => 'nullable|string',
        // ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_2::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_2::find($request->id);
            $tqf->data1_2 = serialize($request->data);
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new TQF5_2_2;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->data1_2 = serialize($request->data);
            $tqf->update_date = date('Y-m-d H:i:s');
            $tqf->save();
            // $tqf->morality = $request->get('');
            // $tqf->morality2 = $request->get('');
            // $tqf->morality3 = $request->get('');
            // $tqf->knowledge = $request->get('');
            // $tqf->knowledge2 = $request->get('');
            // $tqf->knowledge3 = $request->get('');
            // $tqf->intel_skill = $request->get('');
            // $tqf->intel_skill2 = $request->get('');
            // $tqf->intel_skill3 = $request->get('');
            // $tqf->respon_skill = $request->get('');
            // $tqf->respon_skill2 = $request->get('');
            // $tqf->respon_skill3 = $request->get('');
            // $tqf->num_skill = $request->get('');
            // $tqf->num_skill2 = $request->get('');
            // $tqf->num_skill3 = $request->get('');
            // $tqf->status = $request->get('');
            // $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }
    public function addtqf5_3(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_3::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_3::find($request->id);
            $tqf->num_regis = $request->num_regis;
            $tqf->num_end = $request->num_end;
            $tqf->num_w = $request->num_w;
            $tqf->detail5 = $request->detail5;
            $tqf->detail6_1 = $request->detail6_1;
            $tqf->detail6_2 = $request->detail6_2;
            $tqf->detail7 = $request->detail7;
            // $tqf->grade = serialize($request->grade);
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

            $tqf = new TQF5_3;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->num_regis = $request->num_regis;
            $tqf->num_end = $request->num_end;
            $tqf->num_w = $request->num_w;
            $tqf->detail5 = $request->detail5;
            $tqf->detail6_1 = $request->detail6_1;
            $tqf->detail6_2 = $request->detail6_2;
            $tqf->detail7 = $request->detail7;
            // $tqf->grade = serialize($request->grade);
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

    public function addtqf5_3_1(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_3::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_3::find($request->id);
            // $tqf->num_regis = $request->num_regis;
            // $tqf->num_end = $request->num_end;
            // $tqf->num_w = $request->num_w;
            // $tqf->detail5 = $request->detail5;
            // $tqf->detail6_1 = $request->detail6_1;
            // $tqf->detail6_2 = $request->detail6_2;
            // $tqf->detail7 = $request->detail7;
            $tqf->grade = serialize($request->grade);
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

            $tqf = new TQF5_3;
            $tqf->tqf5_tqf5ID = $request->id;
            // $tqf->num_regis = $request->num_regis;
            // $tqf->num_end = $request->num_end;
            // $tqf->num_w = $request->num_w;
            // $tqf->detail5 = $request->detail5;
            // $tqf->detail6_1 = $request->detail6_1;
            // $tqf->detail6_2 = $request->detail6_2;
            // $tqf->detail7 = $request->detail7;
            $tqf->grade = serialize($request->grade);
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
    public function addtqf5_4(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_4::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_4::find($request->id);
            $tqf->detail1_1 = $request->detail1_1;
            $tqf->detail1_2 = $request->detail1_2;
            $tqf->detail2_1 = $request->detail2_1;
            $tqf->detail2_2 = $request->detail2_2;
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

            $tqf = new TQF5_4;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->detail1_1 = $request->detail1_1;
            $tqf->detail1_2 = $request->detail1_2;
            $tqf->detail2_1 = $request->detail2_1;
            $tqf->detail2_2 = $request->detail2_2;
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
    public function addtqf5_5(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_5::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_5::find($request->id);
            $tqf->detail1_1 = $request->detail1_1;
            $tqf->detail1_2 = $request->detail1_2;
            $tqf->detail2_1 = $request->detail2_1;
            $tqf->detail2_2 = $request->detail2_2;
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

            $tqf = new TQF5_5;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->detail1_1 = $request->detail1_1;
            $tqf->detail1_2 = $request->detail1_2;
            $tqf->detail2_1 = $request->detail2_1;
            $tqf->detail2_2 = $request->detail2_2;
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
    public function addtqf5_6(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);
        $tqf = TQF5::find($request->id);
        $tqf->send_file = 0;
        $tqf->status = 4;
        $tqf->save();

        $count = TQF5_6::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = TQF5_6::find($request->id);
            $tqf->detail1_1 = $request->detail1_1;
            $tqf->detail1_2 = $request->detail1_2;
            $tqf->detail2 = $request->detail2;
            $tqf->detail3_1 = $request->detail3_1;
            $tqf->detail3_2 = $request->detail3_2;
            $tqf->detail3_3 = $request->detail3_3;
            $tqf->detail4 = $request->detail4;
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

            $tqf = new TQF5_6;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->detail1_1 = $request->detail1_1;
            $tqf->detail1_2 = $request->detail1_2;
            $tqf->detail2 = $request->detail2;
            $tqf->detail3_1 = $request->detail3_1;
            $tqf->detail3_2 = $request->detail3_2;
            $tqf->detail3_3 = $request->detail3_3;
            $tqf->detail4 = $request->detail4;
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
    public function addgrade(Request $request)
    {
        //$request->validate([
        //           '' => 'required|string',
        //          '' => 'required|string',
        //          '' => 'required|string',
        //      ]);

        $count = Grade::where('tqf5_tqf5ID', '=', $request->id)->count();

        if ($count > 0) {
            $tqf = Grade::find($request->id);
            $tqf->grade = $request->get('');
            $tqf->count = $request->get('');
            $tqf->percent = $request->get('');
            $tqf->grade2 = $request->get('');
            $tqf->gid = $request->get('');
            $tqf->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $tqf = new Grade;
            $tqf->tqf5_tqf5ID = $request->id;
            $tqf->grade = $request->get('');
            $tqf->count = $request->get('');
            $tqf->percent = $request->get('');
            $tqf->grade2 = $request->get('');
            $tqf->gid = $request->get('');
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
        $tqf = TQF5::find($request->id);
        if ($tqf->status == 4) {
            $tqf->send_file = 0;
        }
        if ($request->status == 3) {
            $tqf->comment = $request->comment;
        }
        $tqf->status = $request->status;
        $tqf->update_date = date('Y-m-d H:i:s');
        $tqf->save();
        // echo json_encode($tqf);

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }
}
