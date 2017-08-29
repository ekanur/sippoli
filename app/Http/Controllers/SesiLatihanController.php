<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Sesi_latihan;
use App\Program_latihan;
use App\Siklus_mikro;

class SesiLatihanController extends Controller
{
    public function index($id_program, $id_siklus_mikro, $id_sesi_latihan){
        // dd($id_sesi_latihan);
        $program_latihan = Program_latihan::where("sesi_latihan_id", $id_sesi_latihan)->get();
        $sesi_latihan = Sesi_latihan::findOrFail($id_sesi_latihan);
      // dd($program_latihan);
        return view('program.program_latihan', compact('id_sesi_latihan', 'program_latihan', 'id_program', 'sesi_latihan'));
    }
    public function simpanSesiLatihan(Request $request){
        $request->tanggal = date("Y-m-d", strtotime($request->tanggal));
        $json_materi_latihan = explode(",", $request->materi_latihan);
        $json_intensitas_max = explode(",", $request->intensitas_max);
        $json_volume_max = explode(",", $request->volume_max);
        // $json_materi_latihan =
        $sesi_latihan = new Sesi_latihan;
        $sesi_latihan->siklus_mikro_id = $request->siklus_mikro_id;
        // $sesi_latihan->tahapan = $request->tahapan;
        $sesi_latihan->tanggal = $request->tanggal;
        $sesi_latihan->kriteria_volume_intensitas = $request->kriteria_v_i;
        $sesi_latihan->json_materi_latihan = json_encode($json_materi_latihan);
        $sesi_latihan->json_intensitas_max = json_encode($json_intensitas_max);
        $sesi_latihan->json_volume_max = json_encode($json_volume_max);
        $sesi_latihan->save();

        return redirect()->back();
    }

    public function edit($id_program,$id_siklus_mikro, $id_sesi_latihan){
        $siklus_mikro = Siklus_mikro::with('sesi_latihan')->findOrFail($id_siklus_mikro);
        $sesi_latihan = Sesi_latihan::findOrFail($id_sesi_latihan);
        // dd($sesi_latihan);
        return view("program.sesi_latihan", compact('id_program', 'id_siklus_mikro' ,'siklus_mikro', 'sesi_latihan', 'id_sesi_latihan'));
    }

    public function ubah($id_sesi_latihan, Request $request){
        $request->tanggal = date("Y-m-d", strtotime($request->tanggal));
        $json_materi_latihan = explode(",", $request->materi_latihan);
        $json_intensitas_max = explode(",", $request->intensitas_max);
        $json_volume_max = explode(",", $request->volume_max);

        $sesi_latihan = Sesi_latihan::findOrFail($id_sesi_latihan);
        $sesi_latihan->siklus_mikro_id = $request->siklus_mikro_id;
        // $sesi_latihan->tahapan = $request->tahapan;
        $sesi_latihan->tanggal = $request->tanggal;
        $sesi_latihan->kriteria_volume_intensitas = $request->kriteria_v_i;
        $sesi_latihan->json_materi_latihan = json_encode($json_materi_latihan);
        $sesi_latihan->json_intensitas_max = json_encode($json_intensitas_max);
        $sesi_latihan->json_volume_max = json_encode($json_volume_max);
        $sesi_latihan->save();
        return redirect()->back();
    }

    public function hapus($id_program,$id_siklus_mikro, $id_sesi_latihan){
        $sesi_latihan = Sesi_latihan::findOrFail($id_sesi_latihan);
        $sesi_latihan->delete();

        return redirect("/program/".$id_program."/mikro/".$id_siklus_mikro);
    }
}
