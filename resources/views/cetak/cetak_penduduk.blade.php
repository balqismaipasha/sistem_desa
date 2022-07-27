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
    <div id="content" class="container_12 clearfix">
        <div id="content-main" class="grid_7">
            <link href="{{ url('css/surat.css') }}" rel="stylesheet" type="text/css" />
            <table width="100%" style="border: solid 0px black; text-align: left; margin-bottom: -15px;">
                <tr>
                    <td width="8%">NIK</td>
                    <td width="2%">:</td>
                    @if (is_null($data_penduduk->nik))
                        <td width="90%"> <b>{{ $penduduk->nik }}</b></td>
                    @else
                        <td width="90%"> <b>{{ $data_penduduk->nik }}</b></td>
                    @endif

                </tr>
                <tr>
                    <td width="8%">No.KK</td>
                    <td width="2%">:</td>
                    <td width="90%">
                        @if (is_null($data_penduduk->No_KK))
                            <b>Belum Terdaftar</b>
                        @else
                            <b>{{ $data_penduduk->No_KK }}</b>
                        @endif
                    </td>
                </tr>
            </table>
            <table width="100%" style="border: solid 0px black; text-align: center;">
                <tr>
                    <td align="center"><img src="{{ url('dist/img/inhu.png') }}" alt="logo " width="10%">
                </tr>
                <tr>
                    </td>
                    <td>
                        <h3>BIODATA PENDUDUK WARGA NEGARA INDONESIA</h3>
                        <h5>Kab. Indragiri Hulu , Kec. Sungai Lala , Desa Pasir Bongkal </h5>
                    </td>
                </tr>
            </table>
            <table width="100%" style="border: solid 0px black; padding: 10px;">
                <tr>
                    <td><b>DATA PERSONAL</b></td>
                </tr>
                <tr>
                    <td width="220">Nama Lengkap</td>
                    <td width="2%">:</td>
                    <td>{{ $data_penduduk->nama }}</td>
                    <td rowspan="18" style="vertical-align: top;">
                    </td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->tempatlahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->tanggallahir }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->jk }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->agama }}</td>
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
                    <td>Status Kawin</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->status_kawin }}</td>
                </tr>
                <tr>
                    <td>Hubungan dalam Keluarga</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->status }}</td>
                </tr>
                <tr>
                    <td>Warga Negara</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->warganegara }}</td>
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
                    <td>Status Kependudukan</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->statuspend }}</td>
                </tr>
                <tr>
                    <td>Nomor Telpon/HP</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->telepon }}</td>
                </tr>
                <tr>
                    <td>Alamat Email</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->email }}</td>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $data_penduduk->alamat_sebelumnya }}<br>
                        Kab. Indragiri Hulu , Kec. Sungai Lala , Desa Pasir Bongkal </td>
                </tr>

            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center" scope="col" width="40%">Yang Bersangkutan</td>
                    <td align="center" scope="col" width="10%">&nbsp;</td>
                    <td align="center" scope="col" width="50%">Desa Pasir Bongkal , {{ date('d F Y') }}</td>
                </tr>
                <tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">Kepala Desa Pasir Bongkal </td>
                </tr>
                <tr>
                    <td align="center" colspan="3" height="90px">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center"><b>( {{ $data_penduduk->nama }} )</b></td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><b>( Nama Kepala Desa )</b></td>
                </tr>
            </table>
        </div>
        <div id="aside">
        </div>
    </div>
</body>

</html>
