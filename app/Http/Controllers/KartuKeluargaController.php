<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class KartuKeluargaController extends Controller
{
    public function index()
    {

        // $data['data_kk'] = DB::table('Anggota_KK')
        // ->join('KartuKeluarga', 'Anggota_KK.No_KK', 'KartuKeluarga.No_KK')
        // ->join('penduduk', 'Anggota_KK.nik', 'Anggota_KK.nik')
        // ->join('bantuan','KartuKeluarga.id_bantuan','bantuan.id_bantuan')
        // ->where('Anggota_KK.status', 'Kepala Keluarga')
        // ->get();
        // dd($data['data_kk']);

        $data['data_kk']=DB::table('KartuKeluarga')
        ->join('penduduk', 'KartuKeluarga.nik', 'penduduk.nik')
        ->join('bantuan','KartuKeluarga.id_bantuan','bantuan.id_bantuan')
        ->join('anggota_kk', 'KartuKeluarga.No_KK', 'anggota_kk.No_KK')
        ->where('anggota_kk.status', 'Kepala Keluarga')
        ->get();

        $data['data_bantuan'] = DB::table('bantuan')->get();

        // dd($data['data_kk']);
        return view('kependudukan/kartukeluarga', $data);
    }

    public function simpan_kk_baru(Request $request)
    {
        $data['data_kk'] =[
            'No_KK' => $request->input('No_KK'),
            'nik' => $request->input('nik_kepala'),
            'id_bantuan' => $request->input('bantuan')
        ];

        if(DB::table('KartuKeluarga')
            ->where('No_KK', $request->input('No_KK'))
            ->orWhere('nik', $request->input('nik_kepala'))
            ->doesntExist()){
            DB::table('KartuKeluarga')->insert($data);

            $data_anggota = [
                'No_KK' => $request->input('No_KK'),
                'nik' => $request->input('nik_kepala'),
                'status' => 'Kepala Keluarga'
            ];
            DB::table('Anggota_KK')->insert($data_anggota);

            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect('/kartu_keluarga');

        }
        else{
            Alert::error('Gagal', 'KK atau NIK sudah terdaftar');
            return redirect('/kartu_keluarga');
        }
    }

    public function detail_anggota_KK($id){

        $data['data_kk']=DB::table('KartuKeluarga')
        ->join('penduduk', 'penduduk.nik', 'KartuKeluarga.nik')
        ->where('No_KK', "=" , $id)
        ->first();

        $data['data_anggota_kk']=DB::table('Anggota_KK')
        ->select(['penduduk.*', 'Anggota_KK.*'])
        ->join('penduduk', 'penduduk.nik', 'Anggota_KK.nik')
        ->join('KartuKeluarga', 'KartuKeluarga.No_KK', 'Anggota_KK.No_KK')
        ->where('Anggota_KK.No_KK', "=", $id)
        ->orderByRaw('status DESC')
        ->get();

        $data['bantuan']=DB::table('KartuKeluarga')
        ->join('bantuan', 'bantuan.id_bantuan', 'KartuKeluarga.id_bantuan')
        ->where('No_KK', "=", $id)
        ->first();

        // dd( $data['data_anggota_kk']);

        return view('kependudukan/anggota_keluarga', $data);
    }

    public function tambah_anggota_KK($id)
    {
        $data['id_kk']=DB::table('KartuKeluarga')
        ->join('penduduk', 'penduduk.nik', 'KartuKeluarga.nik')
        ->where('No_KK', "=" , $id)
        ->first();

        Alert::success('Berhasil', 'NIK terdaftar di KK ini');
        return view('kependudukan/tambah_anggota_keluarga', $data);
    }

    public function simpan_anggota_kk(Request $request)
    {
        $datapenduduk =[
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'tempatlahir' => $request->input('tempatlahir'),
            'tanggallahir' => $request->input('tanggallahir'),
            'agama' => $request->input('agama'),
            'jk' => $request->input('jk'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'warganegara' => $request->input('warganegara'),
            'status_kawin' => $request->input('status_kawin'),
            'statuspend' => $request->input('statuspend'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'nik_ayah' => $request->input('nik_ayah'),
            'nik_ibu' => $request->input('nik_ibu'),
            'email' => $request->input('email'),
            'telepon' => $request->input('nohp'),
            'alamat_sebelumnya' => $request->input('alamat_ktp'),
            'alamat_sekarang' => $request->input('alamat_sekarang')
        ];


        if(DB::table('KartuKeluarga')
            ->where('nik', $request->input('nik'))
            ->doesntExist() and
           DB::table('Anggota_KK')
            ->where('nik', $request->input('nik'))
            ->doesntExist()){

            $data_PK =[
                'No_KK' => $request->input('No_KK'),
                'nik' => $request->input('nik'),
                'status' => $request->input('status')
            ];
            DB::table('penduduk')->insert($datapenduduk);
            DB::table('Anggota_KK')->insert($data_PK);

            Alert::success('Berhasil', 'NIK terdaftar di KK ini');
            return redirect('/lihat_anggota_keluarga/'.$data_PK['No_KK'].'#Data berhasil ditambah');
        }
        else{
            Alert::error('Gagal', 'NIK telah digunakan');
            return redirect('/lihat_anggota_keluarga/'.$data_PK['No_KK'].'#No. KK/NIK telah digunakan');
        }

    }


    public function hapus($id){

        $data['data_anggota_kk']=DB::table('Anggota_KK')
        ->join('KartuKeluarga', 'KartuKeluarga.No_KK', 'Anggota_KK.No_KK')
        ->where('Anggota_KK.No_KK', '=', $id)
        ->delete();

        $data['data_kk']=DB::table('KartuKeluarga')
        ->join('penduduk', 'penduduk.nik', 'KartuKeluarga.nik')
        ->where('KartuKeluarga.No_KK', '=', $id)
            ->delete();

        // $data['data_penduduk']=DB::table('penduduk')
        //     ->where('nik', '=', $id)
        //     ->delete();
        // Alert::success('Congrats', 'Data Berhasil Dihapus');

        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/kartu_keluarga');
    }

    public function hapus_anggota_kk($id, $no)
    {
        $data['hapus_anggota']=DB::table('Anggota_KK')
        ->join('penduduk', 'penduduk.nik', 'Anggota_KK.nik')
        ->where('Anggota_KK.nik', '=', $id)
        ->delete();

        // $data['data_kk']=DB::table('KartuKeluarga')
        // ->join('penduduk', 'penduduk.nik', 'KartuKeluarga.nik')
        // ->where('KartuKeluarga.No_KK', "=" , $no)
        // ->first();


        // $data['data_anggota_kk']=DB::table('Anggota_KK')
        // ->select(['penduduk.*', 'Anggota_KK.*'])
        // ->join('penduduk', 'penduduk.nik', 'Anggota_KK.nik')
        // ->join('KartuKeluarga', 'KartuKeluarga.No_KK', 'Anggota_KK.No_KK')
        // ->where('Anggota_KK.No_KK', "=", $no)
        // ->orderByRaw('status DESC')
        // ->get();

        // $data['bantuan']=DB::table('KartuKeluarga')
        // ->join('bantuan', 'bantuan.id_bantuan', 'KartuKeluarga.id_bantuan')
        // ->where('No_KK', "=", $no)
        // ->first();


        Alert::success('Berhasil', 'NIK bukan anggota KK ini lagi');
        return $this->detail_anggota_KK($no);

        // dd( $data['data_anggota_kk']);
        // return view('kependudukan/anggota_keluarga', $data);
    }

    public function edit(Request $request, $id)
    {
        if(DB::table('KartuKeluarga')
        ->where('No_KK', '=',$id)
        ->update([
            'id_bantuan' => $request->input('id_bantuan')
        ]))
        {
            return "success";
        Alert::success('Selamat', 'Data Berhasil Diupdate');
        }else{
            return "fail";
        }
    }
}
