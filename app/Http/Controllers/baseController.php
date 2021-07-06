<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\bidPay;
// use Illuminate\Support\Facades\View;
use App\alamat;

class baseController extends Controller
{
    public function index()
    {
        $id = session('id');
        $bill = DB::table('invoice_bid')
                ->where('user_id',$id)
                ->where('status',0)
                ->count();
        $user = DB::table('user')
                    ->where('id',$id)
                    ->get();
        // dd($user);
        return view('main.bill',[
            'bill' => $bill,
            'user' => $user[0]
        ]);
    }

    public function show()
    {
        $id  = session('id');
        $bill = bidPay::where('user_id',$id)
                        ->where('status',0)
                        ->get();
        return view('main.wait-paid',['data' => $bill]);
    }

    public function showDetail($id)
    {
        $bill = bidPay::where('id',$id)
                        ->take(1)
                        ->get();

        // dd($bi[0]->bidMain);                        
        $alamat = alamat::where('user_id',session('id'))
                        ->get();
        return view('main.pay',[
            'data' => $bill,
            'alamat' => $alamat
    ]);
    }

    public function pay(Request $request)
    {
        // dd($request->request);
        $alamatId = $request->alamat;
        $id = $request->id;
        $img = $request->file('file')->store('pay');
        $data = DB::table('invoice_bid')
                    ->where('id',$id)
                    ->update([
                        'alamat_id' => $alamatId,
                        'bukti' => $img
                    ]);
        return redirect()->back()->with('success','Silahkan Menunggu Konfimasi');
    }

    public function alamatIndex()
    {
        $id = session('id');
        $data = alamat::where('user_id',$id)
                        ->get();
        return view('main.alamat',['data' => $data]);
    }
    public function alamatPost(Request $request)
    {
        $alamat = new alamat(); 
        $alamat->nama = $request->nama;
        $alamat->penerima = $request->penerima;
        $alamat->provinsi = $request->provinsi;
        $alamat->kota = $request->kota;
        $alamat->kode_pos = $request->kode_pos;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->user_id = session('id');
        $alamat->alamat = $request->alamat;
        $alamat->save();

        return redirect()->back()->with('success','Berhasil Membuat Alamat Baru');
    }
}
