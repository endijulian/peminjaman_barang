<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\StatusPeminjaman;
use App\Models\StatusPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::paginate(10);

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang             = Barang::all();
        $status_pengajuan   = StatusPengajuan::orderBy('id', 'DESC')->get();
        $status_peminjaman  = StatusPeminjaman::all();

        return view('peminjaman.create', compact(
            'barang',
            'status_pengajuan',
            'status_peminjaman'
        ));
    }

    public function edit($id)
    {
        $peminjaman         = Peminjaman::findOrFail($id);
        $barang             = Barang::all();
        $status_pengajuan   = StatusPengajuan::all();
        $status_peminjaman  = StatusPeminjaman::all();

        return view('peminjaman.edit', compact(
            'barang',
            'status_pengajuan',
            'status_peminjaman',
            'peminjaman'
        ));
    }

    public function store(Request $request)
    {
        $create_peminjaman = $request->all();
        // dd($create_peminjaman);

        $validasi = Validator::make($create_peminjaman, [
            'barang_id'             => 'required',
            'users_id'              => 'required',
            'tanggal_peminjaman'    => 'required|date',
            'tanggal_pengembalian'  => 'required|date',
            'note_barang'           => 'nullable',
            'jumlah'                => 'required',
            'status_pengajuan_id'   => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('peminjaman.create')->withErrors($validasi)->withInput();
        }

        $barang = Barang::find($request->barang_id);
        if ($request->jumlah > $barang->stok) {
            return redirect()->route('peminjaman.index')->with('error', 'Stok Barang Kosong Atau Jumlah Peminjaman Melebihi Stok');
        } else {
            $barang = Barang::find($request->barang_id)->decrement('stok', $request->jumlah);
            Peminjaman::create($create_peminjaman);

            return redirect()->route('peminjaman.index')->with('status', 'Data Berhasil Dibuat');
        }
        // // $barang->save();

    }

    public function update(Request $request, $id)
    {
        $peminjaman         = Peminjaman::findOrFail($id);
        $update_peminjaman  = $request->all();
        // dd($update_peminjaman);

        $validasi = Validator::make($update_peminjaman, [
            'barang_id'             => 'required',
            'users_id'              => 'required',
            'tanggal_peminjaman'    => 'required|date',
            'tanggal_pengembalian'  => 'required|date',
            'note_barang'           => 'nullable',
            'jumlah'                => 'required',
            'status_pengajuan_id'   => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('peminjaman.edit', $id)->withErrors($validasi)->withInput();
        }

        $peminjaman->update($update_peminjaman);

        return redirect()->route('peminjaman.index')->with('status', 'Data Berhasil Update');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        Storage::disk('upload')->delete($peminjaman->photo);

        return redirect()->route('peminjaman.index')->with('status', 'Berhasil Dihapus');
    }

    public function cetakLaporan()
    {
        // $peminjaman = Peminjaman::all();
        return view('peminjaman.cetakLaporan');
    }

    public function cetakLaporanTgl($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir : " . $tglakhir]);
        $cetakPeminjaman = Peminjaman::whereBetween('tanggal_peminjaman', [$tglawal, $tglakhir])->where('status_pengajuan_id', 1)->get();

        return view('peminjaman.cetakLaporanTgl', compact('cetakPeminjaman'));
    }
}
