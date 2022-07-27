<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BantuanController extends Controller
{
    public function index()
    {
        $data['data_bantuan']=DB::table('bantuan')
            ->get();
        return view('bantuan/bantuan', $data);
    }

    public function simpan(Request $request ) {
        $data_bantuan =[
            'nama_bantuan' => $request->input('nama_bantuan')
        ];
        DB::table('bantuan')->insert($data_bantuan);
        Alert::success('Selamat', 'Data Berhasil Ditambahkan');
        return redirect('/bantuan');

    }

    public function edit(Request $request, $id)
    {
        if(DB::table('bantuan')
                ->where('id_bantuan', '=',$id)
                ->update([
                    'nama_bantuan' => $request->input('nama_bantuan')
                ])){
                return "success";
                Alert::success('Selamat', 'Data Berhasil Diupdate');
            }else{
                return "fail";
            }
            // return redirect('/bantuan');
    }

    public function hapus($id){

        DB::table('KartuKeluarga')
        ->where('KartuKeluarga.id_bantuan', '=',$id)
        ->update([
            'KartuKeluarga.id_bantuan' => '1'
        ]);

        $data['data_bantuan']=DB::table('bantuan')
        ->where('bantuan.id_bantuan', '=', $id)
        ->delete();

        // $data['data_kk']=DB::table('KartuKeluarga')
        // ->join('bantuan', 'bantuan.id_bantuan', 'KartuKeluarga.id_bantuan')
        // ->where('KartuKeluarga.No_KK', '=', $id)
        // ->delete();



        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/bantuan');
    }
}
