<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['totalpenduduk']=DB::table('penduduk')->count();
        $data['totalKK']=DB::table('KartuKeluarga')->count();
        $data['bantuan']=DB::table('bantuan')->count();
        $data['user']=DB::table('users')->count();

         return view('dashboard',$data);
    }
}
