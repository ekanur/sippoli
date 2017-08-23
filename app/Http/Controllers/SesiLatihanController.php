<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Sesi_latihan;

class SesiLatihanController extends Controller
{
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
}
