<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengirim',
        'no_pengirim',
        'penerima',
        'no_penerima',
        'barang',
        'satuan',
        'qty',
        'keterangan',
        'tanggal',
        'status',
        'status_pembayaran',
        'berat',
        'ongkos',
        'total',
        'jenis_pembayaran',
        'no_truk',
        'nama_supir',
        'no_supir',
        'tujuan',
    ];
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class,'foreign_key','primary_key');
    }
}
