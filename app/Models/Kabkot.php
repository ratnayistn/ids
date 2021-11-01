<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabkot extends Model
{
    protected $table = 'cities';
    public function provinsi(){
    	return $this->belongsTo(Provinsi::class, 'city_id' );
    }
    public function kecamatan(){
    	return $this->hasMany(Kecamatan::class , 'dis_id');
    }
}