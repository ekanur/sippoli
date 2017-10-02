<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi_latihan;
use App\Program_latihan;
use App\Siklus_mikro;
use App\Program;
use App\List_latihan;
use Session;

class ProgramLatihanController extends Controller
{
    public function index($id_program, $id_siklus_mikro, $id_sesi_latihan){
        // dd($id_sesi_latihan);
    	$program_latihan = Program_latihan::where('sesi_latihan_id', $id_sesi_latihan)->get();
      $sesi_latihan = Sesi_latihan::findOrFail($id_sesi_latihan);
      $siklus_mikro = Siklus_mikro::with('sesi_latihan')->findOrFail($sesi_latihan->siklus_mikro_id);
      $latihan = List_latihan::all();
      // $program = Program::findOrFail($siklus_mikro->program_id);
      // dd($program);
    	return view('program.program_latihan', compact('id_sesi_latihan', 'program_latihan', 'id_program', 'sesi_latihan', 'id_siklus_mikro', 'siklus_mikro', 'latihan'));
    }

    public function simpan(Request $request)
    {
    	$program_latihan = new Program_latihan;
    	$program_latihan->sesi_latihan_id = $request->sesi_latihan_id;
    	$program_latihan->list_latihan_id = $request->list_latihan;
    	$program_latihan->volume = $request->volume;
    	$program_latihan->intensitas = $request->intensitas;
    	$program_latihan->waktu = $request->waktu;
    	$program_latihan->jenis_latihan = $request->jenis_latihan;

    	$program_latihan->save();

    	return redirect()->back();
    }

    public function hapus($id_program, $id_sesi_latihan)
    {
      $sesi_latihan = Program_latihan::findOrFail($id_sesi_latihan);
      $sesi_latihan->delete();
      return redirect()->back();
    }

    public function edit($id_program, $id_siklus_mikro, $id_sesi_latihan, $id_program_latihan){
      $program_latihan = Program_latihan::where("sesi_latihan_id", $id_sesi_latihan)->get();
      $detail_program_latihan = Program_latihan::find($id_program_latihan);
      // dd($detail_program_latihan);
      $sesi_latihan = Sesi_latihan::find($id_sesi_latihan);
      $siklus_mikro = Siklus_mikro::with('sesi_latihan')->findOrFail($sesi_latihan->siklus_mikro_id);
      $latihan = List_latihan::all();

      // dd($program_latihan);
    	return view('program.program_latihan', compact('siklus_mikro', 'id_siklus_mikro', 'id_sesi_latihan', 'program_latihan', 'id_program', 'sesi_latihan', 'detail_program_latihan', 'id_program_latihan', 'latihan'));
    }

    public function update ($id_program, $id_siklus_mikro, $id_sesi_latihan, $id_program_latihan, Request $request)
    {
      $program_latihan = Program_latihan::find($id_program_latihan);
    	$program_latihan->sesi_latihan_id = $request->sesi_latihan_id;
    	$program_latihan->list_latihan_id = $request->list_latihan;
    	$program_latihan->volume = $request->volume;
    	$program_latihan->intensitas = $request->intensitas;
    	$program_latihan->waktu = $request->waktu;
    	$program_latihan->jenis_latihan = $request->jenis_latihan;

    	$program_latihan->save();
      Session::flash("flash_message", "Berhasil mengubah data menu latihan.");
      Session::flash("flash_status", "success");

    	return redirect()->back();
    }
}
