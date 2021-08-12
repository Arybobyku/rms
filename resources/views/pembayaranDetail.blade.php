@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Pengirim</label>
                <input type="text" class="form-control" placeholder="{{ $data->barang->pengirim }}" disabled>
            </div>
            <div class="form-group">
                <label>No Hp Pengirim</label>
                <input type="text" class="form-control" placeholder="{{ $data->barang->no_pengirim }}" disabled>
            </div>
            <div class="form-group">
                <label>Penerima</label>
                <input type="text" class="form-control" placeholder="{{ $data->barang->penerima }}" disabled>
            </div>
            <div class="form-group">
                <label>No Hp Penerima</label>
                <input type="text" class="form-control" placeholder="{{ $data->barang->no_penerima }}" disabled>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" class="form-control" placeholder="{{ $data->barang->tujuan }}" disabled>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Barang</label>
                    <input type="text" class="form-control" placeholder="{{ $data->barang->barang }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Qty</label>
                    <input type="text" class="form-control" placeholder="{{ $data->barang->qty }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Satuan</label>
                    <input type="text" class="form-control" placeholder="{{ $data->barang->satuan }}" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" placeholder="{{ $data->barang->keterangan }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Berat/Pcs</label>
                    <input id="berat" type="text" class="form-control" disabled
                        placeholder="{{ $data->barang->berat }}">
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Ongkos</label>
                    <input id="ongkos" type="number" class="form-control"
                        placeholder="Rp. {{ number_format($data->barang->ongkos) }},-" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Total</label>
                    <input id="fakeTotal" type="text" class="form-control"
                        placeholder="Rp. {{ number_format($data->barang->total) }},-" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Jenis Pembayaran di</label>
                    <input type="text" class="form-control" disabled
                        placeholder="{{ $data->barang->jenis_pembayaran }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Tanggal Masuk</label>
                    <input type="date" class="form-control" value="{{ $data->barang->tanggal }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Nomor Polisi</label>
                    <input type="text" class="form-control" value="{{ $data->barang->no_truk }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Nama Supir</label>
                    <input type="text" class="form-control" disabled value="{{ $data->barang->nama_supir }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Nomor Hp Supir</label>
                    <input type="text" class="form-control" disabled value="{{ $data->barang->no_supir }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Tanggal Keluar</label>
                    <input type="text" class="form-control" disabled value="{{ $data->barang->tanggal_keluar }}">
                </div>
            </div>
        </div>
    </div>
</div>
{{-- card pembayaran --}}
<div class="container">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Pembayaran</h3>
            </div>
            <div class="card-body">
                <label>Pengirim Uang</label>
                <input required type="text" class="form-control" placeholder="{{$data->nama_pengirim}}" disabled>

                <label>Penerima Uang</label>
                <input required type="text" class="form-control" placeholder="{{$data->nama_penerima}}" disabled>

                <label>Jenis Pembayaran Uang</label>
                <input required type="text" class="form-control" placeholder="{{$data->jenis_pembayaran}}" disabled>

                <label>No Rekening Tujuan</label>
                <input type="text" class="form-control" placeholder="{{$data->rekening_tujuan}}" disabled>

                <label>Jumlah</label>
                <input required type="text" class="form-control" placeholder="{{$data->jumlah}}" disabled>

                <label>Tanggal Pembayaran</label>
                <input required type="text" class="form-control" placeholder="{{$data->tanggal}}" disabled>
            </div>
        </div>
    </div>
</div>
@endsection