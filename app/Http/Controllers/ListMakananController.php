<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\List_makanan;
use Auth;

class ListMakananController extends Controller
{
    function __construct()
    {
      $this->middleware("auth");
    }
    public function index(){
    	$list_makanan = List_makanan::whereIn("pelatih_id", [1, Auth::user()->id])->get();
      return view('list_makanan.index', compact('list_makanan'));
    }

    public function simpan(Request $request){
    	$list_makanan = new List_makanan;

    	$list_makanan->nama = $request->nama;
    	$list_makanan->kategori = $request->kategori;
    	$list_makanan->pelatih_id = Auth::user()->id;
    	$list_makanan->kalori = $request->kalori;

    	$list_makanan->save();

    	$request->session()->flash('flash_message', 'Berhasil menambah makanan.');
    	$request->session()->flash('flash_status', 'success');

    	return redirect()->back();
    }

    public function getFromKategori($kategori){
        $list_makanan = List_makanan::where("kategori", $kategori)->get();

        return response()->json($list_makanan);
    }
}
