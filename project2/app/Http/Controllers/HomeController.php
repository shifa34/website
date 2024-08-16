<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Makanan;
use App\Models\Minuman;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $makanans = Makanan::count();
        $minumans = Minuman::count();
        $karyawans = Karyawan::count();

        $widget = [
            'users' => $users,
            'makanans' => $makanans,
            'minumans' => $minumans,
            'karyawans' => $karyawans,
            //...
        ];

        return view('home', compact('widget'));
    }
}
