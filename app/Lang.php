<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    //
    protected $table = 'language';
    protected $primaryKey = 'lang';
    public $incrementing = false;
    public $timestamps = false;

    public function listQuestion()
    {
        return $this->hasMany('App\\Question', 'lang');
    }
}
