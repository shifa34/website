<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mimunan;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function index()
    //  {
    //      $minumans = Minuman::all()->map(function ($minuman) {
    //          $nama = explode(' ', $minuman->nama);
    //          $minuman->nama = $nama[0];
    //          return $minuman;
    //      })->unique('nama');
     
    //      return view('frontend.index', ['minumans' => $minumans]);
    //  }
     

    public function index()
    {
        $minumans = Minuman::all();
        return view('frontend.index',['minumans'=>$minumans]);
    }

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
