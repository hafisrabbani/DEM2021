<?php

namespace App\Http\Controllers;

use App\bidBid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\bidMain;
use App\bidPay;
use App\seller;
// use App\

class verifikasiController extends Controller
{
    public function index()
    {
        $data = bidPay::where('status',0)
                    ->where('bukti','!=',NULL)
                    ->get();
        return view('admin.verifikasi',[
            'data'=>$data
        ]);
    }

    public function verifikasi(Request $request)
    {
        // dd($request->request);
            DB::table('invoice_bid')
                ->where('id',floatval($request->id))
                // ->where('bukti','!==',NULL)
                ->update([
                    'status' => 1
                ]);
        
        $data = bidPay::where('id',floatval($request->id))
                        ->get();
        $insert = $data[0];
        $seller = new seller;
        $key = $insert->alamat_id.'+'.$insert->id.'+'.$insert->bid_id;
        $seller->user_id = $insert->bidMain->user->id;
        $seller->alamat_id = $insert->alamat_id;
        $seller->bid_id = $insert->bid_id; 
        $seller->status = 0;
        $seller->invoice_id = $insert->id; 
        $seller->key = $key;
        $seller->save();
        return redirect()->back()->with('success','Berhasil Verifikasi');
    }

    public function bid()
    {
        $data = bidMain::orderBy('status','desc')
                        ->get();
        return view('admin.bid-verifikasi',[
            'data' => $data
        ]);
    }

    public function bidAction(Request $request)
    {   
        if($request->status == "true"){
            $bid = bidMain::where('id',$request->id)
                            ->update([
                                'status'=>1
                            ]);
        }else{
            $bid = bidMain::where('id',$request->id)
                            ->update([
                                'status' => 3,
                                'pesan' => $request->pesan
                            ]);
        }
        
        return redirect()->back()->with('success','Berhasil Memberikan Feedback');

    }

    public function win()
    {
        // $bid = bidMain::where('status',1)
        //             ->where('last_bid','<',date('Y-m-d H:i:s'))
        //             ->leftJoin('bid_bid','bid_bid.bid_id','=','bid_main.id')
        //             ->select('*','bid_bid.user_id as userID',DB::raw("max(harga) as true_harga"))
        //             ->groupBy('bid_id')
        //             // ->latest()
        //             ->get()
        //             ->max('id');
        $bid = bidBid::orderBy('harga','desc')
                    ->get()
                    ->unique('bid_id');
                    // ->groupBy('bid_id');
        // dd($bid);
        return view('admin.win-verifikasi',['data' =>$bid]);
    }

    public function winAction(Request $request)
    {
        $key = $request->bid_id.'+'.$request->user_id;
        bidMain::where('id',$request->bid_id)
                ->update([
                   'pemenang' => $request->user_id,
                   'harga_win' => $request->harga
               ]);

        $invoice = new bidPay();
        $invoice->total = floatval($request->harga);
        $invoice->key = $key;
        $invoice->user_id = floatval($request->user_id);
        $invoice->bid_id = floatval($request->bid_id);
        $invoice->status = 0;
        $invoice->save();

        return redirect()->back()->with('success','Berhasil Mengirim Notification');
    }

    public function bidStop(Request $request)
    {
        bidMain::where('id',$request->id)
                ->update([
                    'last_bid' => date('Y-m-d H:i:s')
                ]);
        return redirect()->back()->with('success','Berhasil Menghentikan');
    }
}
