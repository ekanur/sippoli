<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tes;

class TesController extends Controller
{
    public function index()
    {
    	$tes = Tes::all();
    	return view("tes.index", compact('tes'));
    }

    function detail($id){
    	$tes = Tes::find($id);

    	return view("tes.detail", compact("tes"));
    }
}
