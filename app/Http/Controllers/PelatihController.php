<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelatihController extends Controller
{
    public function index(){
      return view('pelatih.index');
    }
}
