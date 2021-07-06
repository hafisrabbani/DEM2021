<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class b_user extends Model
{
    protected $table = 'user';
    protected $fillable = ['name','username','telp','email','password','saldo'];

    public function bidMain()
    {
        return $this->hasMany(bidMain::class);
    }
    public function bidBid()
    {
        return $this->hasMany(bidBid::class);
    }
    public function bidPay()
    {
        return $this->hasMany(bidPay::class);
    }
}
