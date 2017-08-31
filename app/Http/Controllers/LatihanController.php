<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\List_latihan;

class LatihanController extends Controller
{
    public function index(){
      $daftardariPelatih=List_latihan::where('pelatih_id',1)->get();
      $daftarsemuaLatihan=List_latihan::all();
      return view('latihan.index', compact('daftarsemuaLatihan','daftardariPelatih'));
    }

    public function detail($id){
      $latihan=List_latihan::findOrFail($id);
      // dd($latihan);
      return view('latihan.detail', compact('latihan'));
    }

    public function save(Request $masuk){
       $namaLatihan =$masuk->nameLatihan ;
       $kategoriLatihan=$masuk->cateogryLatihan;
       $deskripsiLatihan=$masuk->deskripsi_Latihan;
       // $linkVideo=$masuk->video_Latihan;
       $caborLatihan=$masuk->cabor_id;
      // $caborLatihan=intval(round($caborLatihan));

      $tambahLatihan = new List_latihan;
      $tambahLatihan->nama=$namaLatihan;
      $tambahLatihan->kategori=$kategoriLatihan;
      $tambahLatihan->deskripsi=$deskripsiLatihan;
      // $tambahLatihan->video=$linkVideo;
      $tambahLatihan->pelatih_id='1';
      $tambahLatihan->cabor_id=1;
      $tambahLatihan->save();


      return redirect()->back();

    }


}
