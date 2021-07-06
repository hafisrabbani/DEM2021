<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    protected $table = 'shipment';
    protected $fillable = ['user_id','invoice_id','resi','status','nama_barang'];

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }

    public function invoice()
    {
        return $this->belongsTo(seller::class,'invoice_id');
    }
}
