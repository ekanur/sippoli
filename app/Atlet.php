<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    public function program(){
    	// return $this->belongsToMany("App\Program", "program_atlet", "atlet_id", "program_id");
    	return $this->belongsToMany("App\Program")->using("App\Program_atlet");
    }

    public function pelatih(){
    	return $this->belongsTo("App\Pelatih");
    }

    public function evaluasi(){
    	return $this->hasMany("App\Evaluasi");
    }

    public function cabor(){
    	return $this->belongsTo("App\Cabor");
    }
}
