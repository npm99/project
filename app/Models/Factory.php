<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factory extends Model
{
    use SoftDeletes;
    protected $table = 'factory';
    protected $primaryKey = 'idfactory';
    protected $guarded = [];
    public $timestamps = false;

    public function branch()
    {
        return $this->hasMany(Branch::class, 'factory_idfactory', 'idfactory');
    }
}
