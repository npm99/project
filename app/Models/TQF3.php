<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TQF3 extends Model
{
    protected $table = 'tqf3';
    protected $primaryKey = 'tqf3ID';
    protected $guarded = [];
    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo('App\Models\GroupStudy', 'group_sub');
    }

    public function submSub()
    {
        return $this->belongsTo('App\Models\MSubject', 'mSubject_idmSubject');
    }
    public function subsubject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_idSubject');
    }
    public function subyear()
    {
        return $this->belongsTo('App\Models\Year', 'Year_idYear');
    }

    public function subcourse()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    // public function subuser()
    // {
    //     return $this->belongsTo('App\Models\Users', 'user_userID')->select('userID',"level_LevelID","branch_idBranch","Uprefix","UFName","ULName");
    // }

    public function subuser()
    {
        return $this->belongsToMany(Users::class, 'user_tqf3', 'tqf3ID', 'userID')->select('users.userID', "users.level_LevelID", "users.branch_idBranch", "users.Uprefix", "users.UFName", "users.ULName", "users.Title");
    }

    public function iduser()
    {
        return $this->belongsToMany(Users::class, 'user_tqf3', 'tqf3ID', 'userID')->select('users.userID');
    }

    public function tqf3_1()
    {
        return $this->belongsTo('App\Models\TQF3_1', 'tqf3ID');
    }
    public function tqf3_2()
    {
        return $this->belongsTo('App\Models\TQF3_2', 'tqf3ID');
    }
    public function tqf3_3()
    {
        return $this->belongsTo('App\Models\TQF3_3', 'tqf3ID');
    }
    public function tqf3_4()
    {
        return $this->belongsTo('App\Models\TQF3_4', 'tqf3ID');
    }
    public function tqf3_5()
    {
        return $this->belongsTo('App\Models\TQF3_5', 'tqf3ID');
    }
    // public function tqf3_51()
    // {
    //     return $this->belongsTo('App\Models\TQF3_5_1', 'tqf3ID');
    // }
    // public function tqf3_52()
    // {
    //     return $this->belongsTo('App\Models\TQF3_5_2', 'tqf3ID');
    // }
    public function tqf3_6()
    {
        return $this->belongsTo('App\Models\TQF3_6', 'tqf3ID');
    }
    public function tqf3_7()
    {
        return $this->belongsTo('App\Models\TQF3_7', 'tqf3ID');
    }
}
