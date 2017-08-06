<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    public function program(){
    	return $this->hasMany("App\Program");
    }

    public function cabor(){
    	return $this->hasMany("App\Cabor");
    }

    public function list_makanan(){
    	return $this->hasMany("App\List_makanan");
    }

    public function list_latihan(){
    	return $this->hasMany("App\List_latihan");
    }

    public function atlet(){
    	return $this->hasMany("App\Atlet");
    }
}
