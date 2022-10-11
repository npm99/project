<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TQF5 extends Model
{
    protected $table = 'tqf5';
    protected $primaryKey = 'tqf5ID';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'Year_idYear',
        'subject_idSubject',
        'create_date',
        'deadline', 
        'group_sub',
        'filetqf5',
        'status',
        'send_file'
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\GroupStudy', 'group_sub');
    }

    public function submSub()
    {
        return $this->hasOne('App\Models\MSubject', 'mSubject_idmSubject');
    }
    public function subsubject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_idSubject');
    }
    public function subyear()
    {
        return $this->belongsTo('App\Models\Year', 'Year_idYear');
    }
    // public function subuser(){
    //     return $this->belongsTo('App\Models\Users', 'user_userID')->select('userID',"level_LevelID","branch_idBranch","Uprefix","UFName","ULName");
    // }

    public function subuser()
    {
        return $this->belongsToMany(Users::class, 'user_tqf5', 'tqf5ID', 'userID')->select('users.userID', "users.level_LevelID", "users.branch_idBranch", "users.Uprefix", "users.UFName", "users.ULName", "users.Title");
    }

    public function iduser()
    {
        return $this->belongsToMany(Users::class, 'user_tqf5', 'tqf5ID', 'userID')->select('users.userID');
    }

    public function subcourse()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function tqf5_1()
    {
        return $this->belongsTo('App\Models\TQF5_1', 'tqf5ID');
    }
    public function tqf5_2()
    {
        return $this->belongsTo('App\Models\TQF5_2', 'tqf5ID');
    }
    // public function tqf5_21()
    // {
    //     return $this->belongsTo('App\Models\TQF5_2_1', 'tqf5ID');
    // }
    // public function tqf5_22()
    // {
    //     return $this->belongsTo('App\Models\TQF5_2_2', 'tqf5ID');
    // }
    public function tqf5_3()
    {
        return $this->belongsTo('App\Models\TQF5_3', 'tqf5ID');
    }
    public function tqf5_4()
    {
        return $this->belongsTo('App\Models\TQF5_4', 'tqf5ID');
    }

    public function tqf5_5()
    {
        return $this->belongsTo('App\Models\TQF5_5', 'tqf5ID');
    }
    public function tqf5_6()
    {
        return $this->belongsTo('App\Models\TQF5_6', 'tqf5ID');
    }
}
