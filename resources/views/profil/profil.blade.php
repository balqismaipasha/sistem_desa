@extends('layout.template')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    @include('sweetalert::alert')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ url('dist/img/pegawai.png') }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-muted text-center">Administrator</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Bergabung</b> <a class="float-right">{{ Auth::user()->created_at }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Updated</b> <a class="float-right">{{ Auth::user()->updated_at }}</a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-success btn-block"><b>Online</b></a>
                        </div>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Setting Akun</h3>
                        </div>

                        <form class="form-horizontal" action="{{ url('/ubah_profil/' . Auth::user()->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap"
                                            value="{{ Auth::user()->name }}" name="nama">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                                            value="{{ Auth::user()->email }}" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"> <i class="fas fa-edit"></i> Ubah</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>

        </div>
    </section>
@endsection
