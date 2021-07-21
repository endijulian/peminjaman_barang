@extends('layouts.default_layout')

@section('title', 'Edit Kelas')

@section('content')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">EditData Kelas</h3>
                    </div>

                    <form action="{{ route('jurusan.update', $edit_jurusan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">Kode Jurusan</label>
                                <input type="Text" class="form-control" name="code" id="code" value="{{ $edit_jurusan->code ??  old('code') }}" placeholder="Name">
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <input type="Text" class="form-control" name="nama_jurusan" id="nama_jurusan" value="{{ $edit_jurusan->nama_jurusan ??  old('nama_jurusan') }}" placeholder="Name">
                                <p class="text-danger">{{ $errors->first('nama_jurusan') }}</p>
                            </div>
                        </div>
      
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection