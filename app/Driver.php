<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $table = 'driver';
    // public function puskesmas(){
    //     return $this->belongsToMany('App\Puskesmas');
    //     }

    public function puskesmas(){
        return $this->belongsTo("App\Puskesmas");
    }

    public function kejadian(){
        return $this->hasOne('App\Kejadian');
    }

}
