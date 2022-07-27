<!DOCTYPE html>
<html>

<head>
    <title>KANTOR DESA PASIR BONGKAL</title>
    <link rel="stylesheet" href="{{ url('css/960.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ url('css/screen.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ url('css/print-preview.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ url('css/print.css') }}" type="text/css" media="print" />
    <script src="{{ url('css/jquery.tools.min.js') }}"></script>
    <script src="{{ url('css/jquery.print-preview.js') }}" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
        $(function() {
            $("#feature > div").scrollable({
                interval: 2000
            }).autoscroll();

            $('#aside').prepend('<a class="print-preview">Cetak </a>');
            $('a.print-preview').printPreview();

            //$(document).bind('keydown', function(e) {
            var code = 80;
            //if (code == 80 && !$('#print-modal').length) {
            $.printPreview.loadPrintPreview();
            //return false;
            //}
            //});
        });
    </script>
</head>

<style type="text/css">
    #body {
        page-break-after: always;
    }
</style>

<body>
    <div id="container">
        <link href="{{ url('css/report.css') }}" rel="stylesheet" type="text/css">
        <!-- Print Body -->
        <div id="body">
            <div align="center">
                <h3>KARTU KELUARGA</h3>
                <h4>SALINAN</h4>
                <h5>No. {{ $data_kk->No_KK }}</h4>
            </div>
            <br>
            <table width="100%" cellpadding="3" cellspacing="4">
                <tr>
                    <td width="100">Nama KK</td>
                    <td width="600">: {{ $data_kk->nama }}</td>
                    <td width="160">Kecamatan</td>
                    <td width="150">: Sungai Lala </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $data_kk->alamat_sebelumnya }} </td>
                    <td>Kabupaten/Kota</td>
                    <td>: Indragiri Hulu </td>
                </tr>

                <tr>
                    <td>Kelurahan/Desa</td>
                    <td>: Pasir Bongkal </td>
                    <td>Provinsi</td>
                    <td>: Riau</td>
                </tr>
            </table>

            <br>

            <table class="border thick ">
                <thead>
                    <tr class="border thick">
                        <th class="text-center" width="7">No</th>
                        <th class="text-center" width='180'>Nama</th>
                        <th class="text-center" width='100'>NIK</th>
                        <th class="text-center" width='100'>Jenis Kelamin</th>
                        <th class="text-center" width='100'>Tempat Lahir</th>
                        <th class="text-center" width='120'>Tanggal Lahir</th>
                        <th class="text-center" width='100'>Agama</th>
                        <th class="text-center" width='100'>Pendidikan</th>
                        <th class="text-center" width='100'>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_anggota_kk as $values)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $values->nama }}</td>
                            <td>{{ $values->nik }}</td>
                            <td>{{ $values->jk }}</td>
                            <td>{{ $values->tempatlahir }}</td>
                            <td>{{ date('d-m-Y', strtotime($values->tanggallahir)) }}</td>
                            <td>{{ $values->agama }}</td>
                            <td>{{ $values->pendidikan }}</td>
                            <td>{{ $values->pekerjaan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>

            <table class="border thick ">
                <thead>
                    <tr class="border thick">
                        <th class="text-center" width="7">No</th>
                        <th class="text-center" width='150'>Status Perkawinan</th>
                        <th class="text-center" width='240'>Status Hubungan dalam Keluarga</th>
                        <th class="text-center" width='140'>Kewarganegaraan</th>
                        <th class="text-center" width='170'>Nama Ayah</th>
                        <th class="text-center" width='170'>Nama Ibu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_anggota_kk as $values)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $values->status_kawin }}</td>
                            <td>{{ $values->status }}</td>
                            <td>{{ $values->warganegara }}</td>
                            <td>{{ $values->nama_ayah }}</td>
                            <td>{{ $values->nama_ibu }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>

            <table width="100%" cellpadding="3" cellspacing="4">
                <tr>
                    <td width="25%"></td>
                    <td width="50%"></td>
                    <td width="25%" align="center">Pasir Bongkal , {{ date('d F Y') }}</td>
                </tr>
                <td width="25%" align="center">KEPALA KELUARGA</td>
                <td width="50%"></td>
                <td align="center" width="150">KEPALA DESA </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td width="25%" align="center">{{ $data_kk->nama }}</td>
                    <td width="50%"></td>
                    <td width="25%" align="center" width="150"></td>
                </tr>
            </table>
        </div>
        <div id="aside"></div>
    </div>
</body>

</html>
