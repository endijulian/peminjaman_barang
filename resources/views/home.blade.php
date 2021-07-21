@extends('layouts.default_layout')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{ $countPinjam }}</h3>

                <p>Dipinjamkan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-random"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{ $diajukan }}</h3>

                <p>Diajukan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-outdent"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>{{ $users }}</h3>

                <p>Siswa</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{ $barang }}</h3>

                <p>Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dolly-flatbed"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
    </div>
</div>

@endsection
