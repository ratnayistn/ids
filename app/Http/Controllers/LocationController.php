<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LocationController;

class LocationController extends Controller
{
    public function index()
    {
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'home',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('/location/lokasi_toko', $data);
    }

    public function indexToko()
    {
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'home',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('/location/tambahlokasi_toko', $data);
    }

    public function insertToko(Request $post)
    {
        DB::table('lokasi_toko')->insert([
            'nama_toko' => $post->nama_toko,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy
        ]);

        return redirect('/tambahtoko');
    }
    public function findToko(Request $request)
    {
        $data = DB::table('lokasi_toko')
        ->select('barcode', 'nama_toko', 'latitude','longitude','accuracy')
        ->where('barcode',$request->scan_id)
        ->get();
        return response()->json($data);
        echo $data;
    }
    public function scan_kunjungan(){
         return view('/location/kunjungan_toko');
    }
}