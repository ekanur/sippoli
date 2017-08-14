<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi_latihan extends Model
{
	protected $table="sesi_latihan";
    public function siklus_mikro(){
    	return $this->belongsTo("App\Siklus_mikro");
    }

    public function program_latihan(){
    	return $this->hasMany("App\Program_latihan");
    }
}
