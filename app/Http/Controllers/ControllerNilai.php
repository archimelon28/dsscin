<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ModelPenilaian;
class ControllerNilai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penilaian');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function rating()
    {
        $rating = DB::table('tb_penilaian')->join('tb_kampus','tb_kampus.id_kampus','=','tb_penilaian.id_kampus')->select('tb_kampus.*','tb_penilaian.rating') ->get();
        $sort_rating = $rating->sortByDesc('rating');

        // dd($sort_rating);die();
        return view('rating',compact('sort_rating'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilai = ModelPenilaian::select('id_penilaian')->first();

        $ukt = $request->ukt;
        $akre = $request->akreditasi;
        $sara = $request->sarana;

        $uktbagi = DB::table('tb_penilaian')->max('ukt');
        $akrebagi = DB::table('tb_penilaian')->min('akreditas');
        $sarabagi = DB::table('tb_penilaian')->min('sarana_prasarana');
        // dd($uktbagi);die();

        $data = DB::table('tb_penilaian')->select('id_penilaian','ukt','akreditas','sarana_prasarana')->get();
        //perangkingan
        foreach ($data as $d ) {
            $x = ($d->ukt/$uktbagi) * $ukt + ($akrebagi/$d->akreditas) * $akre + ($sarabagi/$d->sarana_prasarana) * $sara;
            DB::table('tb_penilaian')->where('id_penilaian',$d->id_penilaian)->update(['rating' => $x]);
        }
        return redirect()->route('rating')->with('alert-success', 'Yeah Selamat!! Anda berhasil menambahkan data!');
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
