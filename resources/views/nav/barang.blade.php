@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <table class="table">
        <div class="col-md-3">
            <form method="GET" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <div class="input-group mb-2">
                    <div class="form-check form-check-inline">
                        <label for="jenis_tanggal">
                            <input type="radio" name="jenis_tanggal" value="tanggal_keluar" checked>Tanggal
                            Keluar
                            <input type="radio" name="jenis_tanggal" value="tanggal" jenis_tanggal>Tanggal Masuk
                        </label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="from">
                    <input type="date" class="form-control" name="until">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            {{ $data_barang->links('pagination::bootstrap-4') }}
        </div>
        <thead class="bg-danger">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Penerima</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Barang</th>
                <th scope="col">Satuan</th>
                <th scope="col">Berat/pcs</th>
                <th scope="col">Ongkos</th>
                <th scope="col">Total</th>
                <th scope="col">Jenis Pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_barang as $barang)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $barang->pengirim }}</td>
                <td>{{ $barang->penerima }}</td>
                <td>{{ $barang->tujuan }}</td>
                <td>{{ $barang->barang }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->berat }}</td>
                <td>Rp. {{ number_format($barang->ongkos) }},-</td>
                <td>Rp. {{ number_format($barang->total) }},-</td>
                <td>{{ $barang->jenis_pembayaran }}</td>
                <td>
                    <div class="row">
                        <div class="col-sm-4">
                            <form action="{{ route('barangDetail',  $barang->id)}}" method="GET">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-warning    "><i class="fas fa-print"></i></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Get value on button click and show alert
        $("#kalkulasi").click(function() {
            var value = '<?php echo json_encode($data_barang); ?>';
            var objectConvert = JSON.parse(value);
            var totalHasil = 0;
            for (var i = 0; i < objectConvert.data.length; i++) {
                totalHasil += objectConvert.data[i].total
            }
            $("#fakeTotalHasil").attr("placeholder",
                `Rp. ${parseFloat(totalHasil, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()}`
            );
        });
    });
</script>