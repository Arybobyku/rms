<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    function pembayaranUpdate(Request $request){
      $data =  Pembayaran::where('id_barang',$request['id'])->with('barang')->first();
      return view('pembayaranProses',['data'=>$data]);
    }

    function update(Request $request){
        $data = Pembayaran::where('id_barang',$request['id_barang'])->update(
            array_merge($request->except(['_token','_method']),[
                'status'=>1
            ])
        );
        $index = $request['id_barang'];
        return redirect('pembayaran')->with(['status'=>'Pembayaran Berhasil','index'=>$index]);       
    }
    
    function pembayaranUpdateCancle(Request $request){
        Pembayaran::where('id_barang',$request['id'])->update([
            'status'=>0,
            'nama_pengirim'=>null,
            'nama_penerima'=>null,
            'jenis_pembayaran'=>null,
            'rekening_tujuan'=>null,
            'jumlah'=>null,
            'tanggal'=>null,
        ]);

        return redirect('pembayaran')->with('status','Pembayaran Dibatalkan');
    }
    function pembayaranDetail($id){
        $data = Pembayaran::where('id',$id)->with('barang')->first();
        return view('pembayaranDetail',['data'=>$data]);
    }
    function pembayaran(){
        $data = Pembayaran::with('barang')->orderBy('status','asc')->paginate(20);
        return view('nav/pembayaran',['data_barang'=>$data]);
    }
}
