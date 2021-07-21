@extends('layouts.default_layout')

@section('title', 'Create User')

@section('content')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Creata Data User</h3>
                    </div>

                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="Text" class="form-control" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" placeholder="Kode Barang">
                                <p class="text-danger">{{ $errors->first('kode_barang') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="Text" class="form-control" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang">
                                <p class="text-danger">{{ $errors->first('nama_barang') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok') }}" placeholder="Stok Barang">
                                <p class="text-danger">{{ $errors->first('stok') }}</p>
                            </div>
                            
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Jurusan</label>
                                <select name="jurusan_id" id="jurusan_id"  class="form-control">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Status Peminjaman</label>
                                <select name="status_peminjaman_id" id="status_peminjaman_id"  class="form-control">
                                    @foreach ($status_peminjaman as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="photo">Gambar</label>
                                <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                            </div>
                            
                        </div>
      
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection