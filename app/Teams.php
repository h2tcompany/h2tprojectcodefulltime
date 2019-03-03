<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'team';
    public $incrementing = false;
    public $timestamps = false;

    public function listQuestion()
    {
        return $this->hasMany('App\\Question', 'team');
    }
}
