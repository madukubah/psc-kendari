<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rumkit extends Model
{
    //
    protected $table = 'rumkit';
    use SoftDeletes;

    public function kejadian(){
        return $this->hasOne('App\Kejadian');
    }
}
