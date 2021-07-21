<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\StatusPeminjaman;
use App\Models\StatusPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::paginate(10);

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan            = Jurusan::all();
        $status_peminjaman   = StatusPeminjaman::all();

        return view('barang.create', compact('jurusan', 'status_peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang  = $request->all();

        $validasi = Validator::make($barang, [
            'kode_barang'           => 'required|unique:barang',
            'nama_barang'           => 'required',
            'photo'                 => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'stok'                  => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('barang.create')->withErrors($validasi)->withInput();
        }

        if ($request->file('photo')->isValid()) {
            $foto = $request->file('photo');
            $extention = $foto->getClientOriginalExtension();

            $namaFoto = "barang/" . date('YmdHis') . "." . $extention;
            $upload_path = 'uploads/barang';
            $request->file('photo')->move($upload_path, $namaFoto);

            $barang['photo'] = $namaFoto;
        }

        Barang::create($barang);

        return redirect()->route('barang.index')->with('status', 'Create Data Berhasil');
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
        $edit = Barang::findOrFail($id);
        $jurusan            = Jurusan::all();
        $status_peminjaman   = StatusPeminjaman::all();

        return view('barang.edit', compact('edit', 'jurusan', 'status_peminjaman'));
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
        $barang = Barang::findOrFail($id);
        $input_produk = $request->all();

        $validasi = Validator::make($input_produk, [
            'kode_barang'           => 'required|unique:barang,kode_barang,' . $id,
            'nama_barang'           => 'required',
            'photo'                 => 'sometimes|nullable|image|mimes:png,jpg,jpeg|max:2048',
            'stok'  => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('barang.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                Storage::disk('upload')->delete($barang->photo);

                $photo = $request->file('photo');
                $extention = $photo->getClientOriginalExtension();

                $namaFoto = "barang/" . date('YmdHis') . "." . $extention;
                $upload_path = 'uploads/barang';
                $request->file('photo')->move($upload_path, $namaFoto);

                $input_produk['photo'] = $namaFoto;
            }
        }

        $barang->update($input_produk);

        return redirect()->route('barang.index')->with('status', 'Barang Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        Storage::disk('upload')->delete($barang->photo);

        return redirect()->route('barang.index')->with('status', 'Berhasil Dihapus');
    }
}
