<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submission';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;
}
