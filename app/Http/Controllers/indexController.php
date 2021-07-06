<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\bidMain;
use App\bidBid;
class indexController extends Controller
{
    public function index()
    {
        $slider = DB::table('unittes')->take(3)->get();
        $data = DB::table('unittes')->get();
        $bid = bidMain::where('status',1)
                    ->where('last_bid','>',date('Y-m-d H:i:s'))
                    ->get();
        $high = bidBid::orderBy('harga','desc')
                    ->get()
                    ->unique('bid_id');
        $video = DB::table('videos')->get();
        return view('main.index',[
            'slider' => $slider,
            'bid' => $bid,
            'high' => $high,
            'video' => $video,
            'data' => $data
        ]);
    }
}
