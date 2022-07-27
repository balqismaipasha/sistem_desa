<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF($id)
    {

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


        // $data = [
        //     'title' => 'Salinan Kartu Keluarga',
        //     'date' => date('m/d/Y')
        // ];

        // dd( $data['data_anggota_kk']);

        // $pdf = PDF::loadView('cetak/cetak_KK', $data)->setPaper('a4', 'landscape');
        // return $pdf->stream('Kartukeluarga.pdf');

        return view('cetak/cetak_KK',$data);
    }

    public function generatePDF_NIK($id)
    {

        $data['data_penduduk']=DB::table('penduduk')
        ->select(['penduduk.*', 'Anggota_KK.*'])
        ->leftJoin('Anggota_KK', 'Anggota_KK.nik', 'penduduk.nik')
        ->where('penduduk.nik', $id)
        ->first();

        $data['penduduk']=DB::table('penduduk')
        ->where('nik', $id)
        ->first();


        // $data = [
        //     'title' => 'Salinan Kartu Keluarga',
        //     'date' => date('m/d/Y')
        // ];

        // dd( $data['data_penduduk']);

        // $pdf = PDF::loadView('cetak/cetak_KK', $data)->setPaper('a4', 'landscape');
        // return $pdf->stream('Kartukeluarga.pdf');

        return view('cetak/cetak_penduduk',$data);
    }
}
