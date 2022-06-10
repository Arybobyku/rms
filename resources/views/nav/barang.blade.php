@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    @if (session('status'))
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
    @endif
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
                                <button type="submit" class="btn btn-warning    "><i class="fas fa-eye"></i></button>
                            </form>
                        </div>
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