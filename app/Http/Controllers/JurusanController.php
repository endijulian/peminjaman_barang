<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::paginate(20);

        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function edit($id)
    {
        $edit_jurusan = Jurusan::findOrFail($id);

        return view('jurusan.edit', compact('edit_jurusan'));
    }

    public function store(Request $request)
    {
        $input_jurursan = $request->all();

        $validasi = Validator::make($input_jurursan, [
            'code'          => 'required',
            'nama_jurusan' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('jurusan.create')->withErrors($validasi)->withInput();
        }

        Jurusan::create($input_jurursan);

        return redirect()->route('jurusan.index')->with('status', 'Data Jurusan Berhasil');
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $update_jurusan = $request->all();

        $validasi = Validator::make($update_jurusan, [
            'code'          => 'required',
            'nama_jurusan' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('jurusan.edit', $id)->withErrors($validasi)->withInput();
        }

        $jurusan->update($update_jurusan);

        return redirect()->route('jurusan.index')->with('status', 'Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $delete_jurusan = Jurusan::findOrFail($id);
        $delete_jurusan->delete();


        return redirect()->route('jurusan.index')->with('status', 'Berhasil Dihapus');
    }
}
