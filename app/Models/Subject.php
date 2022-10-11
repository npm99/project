<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $table = 'subject';
    protected $primaryKey = 'idsubject';
    protected $guarded = [];
    public $timestamps = false;

//     public function group()
//     {
//         return $this->belongsTo('App\Models\GroupStudy', 'group_idgroup');
//     }
}
