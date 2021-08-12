<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembayaran;
class BarangController extends Controller
{
    function getAllBarang(Request $request){
        if($request->from!=null && $request->until != null){
            $data = Barang::whereBetween($request->jenis_tanggal,array($request->from, $request->until))->orderBy('status','asc')->orderBy('status_pembayaran','asc')->paginate(50);
        }else{
            $data = Barang::orderBy('status','asc')->paginate(20);
        }

        return view('nav/barang',['data_barang'=>$data]);
    }

    function barangMasuk(){
        $data = Barang::where('status',0)->orderBy('tanggal','desc')->paginate(20);
        return view('nav/barangMasuk',['data_barang'=>$data,'data_new'=>null]);
    }

    function barangKeluar(Request $request){
        if($request->tanggal != null){
            $data = Barang::where('status',1)->where('tanggal_keluar',$request->tanggal)->paginate(50);
        }else{
            $data = Barang::where('status',1)->orderBy('tanggal_keluar','desc')->orderBy('no_truk')->paginate(50);
        }
        return view('nav/barangKeluar',['data_barang'=>$data]);
    }
    function barangKeluarCancle(Request $request){
        Barang::where('id',$request['id'])->update([
            'no_truk'=>null,
            'nama_supir'=>null,
            'no_supir'=>null,
            'tanggal_keluar'=>null,
            'status'=>0,
        ]);

        return redirect('barang/keluar')->with('status','Barang Keluar Dibatalkan');
    }
    function barangProses($id){
        $barang = Barang::where('id',$id)->first();
       
        return view('barangProses',['data_barang'=>$barang]);
    }
    function store(Request $request){

      $data_new = Barang::create(array_merge($request->all(),[
            'status'=>0,
            'status_pembayaran'=>0
        ]));
        Pembayaran::create(['id_barang'=>$data_new->id,'status'=>0]);
        return redirect('barang/masuk')->with(['status'=>'Produk Berhasil Ditambahkan','index'=>$data_new->id]);
    }

    function barangUpdate($id){
       $barang = Barang::where('id',$id)->first();
        return view('barangEdit',['data_barang'=>$barang]);   
    }
    function barangDetail($id){
       $barang = Barang::where('id',$id)->first();
        return view('barangDetail',['data_barang'=>$barang]);   
    }
    function suratJalan($id){
       $barang = Barang::where('id',$id)->first();
        return view('suratJalan',['data_barang'=>$barang]);   
    }

    function update(Request $request){
        $barang = Barang::where('id',$request['id'])->update(array_merge($request->except(['_token','_method'])));
        return redirect('barang/masuk')->with('status','Barang Berhasil Diubah');
    }

    function updateToMuat(Request $request){
        Barang::where('id',$request['id'])->update([
            'status'=>1,
            'no_truk'=>$request['no_truk'],
            'nama_supir'=>$request['nama_supir'],
            'no_supir'=>$request['no_supir'],
            'tanggal_keluar'=>$request['tanggal_keluar'],
        ]);

        return redirect('barang/masuk')->with('status','Barang Berhasil Dimuat');
    }

    function destroy($id){
        Barang::where('id',$id)->delete();
        pembayaran::where('id_barang',$id)->delete();
        return redirect('barang/masuk')->with('status','Berhasil Di Hapus');
    }

}
