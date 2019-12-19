<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Result;
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
     * @param  int  Ropasi $ropasi
     * @return \Illuminate\Http\Response
     */
    public function show(Ropasi $ropasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Ropasi $ropasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ropasi $ropasi)
    {
        if(!$ropasi->allguesses == null){
            Result::create([
                'allguesses'    => $ropasi->allguesses,
                'lastthree'     => $ropasi->lastthree,
                'lasttwo'       => $ropasi->lasttwo,
                'lastone'       => $ropasi->lastone,
                'nexthumanmove' => Ropasi::winner($request['guess']),
                'winner'        => Ropasi::result(unserialize($ropasi->lastone)[0]), // 0: tie, 1: computer, 2: human
                'ropasi_id'     => $ropasi->id,
            ]);
        }

        $allguesses = unserialize($ropasi->allguesses);
        if($allguesses == null){
            $allguesses = [];
        }
        array_unshift($allguesses, $request['result']);
        $ropasi->allguesses = serialize($allguesses);
//        $ropasi->lastthree = serialize(array_slice($allguesses, -3, 3, false));
//        $ropasi->lasttwo = serialize(array_slice($allguesses, -2, 2, false));
//        $ropasi->lastone = serialize(array_slice($allguesses, -1, 1, false));
        $ropasi->lastthree = serialize(array_slice($allguesses, 0, 3, false));
        $ropasi->lasttwo = serialize(array_slice($allguesses, 0, 2, false));
        $ropasi->lastone = serialize(array_slice($allguesses, 0, 1, false));
        $ropasi->save();

        if(Result::all()->count() > 5){
            $guide = Ropasi::calculatewin($ropasi, $request['nbsamplelength']);
            $prerandom = rand ( 1000, 9999 ) * 1000;
            $guide = $guide * 100;
            $postrandom = rand ( 10, 99);

            $guide = $guide + $prerandom + $postrandom;
            return $guide;
        }
        return null;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Ropasi $ropasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ropasi $ropasi)
    {
        //
    }
}
