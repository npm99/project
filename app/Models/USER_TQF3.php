<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class USER_TQF3 extends Model
{
    protected $table = 'user_tqf3';
    protected $primaryKey = 'tqf3ID';
    public $timestamps = false;

    public function subuser(){
        return $this->belongsTo('App\Models\Users', 'userID')->select('userID',"level_LevelID","branch_idBranch","Uprefix","UFName","ULName");
    }
}
