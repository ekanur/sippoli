<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_makanan extends Model
{
	protected $table="program_makanan";
    public function program(){
    	return $this->belongsTo("App\Program");
    }

    public function list_makanan(){
    	return $this->belongsTo("App\List_makanan");
    }
}
