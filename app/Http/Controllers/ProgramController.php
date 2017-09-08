<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Program;
use App\Siklus_mikro ;
use App\Sesi_latihan;
use DateTime;

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

        // return redirect("/program"."/".$program->id."/deskripsi");
        // return redirect('/program')->with('message',$program->nama = $request->nama);
        return redirect('/program')->with([
          'alert'=> 'item berhasil di tambahkan',
          'tipe' => 'success'
        ]);
    }

    public function hapus($id_program){
      $program = Program::where("pelatih_id",$id_program)->get();

      try{
        $hapusProgram= Program::findOrFail($id_program);
        $hapusProgram->delete();
        return redirect()->back()->with([
          'alert'=>'item berhasil di hapus',
          'tipe'=>'success'
        ]);
      }
      catch(Exception $e){
        return redirect()->back()->with([
          'alert'=>$e->getMessage,
          'tipe'=>'danger'
        ]);
      }

    }

    public function ubah($id_program, Request $request){
        $request->mulai_program = date('Y-m-d', strtotime($request->mulai_program));
        $request->berakhir_program = date('Y-m-d', strtotime($request->berakhir_program));
        $siklus_makro = array(
                                        "persiapan_umum"=>$request->persiapan_umum,
                                        "persiapan_khusus"=>$request->persiapan_khusus,
                                        "pra_kompetisi"=>$request->pra_kompetisi,
                                        "kompetisi"=>$request->kompetisi,
                                        "transisi"=>$request->transisi);
        $program = Program::findOrFail($id_program);
        $program->nama = $request->nama;
        $program->jangka_durasi = $request->jangka_durasi;
        $program->pelatih_id = 1;
        $program->mulai_program = $request->mulai_program;
        $program->berakhir_program = $request->berakhir_program;
        $program->siklus_makro = json_encode($siklus_makro);
        $program->deskripsi = $request->deskripsi;

        $program->save();
        return redirect()->back();
    }

    public function add(){
      return view('program.add');
    }

    public function store(Request $request){
      return redirect('/program');
    }

    public function edit($id_program){
        $program = Program::findOrFail($id_program);
        $siklus_mikro = Siklus_mikro::where("program_id", $id_program)->orderBy('pekan_ke', 'asc')->orderBy("id", "asc")->get();
       
        // dd($array_siklus_mikro);
        // ['1',  25,      35],
        // ['2',  27,      30],
    	return view("program.add", compact('program', 'id_program', 'array_siklus_mikro'));
    }

    public function pilihAtlet($id_program){
    	// $program = Program::findOrFail($id_program);
    	return view("program.pilih_atlet", compact('program', "id_program"));
    }


    public function deleteSiklusMikro($id){
        $id_mikro =Siklus_mikro::findOrFail($id);
        $id_mikro->delete();
        return redirect()->back();
    }




    public function programMakanan($id_program){
    	// $program = Program::findOrFail($id_program);
    	return view("program.makanan", compact('id_program'));
    }


}
