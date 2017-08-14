<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
<<<<<<< HEAD
use App\Siklus_mikro;
=======
use App\Sesi_latihan;
>>>>>>> 7d4d773458d6ca984b9bc247d940914a4cd1576d

class ProgramController extends Controller
{
    public function index(){

      return view('program.index');
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

        $program->save();

        return redirect("/program"."/".$program->id);
    }

    public function add(){
      return view('program.add');
    }

    public function store(Request $request){
      return redirect('/program');
    }

    public function edit($id_program){
        $program = Program::findOrFail($id_program);
        // dd(intval(json_decode($program->siklus_makro)->persiapan_khusus));
    	return view("program.index", compact('program'));
    }

    public function pilihAtlet($id_program){
    	return view("program.pilih_atlet");
    }

    public function siklusMikro($id_program){
      $dataMikro=Siklus_mikro::where('program_id','1')->get();
    	return view("program.siklus_mikro" ,compact('dataMikro'));
    }

    public function savesiklusMikro(Request $masuk){
// dd("masuk ke savesiklusMikro (proses simpan)");
        $pekanLatihan = $masuk->pekan;
        $intensitasLatihan = $masuk->intensitas;
        $volumeLatihan = $masuk->volume;


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
      $RencanaLatihan ->json_volume_intensitas="$volumeLatihan%, $intensitasLatihan%";
      $RencanaLatihan ->bulan=$bulan;
      $RencanaLatihan ->pekan_ke=$pekanLatihan;
      $RencanaLatihan ->save();
        return redirect()->back();
      // return ("proses simpan");

    }





    public function sesiLatihan($id_program, $id_siklus_mikro){
    	return view("program.sesi_latihan", compact('id_program', 'id_siklus_mikro'));
    }

    public function programMakanan($id_program){
    	return view("program.makanan");
    }

    public function simpanSesiLatihan($siklus_mikro_id, Request $request){
        $request->tanggal = date("Y-m-d", strtotime($request->tanggal));
        // $json_materi_latihan = 
        $sesi_latihan = new Sesi_latihan;
        $sesi_latihan->siklus_mikro_id = $siklus_mikro_id;
        $sesi_latihan->tahapan = $request->tahapan;
        $sesi_latihan->tanggal = $request->tanggal;
        $sesi_latihan->kriteria_volume_intensitas = $request->kriteria_v_i;
        $sesi_latihan->tanggal = $request->tanggal;
    }
}
