<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minuman;
use Illuminate\Support\Str;

class MinumanBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minumans = Minuman::latest()->paginate(5);
        return view('backend.minuman.index',['minumans'=>$minumans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.minuman.create');
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
            'harga' => 'required',
            'resep' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg',
        ]);

        if($request->hasFile('foto')){
            $namaFile = 'img_'.time().'_'.$request->foto->getClientOriginalName();
            $request->foto->move('images',$namaFile);
        }
        else{
            $namaFile='';
        }
        $validateData['foto']=$namaFile;
        Minuman::create($validateData);
        return redirect('/minuman-backend')->with('pesan','Data Berhasil Disimpan');
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
        $minumans = Minuman::find($id);
        return view('backend.minuman.edit',['minumans'=>$minumans]);
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
        'harga' => 'required',
        'resep' => 'required',
        // 'foto' => 'nullable|image|mimes:png,jpg',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);
    
    if ($request->hasFile('foto')) {
        if ($request->foto_old) {
            $imagePath = public_path('/images/' . $request->foto_old); // Menggunakan 'foto_old' untuk menghapus foto lama
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $namaFile = 'img_' . time() . '_' . $request->foto->getClientOriginalName();
        $request->foto->move('images', $namaFile);
    } else {
        $namaFile = $request->foto_old; // Menggunakan 'foto_old' saat tidak ada foto baru diunggah
    }
    
    $validateData['foto'] = $namaFile;

    Minuman::where('id', $id)->update($validateData);
    return redirect('/minuman-backend')->with('pesan', 'Data berhasil diedit');
    
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari = Minuman::find($id);
        if ($cari->file_upload != '') {
            $image_url = public_path() . '/images/' . $cari->file_upload;
            unlink($image_url);
        }

        Minuman::destroy($id);
        return redirect('/minuman-backend')->with('pesanHapus', 'Data berhasil dihapus');
    }
}
