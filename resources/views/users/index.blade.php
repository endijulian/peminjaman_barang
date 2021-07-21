@extends('layouts.default_layout')

@section('title', 'User')

@section('content')
    

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                @if (session('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('status') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card-header">
                    <h3 class="card-title">Data User</h3>
                    <a href="{{ route('user.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Name</th>
                            <th>Nis</th>
                            <th>Jurusan</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration + ($users->perPage()) * ($users->currentPage() - 1) }}</td>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->nis ?? '' }}</td>
                                    {{-- <td>{{ $user->jurusan->nama_jurusan ?? '' }}</td> --}}
                                    <td>
                                        @if ($user->jurusan_id == 1)
                                            <small class="badge badge-success">{{ $user->jurusan->nama_jurusan }}</small>
                                        @else
                                            <small class="badge badge-green">{{ $user->jurusan->nama_jurusan }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $user->username ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->level->name }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt">
                                            </i> Edit</a>
                                            <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')"><i class="fas fa-trash">
                                            </i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        <p>Data Tidak Tersedia</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{$users->appends(Request::all())->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
            </div>
    </div>
</div>

@endsection