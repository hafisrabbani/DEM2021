<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidMain extends Model
{
    protected $table = 'bid_main';
    protected $fillable = ['user_id','nama_barang','image','pemenang','description','status','last_bid'];


    public function user()
    {
        return $this->belongsTo(b_user::class);
    }

    public function bidPay()
    {
        return $this->hasMany(bidPay::class);
    }
}
