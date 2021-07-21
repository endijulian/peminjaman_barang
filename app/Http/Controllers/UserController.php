<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level_id', 3)->paginate(20);

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $jurusan = Jurusan::all();
        return view('users.create', compact('levels', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_user = $request->all();

        $validasi = Validator::make($input_user, [
            'name'          => 'required|max:50',
            'nis'           => 'required',
            'jurusan_id'    => 'required',
            'username'      => 'required|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|string|min:8|confirmed',
            'level_id'      => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.create')->withErrors($validasi)->withInput();
        }

        $input_user['password'] = Hash::make($input_user['password']);
        User::create($input_user);

        return redirect()->route('user.index')->with('status', 'Create Data User Berhasil');
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
        $levels = Level::all();
        $users = User::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('users.edit', compact('users', 'levels', 'jurusan'));
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
        $user           = User::findOrFail($id);
        $update_user    = $request->all();

        $validasi = Validator::make($update_user, [
            'name'          => 'required|max:50',
            'nis'           => 'required',
            'jurusan_id'    => 'required',
            'username'      => 'required|unique:users,username,' . $id,
            'email'         => 'required|email|unique:users,email,' . $id,
            'password'      => 'sometimes|nullable|string|min:8|confirmed',
            'level_id'      => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.edit', $id)->withErrors($validasi)->withInput();
        }

        if ($request->input('password')) {
            $update_user['password'] = Hash::make($update_user['password']);
        } else {
            $update_user = Arr::except($update_user, ['password']);
        }

        $user->update($update_user);

        return redirect()->route('user.index', $id)->with('status', 'Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_user = User::findOrFail($id);
        $delete_user->delete();

        return redirect()->route('user.index')->with('status', 'Data Berhasil Dihapus');
    }
}
