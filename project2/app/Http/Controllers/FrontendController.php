<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Minuman;
use App\Models\Pelanggan;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.index',[
            'makanans'=> Makanan::all(),
            'minumans'=> Minuman::all(),
            'pelanggans'=> Pelanggan::all(),
        ]);
        /* $makanans = Makanan::all();
        return view('frontend.index',['makanans'=>$makanans]);

        $minumans = Minuman::all();
        return view('frontend.index',['minumans'=>$minumans]); */
    }

//     public function index()
// {
//     $makanans = Makanan::all();
//     $minumans = Minuman::all();

//     $uniqueMakanans = $makanans->pluck('nama')->map(function ($nama) {
//         return explode(' ', $nama)[0];
//     })->unique();

//     $uniqueMinumans = $minumans->pluck('nama')->map(function ($nama) {
//         return explode(' ', $nama)[0];
//     })->unique();

//     return view('frontend.index', compact('makanans', 'minumans', 'uniqueMakanans', 'uniqueMinumans'));
// }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
