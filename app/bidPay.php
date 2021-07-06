<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidPay extends Model
{
    protected $table = 'invoice_bid';
    protected $fillable = ['total','user_id','bid_id','status','key'];

    public function user()
    {
        return $this->belongsTo(b_user::class);
    }

    public function bidMain()
    {
        return $this->belongsTo(bidMain::class,'bid_id');
    }
}
