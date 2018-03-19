<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Atlet extends Model
{

  protected $table="atlet";

    public function program(){
    	// return $this->belongsToMany("App\Program", "program_atlet", "atlet_id", "program_id");
    	return $this->belongsToMany("App\Program", "program_atlet")->using("App\Program_atlet");
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

    public function umur(){
      return Carbon::createFromFormat('Y-m-d', $this->tgl_lahir)->age;
    }
}
