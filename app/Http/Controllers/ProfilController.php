<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function edit(Request $request, $id)
    {
        DB::table('users')
            ->where('id', '=',$id)
            ->update([
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'updated_at' =>date('Y-m-d H:i:s')
            ]);
        Alert::success('Selamat', 'Data Berhasil Diupdate');
        return redirect('/profil');
    }
}
