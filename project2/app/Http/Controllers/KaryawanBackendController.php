<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Posisi;


class KaryawanBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(5);
        return view('backend.karyawan.index',['karyawans'=>$karyawans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posisis = Posisi::All();
        return view('backend.karyawan.create',['posisis'=>$posisis]);
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
            'nama'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'posisi_id'=>'required',
        ]);
        Karyawan::create($validateData);
        return redirect('/karyawan-backend')->with('pesan','Data Berhasil disimpan');
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
        $posisis = Posisi::All();
        return view('backend.karyawan.edit',['karyawans'=>Karyawan::find($id),'posisis'=>$posisis]);
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
            'nama'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
            'posisi_id'=>'required',
        ]);
        Karyawan::where('id',$id)->update($validateData);
        return redirect('/karyawan-backend')->with('pesan','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect('/karyawan-backend')->with('pesanHapus','Data Berhasil dihapus');
    }
}
