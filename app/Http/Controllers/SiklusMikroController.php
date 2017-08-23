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

    public function savesiklusMikro(Request $masuk){
        // dd("masuk ke savesiklusMikro (proses simpan)");
        $pekanLatihan = $masuk->pekan;
        $json_volume_intensitas = array("volume"=>$masuk->volume,"intensitas"=>$masuk->intensitas);
        // $intensitasLatihan = $masuk->intensitas;
        // $volumeLatihan = $masuk->volume;

        if (  $pekanLatihan>=1 &&   $pekanLatihan<= 4){
              $bulan=8;
        }
        else if (  $pekanLatihan>=5 &&   $pekanLatihan<=8){
              $bulan=9;
        }

        else if($pekanLatihan>=9 &&   $pekanLatihan<=12){
              $bulan=10;
        }

      $RencanaLatihan = new Siklus_mikro;
      $RencanaLatihan ->program_id='1';
      $RencanaLatihan ->json_volume_intensitas=json_encode($json_volume_intensitas);
      $RencanaLatihan ->bulan=$bulan;
      $RencanaLatihan ->pekan_ke=$pekanLatihan;
      $RencanaLatihan ->save();
        return redirect()->back();
      // return ("proses simpan");

    }
}
