<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\DropdownController;
use App\Models\Customer;
use App\Models\Provinsi;
use App\Models\Kabkot;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class CustomerController extends Controller
{
     public function index()
     {
     	$data = \App\Models\Customer:: all();
        $data= DB::table('customer')
            ->join('subdistricts', 'subdistricts.subdis_id','=','customer.kelurahan')
            ->join('districts', 'districts.dis_id','=','customer.kecamatan')
            ->join('cities', 'cities.city_id','=','customer.kota')
            ->join('provinces', 'provinces.prov_id','=','customer.provinsi')
            ->select('customer.id_cust as id_cust','customer.name_cust as name_cust','customer.alamat as alamat', 'subdistricts.subdis_name as kelurahan','districts.dis_name as kecamatan', 'cities.city_name as kota','provinces.prov_name as provinsi','customer.photo as photo','customer.path as path')
            ->get();
		return view('/customer/customer',['data' => $data]);
	}
	public function create(Request $request )
     {
     	//Customer::create($request->all());
     	Customer::create([
     		'id_cust' => $request->id_cust,
            'name_cust' => $request->name_cust,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'photo' => $request->photo,
            'path'=>$request->path
     	]);
     	return redirect('customer/addcust1')->with('sukses', 'Data berhasil ditambahkan');
	}
	public function list2(){
        $customer = customer::all();
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();


        return view('/customer/addcust2', compact('customer','provinsi', 'kota', 'kecamatan', 'kelurahan'));

    }
     public function list()
    {
    	$customer = customer::all();
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('/customer/addcust1', compact('customer','provinsi', 'kota', 'kecamatan', 'kelurahan'));
    }
    public function create2(Request $request){
        //dd($request);
        // $this->validate($request,[
        //     'id_cust' => 'required',
        //     'name_cust'=>'required',
        //     'alamat'=>'required',
        //     'kelurahan'=>'required',
        //     'kecamatan'=>'required',
        //     'kota' => 'required',
        //     'provinsi' => 'required',
        //     'photo' => 'required',
        //     'path' => 'required'
        // ]);
        $image = str_replace('data:image/jpeg;base64', '', $request->path);
        $image = str_replace(' ', ' + ', $image);
        $imageNama = $request->name_cust.time(). '.png';
        $path = Storage::disk('local')->put($imageNama, base64_decode($image));
        
        customer::create([
            'id_cust' => $request-> id_cust,
            'name_cust' => $request->name_cust,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'photo' => $request->photo,
            'path' => $imageNama,

        ]);
        return redirect('customer/addcust2')->with('success','Data berhasil ditambahkan');
    }
     public function findKota(Request $request)
    {
        $data = Kabkot::select('city_id', 'city_name')
        ->where('prov_id',$request->prov_id)
        ->get();
        return response()->json($data);
        echo $data;
    }

    public function findKecamatan(Request $request)
    {
        $data = Kecamatan::select('dis_id', 'dis_name')
        ->where('city_id',$request->city_id)
        ->get();
        return response()->json($data);
        echo $data;
    }

    public function findKelurahan(Request $request)
    {
        $data = Kelurahan::select('subdis_id', 'subdis_name')
        ->where('dis_id',$request->dis_id)
        ->get();
        return response()->json($data);
        echo $data;
    }

}
