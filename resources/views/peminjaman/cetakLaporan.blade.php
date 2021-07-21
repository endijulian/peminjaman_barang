@extends('layouts.default_layout')

@section('title', 'Cetak Laporan')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <form action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tglawal">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tglawal" id="tglawal" required>
                    </div>
                    <div class="form-group">
                        <label for="tglakhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tglakhir" id="tglakhir" required>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" onclick="this.href='cetakLaporanTgl/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-success">Cetak Laporan Pertanggal</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection