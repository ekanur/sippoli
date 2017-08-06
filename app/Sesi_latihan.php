<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi_latihan extends Model
{
    public function program(){
    	return $this->belongsTo("App\Program");
    }

    public function program_latihan(){
    	return $this->hasMany("App\Program_latihan");
    }
}
