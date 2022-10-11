<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table = 'course';
    protected $primaryKey = 'c_id';
    protected $guarded = [];
    public $timestamps = false;

    public function group_course()
    {
        return $this->hasMany(GroupStudy::class, 'course_id');
    }
}
