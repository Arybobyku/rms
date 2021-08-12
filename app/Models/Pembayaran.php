<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'nama_pengirim',
        'status',
        'nama_penerima',
        'jenis_pembayaran',
        'rekening_tujuan',
        'jumlah',
        'tanggal',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class,'id_barang');
    }
}
