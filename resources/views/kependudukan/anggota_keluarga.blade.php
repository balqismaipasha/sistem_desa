@extends('layout.template')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Anggota Keluarga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kependudukan</a></li>
                        <li class="breadcrumb-item active">Kartu Keluarga</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @include('sweetalert::alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ url('/tambah_anggota_keluarga/' . $data_kk->No_KK) }}"
                                    class="btn btn-success"><i class="fa fa-users"></i>
                                    Tambah Anggota Keluarga
                                </a>

                                <a href="{{ url('/generate-pdf/' . $data_kk->No_KK) }}" class="btn btn-info "
                                    title="Cetak Kartu Keluarga"><i class="fa fa-book"></i>
                                    Kartu Keluarga
                                </a>
                            </h3>
                        </div>
                    </div>

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Rincian Kartu Keluarga
                                    <small class="float-right">Tanggal: {{ date('d-m-Y') }}</small>
                                </h4>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-5">
                                <div class="table-responsive">
                                    <table class="table table-borderless ">
                                        <tr>
                                            <th>No Kepala Keluarga (KK)</th>
                                            <td>:</td>
                                            <td>{{ $data_kk->No_KK }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kepala Keluarga</th>
                                            <td>:</td>
                                            <td>{{ $data_kk->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td>{{ $data_kk->alamat_sebelumnya }}</td>
                                        </tr>
                                        <tr>
                                            <th>Program Bantuan</th>
                                            <td>:</td>
                                            <td>{{ $bantuan->nama_bantuan }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Hubungan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_anggota_kk as $values)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $values->nik }}</td>
                                                <td>{{ $values->nama }}</td>
                                                <td>{{ $values->tempatlahir }}/{{ date('d-m-Y', strtotime($values->tanggallahir)) }}
                                                </td>
                                                <td>{{ $values->jk }}</td>
                                                <td>{{ $values->status }}</td>

                                                <td>

                                                    @if ($values->status === 'Kepala Keluarga')
                                                        <a href="{{ url('/edit_penduduk/' . $values->nik) }}"
                                                            title="Edit Data Penduduk"
                                                            class="btn btn-warning btn-flat btn-sm">
                                                            <i class="fas fa-edit"></i></a>
                                                        <a href="{{ url('/hapus_anggota_kk/' . $values->nik) }}"
                                                            class="btn bg-maroon btn-flat btn-sm disabled"
                                                            title="Bukan anggota keluarga ini"
                                                            data-body="Apakah yakin akan dikeluarkan dari keluarga ini?"><i
                                                                class="fas fa-times"></i></a>
                                                    @else
                                                        <a href="{{ url('/edit_penduduk/' . $values->nik) }}"
                                                            title="Edit Data Penduduk"
                                                            class="btn btn-warning btn-flat btn-sm">
                                                            <i class="fas fa-edit"></i></a>

                                                        <a href="{{ url('/hapus_anggota_kk/' . $values->nik . '/' . $values->No_KK) }}"
                                                            class="btn bg-maroon btn-flat btn-sm"
                                                            title="Bukan anggota keluarga ini"
                                                            data-body="Apakah yakin akan dikeluarkan dari keluarga ini?"><i
                                                                class="fas fa-times"></i></a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
