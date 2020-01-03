<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKampus;
use App\ModelPenilaian;
use DB;
class ControllerKampus extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kampus = DB::table('tb_kampus')->get();
        return view('kampus',compact('kampus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_kampus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kampus = new ModelKampus();

        $kampus->nama = $request->nama;
        $kampus->gambar = $request->gambar;

        $gambar = $request->file('gambar');
        $ext = $gambar->getClientOriginalExtension();
        $newName = "gambar ".date('Ymd_his').".".$ext;
        $gambar->move('uploads/gambar',$newName);
        $kampus->gambar = $newName;

        $kampus->ukt = $request->ukt;
        $kampus->akreditas = $request->akreditasi;
        $kampus->sarana_prasarana = $request->sarana;
        
        $kampus->save();

        $nilai = new ModelPenilaian();

        if ($request->ukt <= 3000000) {
            $ukt = 100;
        } else  if ($request->ukt > 3000000 && $request->ukt <= 5000000)
        {
            $ukt = 70;
        } else  if ($request->ukt > 5000000 && $request->ukt <= 7000000)
        {
            $ukt = 40;
        } else  if ($request->ukt > 7000000 && $request->ukt <= 10000000)
        {
            $ukt = 20;
        } else  if ($request->ukt > 10000000)
        {
            $ukt = 5;
        }


        if ($request->akreditasi = "D") {
            $akre = 25;
        } elseif ($request->akreditasi = "C")
        {
            $akre = 50;
        } elseif ($request->akreditasi = "B")
        {
            $akre = 75;
        }elseif ($request->akreditasi = "A")
        {
            $akre = 100;
        }
        
        if ($request->sarana <= 3)
        {
            $sara = 30;
        } else if ($request->sarana > 3 && $request->sarana <= 6)
        {
            $sara = 60;
        } else if ($request->sarana > 6)
        {
            $sara = 90;
        }

        $id = DB::table('tb_kampus')->get();
        $idd = $id->sortByDesc('id_kampus')->pluck('id_kampus')->first();



        $nilai->id_kampus = $idd;
        $nilai->ukt = $ukt;
        $nilai->akreditas = $akre;
        $nilai->sarana_prasarana = $sara;
        $nilai->save();
        
        return redirect()->route('kampus.index')->with('alert-success', 'Yeah Selamat!! Anda berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
