<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    protected $table = 'seller';
    protected $fillable = [
        'user_id',
        'resi',
        'alamat_id',
        'bid_id',
        'invoice_id',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(b_user::class,'user_id');
    }

    public function invoice()
    {
        return $this->belongsTo(bidPay::class,'invoice_id');
    }

    public function bid()
    {
        return $this->belongsTo(bidMain::class,'bid_id');
    }

    public function alamat()
    {
        return $this->belongsTo(alamat::class,'alamat_id');
    }
}
