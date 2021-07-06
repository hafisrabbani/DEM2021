<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    protected $table = 'alamat';
    protected $fillable = ['user_id','nama','penerima','provinsi','kota','kode_pos','kecamatan'];

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
