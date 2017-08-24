<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro;
use App\Sesi_latihan;
use DateTime;

class SiklusMikroController extends Controller
{
  public function index($id_program){
    $program = Program::findOrFail($id_program);
    $dataMikro=Siklus_mikro::where('program_id',$id_program)->get();
    $mulai_program = new DateTime(date('Y-m-d', strtotime($program->mulai_program)));
    $berakhir_program = new DateTime(date('Y-m-d', strtotime($program->berakhir_program)));
    $jmlpekan = intval(round($mulai_program->diff($berakhir_program)->days / 7));
    // dd($dataMikro->all());
    return view("program.siklus_mikro" ,compact('dataMikro', 'jmlpekan', 'id_program'));
  }

    public function detail($id_program, $id_siklus_mikro){
    	$program = Program::findOrFail($id_program);
      $sesi_latihan = Siklus_mikro::with('sesi_latihan')->findOrFail($id_siklus_mikro);

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
    }

    public function edit($id_program, $id_siklus_mikro){
      $detail_siklus_mikro = Siklus_mikro::findOrFail($id_siklus_mikro);
      $dataMikro=Siklus_mikro::where('program_id',$id_program)->get();
      // dd($sesi_latihan);
      return view("program.siklus_mikro", compact('id_program', 'dataMikro', 'id_siklus_mikro', 'detail_siklus_mikro'));
    }

    public function ubah($id_program, $id_siklus_mikro, Request $request){
      $json_volume_intensitas = array(
                                    "volume"=>$request->volume,
                                    "intensitas"=>$request->intensitas,
                                );

      $siklus_mikro = Siklus_mikro::findOrFail($id_siklus_mikro);
      $siklus_mikro->pekan_ke = $request->pekan;
      $siklus_mikro->bulan = 8; //next:dinamis berdasarkan pekan yg dipilih dan tanggal mulai s.d tgl berakhir
      $siklus_mikro->json_volume_intensitas = json_encode($json_volume_intensitas);
      $siklus_mikro->save();

      return redirect("/program/".$id_program."/mikro/");
    }
}
