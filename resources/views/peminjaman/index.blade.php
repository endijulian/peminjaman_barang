@extends('layouts.default_layout')

@section('title', 'Peminjaman')

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
                    <h3 class="card-title">Data Peminjaman</h3>
                    <a href="{{ route('peminjaman.create') }}" class="float-right btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                    @if (Auth::user()->level_id == 1 || Auth::user()->level_id == 2)
                        <a href="{{ route('peminjaman.cetakLaporan') }}" class="float-right btn btn-success" style="margin-right: 10px;"><i class="fas fa-print"></i> Cetak Laporan</a>
                    @endif
                </div>

                @if (Auth::user()->level_id == 1 || Auth::user()->level_id == 2)
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th> 
                                <th>Jumlah</th>
                                <th>Status Pengajuan</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjaman as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($peminjaman->perPage()) * ($peminjaman->currentPage() - 1) }}</td>
                                        <td>{{ $item->barang->nama_barang ?? '' }}</td>
                                        <td>{{ $item->users->name ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_peminjaman )->format('d M Y') ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pengembalian )->format('d M Y') ?? '' }} </td>
                                        <td>{{ $item->jumlah ?? '' }}</td>
                                        {{-- <td>
                                            @if ($item->status_peminjaman_id == 1)
                                                <small class="badge badge-success">{{ $item->status_peminjaman->name }}</small>
                                            @else
                                                <small class="badge badge-danger">{{ $item->status_peminjaman->name }}</small>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if ($item->status_pengajuan_id == 1)
                                                <small class="badge badge-success">{{ $item->status_pengajuan->name_pengajuan }}</small>
                                            @elseif ($item->status_pengajuan_id == 2)
                                                <small class="badge badge-danger">{{ $item->status_pengajuan->name_pengajuan }}</small>
                                            @else
                                                <small class="badge badge-warning">{{ $item->status_pengajuan->name_pengajuan }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $item->note_barang }}</td>

                                        @if (Auth::user()->level_id == 1)
                                            <td>
                                                <form action="{{ route('peminjaman.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt">
                                                    </i> Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')"><i class="fas fa-trash">
                                                    </i> Hapus</button>
                                                </form>
                                            </td>
                                        @endif
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center p-5">
                                            <p>Data Tidak Tersedia</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th> 
                                <th>Status Pengajuan</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjaman as $item)

                                @if (Auth::user()->id == $item->users_id)
                                    <tr>
                                        <td>{{ $loop->iteration + ($peminjaman->perPage()) * ($peminjaman->currentPage() - 1) }}</td>
                                        <td>{{ $item->barang->nama_barang ?? '' }}</td>
                                        <td>{{ $item->users->name ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_peminjaman )->format('d M Y') ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pengembalian )->format('d M Y') ?? '' }} </td>
                                        <td>
                                            @if ($item->status_pengajuan_id == 1)
                                                <small class="badge badge-success">{{ $item->status_pengajuan->name_pengajuan }}</small>
                                            @elseif ($item->status_pengajuan_id == 2)
                                                <small class="badge badge-danger">{{ $item->status_pengajuan->name_pengajuan }}</small>
                                            @else
                                                <small class="badge badge-warning">{{ $item->status_pengajuan->name_pengajuan }}</small>
                                            @endif
                                        
                                        </td>
                                        <td>{{ $item->note_barang }}</td>
                                        <td>
                                            @if ($item->status_pengajuan_id == 2 ||  $item->status_pengajuan_id == 3)
                                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt">
                                                        </i> Edit</a>
                                                        <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')"><i class="fas fa-trash">
                                                        </i> Hapus</button>
                                                    </form>
                                            @elseif ($item->status_pengajuan_id == 3)
                                                <form action="{{ route('peminjaman.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt">
                                                    </i> Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="alert('Yakin ingin di hapus?')"><i class="fas fa-trash">
                                                    </i> Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center p-5">
                                            <p>Data Tidak Tersedia</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{$peminjaman->appends(Request::all())->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
            </div>
    </div>
</div>

@endsection