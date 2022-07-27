@extends('layout.template')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penduduk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kependudukan</a></li>
                        <li class="breadcrumb-item active">Penduduk</li>
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
                    <div class="card">
                        <div class="card-header">

                            <a href="{{ url('/form_tambah_penduduk') }}" class="btn btn-primary"
                                title="Tambah Data Penduduk">
                                <i class="fas fa-user-plus"></i> Penduduk
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_penduduk as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->nik }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->tempatlahir }}</td>
                                            <td>{{ $value->tanggallahir }}</td>
                                            <td>{{ $value->agama }}</td>
                                            <td>{{ $value->jk }}</td>
                                            <td>{{ $value->statuspend }}</td>
                                            <td class="text-center py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ url('/lihat_detail_penduduk/' . $value->nik) }}"
                                                        class="btn btn-info" title="Lihat Detail Penduduk"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{ url('/edit_penduduk/' . $value->nik) }}"
                                                        title="Edit Data Penduduk" class="btn btn-success"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="{{ url('/hapus_penduduk/' . $value->nik) }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"
                                                            onclick="return confirm('Hapus Data Penduduk ?')"></i></a>
                                                </div>

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
    </section>
@endsection
