<?php

namespace App\Http\Controllers;

use App\Exports\TQF3Export;
use App\Exports\TQF5Export;
use App\Imports\SubjectImport;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Factory;
use App\Models\GroupStudy;
use App\Models\News;
use App\Models\Subject;
use App\Models\TQF3;
use App\Models\TQF5;
use App\Models\USER_TQF3;
use App\Models\USER_TQF5;
use App\Models\Users;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

// use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('login');
    // }

    public function upload_pic(Request $request)
    {
        if ($request->hasFile('file')) {
            $filePath = $request->file('file');
            $fileName = $request->file->getClientOriginalName();
            // $fileName = $clientOriginalName;
            // echo $filePath;
            $filePath->move(public_path('/file_photo'), $fileName);
            // Storage::putFileAs('fileNews', $filePath, $fileName);
            // Storage::disk('uploads')->put($fileName,$filePath);
            // $path = $request->file('filetqf')->storeAs('fileTQF', $fileName, 'public');
        } else {
            $fileName = '';
        }
        return 'file_photo/' . $fileName;
    }

    public function delete_user($id)
    {
        $count = USER_TQF3::where('userID', $id)->count();
        $count += USER_TQF5::where('userID', $id)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ เนื่องจากอาจารย์ถูกจัดทำมคอ. แล้ว!'
                ]
            );
        }
        Users::where('userID', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_news($id)
    {
        News::where('idnews', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_year($id)
    {
        $count = TQF3::where('Year_idYear', $id)->count();
        $count += TQF5::where('Year_idYear', $id)->count();

        $c = Year::count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ ปีการศึกษาถูกจัดทำมคอ. แล้ว!'
                ]
            );
        }
        if ($c == 1) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ปีการศึกษาต้องมีอย่างน้อย 1 รายการ'
                ]
            );
        }

        Year::where('idYear', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_fac($id)
    {
        $count = Branch::where('factory_idfactory', $id)->count();
        // $count += TQF5::where('Year_idYear', $id)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ เนื่องจากมีสาขาในสังกัด!'
                ]
            );
        }
        $c = Factory::count();
        if ($c == 1) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'คณะต้องมีอย่างน้อย 1 รายการ'
                ]
            );
        }


        Factory::where('idfactory', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_group_sub($id)
    {
        $count = TQF3::where('group_sub', $id)->count();
        $count += TQF5::where('group_sub', $id)->count();
        // $count += TQF5::where('Year_idYear', $id)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ เนื่องจากกลุ่มเรียนถูกจัดทำมคอ. แล้ว!'
                ]
            );
        }
        GroupStudy::where('groupID', $id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_sub($id)
    {
        $count = TQF3::where('subject_idSubject', $id)->count();
        $count += TQF5::where('subject_idSubject', $id)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ เนื่องจากรายวิชาจัดทำมคอ. แล้ว!'
                ]
            );
        }
        Subject::where('idsubject', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_ban($id)
    {
        $count = Users::where('branch_idBranch', $id)->count();
        // $count += TQF5::where('Year_idYear', $id)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ เนื่องจากมีผู้ใช้งานในสาขา!'
                ]
            );
        }
        Branch::where('idBranch', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function delete_course($id)
    {
        $count = GroupStudy::where('course_id', $id)->count();
        // $count += TQF5::where('Year_idYear', $id)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'ไม่สามารถลบได้ เนื่องจากหลักสูตรถูกจัดกลุ่มแล้ว!'
                ]
            );
        }
        Course::where('c_id', $id)->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }


    public function delete_tqf5($id)
    {
        # code...
    }


    public function add_document(Request $request)
    {
        # code...
        $name = $request->name;
        // $file = $request->file;

        // dd($file);
        for ($i = 0; $i < count($name); $i++) {
            // printf($request->hasFile('file.'.$i));
            if ($request->hasFile('file.' . $i) && $request->file[$i] != 'Undefined') {
                $filePath = $request->file('file.' . $i);
                $originalName = $request->file[$i]->getClientOriginalName();
                $last = pathinfo($originalName, PATHINFO_EXTENSION);
                $file_name = $name[$i] . '.' . $last;
                $filePath->move(storage_path('/tqf'), $file_name);
                // Storage::putFileAs('fileTQF', $filePath, $file_name);
                // Storage::disk('public')->put($filePath, $file_name);public
            } else {
                $file_name = '';
            }

            $count = DB::table('document')->where('doc_id', 'like', $i + 1)->count();
            if ($count == 0) {

                DB::table('document')->insert([
                    'name' => $name[$i],
                    'file' => $file_name
                ]);
            } else {
                DB::table('document')->where('doc_id', 'like', $i + 1)
                    ->update([
                        'name' => $name[$i],
                        'file' => $file_name
                    ]);
                // echo 'sss';
            }
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
    }

    public function add_group_course(Request $request)
    {
        $arr = json_decode($request->arr_group);
        for ($i = 0; $i < count($arr); $i++) {
            //    echo $arr[$i];
            $group = GroupStudy::find($arr[$i]);
            $group->course_id = $request->idcourse;
            $group->save();
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'success',
            ]
        );
    }

    public function del_group_course(Request $request)
    {
        // dd($request->all());
        $data = json_decode($request->id);
        for ($i = 0; $i < count($data); $i++) {
            # code...
            $group = GroupStudy::find($data[$i]);
            $group->course_id = null;
            $group->save();
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'success',
            ]
        );
    }

    public function fetchben(Request $request)
    {
        $ben = Branch::where('factory_idfactory', $request->select)->get();
        $output = '<option selected disabled value="">เลือกสาขา...</option>';
        if ($request->input('search')) {
            $output = '<option selected value="">ทั้งหมด</option>';
        }
        foreach ($ben as $item) {
            $output .= '<option value="' . $item->idBranch . '">' . $item->branchName . '</option>';
        }
        echo $output;
    }

    public function addcourse(Request  $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        // return $request->name;
        $checkcourse = Course::where('courseName', 'like', $request->name)->count();

        if ($request->id != 0) {
            $c = Course::where('courseName', 'like', $request->name)->first();
            if (isset($c->c_id) && $c->c_id != $request->id) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'มีข้อมูลนี้แล้ว'
                    ]
                );
            } else {
                DB::table('course')->where('c_id', $request->id)
                    ->update(['courseName' => $request->name, 'courseNumber' => $request->num, 'update_date' => date('Y-m-d H:i:s')]);

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success',
                    ]
                );
            }
        }

        if ($checkcourse == 0) {
            DB::table('course')->insert(['courseName' => $request->name, 'courseNumber' => $request->num, 'create_date' => date('Y-m-d H:i:s')]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success',
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'มีข้อมูลแล้ว',
                ]
            );
        }
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'userID' => 'required|string',
            'level_LevelID' => 'required|string',
            'branch_idBranch' => 'required|string',
            'Uprefix' => 'required|string',
            'UFName' => 'required|string',
            'ULName' => 'required|string',
            'Username' => 'required|string',
            // 'Password' => 'required|string',
            // 'userCode' => 'required|string',
        ]);

        if ($request->userID - 0 != 0) {

            $user = Users::find($request->userID);
            $user->level_LevelID = $request->level_LevelID;
            $user->branch_idBranch = $request->branch_idBranch;
            $user->Uprefix = $request->Uprefix;
            $user->UFName = $request->UFName;
            $user->ULName = $request->ULName;
            $user->Title = $request->Title;
            if ($request->level_LevelID == 2) {
                $user->chairman = $request->chairman;
            }
            if ($request->level_LevelID == 1) {
                $user->is_editor = $request->is_editor;
            }
            $user->update_date = date('Y-m-d H:i:s');
            $user->save();

            if ($request->userID == session('data')->userID) {
                session()->put('data', $user);
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success',
                ]
            );
        }
        //$count = Users::where('branchcode', 'like', $request->code)->count();
        //$count = Users::where('branchName', 'like', $request->name)->count() + $count;

        // if ($count > 0) {
        //     return response()->json(
        //         [
        //             'success' => false,
        //             'message' => 'error'
        //         ]
        //     );
        // } else {

        $user = new Users;
        //$user->userID = $request->userID;
        $user->level_LevelID = $request->level_LevelID;
        $user->branch_idBranch = $request->branch_idBranch;
        $user->Uprefix = $request->Uprefix;
        $user->UFName = $request->UFName;
        $user->ULName = $request->ULName;
        $user->Username = $request->Username;
        $user->Title = $request->Title;
        $user->userCode = $request->userCode;
        $user->create_date = date('Y-m-d H:i:s');
        if ($request->level_LevelID == 2) {
            $user->is_editor = 1;
        }
        if ($request->level_LevelID == 1) {
            $user->is_editor = 0;
        }
        $user->save();

        // if ($request->level_LevelID == '1') {
        //     return response()->json(
        //         [
        //             'success' => true,
        //             'message' => 'success',
        //             'level' => $request->level_LevelID
        //         ]);
        // }
        // $user = Users::findOrFail($user->uid);
        //     Auth::login($user);
        //     echo $user;

        return response()->json(
            [
                'success' => true,
                'message' => 'success',
                // 'level' => $request->level_LevelID
            ]
        );
        // }
    }

    public function editdata(Request $request)
    {
        $id = $request->id;

        $data = Users::where('officerID', $id)->get();

        return response()->json(['data' => $data]);
    }

    public function addsub(Request $request)
    {
        $request->validate([
            'sub_id' => 'required|string',
            'thname' => 'required|string',
            'enname' => 'required|string',
            // 'sub_groub' => 'required|string',
            'credit' => 'required|string',
            'id' => 'required|string',
        ]);


        // $checkgroub = GroupStudy::where('groupname', 'like', $request->sub_groub)->count();
        // if ($checkgroub <= 0) {
        //     $groub = new GroupStudy;
        //     $groub->groupname = $request->sub_groub;
        // $groub->save();
        //     return response()->json(
        //         [
        //             'success' => true,
        //             'message' => 'success'
        //         ]
        //     );
        // } else {

        //     return response()->json(
        //         [
        //             'success' => false,
        //             'message' => 'error'
        //         ]
        //     );

        //     }
        // }

        // $getgroub = GroupStudy::where('groupname', 'like', $request->sub_groub)->first('groupID');
        $gsub = Subject::where('subjectCode', 'like', $request->sub_id)->count();

        if ($request->id - 0 != 0) {

            $gsub = Subject::where('subjectCode', 'like', $request->sub_id)->first();

            if (isset($gsub->idsubject) && $gsub->idsubject != $request->id) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'มีข้อมูลแล้ว'
                    ]
                );
            }

            $sub = Subject::find($request->id);
            $sub->subjectCode = $request->sub_id;
            $sub->ENsubject = $request->enname;
            $sub->THsubject = $request->thname;
            $sub->cradit = $request->credit;
            $sub->subNumber = $request->subnum;
            $sub->update_date = date('Y-m-d H:i:s');
            $sub->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }

        if ($gsub == 0) {

            $sub = new Subject;
            $sub->subjectCode = $request->sub_id;
            $sub->ENsubject = $request->enname;
            $sub->THsubject = $request->thname;
            $sub->cradit = $request->credit;
            $sub->subNumber = $request->subnum;
            $sub->create_date = date('Y-m-d H:i:s');
            $sub->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'มีข้อมูลแล้ว'
                ]
            );
        }
    }

    public function addfac(Request $request)
    {
        $request->validate([
            'fac' => 'required|string',
            'fac_id' => 'required|string',
        ]);

        if ($request->fac_id - 0 != 0) {
            $fac = factory::where('factoryName', 'like', $request->fac)->first();
            if (isset($fac->idfactory) && $fac->idfactory != $request->fac_id) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'มีข้อมูลนี้แล้ว'
                    ]
                );
            } else {
                $fac = factory::find($request->fac_id);
                $fac->factoryName = $request->fac;
                $fac->update_date = date('Y-m-d H:i:s');
                $fac->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                );
            }
        }

        $count = factory::where('factoryName', 'like', $request->fac)->count();

        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'มีข้อมูลนี้แล้ว'
                ]
            );
        } else {
            $fac = new factory;
            $fac->factoryName = $request->fac;
            $fac->create_date = date('Y-m-d H:i:s');
            $fac->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addgroup(Request $request)
    {
        $request->validate([
            'group' => 'required|string',
            'group_id' => 'required|string',
        ]);

        if ($request->group_id - 0 != 0) {
            $group = GroupStudy::where('groupname', 'like', $request->group)->first();
            if (isset($group->groupID) && $group->groupID != $request->group_id) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'มีข้อมูลนี้แล้ว'
                    ]
                );
            } else {
                $fac = GroupStudy::find($request->group_id);
                $fac->groupname = strtoupper($request->group);
                $fac->update_date = date('Y-m-d H:i:s');
                $fac->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                );
            }
        }

        $count = GroupStudy::where('groupname', 'like', $request->group)->count();
        if ($count > 0) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'มีข้อมูลนี้แล้ว'
                ]
            );
        } else {
            $fac = new GroupStudy;
            $fac->groupname = strtoupper($request->group);
            $fac->create_date = date('Y-m-d H:i:s');
            $fac->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }


    public function addterm(Request $request)
    {
        $request->validate([
            'term' => 'required|string',
            'year' => 'required|string',
        ]);

        if ($request->id != 0) {
            $count = Year::where('Year', 'like', $request->year)->where('term', 'like', $request->term)->first();
            if (isset($count->idYear) && $count->idYear != $request->id) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'มีข้อมูลนี้แล้ว'
                    ]
                );
            } else {
                $year = Year::find($request->id);
                $year->Year = $request->year;
                $year->term = $request->term;
                $year->active = $request->active;
                $year->update_date = date('Y-m-d H:i:s');
                $year->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                );
            }
        }

        $count = Year::where('Year', 'like', $request->year)->where('term', 'like', $request->term)->count();

        if ($count <= 0) {
            $year = new Year;
            $year->Year = $request->year;
            $year->term = $request->term;
            $year->active = $request->active;
            $year->create_date = date('Y-m-d H:i:s');
            $year->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'มีข้อมูลนี้แล้ว'
                ]
            );
        }
    }

    public function addbench(Request $request)
    {
        $request->validate([
            'fac_id' => 'required|string',
            'name' => 'required|string',
            'code' => 'required|string',
            'ben_id' => 'required|string'
        ]);

        if ($request->ben_id - 0 != 0) {
            $count = Branch::where('factory_idfactory', $request->fac_id)->where('branchName', 'like', $request->name)->first();
            $co = Branch::where('branchcode', 'like', $request->code)->first();
            $c = Branch::where('branchcode', 'like', $request->code)->count();
            $c += Branch::where('factory_idfactory', $request->fac_id)->where('branchName', 'like', $request->name)->count();
            if (isset($count->idBranch) && $count->idBranch != $request->ben_id && $c > 0 || (isset($co->idBranch) && $co->idBranch != $request->ben_id)) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'มีข้อมูลนี้แล้ว'
                    ]
                );
            } else {
                $ben =  Branch::where('idBranch', $request->ben_id)->first();
                $ben->factory_idfactory = $request->fac_id;
                $ben->branchName = $request->name;
                $ben->branchcode = strtoupper($request->code);
                $ben->update_date = date('Y-m-d H:i:s');
                $ben->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                );
            }
        }

        $count = Branch::where('factory_idfactory', $request->fac_id)->where('branchcode', 'like', $request->code)->count();
        $count += Branch::where('branchcode', 'like', $request->code)->count();
        $count += Branch::where('factory_idfactory', $request->fac_id)->where('branchName', 'like', $request->name)->count();

        if ($count > 0) { //->where('branchName', 'like', $request->name)
            return response()->json(
                [
                    'success' => false,
                    'message' => 'มีข้อมูลนี้แล้ว'
                ]
            );
        } else {

            $ben = new Branch;
            $ben->factory_idfactory = $request->fac_id;
            $ben->branchName = $request->name;
            $ben->branchcode = strtoupper($request->code);
            $ben->create_date = date('Y-m-d H:i:s');
            $ben->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    public function addnews(Request $request)
    {
        $now = new DateTime();
        $request->validate([
            'topic' => 'required',
            'content' => 'required|string',
            'status' => 'required',
            // 'date' => 'required|string',
            'file' => 'nullable',
        ]);

        // echo $request->file; 

        if ($request->hasFile('file')) {
            $filePath = $request->file('file');
            $fileName = $request->file->getClientOriginalName();
            // $fileName = $clientOriginalName;
            // echo $filePath;
            $filePath->move(public_path('/file_photo'), $fileName);
            // Storage::putFileAs('fileNews', $filePath, $fileName);
            // Storage::disk('uploads')->put($fileName,$filePath);
            // $path = $request->file('filetqf')->storeAs('fileTQF', $fileName, 'public');
        } else {
            $fileName = '';
        }

        $count = news::where('idnews', 'like', $request->id)->count();

        if ($count > 0) {
            $news = news::find($request->id);
            $news->topic = $request->topic;
            $news->content = $request->content;
            $news->status = $request->status;
            $news->dateupdate = $now;
            $news->pic = $fileName;
            $news->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        } else {

            $news = new news;
            $news->topic = $request->topic;
            $news->content = $request->content;
            $news->status = $request->status;
            $news->create_date = $now;
            $news->dateupdate = $now;
            $news->pic = $fileName;
            $news->save();
            //$path = $request->file('file')->store('image','public');

            return response()->json(
                [
                    'success' => true,
                    'message' => 'success'
                ]
            );
        }
    }

    function import(Request $request)
    {
        //  $this->validate($request, [
        //   'select_file'  => 'required|mimes:xls,xlsx'
        //  ]);
        //    echo Excel::import(new SubjectImport,$request->file('import_file'));
        Excel::import(new SubjectImport, $request->file('import_file'));
        //     $path = $request->file('import_file')->getRealPath();

        //     $data = Excel::load($path)->get();

        //     if ($data->count() > 0) {
        //         foreach ($data->toArray() as $key => $value) {
        //             foreach ($value as $row) {
        //                 if ($request->sub_groub != null) {

        //                     $checkgroub = GroupStudy::where('groupname', 'like', $row['group'])->count();
        //                     if ($checkgroub <= 0) {
        //                         $groub = new GroupStudy;
        //                         $groub->groupname = $request->sub_groub;
        //                         $groub->save();
        //                     }
        //                     $getgroub = GroupStudy::where('groupname', 'like', $request->sub_groub)->first('groupID');
        //                     $gsub = Subject::where('subjectCode', 'like', $request->sub_id)
        //                         ->where('group_idgroup', 'like', $getgroub['groupID'])
        //                         ->count();
        //                     if ($gsub <= 0) {
        //                         $insert_data[] = [
        //                             'subjectCode'     => $row['subjectCode'],
        //                             'THsubject'    => $row['nameTH'],
        //                             'ENsubject' => $row['nameEN'],
        //                             'group_idgroup' => $getgroub['groupID'],
        //                             'credit' => $row['credit'],
        //                         ];
        //                     }
        //                 }
        //             }

        //             if (!empty($insert_data)) {
        //                 Subject::insert($insert_data);
        //             }
        //         }
        return response()->json(
            [
                'success' => true,
                'message' => 'success'
            ]
        );
        //     }
    }

    public function export_tqf3($year = 0, $date = 0)
    {

        $now = new DateTime();

        $inputDate = changeDateThai($date);
        //  echo $request->get('select_year');
        //    echo  $request->get('select_sub');
        return Excel::download(new TQF3Export($year, $inputDate), formatYearThai($now->format('Y')) . ' ตรวจสอบมคอ.3.xlsx');
    }

    public function export_tqf5($year = 0)
    {
        $now = new DateTime();

        // $inputDate = changeDateThai($date);
        //  echo $request->get('select_year');
        //    echo  $request->get('select_sub');
        return Excel::download(new TQF5Export($year), formatYearThai($now->format('Y')) . '  ตรวจสอบมคอ.5.xlsx');
    }
}
