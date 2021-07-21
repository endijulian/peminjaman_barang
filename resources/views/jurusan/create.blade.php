@extends('layouts.default_layout')

@section('title', 'Create Kelas')

@section('content')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Creata Data Kelas</h3>
                    </div>

                    <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">Kode Jurusan</label>
                                <input type="Text" class="form-control" name="code" id="code" value="{{ old('code') }}" placeholder="Kode Jurusan">
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="Text" class="form-control" name="nama_jurusan" id="nama_jurusan" value="{{ old('nama_jurusan') }}" placeholder="Nama Jurusan">
                                <p class="text-danger">{{ $errors->first('nama_jurusan') }}</p>
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