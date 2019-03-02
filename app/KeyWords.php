<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeyWords extends Model
{
    protected $table = 'keywords';
    protected $primaryKey = 'keyword';
    public $incrementing = false;
    public $timestamps = false;
}
