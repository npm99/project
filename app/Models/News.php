<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'idnews';
    protected $guarded = [];
    public $timestamps = false;
}
