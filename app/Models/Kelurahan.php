<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'subdistricts';
    public function kecamatan(){
    	return $this->belongsTo(Kecamatan::class, 'subdis_id' );
    }
}