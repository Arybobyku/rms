@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Barang Proses</h2>
    <form role="form" method="POST" action="{{ Route('updateToMuat') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" hidden name="id" value="{{ $data_barang->id }}">
                </div>
                <div class="form-group">
                    <label>Pengirim</label>
                    <input type="text" class="form-control" placeholder="{{ $data_barang->pengirim }}" disabled>
                </div>
                <div class="form-group">
                    <label>No Hp Pengirim</label>
                    <input type="text" class="form-control" placeholder="{{ $data_barang->no_pengirim }}" disabled>
                </div>
                <div class="form-group">
                    <label>Penerima</label>
                    <input type="text" class="form-control" placeholder="{{ $data_barang->penerima }}" disabled>
                </div>
                <div class="form-group">
                    <label>No Hp Penerima</label>
                    <input type="text" class="form-control" placeholder="{{ $data_barang->no_penerima }}" disabled>
                </div>
                <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" placeholder="{{ $data_barang->tujuan }}" disabled>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Barang</label>
                        <input type="text" class="form-control" placeholder="{{ $data_barang->barang }}" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Qty</label>
                        <input type="text" class="form-control" placeholder="{{ $data_barang->qty }}" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Satuan</label>
                        <input type="text" class="form-control" placeholder="{{ $data_barang->satuan }}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="{{ $data_barang->keterangan }}" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Berat/Pcs</label>
                        <input id="berat" type="text" class="form-control" disabled
                            placeholder="{{ $data_barang->berat }}">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Ongkos</label>
                        <input id="ongkos" type="number" class="form-control"
                            placeholder="Rp. {{ number_format($data_barang->ongkos) }},-" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Total</label>
                        <input id="fakeTotal" type="text" class="form-control"
                            placeholder="Rp. {{ number_format($data_barang->total) }},-" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Jenis Pembayaran</label>
                        <input type="text" class="form-control" disabled
                            placeholder="{{ $data_barang->jenis_pembayaran }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" value="{{ $data_barang->tanggal }}" disabled
                            placeholder="tanggal">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nomor Polisi</label>
                        <input type="text" class="form-control" name="no_truk" required placeholder="Nomor Polisi">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nama Supir</label>
                        <input type="text" class="form-control" name="nama_supir" required placeholder="Nama Supir">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nomor Hp Supir</label>
                        <input type="text" class="form-control" name="no_supir" required placeholder="0821xxxxxxx">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tanggal_keluar" required
                            placeholder="tanggal Keluar">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
    </form>
</div>
@endsection