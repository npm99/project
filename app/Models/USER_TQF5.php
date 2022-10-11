<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class USER_TQF5 extends Model
{
    protected $table = 'user_tqf5';
    protected $primaryKey = 'tqf5ID';
    public $timestamps = false;

    public function subuser(){
        return $this->belongsTo('App\Models\Users', 'userID')->select('userID',"level_LevelID","branch_idBranch","Uprefix","UFName","ULName");
    }
}
