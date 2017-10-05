<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebutuhan_energi extends Model
{
	protected $table = "kebutuhan_energi";

	public function program(){
		return $this->belongsTo("App\Program");
	}    
}
