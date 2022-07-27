<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PendudukController extends Controller
{
    public function index()
    {
        $data['data_penduduk']=DB::table('penduduk')
            ->get();
        return view('kependudukan/penduduk', $data);
    }

    public function simpan(Request $request)
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
        // DB::table('penduduk')->insert($datapenduduk);

        if(DB::table('penduduk')
            ->where('nik', $request->input('nik'))
            ->doesntExist()){
            DB::table('penduduk')->insert($datapenduduk);

            Alert::success('Selamat', 'Data Berhasil Ditambahkan');
            return redirect('/penduduk');

        }
        else{
            Alert::error('Gagal', 'NIK sudah terdaftar');
            // toast('NIK Penduduk Sudah Terdaftar!','error');
            return redirect('/penduduk');
        }
        // DB::table('penduduk')->insert($datapenduduk);

        // return redirect('/penduduk');
    }

    public function detail_penduduk($id){
        $data['data_penduduk']=DB::table('penduduk')
        ->select(['penduduk.*', 'Anggota_KK.*'])
        ->leftJoin('Anggota_KK', 'Anggota_KK.nik', 'penduduk.nik')
        ->where('penduduk.nik', $id)
        ->first();

        $data['penduduk']=DB::table('penduduk')
        ->where('nik', $id)
        ->first();

        // return dd($data['data_penduduk']);
        return view('kependudukan/detail_penduduk', $data);
    }

    public function form_edit_penduduk($id){
        $data['data_penduduk']=DB::table('penduduk')
        ->where('nik', "=" , $id)
        ->first();

        return view('kependudukan/edit_penduduk', $data);
    }

    public function edit(Request $request, $id)
    {
        DB::table('penduduk')
            ->where('nik', '=',$id)
            ->update([
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
            ]);
        Alert::success('Selamat', 'Data Berhasil Diupdate');
        return redirect('/penduduk');
    }

    public function hapus($id){

        $data['data_anggota_kk']=DB::table('Anggota_KK')
        ->join('penduduk', 'penduduk.nik', 'Anggota_KK.nik')
        ->join('KartuKeluarga', 'KartuKeluarga.No_KK', 'Anggota_KK.No_KK')
        ->where('Anggota_KK.nik', '=', $id)
        ->delete();

        $data['data_kk']=DB::table('KartuKeluarga')
        ->join('penduduk', 'penduduk.nik', 'KartuKeluarga.nik')
        ->where('KartuKeluarga.nik', '=', $id)
            ->delete();

        $data['data_penduduk']=DB::table('penduduk')
            ->where('nik', '=', $id)
            ->delete();

        // Alert::question('Hapus Data Penduduk', 'Apakah anda yakin menghapus data ini ?');
        Alert::success('Selamat', 'Data Berhasil Dihapus');
        return redirect('/penduduk');
    }

}
