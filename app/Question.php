<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'question';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;

    public function getLang()
    {
        return $this->belongsTo('App\\Lang', 'lang');
    }
}
