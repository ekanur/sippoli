<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_atlet extends Model
{
    protected $table ="program_atlet";

    public function atlet(){
    	return $this->belongsTo("App\Atlet");
    }
}
