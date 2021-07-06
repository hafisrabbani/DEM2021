<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donation;

class donateController extends Controller
{
    public function index()
    {
        $data = donation::get();
        return view('main.donate',[
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = donation::where('id',$id)
                        ->get();
        dd($data);
    }
}
