<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim');
            $table->string('no_pengirim');
            $table->string('penerima');
            $table->string('no_penerima');
            $table->string('tujuan');
            $table->string('barang');
            $table->string('qty');
            $table->string('satuan');
            $table->string('keterangan');
            $table->date('tanggal');
            $table->integer('status');
            $table->integer('status_pembayaran');
            $table->double('berat',12,3);
            $table->double('ongkos',20,3);
            $table->double('total',20,3);
            $table->string('jenis_pembayaran');
            $table->string('no_truk')->nullable();
            $table->string('nama_supir')->nullable();
            $table->string('no_supir')->nullable();
            $table->string('tanggal_keluar')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
