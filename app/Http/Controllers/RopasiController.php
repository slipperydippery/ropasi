<?php

namespace App\Http\Controllers;

use App\Ropasi;
use Illuminate\Http\Request;

class RopasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ropasi = Ropasi::create([]);
        return redirect()->route('ropasi.show', $ropasi);
        return view('ropasi.index');
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
     * @param  \App\Ropasi  $ropasi
     * @return \Illuminate\Http\Response
     */
    public function show(Ropasi $ropasi)
    {
        return view('ropasi.show', compact('ropasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ropasi  $ropasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Ropasi $ropasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ropasi  $ropasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ropasi $ropasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ropasi  $ropasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ropasi $ropasi)
    {
        //
    }
}
