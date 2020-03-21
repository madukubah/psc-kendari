<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ambulans extends Model
{
    use SoftDeletes;

    //
    public function puskesmas(){
        return $this->belongsTo("App\Puskesmas");
    }

    public function kejadian(){
        return $this->hasMany('App\Kejadian');
    }
}
