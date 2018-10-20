<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tes;

class TesController extends Controller
{
    function __construct()
    {
    	$this->middleware("auth");
    }

    function index(){
    	$tes = Tes::all();

    	return view("tes.index", compact('tes'));
    }

    function detail($id)
    {
    	$tes = Tes::findOrfail($id);

    	return view("tes.detail", compact('tes'));
    }
}
