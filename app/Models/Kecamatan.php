<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'districts';
    public function kabkot(){
    	return $this->belongsTo(Kabkot::class, 'dis_id' );
    }
    public function kelurahann(){
    	return $this->hasMany(Kelurahan::class , 'subdis_id');
    }
}