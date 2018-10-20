<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use Auth;

class CetakProgramController extends Controller
{
    function __construct()
    {
      $this->middleware("auth");
    }
    public function index($id_program){
      $program = Program::findOrFail($id_program);

      if($program->pelatih_id != Auth::user()->id){
        abort(404);
      }

      // $pdf = PDF::loadView('program.print_layout', compact('program'));
      // $filename = $program->nama . ' [detail].pdf';
      // return $pdf->stream($filename);
      return view('program.print_layout', compact('program'));
    }

    // public function cetakProgramMakan($id_program, $atlet_id){
    //   dd(Program::find($id_program)->atlet);
    // }
}
