@extends('layouts.default_layout')

@section('title', 'Barang')

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

                @if (Auth::user()->level_id == 1 && 2)
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                        <a href="{{ route('barang.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                @else
                    <div class="card-header">
                        <h3 class="card-title">Data Barang</h3>
                    </div>
                @endif

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($barang as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($barang->perPage()) * ($barang->currentPage() - 1) }}</td>
                                    <td>{{ $item->kode_barang ?? '' }}</td>
                                    <td>{{ $item->nama_barang ?? '' }}</td>
                                    <td>{{ $item->stok ?? '' }}</td>
                                    <td>
                                        <img src="{{asset('uploads/'.$item->photo)}}" alt="" width="100" height="100">
                                    </td>

                                    @if (Auth::user()->level_id == 1 && 2)
                                        <td>
                                            <form action="{{ route('barang.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt">
                                                </i> Edit</a>
                                                <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')"><i class="fas fa-trash">
                                                </i> Hapus</button>
                                            </form>
                                        </td>
                                    @endif
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
                        {{$barang->appends(Request::all())->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
            </div>
    </div>
</div>

@endsection