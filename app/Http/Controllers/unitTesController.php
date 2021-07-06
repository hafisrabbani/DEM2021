<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class unitTesController extends Controller
{
    public function index()
    {
        $data = DB::table('unittes')->get();
        $slider = DB::table('unittes')->take(3)->get();
        $video = DB::table('videos')->get();
        $bid = DB::table('bid')->get();
        return view('tes.index',
        [
            'data' => $data,
            'slider' => $slider,
            'video' => $video,
            'bid' => $bid
        ]);
        // dd($data);
    }
}
