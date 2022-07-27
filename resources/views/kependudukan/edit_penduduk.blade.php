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
                        <li class="breadcrumb-item">Kependudukan</li>
                        <li class="breadcrumb-item active"><a href="{{ url('/penduduk') }}">Penduduk</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Penduduk</h3>
                </div>

                <form class="form-horizontal" action="{{ url('/ubah_penduduk/' . $data_penduduk->nik) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-text">NIK<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="nik" id="nik"
                                        value="{{ $data_penduduk->nik }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label class="form-text">Nama Lengkap<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Nama" value="{{ $data_penduduk->nama }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlahir"
                                        id="tempatlahir" value="{{ $data_penduduk->tempatlahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <input type="date" name="tanggallahir" class="form-control"
                                        value="{{ $data_penduduk->tanggallahir }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Agama<span class="text-danger">*</span></label>
                                    <select class="form-control" name="agama" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Islam" @if ($data_penduduk->agama == 'Islam') selected='selected' @endif>
                                            Islam</option>
                                        <option value="Kristen"
                                            @if ($data_penduduk->agama == 'Kristen') selected='selected' @endif>Kristen</option>
                                        <option value="Budha" @if ($data_penduduk->agama == 'Budha') selected='selected' @endif>
                                            Budha</option>
                                        <option value="Hindu" @if ($data_penduduk->agama == 'Hindu') selected='selected' @endif>
                                            Hindu
                                        </option>
                                        <option value="Konghucu"
                                            @if ($data_penduduk->agama == 'Konghucu') selected='selected' @endif>Konghucu
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Jenis Kelamin<span class="text-danger">*</span></label>
                                    <select class="form-control" name="jk" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Laki-Laki"
                                            @if ($data_penduduk->jk == 'Laki-Laki') selected='selected' @endif>Laki-Laki</option>
                                        <option value="Perempuan"
                                            @if ($data_penduduk->jk == 'Perempuan') selected='selected' @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Pendidikan<span class="text-danger">*</span></label>
                                    <select class="form-control" name="pendidikan" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Belum Sekolah"
                                            @if ($data_penduduk->pendidikan == 'Belum Sekolah') selected='selected' @endif>Belum Sekolah
                                        </option>
                                        <option value="TK" @if ($data_penduduk->pendidikan == 'TK') selected='selected' @endif>
                                            TK
                                        </option>
                                        <option value="SD" @if ($data_penduduk->pendidikan == 'SD') selected='selected' @endif>
                                            SD
                                        </option>
                                        <option value="SMP"
                                            @if ($data_penduduk->pendidikan == 'SMP') selected='selected' @endif>
                                            SMP</option>
                                        <option value="SMA/SMK"
                                            @if ($data_penduduk->pendidikan == 'SMA/SMK') selected='selected' @endif>SMA/SMK</option>
                                        <option value="D1"
                                            @if ($data_penduduk->pendidikan == 'D1') selected='selected' @endif>
                                            Diploma I</option>
                                        <option value="D2"
                                            @if ($data_penduduk->pendidikan == 'D2') selected='selected' @endif>
                                            Diploma II</option>
                                        <option value="D3"
                                            @if ($data_penduduk->pendidikan == 'D3') selected='selected' @endif>
                                            Diploma III</option>
                                        <option value="S1/D4"
                                            @if ($data_penduduk->pendidikan == 'S1/D4') selected='selected' @endif>Diploma IV / S-1
                                        </option>
                                        <option value="S2"
                                            @if ($data_penduduk->pendidikan == 'S2') selected='selected' @endif>
                                            S-2</option>
                                        <option value="S3"
                                            @if ($data_penduduk->pendidikan == 'S3') selected='selected' @endif>
                                            S-3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Pekerjaan<span class="text-danger">*</span></label>
                                    <select class="form-control" name="pekerjaan" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Belum Bekerja"
                                            @if ($data_penduduk->pekerjaan == 'Belum Bekerja') selected='selected' @endif>Belum Bekerja
                                        </option>
                                        <option value="Pelajar"
                                            @if ($data_penduduk->pekerjaan == 'Pelajar') selected='selected' @endif>Pelajar</option>
                                        <option value="Mahasiswa"
                                            @if ($data_penduduk->pekerjaan == 'Mahasiswa') selected='selected' @endif>Mahasiswa
                                        </option>
                                        <option value="Karyawan Swasta"
                                            @if ($data_penduduk->pekerjaan == 'Karyawan Swasta') selected='selected' @endif>Karyawan Swasta
                                        </option>
                                        <option value="Buruh"
                                            @if ($data_penduduk->pekerjaan == 'Buruh') selected='selected' @endif>Buruh</option>
                                        <option value="Petani"
                                            @if ($data_penduduk->pekerjaan == 'Petani') selected='selected' @endif>Petani</option>
                                        <option value="Nelayan"
                                            @if ($data_penduduk->pekerjaan == 'Nelayan') selected='selected' @endif>Nelayan</option>
                                        <option value="Pegawai Swasta"
                                            @if ($data_penduduk->pekerjaan == 'Pegawai Swasta') selected='selected' @endif>Pegawai Swasta
                                        </option>
                                        <option value="Pegawai Negeri"
                                            @if ($data_penduduk->pekerjaan == 'Pegawai Negeri') selected='selected' @endif>Pegawai Negeri
                                        </option>
                                        <option value="Pedagang"
                                            @if ($data_penduduk->pekerjaan == 'Pedagang') selected='selected' @endif>Pedagang</option>
                                        <option value="Pegawai Pemerintahan"
                                            @if ($data_penduduk->pekerjaan == 'Pegawai Pemerintahan') selected='selected' @endif>Pegawai
                                            Pemerintahan
                                        </option>
                                        <option value="BUMN"
                                            @if ($data_penduduk->pekerjaan == 'BUMN') selected='selected' @endif>
                                            BUMN</option>
                                        <option value="Wiraswasta"
                                            @if ($data_penduduk->pekerjaan == 'Wiraswasta') selected='selected' @endif>Wiraswasta
                                        </option>
                                        <option value="Lainnya"
                                            @if ($data_penduduk->pekerjaan == 'Lainnya') selected='selected' @endif>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Kewarganegaraan<span class="text-danger">*</span></label>
                                    <select class="form-control" name="warganegara" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="WNI"
                                            @if ($data_penduduk->warganegara == 'WNI') selected='selected' @endif>
                                            WNI</option>
                                        <option value="WNA"
                                            @if ($data_penduduk->warganegara == 'WNA') selected='selected' @endif>
                                            WNA</option>
                                        <option value="Keduanya"
                                            @if ($data_penduduk->warganegara == 'Keduanya') selected='selected' @endif>Keduanya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Status Kawin<span class="text-danger">*</span></label>
                                    <select class="form-control" name="status_kawin" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Belum Kawin"
                                            @if ($data_penduduk->status_kawin == 'Belum Kawin') selected='selected' @endif>Belum Kawin
                                        </option>
                                        <option value="Kawin"
                                            @if ($data_penduduk->status_kawin == 'Kawin') selected='selected' @endif>Kawin</option>
                                        <option value="Cerai Mati"
                                            @if ($data_penduduk->status_kawin == 'Cerai Mati') selected='selected' @endif>Cerai Mati
                                        </option>
                                        <option value="Cerai Hidup"
                                            @if ($data_penduduk->status_kawin == 'Cerai Hidup') selected='selected' @endif>Cerai Hidup
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-text">Nama Ayah<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah"
                                        id="nama_ayah" value="{{ $data_penduduk->nama_ayah }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Nama Ibu<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu"
                                        id="nama_ibu" value="{{ $data_penduduk->nama_ibu }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">NIK Ayah<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="NIK Ayah" name="nik_ayah"
                                        id="nik_ayah" value="{{ $data_penduduk->nik_ayah }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">NIK Ibu<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="{{ $data_penduduk->nik_ibu }}"
                                        placeholder="NIK Ibu" name="nik_ibu" id="nik_ibu" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="xxx@gmail.com" value="{{ $data_penduduk->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-text">No. Hp<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="{{ $data_penduduk->telepon }}"
                                        name="nohp" placeholder="0882912317xx" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-text">Status Penduduk<span class="text-danger">*</span></label>
                                    <select class="form-control" name="statuspend" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Tetap"
                                            @if ($data_penduduk->statuspend == 'Tetap') selected='selected' @endif>Tetap</option>
                                        <option value="Tidak Tetap"
                                            @if ($data_penduduk->statuspend == 'Tidak Tetap') selected='selected' @endif>Tidak Tetap
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-text">Alamat KTP<span class="text-danger">*</span></label>
                                    <textarea name="alamat_ktp" class="form-control">{{ $data_penduduk->alamat_sebelumnya }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-text">Alamat Sekarang<span class="text-danger">*</span></label>
                                    <textarea name="alamat_sekarang" class="form-control">{{ $data_penduduk->alamat_sekarang }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
