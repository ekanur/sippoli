<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro;

class ProgramController extends Controller
{
    public function index(){

      return view('program.index');
    }

    public function simpan(Request $request){
        $program = new Program;
        $program->nama = $request->nama;
        $program->jangka_durasi = $request->jangka_durasi;
        $program->pelatih_id = 1;
        $program->mulai_program = $request->mulai_program;
        $program->berakhir_program = $request->berakhir_program;

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
    	return view("program.index");
    }

    public function pilihAtlet($id_program){
    	return view("program.pilih_atlet");
    }

    public function siklusMikro($id_program){
        $dataMikro=Siklus_mikro::all();
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
    	return view("program.sesi_latihan");
    }

    public function programMakanan($id_program){
    	return view("program.makanan");
    }
}
