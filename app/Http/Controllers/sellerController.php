<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\seller;
use App\shipment;

class sellerController extends Controller
{
    public function index()
    {
        $id = session('id');
        $data = seller::where('user_id',$id)
                        // ->where('status',1)
                        ->get();
        // dd($data);
        return view('main.seller',[
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = seller::where('id',$id)
                        ->get();

        // dd($data);
        return view('main.seller-detail',['data' => $data]);
    }

    public function store(Request $request,$id)
    {
        $data = seller::where('id',$id)
                        ->update([
                            'resi' => $request->resi,
                            'status' => 1
                        ]);

        $getData = seller::where('id',$id)->get();
        $shipment = new shipment();
        foreach($getData as $get){
            $shipment->user_id = $get->bid->pemenang;
            $shipment->invoice_id = $get->id;
            $shipment->resi = $request->resi;
            $shipment->status = 0;
            $shipment->nama_barang = $get->bid->nama_barang;
            $shipment->save();
        }
        
        return redirect()->back()->with('success','Berhasil mengirimkan barang');
    }
}
