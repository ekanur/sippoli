<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListMakananController extends Controller
{
    public function index(){
      return view('list_makanan.index');
    }
}
