<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi_latihan;
use App\Program_latihan;

class ProgramLatihanController extends Controller
{
    public function index($id_sesi_latihan){
    	return view('program.program_latihan', compact('id_sesi_latihan'));
    }
}
