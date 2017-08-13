<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
      return view('program.index');
    }

    public function add(){
      return view('program.add');
    }

    public function store(Request $request){
      return redirect('/program');
    }

    public function edit($id_program){
    	return view("program.index");
    }

    public function pilihAtlet($id_program){
    	return view("program.pilih_atlet");
    }

    public function siklusMikro($id_program){
    	return view("program.siklus_mikro");
    }

    public function sesiLatihan($id_program, $id_siklus_mikro){
    	return view("program.sesi_latihan");
    }

    public function programMakanan($id_program){
    	return view("program.makanan");
    }
}
