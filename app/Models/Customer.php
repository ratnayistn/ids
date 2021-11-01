<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
//    use SoftDeletes;
    protected $table = 'customer';
    protected $fillable = 
    [
        'id_cust',
        'name_cust',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota', 
        'provinsi', 
        'photo',
        'path'
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_cust';

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'prov_id' );
    }

}
