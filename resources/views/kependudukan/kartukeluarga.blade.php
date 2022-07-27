@extends('layout.template')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kartu Keluarga</h1>
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form class="form-horizontal" action="{{ url('/simpan_kk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Kartu Keluarga</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. KK
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="No_KK"
                                        placeholder="No. Kartu Keluarga" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIK Kepala Keluarga
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik_kepala"
                                        placeholder="NIK Kepala Keluarga" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bantuan</label>
                                <div class="col-sm-9">
                                    <select name="bantuan" class="form-control">
                                        <option selected disabled>-PILIH BANTUAN-</option>
                                        @foreach ($data_bantuan as $values)
                                            <option value="{{ $values->id_bantuan }}"> {{ $values->nama_bantuan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('sweetalert::alert')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"
                                title="Tambah Data Keluarga">
                                <i class="fas fa-users"></i> Tambah KK
                            </button>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No. KK</th>
                                        <th>NIK Kepala Keluarga</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>Bantuan Keluarga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_kk as $values)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $values->No_KK }}</td>
                                            <td>{{ $values->nik }}</td>
                                            <td>{{ $values->nama }}</td>
                                            <td>{{ $values->nama_bantuan }}</td>
                                            {{-- @foreach ($data->aplikasi as $a)
                                            <td>{{ $a->nama_aplikasi }}</td>
                                        @endforeach --}}

                                            <td class="text-center py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ url('/lihat_anggota_keluarga/' . $values->No_KK) }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i>
                                                    </a>
                                                    <data class="d-none" id="id_{{ $values->No_KK }}">
                                                        {{ json_encode($values) }}</data>
                                                    <a href="" id="editKartuKeluarga" data-toggle="modal"
                                                        data-target="#edit-modal-{{ $values->No_KK }}"
                                                        class="btn btn-success">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/hapus_KK/' . $values->No_KK) }}"
                                                        class="btn btn-danger"><i class="fas fa-trash"
                                                            onclick="return confirm('Hapus Data KK ?')"></i>
                                                    </a>
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

    @foreach ($data_kk as $values)
        <div id="edit-modal-{{ $values->No_KK }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="edit-modal-{{ $values->No_KK }}" aria-hidden="true">
            <div class="modal-dialog">
                <form id="companydata">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Data KK</h4>
                        </div>
                        <div class="modal-body">
                            {{-- <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Bantuan
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="No_KK" value="{{ $values->No_KK }}" />
                                    <input type="text" class="form-control" name="nama_bantuan"
                                        value="{{ $values->nama_bantuan }}">
                                </div>
                            </div>
                        </div> --}}

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. KK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="No_KK" name="No_KK"
                                            value="{{ $values->No_KK }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK Kepala Keluarga
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nik_kepala" name="nik_kepala"
                                            value="{{ $values->nik }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bantuan</label>
                                    <div class="col-sm-9">
                                        <select name="id_bantuan" id="id_bantuan" class="form-control">
                                            <option selected disabled>-PILIH BANTUAN-
                                            </option>
                                            @foreach ($data_bantuan as $bantuan)
                                                <option value="{{ $bantuan->id_bantuan }}"
                                                    {{ $bantuan->id_bantuan == $values->id_bantuan ? 'selected' : '' }}>
                                                    {{ $bantuan->nama_bantuan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="button" value="Submit" class="btn btn-primary submitedit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.submitedit').click(function() {
                var No_KK = $(this).closest('.modal-content').find('[name="No_KK"]').val();
                var id_bantuan = $(this).closest('.modal-content').find('[name="id_bantuan"]').val();

                $.ajax({
                    url: '{{ asset('ubah_KK') }}/' + No_KK,
                    type: "POST",
                    data: {
                        id_bantuan: id_bantuan,
                        No_KK: No_KK,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#companydata').trigger("reset");
                        $('#practice_modal').modal('hide');
                        location.reload(location.href); // masih bangun ko?
                    }
                });
            });

            // $('body').on('click', '#editBantuan', function(event) {

            //     event.preventDefault();
            //     var id_bantuan = $(this).data('id_bantuan'); // ini ngapain? get data ke formnya kan?
            //     console.log(id_bantuan)
            //     $.get('/ubah_bantuan/' + id_bantuan, function(data) {
            //         $('#userCrudModal').html("Edit category");
            //         $('#submitedit').val("Edit category");
            //         $('#practice_modal').modal('show');
            //         $('#id_bantuan').val(data.data.id_bantuan);
            //         $('#nama_bantuan').val(data.data.nama_bantuan);
            //     })
            // });

        });
    </script>

    {{-- @foreach ($data_kk as $values)
        <div id="edit-modal-{{ $values->No_KK }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="edit-modal-{{ $values->No_KK }}" aria-hidden="true">
            <div class="modal-dialog">
                <form id="companydata">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Data Kartu Keluarga</h4>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. KK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="No_KK" name="No_KK"
                                            value="{{ $values->No_KK }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK Kepala Keluarga
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nik_kepala" name="nik_kepala"
                                            value="{{ $values->nik }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bantuan</label>
                                    <div class="col-sm-9">
                                        <select name="bantuan" id="id_bantuan" class="form-control">
                                            <option selected disabled>-PILIH BANTUAN-
                                            </option>
                                            @foreach ($data_bantuan as $bantuan)
                                                <option value="{{ $bantuan->id_bantuan }}"
                                                    {{ $bantuan->id_bantuan == $values->id_bantuan ? 'selected' : '' }}>
                                                    {{ $bantuan->nama_bantuan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" value="Submit" id="submitedit"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach --}}
@endsection
