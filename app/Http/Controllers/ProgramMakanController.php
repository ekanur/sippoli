<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kebutuhan_energi;
use App\List_makanan;
use App\Program_makanan;
use App\Program;
use App\Atlet;
use DateTime;
use DateInterval;
use Session;

class ProgramMakanController extends Controller
{
   public function index($id_program, $atlet_id){
    $program = Program::findOrFail($id_program);
   	$program_makanan = Program_makanan::where([["program_id", $id_program],["atlet_id", $atlet_id]])->get();
    
    $mulai_persiapan_khusus = new DateTime($program->mulai_program);
    $mulai_persiapan_khusus = $mulai_persiapan_khusus->add(new DateInterval("P".intval(json_decode($program->siklus_makro)->persiapan_umum)."W"));

    $mulai_pra_kompetisi = new DateTime($mulai_persiapan_khusus->format("Y/m/d"));
    $mulai_pra_kompetisi = $mulai_pra_kompetisi->add(new DateInterval("P".intval(json_decode($program->siklus_makro)->persiapan_khusus)."W"));

    $mulai_kompetisi = new DateTime($mulai_pra_kompetisi->format("Y/m/d"));
    $mulai_kompetisi = $mulai_kompetisi->add(new DateInterval("P".intval(json_decode($program->siklus_makro)->pra_kompetisi)."W"));

    $mulai_transisi = new DateTime($mulai_kompetisi->format("Y/m/d"));
    $mulai_transisi = $mulai_transisi->add(new DateInterval("P".intval(json_decode($program->siklus_makro)->kompetisi)."W"));

    $date_range["persiapan_umum"] = dateRange($program->mulai_program, intval(json_decode($program->siklus_makro)->persiapan_umum)*7);
    $date_range["persiapan_khusus"] = dateRange($mulai_persiapan_khusus->format("Y/m/d"), intval(json_decode($program->siklus_makro)->persiapan_khusus)*7);
    $date_range["pra_kompetisi"] = dateRange($mulai_pra_kompetisi->format("Y/m/d"), intval(json_decode($program->siklus_makro)->pra_kompetisi)*7);
    $date_range["kompetisi"] = dateRange($mulai_kompetisi->format("Y/m/d"), intval(json_decode($program->siklus_makro)->kompetisi)*7);
    $date_range["transisi"] = dateRange($mulai_transisi->format("Y/m/d"), intval(json_decode($program->siklus_makro)->transisi)*7);

    $program_makan = Program_makanan::where([["program_id", $id_program], ["atlet_id", $atlet_id]])->get();
    $data_program_makan=array();
    foreach ($program_makan as $makan) {
        $data_program_makan[date("Y/m/d", strtotime($makan->tanggal))][] = $makan;
    }
    $label_kategori = array(
        "karbohidrat"=>'default',
        "protein"=>'primary',
        "lemak"=>'success',
        "vitamin"=>'info',
        "mineral"=>'warning',
        "air"=>'danger',
    );
    // dd($data_program_makan);
    return view("atlet.menumakan", compact('date_range', 'id_program', 'atlet_id', 'data_program_makan', 'label_kategori'));
   }


    public function simpan(Request $request){
        $list_makanan = List_makanan::select("kalori")->findOrFail($request->list_makanan);

        $program_makanan = new Program_makanan;
        $program_makanan->tanggal = $request->tanggal;
        $program_makanan->waktu = $request->waktu;
        $program_makanan->program_id = $request->program_id;
        $program_makanan->atlet_id = $request->atlet_id;
        $program_makanan->list_makanan_id = $request->list_makanan;
        $program_makanan->qty = $request->qty;
        $program_makanan->total_kalori = $request->qty * $list_makanan->kalori;

        $program_makanan->save();

        $request->session()->flash('flash_message', 'Berhasil menambahkan menu makanan.');
        $request->session()->flash('flash_status', 'success');

        return redirect()->back();
   }

   public function hapus($id){
        $program_makanan = Program_makanan::findOrFail($id);

        $program_makanan->delete();

        Session::flash('flash_message', 'Berhasil menghapus menu makanan.');
        Session::flash('flash_status', 'success');

        return redirect()->back();
   
   }

   public function update(Request $request){
    $program_makanan = Program_makanan::findOrFail($request->id);

    $program_makanan->qty = $request->qty_edit;
    $program_makanan->total_kalori = $request->qty_edit * $request->kalori_edit;

    $program_makanan->save();

    Session::flash("flash_message", "Berhasil memperbarui menu makanan.");
    Session::flash("flash_status", "success");

    return redirect()->back();
   }

}
