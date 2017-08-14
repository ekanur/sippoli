<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siklus_mikro extends Model
{
    protected $table ="siklus_mikro";

    public function sesi_latihan(){
      return $this->hasMany("App\Sesi_latihan");
    }

    public function program(){
      return $this->belongsTo("App\Program");
    }
}
