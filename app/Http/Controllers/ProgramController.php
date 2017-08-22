<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro ;
use App\Sesi_latihan;

class ProgramController extends Controller
{
    public function index(){
        $program = Program::with('atlet')->where("pelatih_id", 1)->get();
        // dd($program[0]->atlet);
        // dd($program);
        return view("program.index", compact('program'));
    }

    public function baru(){

      return view('program.add');
    }

    public function simpan(Request $request){
        $request->mulai_program = date('Y-m-d', strtotime($request->mulai_program));
        $request->berakhir_program = date('Y-m-d', strtotime($request->berakhir_program));
        $siklus_makro = array(
                                        "persiapan_umum"=>$request->persiapan_umum,
                                        "persiapan_khusus"=>$request->persiapan_khusus,
                                        "pra_kompetisi"=>$request->pra_kompetisi,
                                        "kompetisi"=>$request->kompetisi,
                                        "transisi"=>$request->transisi);
        $program = new Program;
        $program->nama = $request->nama;
        $program->jangka_durasi = $request->jangka_durasi;
        $program->pelatih_id = 1;
        $program->mulai_program = $request->mulai_program;
        $program->berakhir_program = $request->berakhir_program;
        $program->siklus_makro = json_encode($siklus_makro);
        $program->deskripsi = $request->deskripsi;

        $program->save();

        return redirect("/program"."/".$program->id."/deskripsi");
    }

    public function add(){
      return view('program.add');
    }

    public function store(Request $request){
      return redirect('/program');
    }

    public function edit($id_program){
        $program = Program::findOrFail($id_program);
        // dd($program);
    	return view("program.add", compact('program'));
    }

    public function pilihAtlet($id_program){
    	$program = Program::findOrFail($id_program);
    	return view("program.pilih_atlet", compact('program'));
    }



    public function deleteSiklusMikro($id){
        $id_mikro =Siklus_mikro::findOrFail($id);
        $id_mikro->delete();
        return redirect()->back();
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


    public function programMakanan($id_program){
    	$program = Program::findOrFail($id_program);
    	return view("program.makanan", compact('program'));
    }


}
