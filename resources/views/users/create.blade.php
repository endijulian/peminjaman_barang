@extends('layouts.default_layout')

@section('title', 'Create User')

@section('content')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Creata Data User</h3>
                    </div>

                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="Text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="nis">Nis</label>
                                            <input type="Text" class="form-control" name="nis" id="nis" value="{{ old('nis') }}" placeholder="Name">
                                            <p class="text-danger">{{ $errors->first('nis') }}</p>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="jurusan_id">Jurusan</label>
                                            <select name="jurusan_id" id="jurusan_id"  class="form-control">
                                                @foreach ($jurusan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        </div>
            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Level</label>
                                            <select name="level_id" id="level_id"  class="form-control">
                                                @foreach ($levels as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Username">
                                            <p class="text-danger">{{ $errors->first('username') }}</p>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="password-confirm">Ulangi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="{{ old('password') }}" required autocomplete="new-password" placeholder="Password">
                                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                        </div>
            

                                    </div>
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