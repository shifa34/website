<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use Illuminate\Support\Str;

class BahanBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahans = Bahan::latest()->paginate(5);
        return view('backend.bahan.index',['bahans'=>$bahans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        Bahan::create($validateData);
        return redirect('/bahan-backend')->with('pesan','Data Berhasil Disimpan');
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
        $bahans = Bahan::find($id);
        return view('backend.bahan.edit',['bahans'=>$bahans]);
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
    $validateData = $request->validate([
        'nama' => 'required',
        'stok' => 'required',
        'harga' => 'required',
    ]);
    
    
    Bahan::where('id', $id)->update($validateData);
    return redirect('/bahan-backend')->with('pesan', 'Data berhasil diedit');
    
    
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bahan::destroy($id);
        return redirect('/bahan-backend')->with('pesanHapus', 'Data berhasil dihapus');
    }
}
