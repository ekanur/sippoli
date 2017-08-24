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
      $sesi_latihan = Siklus_mikro::with('sesi_latihan')->findOrFail($id_siklus_mikro);
      // $siklus_makro = json_decode($program->siklus_makro);
      // dd($sesi_latihan->namaBulan());
      // $siklus_makro = array(
      //     "persiapan_umum" => $siklus_makro->persiapan_umum,
      //     "persiapan_khusus" => $siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus,
      //     "pra_kompetisi" => $siklus_makro->persiapan_khusus+$siklus_makro->pra_kompetisi,
      //     "kompetisi" => $siklus_makro->pra_kompetisi+$siklus_makro->kompetisi,
      //   );
      // $detail_mikro = array(
      //     "intensitas"=>json_decode($sesi_latihan[0]->siklus_mikro->json_volume_intensitas)->intensitas,
      //     "volume"=>json_decode($sesi_latihan[0]->siklus_mikro->json_volume_intensitas)->volume,
      // );
      // if ($sesi_latihan[0]->siklus_mikro->pekan_ke <= $siklus_makro['persiapan_umum']) {
      //   $detail_mikro["fase"] = "Persiapan Umum";
      // } elseif($sesi_latihan[0]->siklus_mikro->pekan_ke > $siklus_makro['persiapan_umum'] && $sesi_latihan[0]->siklus_mikro->pekan_ke <= $siklus_makro['persiapan_khusus']) {
      //   $detail_mikro["fase"] = "Persiapan Khusus";
      // } elseif($sesi_latihan[0]->siklus_mikro->pekan_ke > $siklus_makro['persiapan_khusus'] && $sesi_latihan[0]->siklus_mikro->pekan_ke <= $siklus_makro['pra_kompetisi']) {
      //   $detail_mikro["fase"] = "Pra Kompetisi";
      // } elseif($sesi_latihan[0]->siklus_mikro->pekan_ke > $siklus_makro['pra_kompetisi'] && $sesi_latihan[0]->siklus_mikro->pekan_ke <= $siklus_makro['kompetisi']) {
      //   $detail_mikro["fase"] = "Kompetisi";
      // }
      
    	return view("program.sesi_latihan", compact('id_program', 'id_siklus_mikro', 'sesi_latihan', 'program', 'detail_mikro'));
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
