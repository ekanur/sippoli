<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index(){
      return view('latihan.index');
    }

    public function detail(){
      return view('latihan.detail');
    }
}
