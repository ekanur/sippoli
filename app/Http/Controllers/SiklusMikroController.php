<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro;
use App\Sesi_latihan;
use DateTime;
use DateInterval;

class SiklusMikroController extends Controller
{
  public function index($id_program){
    $program = Program::findOrFail($id_program);
    $dataMikro = Siklus_mikro::where('program_id',$id_program)->orderBy('pekan_ke', 'asc')->get();
    $mulai_program = new DateTime(date('Y/m/d', strtotime($program->mulai_program)));
    $berakhir_program = new DateTime(date('Y/m/d', strtotime($program->berakhir_program)));
    $jmlpekan = array_sum(json_decode($program->siklus_makro, TRUE));

    $data_pekan = array();
    $pekan = 1;
    $tanggal_mulai = $mulai_program->format("Y/m/d");
    for($x=0; $x<($jmlpekan*7); $x=$x+7){
      $tanggal_mulai = new DateTime(date('Y/m/d', strtotime($program->mulai_program)));
      $tanggal_mulai = $tanggal_mulai->add(new DateInterval("P".($x)."D"));
      $data_pekan[$pekan]=array(
        "tanggal" => dateRange( $tanggal_mulai->format("Y/m/d"), 7),
      );
      $pekan++;
    }

    dd($data_pekan);

    $array_siklus_mikro = array();
        foreach ($dataMikro as $mikro) {
            $array_siklus_mikro[]=array($mikro->pekan_ke, intval(json_decode($mikro->json_volume_intensitas)->volume) , intval(json_decode($mikro->json_volume_intensitas)->intensitas), intval(json_decode($mikro->json_volume_intensitas)->peaking));
        }
    // dd($dataMikro->all());
    return view("program.siklus_mikro" ,compact('dataMikro', 'id_program', 'array_siklus_mikro'));
  }

    public function detail($id_program, $id_siklus_mikro){
    	$program = Program::findOrFail($id_program);
      $siklus_mikro = Siklus_mikro::with('sesi_latihan')->findOrFail($id_siklus_mikro);
      // dd($sesi_latihan->sesi_latihan);
    	return view("program.sesi_latihan", compact('id_program', 'id_siklus_mikro', 'siklus_mikro', 'program'));
    }

    public function savesiklusMikro(Request $masuk, $id_program){
      try {
        // dd("masuk ke savesiklusMikro (proses simpan)");
        $pekanLatihan = $masuk->pekan;
        $json_volume_intensitas = array("volume"=>$masuk->volume,"intensitas"=>$masuk->intensitas, "peaking"=>$masuk->peaking);
        // $intensitasLatihan = $masuk->intensitas;
        // $volumeLatihan = $masuk->volume;

        $program = Program::findOrFail($id_program);

        $bulan_pekan = date("Y-m-d", strtotime($program->mulai_program . "+ ". $pekanLatihan ." week"));

        $RencanaLatihan = new Siklus_mikro;
        $RencanaLatihan ->program_id=$id_program;
        $RencanaLatihan ->json_volume_intensitas=json_encode($json_volume_intensitas);
        $RencanaLatihan ->bulan=date('m', strtotime($bulan_pekan));
        $RencanaLatihan ->pekan_ke=$pekanLatihan;
        $RencanaLatihan ->save();

        return redirect()->back()->with([
          'alert' => 'Item berhasil di simpan',
          'tipe' => 'success'
        ]);
      } catch (Exception $e) {
        return redirect()->back()->with([
          'alert' => $e->getMessage,
          'tipe' => 'danger'
        ]);
      }

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

    public function ubah($id_program, $id_siklus_mikro, Request $request){
      try {
        $pekanLatihan = $request->pekan;
        $json_volume_intensitas = array("volume"=>$request->volume, "intensitas"=>$request->intensitas, "peaking"=>$request->peaking);

        $program = Program::findOrFail($id_program);

        $bulan_pekan = date("Y-m-d", strtotime($program->mulai_program . "+ ". $pekanLatihan ." week"));

        $siklus_mikro = Siklus_mikro::findOrFail($id_siklus_mikro);
        $siklus_mikro->pekan_ke = $request->pekan;
        $siklus_mikro->bulan=date('m', strtotime($bulan_pekan));
        $siklus_mikro->json_volume_intensitas = json_encode($json_volume_intensitas);
        $siklus_mikro->save();

        return redirect("/program/".$id_program."/mikro/")->with([
          'alert' => 'Item berhasil di perbaharui',
          'tipe' => 'success'
        ]);
      } catch (Exception $e) {
        return redirect("/program/".$id_program."/mikro/")->with([
          'alert' => $e->getMessage,
          'tipe' => 'danger'
        ]);
      }

    }

    public function hapus($id_program, $id_siklus_mikro, Request $request){
      dd($id_siklus_mikro);
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
