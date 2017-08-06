<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    public function atlet()
    {
    	return $this->belongsTo("App\Atlet");
    }
}
