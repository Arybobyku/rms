<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function getAllBarang(){
        $barang_keluar = Barang::where('status',1)->orderBy('tanggal_keluar','desc');
        $barang_masuk = Barang::where('status',0)->orderBy('tanggal','desc');
        $pembayaran = Pembayaran::where('status',1)->orderBy('tanggal','desc');

        return view('nav/dashboard',[
            'barang_keluar'=>$barang_keluar,
            'barang_masuk'=>$barang_masuk,
            'pembayaran'=>$pembayaran,
        ]);
    }
}
