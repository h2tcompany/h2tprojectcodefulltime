<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercise';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;

    public function getAccount()
    {
        return $this->belongsTo('App\\Account', 'username');
    }

    public function getTeam()
    {
        return $this->belongsTo('App\\Teams', 'team');
    }

}
