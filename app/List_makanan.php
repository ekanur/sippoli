<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_makanan extends Model
{
	protected $table="list_makanan";
    public function program_makanan(){
    	return $this->hasMany("App\Program_makanan");
    }

    public function pelatih(){
    	return $this->belongsTo("App\Pelatih");
    }
}
