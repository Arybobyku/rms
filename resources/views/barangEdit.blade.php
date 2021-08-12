@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Barang Edit</h2>
    <form role="form" method="POST" action="{{ Route('update') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" hidden name="id" value="{{ $data_barang->id }}" hidden>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Pengirim</label>
                        <input type="text" class="form-control" value="{{ $data_barang->pengirim }}" required
                            name="pengirim">
                    </div>
                    <div class="form-group cold-md-3">
                        <label>No Hp Pengirim</label>
                        <input type="text" class="form-control" value="{{ $data_barang->no_pengirim }}" required
                            name="no_pengirim">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Penerima</label>
                        <input type="text" class="form-control" value="{{ $data_barang->penerima }}" required
                            name="penerima">
                    </div>
                    <div class="form-group col-md-3">
                        <label>No Hp Penerima</label>
                        <input type="text" class="form-control" value="{{ $data_barang->no_penerima }}" required
                            name="no_penerima">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" value="{{ $data_barang->tujuan }}" required name="tujuan">
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Barang</label>
                        <input type="text" class="form-control" value="{{ $data_barang->barang }}" required
                            name="barang">
                    </div>
                    <div class="form-group col-md-2">
                        <label>qty</label>
                        <input type="text" class="form-control" value="{{ $data_barang->qty }}" required name="qty">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Satuan</label>
                        <input type="text" class="form-control" value="{{ $data_barang->satuan }}" required
                            name="satuan">
                    </div>
                    <div class="form-group col-md-3">
                        <label>keterangan</label>
                        <input type="text" class="form-control" value="{{ $data_barang->keterangan }}" required
                            name="keterangan">
                    </div>

                    <div class="form-group col-md-2">
                        <label>Berat/pcs</label>
                        <input id="berat" type="number" class="form-control" required name="berat"
                            value="{{ $data_barang->berat }}">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Ongkos</label>
                        <input id="ongkos" type="number" class="form-control" value="{{$data_barang->ongkos}}" required
                            name="ongkos">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Total</label>
                        <input id="fakeTotal" type="text" class="form-control" value="{{$data_barang->total}}" required
                            name="total">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Jenis Pembayaran</label>
                        <input type="text" class="form-control" required name="jenis_pembayaran"
                            value="{{ $data_barang->jenis_pembayaran }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" value="{{ $data_barang->tanggal }}" required
                            name="tanggal" value="tanggal">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
    </form>
</div>
@endsection