@extends('layouts.default_layout')

@section('title', 'Edit Peminjaman')

@section('content')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Peminjaman</h3>
                    </div>

                        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" class="form-control" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                        @if (Auth::user()->level_id == 1 && 2)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        
                                        <div class="form-group">
                                            <label for="barang_id">Barang</label>
                                            <select name="barang_id" id="barang_id"  class="form-control">
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}" @if($item->id == $peminjaman->barang_id) selected @endif>{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                            <input type="text" class="form-control" name="tanggal_peminjaman" id="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman ?? old('tanggal_peminjaman') }}">
                                            <p class="text-danger">{{ $errors->first('tanggal_peminjaman') }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                            <input type="text" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ $peminjaman->tanggal_pengembalian ?? old('tanggal_pengembalian') }}">
                                            <p class="text-danger">{{ $errors->first('tanggal_pengembalian') }}</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $peminjaman->jumlah ?? old('jumlah') }}">
                                            <p class="text-danger">{{ $errors->first('jumlah') }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="status_pengajuan_id">Status Pengajuan</label>
                                            <select name="status_pengajuan_id" id="status_pengajuan_id"  class="form-control">
                                                @foreach ($status_pengajuan as $item)
                                                    <option value="{{ $item->id }}" @if($item->id == $peminjaman->status_pengajuan_id) selected @endif>{{ $item->name_pengajuan }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="note_barang">Note</label>
                                            <textarea name="note_barang" id="note_barang" cols="30" rows="5" class="form-control">{{ $peminjaman->note_barang }}</textarea>
                                            <p class="text-danger">{{ $errors->first('note_barang') }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        <label for="barang_id">Barang</label>
                                        <select name="barang_id" id="barang_id"  class="form-control">
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}" @if($item->id == $peminjaman->barang_id) selected @endif>{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                        <input type="text" class="form-control" name="tanggal_peminjaman" id="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman ?? old('tanggal_peminjaman') }}">
                                        <p class="text-danger">{{ $errors->first('tanggal_peminjaman') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                        <input type="text" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ $peminjaman->tanggal_pengembalian ?? old('tanggal_pengembalian') }}">
                                        <p class="text-danger">{{ $errors->first('tanggal_pengembalian') }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card-body">
                                    <input type="hidden" class="form-control" name="status_pengajuan_id" id="status_pengajuan_id" value="3">
                                    <input type="hidden" class="form-control" name="status_peminjaman_id" id="status_peminjaman_id" value="1">
                                </div>
                            </div>
                        </div>
                        @endif
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>

    
<script type="text/javascript">

    $(document).ready(function() {            

    $('#tanggal_peminjaman').datepicker({                      

        format: 'dd-mm-yy',

        autoclose: true,

    }); 

    });

</script>

@endsection
