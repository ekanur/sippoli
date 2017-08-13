<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
	protected $table ="evaluasi";
    public function atlet()
    {
    	return $this->belongsTo("App\Atlet");
    }
}
