<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulans extends Model
{
    //
    public function puskesmas(){
        return $this->belongsTo("App\Puskesmas");
    }

    public function kejadian(){
        return $this->hasOne('App\Kejadian');
    }
}
