<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kebutuhan_energi;

class ProgramMakan extends Controller
{
    public function simpan(Request $request){
    	$json_kebutuhan = json_encode(array(
    		"persiapan_umum"=>$request->persiapan_umum,
    		"persiapan_khusus"=>$request->persiapan_khusus,
    		"pra_kompetisi"=>$request->pra_kompetisi,
    		"kompetisi"=>$request->kompetisi,
    		"transisi"=>$request->transisi,
    	));

    	$kebutuhan_energi = new Kebutuhan_energi;
    	$kebutuhan_energi->program_id = $request->program_id;
    	$kebutuhan_energi->json_kebutuhan_per_siklus_makro = $json_kebutuhan;
    	$kebutuhan_energi->save();

    	$request->session()->flash('flash_message', "Berhasil menyimpan kebutuhan energi pada siklus makro.");
    	$request->session()->flash('flash_status', "success");

    	return redirect()->back();
    }
}
