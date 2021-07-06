<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidBid extends Model
{
    protected $table = "bid_bid";
    protected $fillable = ['user_id','bid_id','harga'];

    public function user()
    {
        return $this->belongsTo(b_user::class);
    }

    public function bidMain()
    {
        return $this->belongsTo(bidMain::class,'bid_id');
    }
}
