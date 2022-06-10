@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if (session('status'))
    <div class="card-body">
        <div class="alert alert-success " role="alert">
            {{ session('status') }}
        </div>
    </div>
        @endif
</div>

<div class="col-md-3">
    <form method="GET" enctype="multipart/form-data">
        @csrf
        @method('GET')
        <div class="input-group mb-3">
            <input type="date" class="form-control" placeholder="Cari Plat" name="tanggal">
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </div>
    </form>
</div>

<div class="card m-2">
    <div class="card-header">
      <h3 class="card-title">Data Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
        <thead class="bg-danger">
        <tr>
            <th scope="col">#</th>
            <th scope="col">No Truk</th>
            <th scope="col">Tanggal Keluar</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Penerima</th>
            <th scope="col">Tujuan</th>
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
                <td>{{ $barang->no_truk }}</td>
                <td>{{ date('d-m-Y', strtotime($barang->tanggal_keluar)); }}</td>
                <td>{{date('d-m-Y', strtotime($barang->tanggal)); }}</td>
                <td>{{ $barang->pengirim }}</td>
                <td>{{ $barang->penerima }}</td>
                <td>{{ $barang->tujuan }}</td>
                <td>Rp. {{ number_format($barang->ongkos) }},-</td>
                <td>Rp. {{ number_format($barang->total) }},-</td>
                <td>{{ $barang->jenis_pembayaran }}</td>
                <td class="row">
                    <div class="col-sm-6">
                        <form action="{{ route('suratJalan',  $barang->id)}}" method="GET">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('barangKeluarCancle', $barang->id) }}" method="post" class="col-4"
                            onsubmit="return confirm('Apakah anda sudah yakin menghapus data ini ?');">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
<div class="container">
    {{ $data_barang->links('pagination::bootstrap-4') }}
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

    $(function () {
                $("#example1").DataTable({
                "responsive": true, 
                "lengthChange": false,
                "ordering": true,
                "info": true,
                "paging":false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print",]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });
    
</script>