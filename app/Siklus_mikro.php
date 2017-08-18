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

    public function getBulanAttribute($value){
    	$nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    	return $nama_bulan[$value-1];
    }
}
