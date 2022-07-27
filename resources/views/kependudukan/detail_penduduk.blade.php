@extends('layout.template')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Biodata Penduduk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kependudukan</a></li>
                        <li class="breadcrumb-item">Penduduk</li>
                        <li class="breadcrumb-item active">Biodata Penduduk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if (is_null($data_penduduk->nik))
                                    <a href="{{ url('/edit_penduduk/' . $penduduk->nik) }}"
                                        class="btn btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                        title="Ubah Biodata"><i class="fa fa-edit"></i> Ubah Biodata</a>
                                @else
                                    <a href="{{ url('/edit_penduduk/' . $data_penduduk->nik) }}"
                                        class="btn btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                        title="Ubah Biodata"><i class="fa fa-edit"></i> Ubah Biodata</a>
                                @endif

                                @if (is_null($data_penduduk->nik))
                                    <a href="{{ url('/generate-pdf-nik/' . $penduduk->nik) }}"
                                        class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                        title="Cetak Biodata" target="_blank"><i class="fa fa-print"></i> Cetak Biodata</a>
                                @else
                                    <a href="{{ url('/generate-pdf-nik/' . $data_penduduk->nik) }}"
                                        class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                        title="Cetak Biodata" target="_blank"><i class="fa fa-print"></i> Cetak Biodata</a>
                                @endif

                                @if (is_null($data_penduduk->nik))
                                    <a href="#"
                                        class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block disabled"
                                        title="Anggota Keluarga"><i class="fa fa-users"></i> Anggota Keluarga</a>
                                @else
                                    <a href="{{ url('/lihat_anggota_keluarga/' . $data_penduduk->No_KK) }}"
                                        class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                        title="Anggota Keluarga"><i class="fa fa-users"></i> Anggota Keluarga</a>
                                @endif
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-header with-border">
                                        <h4 class="box-title text-bold">Biodata Penduduk (NIK :
                                            @if (is_null($data_penduduk->nik))
                                                {{ $penduduk->nik }}
                                            @else
                                                {{ $data_penduduk->nik }}
                                            @endif
                                            )
                                        </h4>
                                        <p class="text-sm-left text">
                                            Terdaftar pada:

                                            <i
                                                class="fa fa-clock-o"></i>{{ date('d F Y', strtotime($data_penduduk->created_at)) }}
                                            <i class="fa fa-user"></i> By Administrator
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <tr class="text-center">
                                                <td colspan="3">
                                                    @if ($data_penduduk->jk == 'Perempuan')
                                                        <img class="penduduk profile-user-img img-responsive img-circle"
                                                            src="{{ url('dist/img/avatar_p.png') }}" alt="Foto">
                                                    @else
                                                        <img class="penduduk profile-user-img img-responsive img-circle"
                                                            src="{{ url('dist/img/avatar_l.png') }}" alt="Foto">
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tbody class="font-italic">
                                                        <tr>
                                                            <td width="300">Nama Lengkap</td>
                                                            <td width="1">:</td>
                                                            <td>{{ $data_penduduk->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Kartu Keluarga</td>
                                                            <td>:</td>
                                                            <td>
                                                                @if (is_null($data_penduduk->No_KK))
                                                                    <b>Belum Terdaftar</b>
                                                                @else
                                                                    {{ $data_penduduk->No_KK }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hubungan Dalam Keluarga</td>
                                                            <td>:</td>
                                                            <td>
                                                                @if (is_null($data_penduduk->status))
                                                                    <b>Belum Terdaftar</b>
                                                                @else
                                                                    {{ $data_penduduk->status }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->jk }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat / Tanggal Lahir</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->tempatlahir }} /
                                                                {{ date('d F Y', strtotime($data_penduduk->tanggallahir)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Agama</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->agama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kewarganegaraan</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->warganegara }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Penduduk</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->statuspend }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th colspan="3" class="subtitle_head"
                                                                style="background: skyblue;"><strong>PENDIDIKAN DAN
                                                                    PEKERJAAN</strong></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Pendidikan Terakhir</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->pendidikan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pekerjaan</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->pekerjaan }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th colspan="3" class="subtitle_head"
                                                                style="background: skyblue;"><strong>ORANG
                                                                    TUA</strong></th>
                                                        </tr>
                                                        <tr>
                                                            <td>NIK Ayah</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->nik_ayah }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Ayah</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->nama_ayah }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIK Ibu</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->nik_ibu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Ibu</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->nama_ibu }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th colspan="3" class="subtitle_head"
                                                                style="background: skyblue;"><strong>ALAMAT</strong>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Telepon</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->telepon }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Email</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat KTP</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->alamat_sebelumnya }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Domisili</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->alamat_sekarang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="3" class="subtitle_head"
                                                                style="background: skyblue;"><strong>STATUS
                                                                    KAWIN</strong></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Kawin</td>
                                                            <td>:</td>
                                                            <td>{{ $data_penduduk->status_kawin }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="3" class="subtitle_head"><strong>PROGRAM
                                                                    BANTUAN</strong></th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                                                                        <thead class="bg-gray disabled color-palette">
                                                                            <tr class="text-center">
                                                                                <th class="padat">No</th>
                                                                                <th>Nama Program</th>
                                                                                <th>Keterangan</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
