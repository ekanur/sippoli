<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_latihan extends Model
{
    //
    public function sesi_latihan(){
    	return $this->belongsTo("App\Sesi_latihan");
    }

    public function list_latihan(){
    	return $this->belongsTo("App\List_latihan");
    }
}
