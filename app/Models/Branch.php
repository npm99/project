<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    protected $table = 'branch';
    protected $primaryKey = 'idBranch';
    protected $guarded = [];
    public $timestamps = false;

    public function subBranch()
    {
        return $this->belongsTo('App\Models\Factory', 'factory_idfactory');
    }
}
