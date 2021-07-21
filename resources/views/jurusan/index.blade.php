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
                    <h3 class="card-title">Data Kelas</h3>
                    <a href="{{ route('jurusan.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode Jurusan</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($jurusan as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($jurusan->perPage()) * ($jurusan->currentPage() - 1) }}</td>
                                    <td>{{ $item->code ?? '' }}</td>
                                    <td>{{ $item->nama_jurusan ?? '' }}</td>
                                    <td>
                                        <form action="{{ route('jurusan.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-sm btn-info"> <i class="fas fa-pencil-alt">
                                            </i> Edit</a>
                                            <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')"><i class="fas fa-pencil-alt">
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
                        {{$jurusan->appends(Request::all())->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
            </div>
    </div>
</div>

@endsection