<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table="program";
    public function program_makanan(){
    	return $this->hasMany("App\Program_makanan");
    }

    public function atlet(){
    	return $this->belongsToMany("App\Atlet", "program_atlet")->using("App\Program_atlet");
    }

    public function pelatih(){
    	return $this->belongsTo("App\Pelatih");
    }

    public function sesi_latihan(){
    	return $this->hasMany("App\Sesi_latihan");
    }

    public function kebutuhan_energi(){
        return $this->hasMany("App\Kebutuhan_energi");
    }

    public function siklus_mikro(){
        return $this->hasMany("App\Siklus_mikro")->orderBy("pekan_ke");
    }
}
