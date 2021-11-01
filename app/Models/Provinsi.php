<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinces';
    public function kabkot(){
    	return $this->hasMany(Kabkot::class , 'city_id');
    }
    public function customer(){
    	return $this->hasMany(Customer::class , 'provinsi');
    }

}