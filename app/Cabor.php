<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabor extends Model
{
    protected $table = "cabor";
    public function atlet(){
    	return $this->hasMany("App\Atlet");
    }

    public function pelatih(){
    	return $this->belongsTo("App\Pelatih");
    }
}
