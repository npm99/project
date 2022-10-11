<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model 
{
    use SoftDeletes;
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $guarded = [];
    public $timestamps = false;

    public function subfac(){

        return $this->belongsTo('App\Models\Branch', 'branch_idBranch');

    }
    public function sublevel(){

        return $this->belongsTo('App\Models\Level', 'level_LevelID');

    }
    
}
