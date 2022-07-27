@extends('layout.template')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Anggota Keluarga</h1>
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

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Anggota Keluarga</h3>
                </div>

                <form class="form-horizontal" action="{{ url('/simpan_anggota_kk') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NO. KK</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control" name="No_KK" value="{{ $id_kk->No_KK }}"
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label>NIK</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control" name="nik" id="nik"
                                        placeholder="NIK" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlahir"
                                        id="tempatlahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label><span class="text-danger">*</span>
                                    <input type="date" name="tanggallahir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Agama</label><span class="text-danger">*</span>
                                    <select class="form-control" name="agama" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu
                                        </option>
                                        <option value="Konghucu">Konghucu
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><span class="text-danger">*</span>
                                    <select class="form-control" name="jk" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan</label><span class="text-danger">*</span>
                                    <select class="form-control" name="pendidikan" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Belum Sekolah">Belum Sekolah</option>
                                        <option value="TK">TK</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="D1">Diploma I</option>
                                        <option value="D2">Diploma II</option>
                                        <option value="D3">Diploma III</option>
                                        <option value="S1/D4">Diploma IV / S-1</option>
                                        <option value="S2">S-2</option>
                                        <option value="S3">S-3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label><span class="text-danger">*</span>
                                    <select class="form-control" name="pekerjaan" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Belum Bekerja">Belum Bekerja</option>
                                        <option value="Pelajar">Pelajar</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                                        <option value="Buruh">Buruh</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Pegawai Negeri">Pegawai Negeri</option>
                                        <option value="Pedagang">Pedagang</option>
                                        <option value="Pegawai Pemerintahan">Pegawai Pemerintahan
                                        </option>
                                        <option value="BUMN">BUMN</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kewarganegaraan</label><span class="text-danger">*</span>
                                    <select class="form-control" name="warganegara" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                        <option value="Keduanya">Keduanya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Kawin</label><span class="text-danger">*</span>
                                    <select class="form-control" name="status_kawin" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Kepala Keluarga</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ $id_kk->nama }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Hubungan Perkawinan</label>
                                    <select name="status" class="form-control" required>
                                        <option selected disabled>-PILIH HUBUNGAN PERKAWINAN-</option>
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah"
                                        id="nama_ayah" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ibu</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu"
                                        id="nama_ibu" required>
                                </div>
                                <div class="form-group">
                                    <label>NIK Ayah</label><span class="text-danger">*</span>
                                    <input type="number" class="form-control" placeholder="NIK Ayah" name="nik_ayah"
                                        id="nik_ayah" required>
                                </div>
                                <div class="form-group">
                                    <label>NIK Ibu</label><span class="text-danger">*</span>
                                    <input type="number" class="form-control" placeholder="NIK Ibu" name="nik_ibu"
                                        id="nik_ibu" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label> <span class="text-danger">*</span>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="xxx@gmail.com" required>
                                </div>

                                <div class="form-group">
                                    <label>No. Hp</label> <span class="text-danger">*</span>
                                    <input type="number" class="form-control" name="nohp" placeholder="0882912317xx"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Status Penduduk</label><span class="text-danger">*</span>
                                    <select class="form-control" name="statuspend" required>
                                        <option selected disabled>-PILIH-</option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Tidak Tetap">Tidak Tetap</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Alamat KTP</label><span class="text-danger">*</span>
                                    <textarea name="alamat_ktp" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Sekarang</label><span class="text-danger">*</span>
                                    <textarea name="alamat_sekarang" class="form-control"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fas fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
