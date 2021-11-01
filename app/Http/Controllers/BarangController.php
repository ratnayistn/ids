<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use PDF;

class BarangController extends Controller
{
public function Barang()
    {
        $data = array(
            'menu' => 'barang',
            'submenu' => ''
        );
        return view('/barcode/barang', $data);

    }

    public function indexBarang()
    {
        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'Barang',
            'submenu' => 'barang',
            'barang' => $barang
        );
        return view('/barcode/barang', $data);
    }

    public function tambahbarang(){
     $barang = barang::all();
     return view('/barcode/tambahbarang', compact('barang'));
    }
    public function simpan(Request $request){
     //dd($request);
    //  $number = $request->id_barang;
    //  $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    // $barcode = $generator->getBarcode($number, $generator::TYPE_CODE_128);

  // $number = $request->id_barang;
  // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
  // $barcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($number, $generator::TYPE_CODE_128)) . '">';

    $data = new barang;
    // $data->id_barang= $request->id_barang;
    $data->nama = $request->nama;
    // $data->barcode =$barcode;
    $data->save();

   return redirect('/tambahbarang')->with('success','Data berhasil ditambahkan');
	}
    public function cetak_pdf()
    {
        
        $no = 1;
    	$barang = Barang::all();
        $data = array(
            'menu' => 'barang',
            'submenu' => '',
            'no' => $no,
            'barang' => $barang
        );
    	$pdf = PDF::loadview('/barcode/printbarcode',compact('data', 'barang', 'no'))->setPaper('A4', 'landscape');
    	return $pdf->download('barcode_barang.pdf');
    }

    public function scan_barcode(){
   		 return view('/barcode/scanbarcode');
    }
}