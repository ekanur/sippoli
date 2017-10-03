<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\List_latihan;
use App\Cabor;
use Session;

class LatihanController extends Controller
{
    public function index(){
      $daftardariPelatih=List_latihan::where('pelatih_id',1)->get();
      $daftarsemuaLatihan=List_latihan::all();
      $cabor = Cabor::all();
      return view('latihan.index', compact('daftarsemuaLatihan','daftardariPelatih', 'cabor'));
    }

    public function detail($id){
      $latihan=List_latihan::findOrFail($id);
      // dd($latihan);
      return view('latihan.detail', compact('latihan','id'));
    }

    public function save(Request $masuk){
       $namaLatihan =$masuk->nameLatihan ;
       $kategoriLatihan=$masuk->cateogryLatihan;
       $deskripsiLatihan=$masuk->deskripsi_latihan;
       // $linkVideo=$masuk->video_Latihan;
       // $caborLatihan=$masuk->cabor_id;
      // $caborLatihan=intval(round($caborLatihan));

      $tambahLatihan = new List_latihan;
      $tambahLatihan->nama=$namaLatihan;
      $tambahLatihan->kategori=$kategoriLatihan;
      $tambahLatihan->deskripsi=$deskripsiLatihan;
      // $tambahLatihan->video=$linkVideo;
      $tambahLatihan->pelatih_id='1';
      $tambahLatihan->cabor_id=$masuk->cabor_id;
      $tambahLatihan->save();
      Session::flash("flash_message", "Berhasil menambahkan latihan");
      Session::flash("flash_status", "success");
      return redirect()->back();
      // return redirect()->back()->with('sukses_tambah_latihan', $tambahLatihan->nama=$namaLatihan);
    }

    public function hapus($id_latihan){
      $daftardariPelatih=List_latihan::where('pelatih_id',$id_latihan)->get();
      try{
        $hapusLatihan= List_latihan::findOrFail($id_latihan);
        $hapusLatihan ->delete();
        return redirect()->back()->with([
          'alert'=> 'item berhasil di hapus',
          'tipe' => 'success'
        ]);
      }
      catch (Exception $e){
          return redirect()->back()->with([
            'alert'=>$e->getMessage,
            'tipe'=> 'danger'
          ]);
      }
    }

    public function edit($id){
      $latihan=List_latihan::where([['id',$id], ['pelatih_id', 1]])->firstOrFail();

      return view("latihan.edit", compact('latihan'));
    }

    public function update(Request $request){
      $latihan = List_latihan::findOrFail($request->id);
      $latihan->nama = $request->nameLatihan;
      $latihan->kategori = $request->cateogryLatihan;
      $latihan->deskripsi = $request->deskripsi_latihan;
      $latihan->save();

      $request->session()->flash('flash_message', "Berhasil memperbarui latihan.");
      $request->session()->flash('flash_status', "success");

      return redirect("/latihan/".$request->id);
    }
}
