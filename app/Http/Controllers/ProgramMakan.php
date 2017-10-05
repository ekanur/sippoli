<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kebutuhan_energi;
use App\List_makanan;
use App\Program_makanan;
use App\Atlet;

class ProgramMakan extends Controller
{
   public function index($id_program, $atlet_id){
    return view("atlet.menumakan");
   }
}
