<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupStudy extends Model
{
    protected $table = 'groupstudy';
    protected $primaryKey = 'groupID';
    protected $guarded = [];
    public $timestamps = false;

    public function group_course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // public function subject()
    // {
    //     return $this->hasMany(Subject::class, 'group_idgroup', 'groupID');
    // }
}
