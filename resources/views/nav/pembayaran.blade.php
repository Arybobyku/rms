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

    <div class="container">
        {{ $data_barang->links('pagination::bootstrap-4') }}
    </div>
    <table class="table" id="myTable">
        <thead class="bg-danger">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Hp Pengirim</th>
                <th scope="col">Penerima</th>
                <th scope="col">Hp Penerima</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Barang</th>
                <th scope="col">Ongkos Kirim</th>
                <th scope="col">Jenis Pembayaran</th>
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_barang as $data)

            <?php if(session('index') !=null &&   session('index')==$data->id_barang) : ?>
            <tr class="bg-secondary">
                <?php else : ?>
            <tr>
                <?php endif; ?>

                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->barang->pengirim }}</td>
                <td>{{ $data->barang->no_pengirim }}</td>
                <td>{{ $data->barang->penerima }}</td>
                <td>{{ $data->barang->no_penerima }}</td>
                <td>{{ $data->barang->tujuan}}</td>
                <td>{{ $data->barang->barang }}</td>
                <td>Rp. {{ number_format($data->barang->total) }},-</td>
                <td>{{ $data->barang->jenis_pembayaran }}</td>
                <?php if($data->status == 0) : ?>

                <td>
                    <p class="btn btn-danger btn-sm">Belum bayar</p>
                </td>
                <td>
                    <form action="{{ route('pembayaran.proses', $data->barang->id) }}" method="GET" class="col-5">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"></i>
                        </button>
                    </form>
                    <div class="col-5">
                        <a class="btn btn-info btn-sm" href="{{ route('pembayaranDetail', $data->barang->id) }}">
                            <i class="fas fa-print"></i>
                        </a>
                    </div>
                </td>
                <?php else : ?>

                <td>
                    <p class="btn btn-success btn-sm">Sudah Bayar</p>
                </td>
                <td>
                    @if ( Auth::user()->role==1)
                    <form action="{{ route('pembayaran.updateCancle', $data->barang->id) }}" method="GET" class="col-5"
                        onsubmit="return confirm('Apakah anda sudah yakin membatalkan pembayaran ?');">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-times"></i></button>
                    </form>
                    @endif
                    <div class="col-5">
                        <a class="btn btn-info btn-sm" href="{{ route('pembayaranDetail', $data->barang->id) }}">
                            <i class="fas fa-print"></i>
                        </a>
                    </div>
                </td>
                <?php endif; ?>
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

    // setTimeout(myFunction, 10000);
    // function myFunction() {
    //     '<%Session["index"] = null; %>';
    // }
</script>