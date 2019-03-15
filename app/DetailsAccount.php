<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailsAccount extends Model
{
    //
    protected $table = 'detailsaccount';
    protected $primaryKey = 'codeprofile';
    public $incrementing = false;
    public $timestamps = false;

    public function getAccount(){
        return $this->belongsTo('App\\Account','username');
    }
}
