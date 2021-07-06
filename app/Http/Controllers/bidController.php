<?php

namespace App\Http\Controllers;

use App\bidBid;
use Illuminate\Http\Request;
use App\bidMain;
use Illuminate\Support\Facades\DB;

class bidController extends Controller
{
    public function timeOut(){
       $data = DB::table('bid_main')->get();
       $date = date('Y-m-d H:i:s');
       $now = strtotime($date);
    //    $dataTmp = $
    }

    public function index(){
        // dd(date('H:i:s'));
        $bid = bidMain::where('status',1)
                    ->where('last_bid','>',date('Y-m-d H:i:s'))
                    // ->where('user_id','!=',session('id'))
                    // ->where('user_id','!=',session('id'))
                    ->get();
        
        // $high = DB::table('bid_bid')
        //             ->orderBy('harga','asc')
        //             ->select('*',DB::raw('GROUP_CONCAT(harga) as datas'))
        //             ->max('harga')
        //             ->groupBy('bid_id')
        //             ->get();

        // $high = DB::table('bid_bid')
        //             ->groupBy('bid_id')
        //             ->orderBy('harga','asc')
        //             ->get(['id',DB::raw('max(harga) as bi')]);
        // $hightmp = bidBid::orderBy('harga','DESC');
        // $high = DB::table(DB::raw("({$hightmp->toSql()})"))
                    // ->groupBy('bid_id')
                    // ->value('id');
                    // ->groupBy('bid_id')
                        // ->get();

        $high = bidBid::orderBy('harga','desc')
                    ->get()
                    ->unique('bid_id');
        // dd($high);

        $notif = bidMain::where('status',3)
                        ->where('user_id',session('id'))
                        ->count();
        // dd($notif);
        return view('main.bid',[
            'data' => $bid,
            'notifmain' => $notif,
            'high' => $high
            // 'bidNow' => $bidNow
        ]);
    }

    public function history()
    {
        $data = bidMain::where('user_id',session('id'))
                        ->get();
        return view('main.bid_history',['data' => $data]);
    }

    public function create(Request $request)
    {
        // dd(str_replace("T"," ",$request->last));
        // dd($last);
        $img = $request->file('gambar')->store('bid');
        // dd($request->request);
        $last = str_replace("T"," ",$request->last);
        $last = $last.":00";
        $bid = new bidMain();
        $bid->nama_barang = $request->nama;
        $bid->user_id = session('id');
        $bid->description = $request->deskripsi;
        $bid->last_bid = $last;
        $bid->image = $img;
        $bid->status = 0;
        $bid->save();
        return redirect()->back()->with('success','Berhasil Membuat Lelang Silahkan Menunggu Persetujuan Admin');
    }

    public function show($id)
    {
        $bid = bidMain::where('id',$id)
                    ->get();
        $bidNow = bidBid::where('bid_id',$id)
                    ->orderby('harga','desc')
                    ->limit(1)
                    ->get();
        $date = date('Y-m-d H:i:s');
        // dd(strtotime($bid[0]->last_bid));
        $date = strtotime($date);
        $last_bid = strtotime($bid[0]->last_bid);
        
        if($date > $last_bid){
            DB::table('bid_main')
            ->where('id',$bid[0]->id)
            ->update([
                'pemenang' => $bidNow[0]->user_id,
                'status' => 0,
                'harga' => $bidNow[0]->harga
            ]);
        }
        if(isset($bidNow[0])){
            $bidHigh = $bidNow[0];
        }else{ 
            $bidHigh = false;
        }
        return view('main.bid_act',[
            'bid' => $bid[0],
            'bidNow' => $bidHigh,
            'now' => $date
        ]);
    }


    public function store(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $highBid = bidBid::where('bid_id',$request->id)
                        ->orderby('harga','desc')
                        ->limit(1)
                        ->get();
        $bid = bidMain::where('id',$request->id)->get();
        if($bid[0]->last_bid < $now){
            return redirect()->back()->with('toast_error','Waktu Lelang Sudah Habis');
        }
        if(isset($highBid[0])){
            if($request->tawar < $highBid[0]->harga || $request->tawar == $highBid[0]->harga){
                return redirect()->back()->with('toast_error','Harga Penawaran Harus Lebih Tinggi');
            }
        }

        $bid = new bidBid();
        $bid->user_id = $request->session()->get('id');
        $bid->bid_id = $request->id;
        $bid->harga = $request->tawar;
        $bid->save();
        return redirect()->back()->with('success','Berhasil Menawar Barang');
    }
}
