<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportExam extends Model
{
    protected $table = 'reportexam';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;

    public function getLang()
    {
        return $this->belongsTo('App\\Lang', 'lang');
    }

}
