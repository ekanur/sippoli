<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi_latihan;
use App\Program_latihan;

class ProgramLatihanController extends Controller
{
    public function index($id_sesi_latihan){

    	$program_latihan = Program_latihan::where("sesi_latihan_id", $id_sesi_latihan)->get();
    	return view('program.program_latihan', compact('id_sesi_latihan', 'program_latihan'));
    }

    public function simpan($id_sesi_latihan, Request $request){
    	$program_latihan = new Program_latihan;
    	$program_latihan->sesi_latihan_id = $id_sesi_latihan;
    	$program_latihan->list_latihan_id = $request->list_latihan; 
    	$program_latihan->volume = $request->volume; 
    	$program_latihan->intensitas = $request->intensitas; 
    	$program_latihan->waktu = $request->waktu; 
    	$program_latihan->jenis_latihan = $request->jenis_latihan;

    	$program_latihan->save();

    	return redirect()->back();
    }
}
