<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Factory;
use App\Models\GroupStudy;
use App\Models\Level;
use App\Models\News;
use App\Models\Subject;
use App\Models\Users;
use App\Models\Year;
use App\Models\TQF3;
use App\Models\TQF5;
use App\Models\TQF5_2_1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DateTime;
use PDF;
use Response;

class PageController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        //  if (Auth::check()){


        $news = news::orderBy('create_date', 'desc')->where('status', 1)->get();
        // return $news;
        $document = DB::table('document')->get();
        return view('index.content', compact('news', 'document'));
    }

    public function get_test()
    {
        exit;
        $tqf = TQF5::where('group_sub')->limit(10)->get();
        foreach ($tqf as $key => $value) {
            $s = DB::table('subject1')->where('idsubject', $value->subject_idSubject)->first();
            $sub = Subject::where('subjectCode', $s->subjectCode)->first();
            if (!empty($sub)) {
                DB::table('tqf5')
                    ->where('tqf5ID', $value->tqf5ID)
                    ->update(['subject_idSubject' => $sub->idsubject, 'group_sub' => $s->group_idgroup]);
            } else {
                $gsub = Subject::where('subjectCode', 'like', $s->subjectCode)->count();
                if ($gsub == 0) {
                    $sub = new Subject;
                    $sub->subjectCode = $s->subjectCode;
                    $sub->ENsubject = $s->ENsubject;
                    $sub->THsubject = $s->THsubject;
                    $sub->cradit = $s->cradit;
                    $sub->subNumber = $s->subNumber;
                    $sub->create_date = date('Y-m-d H:i:s');
                    $sub->save();
                }
            }
            // echo json_encode($s);
            // echo json_encode($sub);
            echo json_encode($value);
        }
    }

    public function document()
    {
        return view('officer.document');
    }

    public function report(Request $request)
    {

        $year = Year::orderBy('Year', 'desc')->orderBy('term', 'desc')->paginate(20);
        $fac = Factory::has('branch')->orderBy('idfactory', 'desc')->get();
        $branch = Branch::where('branchcode', 'NOT LIKE', '%officer%')->where('branchName', 'NOT LIKE', '%สำนักงาน%')->get();
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        $request->session()->put('data_year', $y_id);
        $date3 = TQF3::where('Year_idYear', $y_id)->whereNotNull('deadline')->orderBy('tqf3ID', 'desc')->first();
        $date5 = TQF5::where('Year_idYear', $y_id)->whereNotNull('deadline')->orderBy('tqf5ID', 'desc')->first();
        foreach ($fac  as $k => $va) {
            foreach ($va->branch as $key => $value) {
                if ($value->branchcode != '' || $value->branchcode != '-') {
                    $g = GroupStudy::where('groupname', 'like', '%' . $value->branchcode . '%')->get();
                    if (count($g) > 0) {
                        foreach ($g as $key => $val) {
                            $t3_not = TQF3::where('tqf3.group_sub', $val->groupID)
                                ->whereNotNull('deadline')->where('tqf3.Year_idYear', $y_id)->whereNotIn('tqf3.status', [0, 3])->count();
                            $t3_done = TQF3::where('tqf3.group_sub', $val->groupID)
                                ->whereNotNull('deadline')->where('tqf3.Year_idYear', $y_id)->whereIn('tqf3.status', [1, 2, 4])->count();
                            $t5_not = TQF5::where('tqf5.group_sub', $val->groupID)
                                ->whereNotNull('deadline')->where('tqf5.Year_idYear', $y_id)->whereNotIn('tqf5.status', [0, 3])->count();
                            $t5_done = TQF5::where('tqf5.group_sub', $val->groupID)
                                ->whereNotNull('deadline')->where('tqf5.Year_idYear', $y_id)->whereIn('tqf5.status', [1, 2, 4])->count();
                            // print_r($t3_done . '</br>');
                            $value->tqf3_done += $t3_done;
                            $value->tqf3_not += $t3_not;
                            $value->tqf5_done += $t5_done;
                            $value->tqf5_not += $t5_not;
                        }
                    } else {
                        $value->tqf3_done = 0;
                        $value->tqf3_not = 0;
                        $value->tqf5_done = 0;
                        $value->tqf5_not = 0;
                    }

                    // print_r($value->branchcode . "  " . $value . '</br>');
                }
            }
        }
        // return json_encode($fac);
        return view('officer/main2', compact('branch', "year", 'y_id', 'date3', 'date5', 'fac'));
    }

    public function tqf(Request $request)
    {
        $data = $request->session()->get('data');
        $news = news::where('status', 1)->orderBy('create_date', 'desc')->get();
        // print_r($branch->toJson());
        if ($data->level_LevelID == "2") { //$value->branchcode . "<br>" . 
            return view('teacher/main')->with('news', $news);
        }
        return view('officer/main')->with([
            // 'name' => $name,
            'news' => $news,
            // 'users' => $users,
        ]);
    }

    public function get_all_term()
    {
        $term = Year::all();
        return json_encode($term);
    }

    public function get_table_user3($id)
    {
        $tqf = TQF3::where('tqf3ID', $id)->first();
        $text = '';
        foreach ($tqf->subuser as $key => $value) {
            $text .=   '<tr data-user="' . $value->userID . '">' .
                '<td>' . $value->Uprefix . $value->UFName . '  ' . $value->ULName . '</td>' .
                '<td>' . (!isset($value->subfac->subBranch->factoryName) ? 'ไม่ระบุ' : $value->subfac->subBranch->factoryName) . '</td>' .
                '<td>' . (!isset($value->subfac->branchName) ? 'ไม่ระบุ' : $value->subfac->branchName) . '</td>';
        }
        echo $text;
    }

    public function get_table_user5($id)
    {
        $tqf = TQF5::where('tqf5ID', $id)->first();
        $text = '';
        foreach ($tqf->subuser as $key => $value) {
            $text .=   '<tr data-user="' . $value->userID . '">' .
                '<td>' . $value->Uprefix . $value->UFName . '  ' . $value->ULName . '</td>' .
                '<td>' . (!isset($value->subfac->subBranch->factoryName) ? 'ไม่ระบุ' : $value->subfac->subBranch->factoryName) . '</td>' .
                '<td>' . (!isset($value->subfac->branchName) ? 'ไม่ระบุ' : $value->subfac->branchName) . '</td>';
        }
        echo $text;
    }

    public function course3(Request $request)
    {
        $id = session()->get('data');
        $now = new DateTime();
        if ($request->session()->has('year')) {
            $y_id = session()->get('year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy('Year', 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        $fac = Branch::where('idBranch', $id->branch_idBranch)->first();
        $fac = Branch::where('branchName', 'NOT LIKE', '%' . 'สำนักงาน' . '%')->where('factory_idfactory', $fac->factory_idfactory)->get();

        $arr = array();
        if ($request->input('year')) {
            $tqf = TQF3::has('subsubject')->where('tqf3.Year_idYear', $request->input('year'))->get();
            // foreach ($fac as $key => $value) {
            //     $tqf = TQF3::has('subsubject')->join('groupstudy', 'tqf3.group_sub', '=', 'groupstudy.groupID')
            //         ->where('tqf3.Year_idYear', $request->input('year'))
            //         ->where('groupstudy.groupname', 'like', '%' . $value->branchcode . '%')->get();
            //     foreach ($tqf as $key => $v) {
            //         array_push($arr, $v);
            //     }
            // }

            $y_id = $request->input('year');
            $request->session()->put('year', $y_id);
        } else {
            $tqf = TQF3::has('subsubject')->where('tqf3.Year_idYear', $y_id)->get();
            // foreach ($fac as $key => $value) {
            //     $tqf = TQF3::has('subsubject')->join('groupstudy', 'tqf3.group_sub', '=', 'groupstudy.groupID')->where('tqf3.Year_idYear', $y_id)
            //         ->where('groupstudy.groupname', 'like', '%' . $value->branchcode . '%')->get()->unique(['tqf3ID']);
            //     foreach ($tqf as $key => $v) {
            //         array_push($arr, $v);
            //     }
            // }
        }
        // return $arr;
        // $tqf = unique_multi_array($arr, 'tqf3ID');
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        // return $id;->where('')
        return view('teacher/course3', compact('year', 'tqf', 'y_id'));
    }

    public function course5(Request $request)
    {
        $now = new DateTime();
        $id = session()->get('data');
        if ($request->session()->has('year')) {
            $y_id = session()->get('year');
            $request->session()->put('year', $y_id);
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy('Year', 'desc')->orderBy('term', 'desc')->first()->idYear;
            $request->session()->put('year', $y_id);
        }
        $fac = Branch::where('idBranch', $id->branch_idBranch)->first();
        $fac = Branch::where('branchName', 'NOT LIKE', '%' . 'สำนักงาน' . '%')->where('factory_idfactory', $fac->factory_idfactory)->get();

        $arr = array();
        if ($request->input('year')) {
            $tqf = TQF5::has('subsubject')->where('tqf5.Year_idYear', $request->input('year'))->get();
            // foreach ($fac as $key => $value) {
            //     $tqf = TQF5::has('subsubject')->join('groupstudy', 'tqf5.group_sub', '=', 'groupstudy.groupID')
            //         ->where('tqf5.Year_idYear', $request->input('year'))
            //         ->where('groupstudy.groupname', 'like', '%' . $value->branchcode . '%')->get()->unique(['tqf5ID']);
            //     foreach ($tqf as $key => $v) {
            //         array_push($arr, $v);
            //     }
            // }

            $y_id = $request->input('year');
            $request->session()->put('year', $y_id);
        } else {
            $tqf = TQF5::has('subsubject')->where('tqf5.Year_idYear', $y_id)->get();
            // foreach ($fac as $key => $value) {
            //     $tqf = TQF5::has('subsubject')->join('groupstudy', 'tqf5.group_sub', '=', 'groupstudy.groupID')->where('tqf5.Year_idYear', $y_id)
            //         ->where('groupstudy.groupname', 'like', '%' . $value->branchcode . '%')->get()->unique(['tqf5ID']);
            //     foreach ($tqf as $key => $v) {
            //         array_push($arr, $v);
            //     }
            // }
        }
        // return $arr;
        // $tqf = unique_multi_array($arr, 'tqf5ID'); 
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        // echo  $y_id;
        // return $request->session()->has('year'). ' '.session()->get('year');
        return view('teacher/course5', compact('year', 'tqf', 'y_id'));
    }

    public function downloadtqf3()
    {
        $sub = Subject::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $tqf = TQF3::has('tqf3_1')->has('tqf3_2')->has('tqf3_3')->has('tqf3_4')->has('tqf3_5')->has('tqf3_6')->has('tqf3_7')->orWhereNotNull('filetqf3')->get();
        return view('index.filetqf3', compact('tqf', 'year', 'sub'));
    }

    public function downloadtqf5()
    {
        $sub = Subject::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $tqf = TQF5::has('tqf5_1')->has('tqf5_2')->has('tqf5_3')->has('tqf5_4')->has('tqf5_5')->has('tqf5_6')->orWhereNotNull('filetqf5')->get();
        return view('index.filetqf5', compact('tqf', 'year', 'sub'));
    }

    public function download_tqf3(Request $request)
    {
        $id = session()->get('data');
        $group = GroupStudy::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $b = Branch::where('idBranch', $id->branch_idBranch)->first();
        if ($request->session()->has('year')) {
            $y_id = session()->get('year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy('Year', 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        if ($request->input('year')) {
            $y_id = $request->input('year');
            $request->session()->put('year', $y_id);
        }

        $tqf = array();
        $out2 = array();
        $out3 = array();
        $out = TQF3::join('user_tqf3', 'tqf3.tqf3ID', '=', 'user_tqf3.tqf3ID')
            // ->has('tqf3_1')->has('tqf3_2')->has('tqf3_3')->has('tqf3_4')->has('tqf3_5')->has('tqf3_6')->has('tqf3_7')
            ->where('tqf3.Year_idYear', $y_id)->where('user_tqf3.userID', $id->userID)->get();
        // return $b;
        if ($b) {
            $out2 = TQF3::join('subject', 'tqf3.subject_idSubject', '=', 'subject.idsubject')
                ->join('groupstudy', 'groupstudy.groupID', '=', 'tqf3.group_sub')
                ->where('groupstudy.groupname', 'like', '%' . $b->branchcode . '%')->where('tqf3.status', 2)
                ->get();
        }
        $out3 = TQF3::join('user_tqf3', 'tqf3.tqf3ID', '=', 'user_tqf3.tqf3ID')
            ->where('tqf3.Year_idYear', $y_id)->where('user_tqf3.userID', $id->userID)->where('tqf3.status', 2)->whereNotNull('filetqf3')->get();

        foreach ($out as $val) {
            if (isset($val->subsubject->subjectCode)) {
                $t = TQF3::where('tqf3.Year_idYear', $y_id)
                    ->join('subject', 'tqf3.subject_idSubject', '=', 'subject.idsubject')
                    ->where('subject.subjectCode', '=', $val->subsubject->subjectCode)->where('tqf3.status', 2)->get();
            }
            foreach ($t as $v) {
                array_push($tqf, $v);
            }
        }

        foreach ($out as $val) {
            if ($val->status == 2) {
                array_push($tqf, $val);
            }

            // }
        }
        foreach ($out3 as $val) {
            array_push($tqf, $val);
            // }
        }
        foreach ($out2 as $val) {
            // $ob = json_decode(json_encode($val), true);
            if ($val->Year_idYear == $y_id) {
                array_push($tqf, $val);
            }
        }

        $tqf = unique_multi_array($tqf, 'tqf3ID');
        // return $tqf;
        return view('teacher.downloadtqf3', compact('tqf', 'year', 'group', 'y_id'));
    }

    public function download_tqf5(Request $request)
    {
        $id = session()->get('data');
        $group = GroupStudy::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $b = Branch::where('idBranch', $id->branch_idBranch)->first();
        if ($request->session()->has('year')) {
            $y_id = session()->get('year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy('Year', 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        if ($request->input('year')) {
            // $tqf = TQF5::where('tqf3.Year_idYear', $request->input('year'))->get();
            $y_id = $request->input('year');
            $request->session()->put('year', $y_id);
        }
        // echo $id->userID;
        $tqf = array();
        $out2 = array();
        $out3 = array();
        $out = TQF5::join('user_tqf5', 'tqf5.tqf5ID', '=', 'user_tqf5.tqf5ID')
            // ->has('tqf5_1')->has('tqf5_2')->has('tqf5_3')->has('tqf5_4')->has('tqf5_5')->has('tqf5_6')
            ->where('user_tqf5.userID', $id->userID)->where('tqf5.Year_idYear', $y_id)->get();
        if ($b) {
            $out2 = TQF5::join('subject', 'tqf5.subject_idSubject', '=', 'subject.idsubject')
                ->join('groupstudy', 'groupstudy.groupID', '=', 'tqf5.group_sub')
                // ->has('tqf5_1')->has('tqf5_2')->has('tqf5_3')->has('tqf5_4')->has('tqf5_5')->has('tqf5_6')
                ->where('groupstudy.groupname', 'like', '%' . $b->branchcode . '%')->where('tqf5.status', 2)
                ->get();
        }
        $out3 = TQF5::join('user_tqf5', 'tqf5.tqf5ID', '=', 'user_tqf5.tqf5ID')
            ->where('tqf5.Year_idYear', $y_id)->where('user_tqf5.userID', $id->userID)->where('tqf5.status', 2)->whereNotNull('filetqf5')->get();
        foreach ($out as $val) {
            if (isset($val->subsubject->subjectCode)) {
                $t = TQF5::where('tqf5.Year_idYear', $y_id)
                    ->join('subject', 'tqf5.subject_idSubject', '=', 'subject.idsubject')
                    // ->has('tqf5_1')->has('tqf5_2')->has('tqf5_3')->has('tqf5_4')->has('tqf5_5')->has('tqf5_6')
                    ->where('subject.subjectCode', '=', $val->subsubject->subjectCode)->where('tqf5.status', 2)->get();
            } // print_r($val->subsubject->subjectCode."\n");
            // print_r($t."\n");
            foreach ($t as $v) {
                array_push($tqf, $v);
            }
        }
        foreach ($out as $val) {
            if ($val->status == 2) {
                array_push($tqf, $val);
            }
        }
        foreach ($out3 as $val) {
            array_push($tqf, $val);
            // }
        }
        foreach ($out2 as $val) {
            // $ob = json_decode(json_encode($val), true);
            if ($val->Year_idYear == $y_id) {
                array_push($tqf, $val);
            }
        }

        $tqf = unique_multi_array($tqf, 'tqf5ID');
        // return $tqf;
        return view('teacher.downloadtqf5', compact('tqf', 'year', 'group', 'y_id'));
    }

    // public function index()
    // {
    //     // if (Auth::check()){
    //     //     $news = news::where('idnews', 1)->first();
    //     // return view('index.content');
    //     // }
    //     return view('login');
    // }
    public function downloadtqf()
    {
        return view('index.tqf');
    }

    public function addfiletqf()
    {
        $sub = Subject::all();
        $group = GroupStudy::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $teach = Users::where('level_LevelID', 2)->get();
        return view('officer.addfiletqf', compact('sub', 'year', 'teach', 'group'));
    }

    public function teacher(Request $request)
    {
        // $session = Users::find(2);
        // $request->session()->put('data', $session);
        $news = news::where('status', 1)->orderBy('create_date', 'desc')->get();
        return view('teacher/main')->with('news', $news);
    }

    public function tqf3(Request $request)
    {
        $now = new DateTime();
        // echo $now->format('Y-m-d');
        $id = session()->get('data');
        // if ($id->userID == 14) { 
        //     $id->userID = 2;
        // }
        if ($request->input('year', '') == '') {
            if ($request->session()->has('year')) {
                $y_id = session()->get('year');
            } else {
                $y_id = Year::orderBy('active', 'desc')->orderBy('Year', 'desc')->orderBy('term', 'desc')->first()->idYear;
            }
            $tqf = TQF3::has('subsubject')->join('user_tqf3', 'tqf3.tqf3ID', '=', 'user_tqf3.tqf3ID')->where('user_tqf3.userID', $id->userID)->where('tqf3.Year_idYear', $y_id)->whereNotNull('deadline')->get()->unique('tqf3ID');
        } else {
            $y_id = $request->input('year');
            $request->session()->put('year', $y_id);
            $tqf = TQF3::has('subsubject')->join('user_tqf3', 'tqf3.tqf3ID', '=', 'user_tqf3.tqf3ID')->where('user_tqf3.userID', $id->userID)->where('tqf3.Year_idYear', $request->input('year'))->whereNotNull('deadline')->get()->unique('tqf3ID');
        }

        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        return view('teacher/tqf3', compact('year', 'tqf', 'y_id', 'now'));
    }

    public function tqf5(Request $request)
    {
        $now = new DateTime();
        $id = session()->get('data');
        // if ($id->userID == 14) {
        //     $id->userID = 2;
        // }
        if ($request->input('year', '') == '') {
            if ($request->session()->has('year')) {
                $y_id = session()->get('year');
            } else {
                $y_id = Year::orderBy('active', 'desc')->orderBy('Year', 'desc')->orderBy('term', 'desc')->first()->idYear;
            }
            $tqf = TQF5::has('subsubject')->join('user_tqf5', 'tqf5.tqf5ID', '=', 'user_tqf5.tqf5ID')->where('user_tqf5.userID', $id->userID)->where('tqf5.Year_idYear', $y_id)->whereNotNull('deadline')->get()->unique('tqf5ID');
        } else {
            $tqf = TQF5::has('subsubject')->join('user_tqf5', 'tqf5.tqf5ID', '=', 'user_tqf5.tqf5ID')->where('user_tqf5.userID', $id->userID)->where('tqf5.Year_idYear', $request->input('year'))->whereNotNull('deadline')->get()->unique('tqf5ID');
            $y_id = $request->input('year');
            $request->session()->put('year', $y_id);
        }

        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        return view('teacher/tqf5', compact('year', 'tqf', 'y_id', 'now'));
    }

    public function showtqf3($id, Request $request)
    {
        $course = DB::table('course')->get();

        if (count($request->all()) > 1) {
            // dd($request->all());
            $tqf = TQF3::where('Year_idYear', $request->year)->where('subject_idSubject', $request->sub)->first();
            $tqf->tqf3_1 = $tqf->tqf3_1;
            $tqf->tqf3_2 = $tqf->tqf3_2;
            $tqf->tqf3_3 = $tqf->tqf3_3;
            $tqf->tqf3_4 = $tqf->tqf3_4;
            $tqf->tqf3_6 = $tqf->tqf3_6;
            $tqf->tqf3_7 = $tqf->tqf3_7;
            if (isset($tqf->tqf3_4)) {
                $tqf->tqf3_4->morality = json_decode(unserialize($tqf->tqf3_4->morality));
                $tqf->tqf3_4->morality2 = json_decode(unserialize($tqf->tqf3_4->morality2));
                $tqf->tqf3_4->morality3 = json_decode(unserialize($tqf->tqf3_4->morality3));
                $tqf->tqf3_4->knowledge = json_decode(unserialize($tqf->tqf3_4->knowledge));
                $tqf->tqf3_4->knowledge2 = json_decode(unserialize($tqf->tqf3_4->knowledge2));
                $tqf->tqf3_4->knowledge3 = json_decode(unserialize($tqf->tqf3_4->knowledge3));
                $tqf->tqf3_4->intel_skill = json_decode(unserialize($tqf->tqf3_4->intel_skill));
                $tqf->tqf3_4->intel_skill2 = json_decode(unserialize($tqf->tqf3_4->intel_skill2));
                $tqf->tqf3_4->intel_skill3 = json_decode(unserialize($tqf->tqf3_4->intel_skill3));
                $tqf->tqf3_4->respon_skill = json_decode(unserialize($tqf->tqf3_4->respon_skill));
                $tqf->tqf3_4->respon_skill2 = json_decode(unserialize($tqf->tqf3_4->respon_skill2));
                $tqf->tqf3_4->respon_skill3 = json_decode(unserialize($tqf->tqf3_4->respon_skill3));
                $tqf->tqf3_4->num_skill = json_decode(unserialize($tqf->tqf3_4->num_skill));
                $tqf->tqf3_4->num_skill2 = json_decode(unserialize($tqf->tqf3_4->num_skill2));
                $tqf->tqf3_4->num_skill3 = json_decode(unserialize($tqf->tqf3_4->num_skill3));
            }
            if (isset($tqf->tqf3_5)) {
                if ($tqf->tqf3_5->data1 != '') {
                    $tqf->tqf3_5->data1 = unserialize($tqf->tqf3_5->data1);
                    $tqf->tqf3_5->data1 = json_decode($tqf->tqf3_5->data1);
                }
                if ($tqf->tqf3_5->data2 != '') {
                    $tqf->tqf3_5->data2 = unserialize($tqf->tqf3_5->data2);
                    $tqf->tqf3_5->data2 = json_decode($tqf->tqf3_5->data2);
                }
            }
            $tqf->course = $course;
            // dd($tqf->course);

            $tqf->tqf3ID = $request->idtqf3;
            $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
            //            return $tqf;
            return view('teacher/addtqf3', compact('tqf', 'year'));
            // return [$tqf, $request->all()];
        }

        $tqf = TQF3::where('tqf3ID', $id)->first();
        //        if ($tqf->send_file == 1 && $tqf->status != 2) {
        //            $tqf = TQF3::find($id);
        //            $tqf->send_file = 0;
        //            $tqf->status = 4;
        //            $tqf->save();
        //        }
        // if ($tqf->status == 0 || $tqf->status == 3) {
        //     $tqf = TQF3::find($id);
        //     $tqf->status = 4;
        //     $tqf->save();
        // }
        $tqf->course = $course;
        if (isset($tqf->tqf3_4)) {
            $tqf->tqf3_4->morality = json_decode(unserialize($tqf->tqf3_4->morality));
            $tqf->tqf3_4->morality2 = json_decode(unserialize($tqf->tqf3_4->morality2));
            $tqf->tqf3_4->morality3 = json_decode(unserialize($tqf->tqf3_4->morality3));
            $tqf->tqf3_4->knowledge = json_decode(unserialize($tqf->tqf3_4->knowledge));
            $tqf->tqf3_4->knowledge2 = json_decode(unserialize($tqf->tqf3_4->knowledge2));
            $tqf->tqf3_4->knowledge3 = json_decode(unserialize($tqf->tqf3_4->knowledge3));
            $tqf->tqf3_4->intel_skill = json_decode(unserialize($tqf->tqf3_4->intel_skill));
            $tqf->tqf3_4->intel_skill2 = json_decode(unserialize($tqf->tqf3_4->intel_skill2));
            $tqf->tqf3_4->intel_skill3 = json_decode(unserialize($tqf->tqf3_4->intel_skill3));
            $tqf->tqf3_4->respon_skill = json_decode(unserialize($tqf->tqf3_4->respon_skill));
            $tqf->tqf3_4->respon_skill2 = json_decode(unserialize($tqf->tqf3_4->respon_skill2));
            $tqf->tqf3_4->respon_skill3 = json_decode(unserialize($tqf->tqf3_4->respon_skill3));
            $tqf->tqf3_4->num_skill = json_decode(unserialize($tqf->tqf3_4->num_skill));
            $tqf->tqf3_4->num_skill2 = json_decode(unserialize($tqf->tqf3_4->num_skill2));
            $tqf->tqf3_4->num_skill3 = json_decode(unserialize($tqf->tqf3_4->num_skill3));
        }
        if ($tqf->tqf3_5 != '') {
            if ($tqf->tqf3_5->data1 != '') {
                $tqf->tqf3_5->data1 = unserialize($tqf->tqf3_5->data1);
                $tqf->tqf3_5->data1 = json_decode($tqf->tqf3_5->data1);
            }
            if ($tqf->tqf3_5->data2 != '') {
                $tqf->tqf3_5->data2 = unserialize($tqf->tqf3_5->data2);
                $tqf->tqf3_5->data2 = json_decode($tqf->tqf3_5->data2);
            }
        }
        $now = new DateTime();
        // return strtotime($now->format("Y-m-d"));
        $tqf->date = false;
        if (strtotime($now->format("Y-m-d")) > strtotime($tqf->deadline)) {
            $tqf->date = true;
        }

        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        return view('teacher/addtqf3', compact('tqf', 'year'));
    }

    public function showtqf5($id, Request $request)
    {
        $course = DB::table('course')->get();

        if (count($request->all()) > 1) {
            // dd($request->all());
            $tqf = TQF5::where('Year_idYear', $request->year)->where('subject_idSubject', $request->sub)->first();
            $tqf->tqf5_1 = $tqf->tqf5_1;
            $tqf->tqf5_4 = $tqf->tqf5_4;
            $tqf->tqf5_6 = $tqf->tqf5_6;
            $tqf->tqf5_7 = $tqf->tqf5_7;
            if ($tqf->tqf5_2 != '') {
                if ($tqf->tqf5_2->data1_1 != '') {
                    $tqf->tqf5_2->data1_1 = unserialize($tqf->tqf5_2->data1_1);
                    $tqf->tqf5_2->data1_1 = json_decode($tqf->tqf5_2->data1_1);
                }
                if ($tqf->tqf5_2->data1_2 != '') {
                    $tqf->tqf5_2->data1_2 = unserialize($tqf->tqf5_2->data1_2);
                    $tqf->tqf5_2->data1_2 = json_decode($tqf->tqf5_2->data1_2);
                }
            }
            if ($tqf->tqf5_3 != '') {
                $tqf->tqf5_3->detail6_1 = json_decode($tqf->tqf5_3->detail6_1, true);
                $tqf->tqf5_3->detail6_2 = json_decode($tqf->tqf5_3->detail6_2, true);
                $tqf->tqf5_3->detail7 = json_decode($tqf->tqf5_3->detail7, true);
                $tqf->tqf5_3->grade = unserialize($tqf->tqf5_3->grade);
                $tqf->tqf5_3->grade = json_decode($tqf->tqf5_3->grade);
            }
            $tqf->course = $course;
            $tqf->tqf3ID = $request->idtqf5;
            $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
            return view('teacher/addtqf5', compact('tqf', 'year'));
            // return [$tqf, $request->all()];
        }

        $tqf = TQF5::where('tqf5ID', $id)->first();
        //        if ($tqf->send_file == 1 && $tqf->status != 2) {
        //            $tqf = TQF5::find($id);
        //            $tqf->send_file = 0;
        //            $tqf->status = 4;
        //            $tqf->save();
        //        }
        // if ($tqf->status == 0 || $tqf->status == 3) {
        //     $tqf = TQF5::find($id);
        //     $tqf->status = 4;
        //     $tqf->save();
        // }
        if ($tqf->tqf5_2 != '') {
            if ($tqf->tqf5_2->data1_1 != '') {
                $tqf->tqf5_2->data1_1 = unserialize($tqf->tqf5_2->data1_1);
                $tqf->tqf5_2->data1_1 = json_decode($tqf->tqf5_2->data1_1);
            }
            if ($tqf->tqf5_2->data1_2 != '') {
                $tqf->tqf5_2->data1_2 = unserialize($tqf->tqf5_2->data1_2);
                $tqf->tqf5_2->data1_2 = json_decode($tqf->tqf5_2->data1_2);
            }
        }
        if ($tqf->tqf5_3 != '') {
            $tqf->tqf5_3->detail6_1 = json_decode($tqf->tqf5_3->detail6_1, true);
            $tqf->tqf5_3->detail6_2 = json_decode($tqf->tqf5_3->detail6_2, true);
            $tqf->tqf5_3->detail7 = json_decode($tqf->tqf5_3->detail7, true);
            $tqf->tqf5_3->grade = unserialize($tqf->tqf5_3->grade);
            $tqf->tqf5_3->grade = json_decode($tqf->tqf5_3->grade);
        }
        // $count21 = TQF5_2_1::where('tqf5_tqf5ID', $id)->count();
        // if ($count21 > 0) {
        //     $tqf->tqf5_2_1 = TQF5_2_1::where('tqf5_tqf5ID', $id)->get();
        // }
        $now = new DateTime();
        $tqf->date = false;
        if (strtotime($tqf->deadline) < strtotime($now->format("Y-m-d"))) {
            $tqf->date = true;
        }
        $tqf->course = $course;
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        //        return $tqf;
        return view('teacher/addtqf5', compact('tqf', 'year'));
    }

    public function officer(Request $request)
    {
        // $session = Users::find(1);
        // $request->session()->put('data', $session);
        // $name = users::all();
        // $users = Users::all();
        $news = news::where('status', 1)->orderBy('create_date', 'desc')->get();
        return view('officer/main')->with([
            // 'name' => $name,
            'news' => $news,
            // 'users' => $users,
        ]);
    }

    public function user(Request $request)
    {
        $level = Level::all();
        $fac = Factory::all();
        $ben = Branch::all();
        $data = Users::orderBy("Uprefix", 'asc')->orderBy("UFName", 'asc')->paginate(20);
        $form = 'user';
        if ($request->input('search') || $request->input('fac') || $request->input('branch') || $request->input('level')) {
            $value = $request->input('search');
            $data = Users::join('branch', 'branch.idBranch', '=', 'users.branch_idBranch')
                ->join('factory', 'factory.idfactory', '=', 'branch.factory_idfactory')
                ->orderBy("Uprefix", 'asc')->orderBy("UFName", 'asc');
            if ($request->input('fac')) {
                $data =  $data->where('factory.idfactory', $request->input('fac'));
            }
            if ($request->input('level')) {
                $data =  $data->where('users.level_LevelID',   $request->input('level'));
            }
            if ($request->input('branch')) {
                $data =  $data->where('users.branch_idBranch', $request->input('branch'));
            }
            $data =  $data->where(DB::Raw("CONCAT(users.Uprefix, users.UFName, ' ', users.ULName)"), 'LIKE', '%' . $value . '%')
                ->paginate(20)->appends(['search' => $request->input('search'), 'branch' => $request->input('branch'), 'fac' => $request->input('fac'), 'level' => $request->input('level')]);
            // return $data;
            return view('officer/edittqf', compact('data', 'form'));
        }
        if ($request->ajax()) {
            return view('officer/edittqf', compact('data', 'form'));
        }
        return view('officer/user', compact('data', 'form', 'level', 'fac', 'ben'));
    }

    public function addterm(Request $request)
    {
        $data = Year::orderBy('Year', 'desc')->orderBy('term', 'desc')->paginate(20);
        $form = "year";
        if ($request->input('search')) {
            $value = $request->input('search');
            $data = Year::orderBy('Year', 'desc')->orderBy('term', 'desc')
                ->orWhere('term', 'LIKE', '%' . $value . '%')
                ->orWhere('Year', 'LIKE', '%' . $value . '%')->paginate(20)->appends(['search' => $request->input('search')]);
            // return $data;
            return view('officer/edittqf', compact('data', 'form'));
        }
        if ($request->ajax()) {
            return view('officer/edittqf', compact('data', 'form'));
        }
        // return $sub;
        return view('officer/addterm', compact('data', 'form'));
        // return view('officer/addterm', compact('data'));
    }

    public function addfac()
    {
        $fac = factory::all();
        return view('officer/addfac', compact('fac'));
    }

    public function addgroup(Request $request)
    {
        $data = GroupStudy::orderBy('groupname', 'asc')->paginate(20);
        $form  = 'group';
        if ($request->input('search')) {
            $value = $request->input('search');
            $data = GroupStudy::orderBy('groupname', 'asc')
                ->orWhere('groupname', 'LIKE', '%' . $value . '%')->paginate(20)->appends(['search' => $request->input('search')]);
            // return $data;
            return view('officer/edittqf', compact('data', 'form'));
        }
        if ($request->ajax()) {
            return view('officer/edittqf', compact('data', 'form'));
        }
        // return $sub;
        return view('officer/addgroup', compact('data', 'form'));
    }

    public function addben()
    {
        $items = factory::all();
        $data = Branch::all();
        return view('officer/addben', compact('items', 'data'));
    }

    public function addtqf3()
    {
        $sub = Subject::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $teach = Users::where('level_LevelID', 2)->get();
        $date = TQF3::orderBy('tqf3ID', 'desc')->whereNotNull('deadline')->first();
        return view('officer/addtqf3', compact('sub', 'year', 'teach', 'date'));
    }

    public function addtqf5()
    {
        $sub = Subject::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $teach = Users::where('level_LevelID', 2)->get();
        $date = TQF5::orderBy('tqf5ID', 'desc')->whereNotNull('deadline')->first();
        return view('officer/addtqf5', compact('sub', 'year', 'teach', 'date'));
    }

    public function add_many_tqf3(Request $request)
    {
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }

        $date = TQF3::orderBy('tqf3ID', 'desc')->whereNotNull('deadline')->first();
        $group = GroupStudy::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $data = TQF3::has('subsubject')->where('Year_idYear', $y_id)->get();
        if ($request->input('year')) {
            return view('officer/manytqf', compact('data'));
        }
        $request->session()->put('data_year', $y_id);
        return view('officer/addmanytqf3', compact('data', 'group', 'year', 'date'));
    }

    public function add_many_tqf5(Request $request)
    {
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }

        $date = TQF5::orderBy('tqf5ID', 'desc')->whereNotNull('deadline')->first();
        $group = GroupStudy::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $data = TQF5::has('subsubject')->where('Year_idYear', $y_id)->get();
        if ($request->input('year')) {
            return view('officer/manytqf', compact('data'));
        }
        $request->session()->put('data_year', $y_id);
        return view('officer/addmanytqf5', compact('data', 'group', 'year', 'date'));
    }

    public function addsub(Request $request)
    {
        $data = Subject::orderBy('subjectCode', 'asc')->paginate(20);
        $sub = Subject::get();
        $group = GroupStudy::distinct('groupname')->get();
        $course = DB::table('course')->get();
        // $course = json_decode(json_encode($get_data));
        $form = "subject";
        if ($request->input('search')) {
            $value = $request->input('search');
            $data = Subject::orderBy('subject.idsubject', 'desc')
                // ->orWhere('groupstudy.groupname', 'LIKE', '%' . $value . '%')
                ->orWhere('subject.subjectCode', 'LIKE', '%' . $value . '%')
                ->orWhere('subject.THsubject', 'LIKE', '%' . $value . '%')
                ->orWhere('subject.cradit', 'LIKE', '%' . $value . '%')->paginate(20)->appends(['search' => $request->input('search')]);
            // return $data;
            return view('officer/edittqf', compact('data', 'form', 'sub', 'group'));
        }
        if ($request->ajax()) {
            return view('officer/edittqf', compact('data', 'form', 'sub', 'group'));
        }
        // return $sub;
        return view('officer/addsub', compact('data', 'course', 'form', 'sub', 'group'));
    }

    public function addcourse()
    {
        // $group = GroupStudy::all();has('subject')->
        $group = GroupStudy::doesntHave('group_course')->get();
        $course = Course::all();
        // $course = json_decode(json_encode($get_group));
        return view('officer/addcourse', compact('group', 'course'));
    }

    public function checktqf3(Request $request)
    {
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        $request->session()->put('data_year', $y_id);
        $form = 'tqf3';
        $group = GroupStudy::orderBy('groupname', 'asc')->get();
        $branch = Branch::where('branchcode', 'NOT LIKE', '%officer%')->where('branchName', 'NOT LIKE', 'สำนักงาน')->get();
        $teach = Users::where('level_LevelID', 2)->get();
        foreach ($group as $key => $value) {
            foreach ($branch as $val) {
                if ($val->branchcode != '') {
                    $pos = strpos($value->groupname, $val->branchcode);
                    if ($pos !== FALSE) {
                        $value->name = $val->branchName;
                    }
                }
            }
        }
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        // $data = TQF3::has('subsubject')->orderBy('tqf3ID', 'desc')->get();
        $data = TQF3::has('subsubject')->join('subject', 'subject.idsubject', '=', 'tqf3.subject_idSubject')
            ->join('groupstudy', 'groupstudy.groupID', '=', 'tqf3.group_sub')
            ->where('Year_idYear', 'like', $y_id);

        if ($request->input('group')) {
            $data = $data->where('tqf3.group_sub', 'like', $request->input('group'));
        }
        if ($request->input('user')) {
            $data = $data->whereHas('subuser', function ($query) use ($request) {
                $query->where(DB::Raw("CONCAT(users.Uprefix, users.UFName, ' ', users.ULName)"), 'LIKE', '%' . $request->input('user') . '%');
            });
        }
        if ($request->input('branch')) {
            $b = Branch::where('idBranch', $request->input('branch'))->first();
            if ($b->branchcode != '') {
                $data = $data->where('groupstudy.groupname', 'like', '%' . $b->branchcode . '%');
            } else {
                $data = $data->where('groupstudy.groupname', 'like', '<<');
            }
        }

        $data = $data->paginate(10)->appends(['group' => $request->input('group'), 'year' => $y_id]);
        // return $data;
        if ($request->ajax()) {
            return view('officer/checktqf', compact('data', 'branch', 'teach', 'group', 'year', 'y_id', 'form'));
        } // return $data->toSql();
        return view('officer/checktqf3', compact('data', 'branch', 'teach', 'group', 'year', 'y_id', 'form'));
    }

    public function checktqf5(Request $request)
    {
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        $request->session()->put('data_year', $y_id);
        $form = 'tqf5';
        $group = GroupStudy::orderBy('groupname', 'asc')->get();
        $branch = Branch::where('branchcode', 'NOT LIKE', '%officer%')->where('branchName', 'NOT LIKE',  '%สำนักงาน%')->get();
        $teach = Users::where('level_LevelID', 2)->get();
        foreach ($group as $key => $value) {
            foreach ($branch as $val) {
                if ($val->branchcode != '') {
                    $pos = strpos($value->groupname, $val->branchcode);
                    if ($pos !== FALSE) {
                        $value->name = $val->branchName;
                    }
                }
            }
        }
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        // $data = TQF5::has('subsubject')->orderBy('tqf5ID', 'desc')->get();
        $data = TQF5::has('subsubject')->join('subject', 'subject.idsubject', '=', 'tqf5.subject_idSubject')
            ->join('groupstudy', 'groupstudy.groupID', '=', 'tqf5.group_sub')
            ->where('Year_idYear', 'like', $y_id);

        if ($request->input('group')) {
            $data = $data->where('tqf5.group_sub', 'like', $request->input('group'));
        }
        if ($request->input('user')) {
            $data = $data->whereHas('subuser', function ($query) use ($request) {
                $query->where('user_tqf5.userID', $request->input('user'));
            });
        }
        if ($request->input('branch')) {
            $b = Branch::where('idBranch', $request->input('branch'))->first();
            $data = $data->where('groupstudy.groupname', 'like', '%' . $b->branchcode . '%');
        }

        $data = $data->paginate(10)->appends(['group' => $request->input('group'), 'year' => $y_id]);
        // return $data->toSql();
        if ($request->ajax()) {
            return view('officer/checktqf', compact('data', 'branch', 'teach', 'group', 'year', 'y_id', 'form'));
        } // return $data->toSql();
        return view('officer/checktqf5', compact('data', 'branch', 'teach', 'group', 'year', 'y_id', 'form'));
    }

    public function edittqf3(Request $request)
    {
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        $date = TQF3::orderBy('tqf3ID', 'desc')->whereNotNull('deadline')->first();
        $request->session()->put('data_year', $y_id);
        $data = TQF3::has('subsubject')->where('Year_idYear', $y_id)->orderBy('tqf3ID', 'desc')->paginate(20)->appends(['year' => $request->input('year')]);
        $teacher = Users::where('level_LevelID', 2)->get();
        $sub = Subject::all();
        $group = GroupStudy::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $form = 'edit3';
        if ($request->input('search')) {
            $value = $request->input('search');
            $data = TQF3::has('subsubject')->join('subject', 'tqf3.subject_idSubject', '=', 'subject.idsubject')
                ->join('year', 'tqf3.Year_idYear', '=', 'year.idYear')
                ->rightJoin('user_tqf3', 'tqf3.tqf3ID', '=', 'user_tqf3.tqf3ID')
                ->join('users', 'users.userID', '=', 'user_tqf3.userID')
                ->join('groupstudy', 'groupstudy.groupID', '=', 'tqf3.group_sub')
                ->orderBy('tqf3.tqf3ID', 'desc')
                ->where(function ($query) use ($value) {
                    $query->where(DB::Raw("CONCAT(year.term, '/', year.Year)"), 'LIKE', '%' . $value . '%')
                        ->orWhere('subject.THsubject', 'LIKE', '%' . $value . '%')
                        ->orWhere('subject.subjectCode', 'LIKE', '%' . $value . '%')
                        ->orWhere(DB::Raw("CONCAT(users.Uprefix, users.UFName, ' ', users.ULName)"), 'LIKE', '%' . $value . '%')
                        ->orWhere('groupstudy.groupname', 'LIKE', '%' . $value . '%')
                        ->orWhere('tqf3.deadline', 'LIKE', '%' . $value . '%');
                })->where('tqf3.Year_idYear',  $y_id)->paginate(20)->appends(['search' => $request->input('search'), 'year' => $request->input('year')]);
            // return $data;
            return view('officer/edittqf', compact('data', 'form', 'teacher', 'sub', 'year', 'y_id', 'date', 'group'));
        }
        if ($request->ajax()) {
            return view('officer/edittqf', compact('data', 'form', 'teacher', 'sub', 'year', 'y_id', 'date', 'group'));
        }
        return view('officer/edittqf3', compact('data', 'form', 'teacher', 'sub', 'year', 'y_id', 'date', 'group'));
    }

    public function edittqf5(Request $request)
    {
        if ($request->input('year')) {
            $y_id = $request->input('year');
        } else if ($request->session()->has('data_year')) {
            $y_id = $request->session()->get('data_year');
        } else {
            $y_id = Year::orderBy('active', 'desc')->orderBy("Year", 'desc')->orderBy('term', 'desc')->first()->idYear;
        }
        $date = TQF3::orderBy('tqf3ID', 'desc')->whereNotNull('deadline')->first();
        $request->session()->put('data_year', $y_id);
        $data = TQF5::has('subsubject')->where('Year_idYear', $y_id)->orderBy('tqf5ID', 'desc')->paginate(20)->appends(['year' => $request->input('year')]);
        $teacher = Users::where('level_LevelID', 2)->get();
        $sub = Subject::all();
        $year = Year::orderBy("Year", 'desc')->orderBy('term', 'desc')->limit(10)->get();
        $group = GroupStudy::all();
        $form = 'edit5';
        if ($request->input('search')) {
            $value = $request->input('search');
            $data = TQF5::has('subsubject')->join('subject', 'tqf5.subject_idSubject', '=', 'subject.idsubject')
                ->with('subuser')
                ->join('year', 'tqf5.Year_idYear', '=', 'year.idYear')
                ->rightJoin('user_tqf5', 'tqf5.tqf5ID', '=', 'user_tqf5.tqf5ID')
                ->join('users', 'users.userID', '=', 'user_tqf5.userID')
                ->join('groupstudy', 'groupstudy.groupID', '=', 'subject.group_idgroup')
                ->orderBy('tqf5.tqf5ID', 'desc')
                ->where(function ($query) use ($value) {
                    $query->where(DB::Raw("CONCAT(year.term, '/', year.Year)"), 'LIKE', '%' . $value . '%')
                        ->orWhere('subject.THsubject', 'LIKE', '%' . $value . '%')
                        ->orWhere('subject.subjectCode', 'LIKE', '%' . $value . '%')
                        ->orWhere(DB::Raw("CONCAT(users.Uprefix, users.UFName, ' ', users.ULName)"), 'LIKE', '%' . $value . '%')
                        ->orWhere('groupstudy.groupname', 'LIKE', '%' . $value . '%')
                        ->orWhere('tqf5.deadline', 'LIKE', '%' . $value . '%');
                })->where('tqf5.Year_idYear', $y_id)->paginate(20)->appends(['search' => $request->input('search'), 'year' => $request->input('year')]);
            // return $data;
            return view('officer/edittqf', compact('data', 'form', 'teacher', 'sub', 'year', 'y_id', 'date', 'group'));
        }
        if ($request->ajax()) {
            return view('officer/edittqf', compact('data', 'form', 'teacher', 'sub', 'year', 'y_id', 'date', 'group'));
        }
        return view('officer/edittqf5', compact('data', 'form', 'teacher', 'sub', 'year', 'y_id', 'date', 'group'));
    }

    public function news()
    {
        $news = News::orderBy('create_date', 'desc')->get();
        return view('officer/news', compact('news'));
    }

    public function check_form_tqf31($id)
    {
        $tqf = TQF3::where('tqf3ID', $id)->first();
        if ($tqf->tqf3_5 != '') {
            if ($tqf->tqf3_5->data1 != '') {
                $tqf->tqf3_5->data1 = unserialize($tqf->tqf3_5->data1);
                $tqf->tqf3_5->data1 = json_decode($tqf->tqf3_5->data1);
            }
            if ($tqf->tqf3_5->data2 != '') {
                $tqf->tqf3_5->data2 = unserialize($tqf->tqf3_5->data2);
                $tqf->tqf3_5->data2 = json_decode($tqf->tqf3_5->data2);
            }
        }
        $pdf = PDF::loadView('officer/checkformtqf3', compact('tqf'));
        return $pdf->stream('document.pdf');
        // return view('officer/checkformtqf3', compact('tqf'));
    }

    public function check_form_tqf3($id)
    {
        $tqf = TQF3::where('tqf3ID', $id)->first();
        if ($tqf->filetqf3 != '' && $tqf->send_file == 1) {
            $path = storage_path('app/fileTQF/' . $tqf->filetqf3);
            $url = Storage::url('app/fileTQF/' . $tqf->filetqf3);
            // return response()->file($path);
            return Storage::response('fileTQF/' . $tqf->filetqf3);
            // return $path;
        }
        if (isset($tqf->tqf3_4)) {
            $tqf->tqf3_4->morality = json_decode(unserialize($tqf->tqf3_4->morality));
            $tqf->tqf3_4->morality2 = json_decode(unserialize($tqf->tqf3_4->morality2));
            $tqf->tqf3_4->morality3 = json_decode(unserialize($tqf->tqf3_4->morality3));
            $tqf->tqf3_4->knowledge = json_decode(unserialize($tqf->tqf3_4->knowledge));
            $tqf->tqf3_4->knowledge2 = json_decode(unserialize($tqf->tqf3_4->knowledge2));
            $tqf->tqf3_4->knowledge3 = json_decode(unserialize($tqf->tqf3_4->knowledge3));
            $tqf->tqf3_4->intel_skill = json_decode(unserialize($tqf->tqf3_4->intel_skill));
            $tqf->tqf3_4->intel_skill2 = json_decode(unserialize($tqf->tqf3_4->intel_skill2));
            $tqf->tqf3_4->intel_skill3 = json_decode(unserialize($tqf->tqf3_4->intel_skill3));
            $tqf->tqf3_4->respon_skill = json_decode(unserialize($tqf->tqf3_4->respon_skill));
            $tqf->tqf3_4->respon_skill2 = json_decode(unserialize($tqf->tqf3_4->respon_skill2));
            $tqf->tqf3_4->respon_skill3 = json_decode(unserialize($tqf->tqf3_4->respon_skill3));
            $tqf->tqf3_4->num_skill = json_decode(unserialize($tqf->tqf3_4->num_skill));
            $tqf->tqf3_4->num_skill2 = json_decode(unserialize($tqf->tqf3_4->num_skill2));
            $tqf->tqf3_4->num_skill3 = json_decode(unserialize($tqf->tqf3_4->num_skill3));
        }
        if ($tqf->tqf3_5 != '') {
            if ($tqf->tqf3_5->data1 != '') {
                $tqf->tqf3_5->data1 = unserialize($tqf->tqf3_5->data1);
                $tqf->tqf3_5->data1 = json_decode($tqf->tqf3_5->data1);
            }
            if ($tqf->tqf3_5->data2 != '') {
                $tqf->tqf3_5->data2 = unserialize($tqf->tqf3_5->data2);
                $tqf->tqf3_5->data2 = json_decode($tqf->tqf3_5->data2);
            }
        }
        $branch = Branch::all();
        foreach ($branch as $val) {
            if ($val->branchcode != '') {
                if (strpos($tqf->group->groupname, $val->branchcode) !== false) {
                    $tqf->branchName = $val->branchName;
                }
            }
        }

        $name_file = $tqf->subyear->term . '_' . $tqf->subyear->Year . ' ' . (isset($tqf->subsubject->subjectCode) ? $tqf->subsubject->subjectCode : '') . '_' . (isset($tqf->subsubject->THsubject) ? $tqf->subsubject->THsubject : '') . '.pdf';
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'fontdata' => $fontData + [
                'thsarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNewItalic.ttf',
                    'B' =>  'THSarabunNewBold.ttf',
                    'BI' => "THSarabunNewBoldItalic.ttf",
                ]
            ],
        ]);
        $mpdf->WriteHTML(\View::make('report/checkformtqf3', compact('tqf'))->render());
        return $mpdf->Output($name_file, 'I');
        // return $name_file;
    }

    public function check_form_tqf51($id)
    {
        $tqf = TQF5::where('tqf5ID', $id)->first();

        if ($tqf->tqf5_2 != '') {
            if ($tqf->tqf5_2->data1_1 != '') {
                $tqf->tqf5_2->data1_1 = unserialize($tqf->tqf5_2->data1_1);
                $tqf->tqf5_2->data1_1 = json_decode($tqf->tqf5_2->data1_1);
            }
            if ($tqf->tqf5_2->data1_2 != '') {
                $tqf->tqf5_2->data1_2 = unserialize($tqf->tqf5_2->data1_2);
                $tqf->tqf5_2->data1_2 = json_decode($tqf->tqf5_2->data1_2);
            }
        }
        if ($tqf->tqf5_3 != '') {
            $tqf->tqf5_3->detail6_1 = json_decode($tqf->tqf5_3->detail6_1, true);
            $tqf->tqf5_3->detail6_2 = json_decode($tqf->tqf5_3->detail6_2, true);
            $tqf->tqf5_3->detail7 = json_decode($tqf->tqf5_3->detail7, true);
            $tqf->tqf5_3->grade = unserialize($tqf->tqf5_3->grade);
            $tqf->tqf5_3->grade = json_decode($tqf->tqf5_3->grade);
        }

        // //     foreach ($tqf as $object){
        // //         $object = str_replace('\n','<br/>', $object);
        // //         //then I would call a function to render my rss
        // //         $tqf =$object;
        // // }
        // echo $tqf->tqf5_1;
        // view('officer/checkformtqf5', compact('tqf'));
        $pdf = PDF::loadView('report/checkformtqf5', compact('tqf'));
        $pdf->shrink_tables_to_fit = 1;
        return $pdf->stream('document.pdf');
        // return view('officer/checkformtqf5', compact('tqf'));
    }

    public function check_form_tqf5($id)
    {
        $tqf = TQF5::where('tqf5ID', $id)->first();

        if ($tqf->filetqf5 != '' && $tqf->send_file == 1) {
            $path = storage_path('app/fileTQF/' . $tqf->filetqf5);
            // $name = explode("-", $tqf->filetqf3);
            return Storage::response('fileTQF/' . $tqf->filetqf5);
            // return $path;
        }
        if ($tqf->tqf5_2 != '') {
            if ($tqf->tqf5_2->data1_1 != '') {
                $tqf->tqf5_2->data1_1 = unserialize($tqf->tqf5_2->data1_1);
                $tqf->tqf5_2->data1_1 = json_decode($tqf->tqf5_2->data1_1);
            }
            if ($tqf->tqf5_2->data1_2 != '') {
                $tqf->tqf5_2->data1_2 = unserialize($tqf->tqf5_2->data1_2);
                $tqf->tqf5_2->data1_2 = json_decode($tqf->tqf5_2->data1_2);
            }
        }
        if ($tqf->tqf5_3 != '') {
            $tqf->tqf5_3->detail6_1 = json_decode($tqf->tqf5_3->detail6_1, true);
            $tqf->tqf5_3->detail6_2 = json_decode($tqf->tqf5_3->detail6_2, true);
            $tqf->tqf5_3->detail7 = json_decode($tqf->tqf5_3->detail7, true);
            $tqf->tqf5_3->grade = unserialize($tqf->tqf5_3->grade);
            $tqf->tqf5_3->grade = json_decode($tqf->tqf5_3->grade);
        }
        $branch = Branch::all();
        foreach ($branch as $val) {
            if ($val->branchcode != '') {
                if (strpos($tqf->group->groupname, $val->branchcode) !== false) {
                    $tqf->branchName = $val->branchName;
                }
            }
        }

        $name_file = $tqf->subyear->term . '_' . $tqf->subyear->Year . ' ' . (isset($tqf->subsubject->subjectCode) ? $tqf->subsubject->subjectCode : '') . '_' . (isset($tqf->subsubject->THsubject) ? $tqf->subsubject->THsubject : '') . '.pdf';
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'fontdata' => $fontData + [
                'thsarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNewItalic.ttf',
                    'B' =>  'THSarabunNewBold.ttf',
                    'BI' => "THSarabunNewBoldItalic.ttf",
                ]
            ],
        ]);
        $mpdf->WriteHTML(\View::make('report/checkformtqf5', compact('tqf'))->render());
        return $mpdf->Output($name_file, 'I');
        // return $name_file;
    }

    public function copytqf3(Request $request)
    {
        $count = TQF3::has('subsubject')->where('Year_idYear', $request->year)->count();
        $tqf = TQF3::has('subsubject')->where('Year_idYear', $request->year)->where('subject_idSubject', $request->sub)->first();
        // dd($tqf.$count);
        // if ($count <= 0 || $tqf == null) {
        //     return back()->with('alert', 'ไม่มีข้อมูลมคอ.3 ภาคเรียนนี้');
        //     // return 0;redirect()->
        // }
        return $this->showtqf3($request->idtqf3, $request);
    }

    public function copytqf5(Request $request)
    {
        $count = TQF5::has('subsubject')->where('Year_idYear', $request->year)->count();
        $tqf = TQF3::has('subsubject')->where('Year_idYear', $request->year)->where('subject_idSubject', $request->sub)->first();
        // dd($tqf.$count);
        if ($count <= 0 || $tqf == null) {
            return redirect()->back()->with('alert', 'ไม่มีข้อมูลมคอ.5 ภาคเรียนนี้');
        }
        return $this->showtqf5($request->idtqf5, $request);
    }

    public function get_table_tqf3(Request $request)
    {

        $tqf = TQF3::has('subsubject')->join('subject', 'subject.idsubject', '=', 'tqf3.subject_idSubject')
            ->join('groupstudy', 'groupstudy.groupID', '=', 'subject.group_idgroup');

        if ($request->input('year')) {
            $tqf = $tqf->where('Year_idYear', 'like', $request->input('year'));
        }
        if ($request->input('group')) {
            $tqf = $tqf->where('subject.group_idgroup', 'like', $request->input('group'));
        }
        $tqf = $tqf->paginate(10);

        return view('officer/checktqf')->with(['data' => $tqf, 'form' => 'tqf3']);
    }

    public function get_table_tqf5(Request $request)
    {

        $tqf = TQF5::has('subsubject')->join('subject', 'subject.idsubject', '=', 'tqf5.subject_idSubject')
            ->join('groupstudy', 'groupstudy.groupID', '=', 'subject.group_idgroup');

        if ($request->input('year')) {
            $tqf = $tqf->where('Year_idYear', 'like', $request->input('year'));
        }
        if ($request->input('group')) {
            $tqf = $tqf->where('subject.group_idgroup', 'like', $request->input('group'));
        }
        $tqf = $tqf->get();

        return view('officer/checktqf')->with(['data' => $tqf, 'form' => 'tqf5']);
    }
}
