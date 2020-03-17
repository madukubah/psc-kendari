<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejadian extends Model
{
    //
    protected $table = 'kejadian';

    public function ambulans(){
        return $this->belongsTo('App\Ambulans');
    }

    public function rumkit(){
        return $this->belongsTo('App\Rumkit');
    }

    public function puskesmas(){
        return $this->belongsTo('App\Puskesmas');
    }

    public function driver(){
        return $this->belongsTo('App\Driver');
    }
}
