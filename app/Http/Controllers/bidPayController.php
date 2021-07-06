<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class bidPayController extends Controller
{
    public function index()
    {
       $data = DB::table('bid_main')->get();
       $date = date('Y-m-d H:i:s');
       $now = strtotime($date);
       foreach($data as $item){
           if($now > strtotime($item->last_bid)){
               $key = $item->pemenang.'+'.$item->id;
                DB::table('invoice_bid')->insertOrIgnore([
                   'total' => $item->harga,
                   'user_id' => $item->pemenang,
                   'bid_id' => $item->id,
                   'status' => 0,
                   'key' => $key
                ]);
           }
       }
    }
}
