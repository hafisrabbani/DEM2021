<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shipment;
use App\b_user;
class shipmentController extends Controller
{
    public function index()
    {
        $data = shipment::where('user_id',session('id'))
                        ->get();
        return view('main.shipment',['data' => $data]);
    }

    public function check(Request $request)
    {
        // dd($request->request);
        shipment::where('id',$request->id)
                            ->update([
                                'status' => 1
                            ]);
        $data = shipment::where('id',$request->id)
                        ->get();
        foreach($data as $item){
            b_user::where('id',$item->invoice->bid->user_id)
                ->update([
                    'saldo' => $item->invoice->bid->harga_win,
                ]);
        }
        return redirect()->back()->with('success','Konfirmasi Paket Berhasil');
    }
}
