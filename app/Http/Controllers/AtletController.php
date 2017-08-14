<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atlet;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('atlet.profilatlet');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('atlet.inputatlet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function save(Request $masuk){

       $namaAtlet = $masuk->nama_atlet;
       $genderAtlet = $masuk->jenis_kelamin;
       $tanggallahir_atlet=$masuk->tglLahirAtlet;
       $caborAtlet = $masuk->cabor_Atlet;




       $tambahAtlet = new Atlet;
       $tambahAtlet ->nama =$namaAtlet;
       $tambahAtlet ->gender=  $genderAtlet;
       $tambahAtlet ->tgl_lahir =$tanggallahir_atlet ;
       $tambahAtlet ->status ='1';
       $tambahAtlet ->cabor_id= $caborAtlet;
       $tambahAtlet ->pelatih_id='1';
       $tambahAtlet->save();

       return redirect()->back();

       //return ("proses simpan");
      //  $tambahAtlet->nama =$masuk->namaAtlet;


     }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
