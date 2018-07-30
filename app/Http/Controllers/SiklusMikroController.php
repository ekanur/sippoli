<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro;
use App\Sesi_latihan;
use DateTime;
use DateInterval;
// use Illuminate\Support\Collection;

class SiklusMikroController extends Controller
{
  public function index($id_program){
    $program = Program::findOrFail($id_program);
    // $dataMikro = Siklus_mikro::where('program_id',$id_program)->orderBy('pekan_ke', 'asc')->get();
    $mulai_program = new DateTime(date('Y/m/d', strtotime($program->mulai_program)));
    $berakhir_program = new DateTime(date('Y/m/d', strtotime($program->berakhir_program)));
    $jmlpekan = array_sum(json_decode($program->siklus_makro, TRUE));
    $siklus_mikro = array();
    $array_siklus_mikro = array();
    foreach ($program->siklus_mikro as $mikro) {
      $array_siklus_mikro[]=array($mikro->pekan_ke, intval(json_decode($mikro->json_volume_intensitas)->volume) , intval(json_decode($mikro->json_volume_intensitas)->intensitas), intval(json_decode($mikro->json_volume_intensitas)->peaking));
      $siklus_mikro[$mikro->pekan_ke]["ivp"] = $mikro->json_volume_intensitas;
      $siklus_mikro[$mikro->pekan_ke]["id"] = $mikro->id;
    }

    $data_pekan = array();
    $pekan = 1;
    $tanggal_mulai = $mulai_program->format("Y/m/d");
    $fase = "Persiapan Umum";
    for($x=0; $x<($jmlpekan*7); $x=$x+7){
      if ($pekan > json_decode($program->siklus_makro, TRUE)['persiapan_umum'] && $pekan <= (json_decode($program->siklus_makro, TRUE)['persiapan_umum']+json_decode($program->siklus_makro, TRUE)['persiapan_khusus'])) {
        $fase = "Persiapan Khusus";
      }elseif($pekan > (json_decode($program->siklus_makro, TRUE)['persiapan_umum']+json_decode($program->siklus_makro, TRUE)['persiapan_khusus']) && $pekan <= (json_decode($program->siklus_makro, TRUE)['persiapan_umum']+json_decode($program->siklus_makro, TRUE)['persiapan_khusus']+json_decode($program->siklus_makro, TRUE)['pra_kompetisi'])){
        $fase = "Pra Kompetisi";
      }elseif($pekan > (json_decode($program->siklus_makro, TRUE)['persiapan_umum']+json_decode($program->siklus_makro, TRUE)['persiapan_khusus']+json_decode($program->siklus_makro, TRUE)['pra_kompetisi']) && $pekan <= (json_decode($program->siklus_makro, TRUE)['persiapan_umum']+json_decode($program->siklus_makro, TRUE)['persiapan_khusus']+json_decode($program->siklus_makro, TRUE)['pra_kompetisi']+json_decode($program->siklus_makro, TRUE)['kompetisi'])){
        $fase = "Kompetisi";
      }elseif($pekan > (json_decode($program->siklus_makro, TRUE)['persiapan_umum']+json_decode($program->siklus_makro, TRUE)['persiapan_khusus']+json_decode($program->siklus_makro, TRUE)['pra_kompetisi']+json_decode($program->siklus_makro, TRUE)['kompetisi'])){
        $fase = "Transisi";
      }
      
      $tanggal_mulai = new DateTime(date('Y/m/d', strtotime($program->mulai_program)));
      $tanggal_mulai = $tanggal_mulai->add(new DateInterval("P".($x)."D"));
      $data_pekan[]=array(
        "pekan" => $pekan,
        "tanggal" => dateRange( $tanggal_mulai->format("Y/m/d"), 7),
        "ivp" => (isset($siklus_mikro[$pekan]))?$siklus_mikro[$pekan]["ivp"]:null,
        "siklus_mikro_id" => (isset($siklus_mikro[$pekan]))?$siklus_mikro[$pekan]["id"]:null,
        "fase" => $fase
      );

      $pekan++;
    }

    // dd($data_pekan);
    // $data_pekan = (object)$data_pekan
    return view("program.siklus_mikro" ,compact('id_program', 'array_siklus_mikro', 'jmlpekan', 'data_pekan', 'siklus_mikro'));
  }

    public function detail($id_program, $id_siklus_mikro){
    	$program = Program::findOrFail($id_program);
      $siklus_mikro = Siklus_mikro::with('sesi_latihan')->findOrFail($id_siklus_mikro);
      // dd($siklus_mikro);
    	return view("program.sesi_latihan", compact('id_program', 'id_siklus_mikro', 'siklus_mikro', 'program'));
    }

    public function savesiklusMikro(Request $masuk, $id_program){
        $masuk->peaking_baru = ($masuk->peaking_baru == '')? 0 : $masuk->peaking_baru;
        $json_volume_intensitas = array("volume"=>$masuk->volume_baru,"intensitas"=>$masuk->intensitas_baru, "peaking"=>$masuk->peaking_baru);

        $program = Program::findOrFail($id_program);
        $siklus_mikro = new Siklus_mikro([
          "json_volume_intensitas" => json_encode($json_volume_intensitas),
          "pekan_ke" => $masuk->pekan_ke
        ]);

        $program->siklus_mikro()->save($siklus_mikro);
        $masuk->session()->flash('flash_message', "Berhasil menambahkan siklus makro.");
        $masuk->session()->flash('flash_status', "success");

        return redirect()->back();
    }

    public function edit($id_program, $id_siklus_mikro){
      $detail_siklus_mikro = Siklus_mikro::findOrFail($id_siklus_mikro);
      $dataMikro=Siklus_mikro::where('program_id',$id_program)->orderBy('pekan_ke', 'asc')->get();

      $program = Program::findOrFail($id_program);
      $mulai_program = new DateTime(date('Y-m-d', strtotime($program->mulai_program)));
      $berakhir_program = new DateTime(date('Y-m-d', strtotime($program->berakhir_program)));
      $jmlpekan = intval(round($mulai_program->diff($berakhir_program)->days / 7));
      $array_siklus_mikro = array();
              foreach ($dataMikro as $mikro) {
                  $array_siklus_mikro[]=array($mikro->pekan_ke, intval(json_decode($mikro->json_volume_intensitas)->volume) , intval(json_decode($mikro->json_volume_intensitas)->intensitas), intval(json_decode($mikro->json_volume_intensitas)->peaking));
              }
      // dd($sesi_latihan);
      return view("program.siklus_mikro", compact('id_program', 'dataMikro', 'id_siklus_mikro', 'detail_siklus_mikro', 'jmlpekan', 'array_siklus_mikro'));
    }

    public function ubah($id_program, Request $request){
        // $pekanLatihan = $request->pekan;
        $json_volume_intensitas = array("volume"=>$request->volume, "intensitas"=>$request->intensitas, "peaking"=>$request->peaking);

        $program = Program::findOrFail($request->program_id);
        
        $program->siklus_mikro()->where("id", $request->siklus_mikro_id)->update([
          "json_volume_intensitas" => json_encode($json_volume_intensitas)
        ]);

        $request->session()->flash('flash_message', "Berhasil memperbarui siklus makro");
        $request->session()->flash('flash_status', "success");

        return redirect()->back();
    }

    public function hapus($id_program, $id_siklus_mikro, Request $request){
      // dd($id_siklus_mikro);
      // try {
      //   $siklus_mikro = Siklus_mikro::findOrFail($id_siklus_mikro);
      //   $siklus_mikro->delete();
      //   return redirect()->back()->with([
      //     'alert' => 'Item berhasil di hapus',
      //     'tipe' => 'success'
      //   ]);
      // } catch (Exception $e) {
      //   return redirect()->back()->with([
      //     'alert' => $e->getMessage,
      //     'tipe' => 'danger'
      //   ]);
      // }

    }
}
