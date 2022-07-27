@extends('layout.template')

@section('content')
    {{-- <div class="container-fluid"> --}}

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Beranda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalpenduduk }}</h3>
                            <p>Penduduk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="{{ url('/penduduk') }}" class="small-box-footer">Info Lanjutan <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalKK }}</h3>
                            <p>Kartu Keluarga</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-card"></i>
                        </div>
                        <a href="{{ url('/kartu_keluarga') }}" class="small-box-footer">Info Lanjutan <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $bantuan }}</h3>
                            <p>Bantuan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-heart"></i>
                        </div>
                        <a href="{{ url('/bantuan') }}" class="small-box-footer">Info Lanjutan <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $user }}</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('/profil') }}" class="small-box-footer">Info Lanjutan <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

            {{-- </div> --}}
    </section>
@endsection
