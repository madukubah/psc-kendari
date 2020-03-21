<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puskesmas extends Model
{
    //
    use SoftDeletes;

    // public function driver(){
    //     return $this->belongsToMany('App\Driver');
    // }

    public function driver(){
        return $this->hasMany("App\Driver");
      }

      public function ambulans(){
        return $this->hasMany("App\Ambulans");
      }

      public function kejadian(){
        return $this->hasMany('App\Kejadian');
    }
}
