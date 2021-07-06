<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    protected $table = 'donate_main';
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(b_user::class,'user_id');
    }
}
