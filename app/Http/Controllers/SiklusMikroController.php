<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro;
use App\Sesi_latihan;

class SiklusMikroController extends Controller
{
    public function index($id_program){
    	$program = Program::findOrFail($id_program);
    	$dataMikro=Siklus_mikro::where('program_id',$id_program)->get();
    	// dd($dataMikro);
    	return view("program.siklus_mikro" ,compact('id_program','dataMikro', 'program'));
    }

    public function detail($id_program, $id_siklus_mikro){
    	$program = Program::findOrFail($id_program);
      	$sesi_latihan = Sesi_latihan::where("siklus_mikro_id", $id_siklus_mikro)->get();
      	// dd($sesi_latihan);
    	return view("program.sesi_latihan", compact('id_program', 'id_siklus_mikro', 'sesi_latihan', 'program'));
    }
}
