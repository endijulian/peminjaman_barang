<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

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
        $countPinjam = Barang::where('status_peminjaman_id', 1)->count();
        $diajukan = Peminjaman::where('status_pengajuan_id', 3)->count();
        $users = User::where('level_id', 3)->count();
        $barang = Barang::count();

        return view('home', compact(
            'countPinjam',
            'diajukan',
            'users',
            'barang'
        ));
    }
}
