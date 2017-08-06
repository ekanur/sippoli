<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_latihan extends Model
{
    public function program_latihan(){
    	return $this->hasMany("App\Program_latihan");
    }

    public function pelatih(){
    	return $this->belongsTo("App\Pelatih");
    }
}
