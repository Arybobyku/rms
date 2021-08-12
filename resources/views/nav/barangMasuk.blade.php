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
        <h1 class="float-right">Barang Masuk Di Gudang</h1>

        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">
            Tambah Barang
        </button>
        <br>
        <br>
        <thead class="bg-danger">
            <tr>
                <th scope="col">#</th>
                <th scope="col">tanggal Masuk</th>
                <th scope="col">pengirim</th>
                <th scope="col">penerima</th>
                <th scope="col">tujuan</th>
                <th scope="col">barang</th>
                <th scope="col">satuan</th>
                <th scope="col">berat/pcs</th>
                <th scope="col">ongkos</th>
                <th scope="col">total</th>
                <th scope="col">jenis_pembayaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_barang as $barang)

            <?php if(session('index') !=null &&   session('index')==$barang->id) : ?>
            <tr class="bg-secondary">
                <?php else : ?>
            <tr>
                <?php endif; ?>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{date('d-m-Y', strtotime($barang->tanggal));}}</td>
                <td>{{ $barang->pengirim }}</td>
                <td>{{ $barang->penerima }}</td>
                <td>{{ $barang->tujuan }}</td>
                <td>{{ $barang->barang }}</td>
                <td>{{ $barang->satuan }}</td>
                <td class="text-center">{{ $barang->berat }}</td>
                <td>Rp. {{ number_format($barang->ongkos) }},-</td>
                <td>Rp. {{ number_format($barang->total) }},-</td>
                <td>{{ $barang->jenis_pembayaran }}</td>
                <td class="row">
                    <div class="col-sm-3">
                        <form action="{{ route('barangDetail',  $barang->id)}}" method="GET">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-print"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{ route('barangProses', $barang->id) }}" method="GET">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{ route('barangUpdate',  $barang->id)}}" method="GET">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="post"
                            onsubmit="return confirm('Apakah anda sudah yakin menghapus data ini ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="container">
        {{ $data_barang->links('pagination::bootstrap-4') }}
    </div>
    {{-- showmodal --}}


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog " style="max-width: 1000px!important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" method="post" action="{{ Route('storeBarang') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pengirim</label>
                                    <input type="text" class="form-control" name="pengirim" required
                                        placeholder="pengirim">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Nomor Hp Pengirim</label>
                                    <input type="text" class="form-control" name="no_pengirim" required
                                        placeholder="0821xxxxxxx">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Penerima</label>
                                    <input type="text" class="form-control" name="penerima" required
                                        placeholder="penerima">
                                </div>
                                <div class="form-group cold-md-2">
                                    <label>Nomor Hp Penerima</label>
                                    <input type="text" class="form-control" name="no_penerima" required
                                        placeholder="0821xxxxxx">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" required placeholder="tujuan">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>Barang</label>
                                    <input type="text" class="form-control" name="barang" required placeholder="barang">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>qty</label>
                                    <input type="text" class="form-control" name="qty" required placeholder="qty">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan" required placeholder="satuan">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" required
                                        placeholder="keterangan">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Berat/pcs/goni/ikat/...</label>
                                    <input id="berat" type="text" class="form-control" name="berat" required
                                        placeholder="berat">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Ongkos</label>
                                    <input id="ongkos" type="number" class="form-control" name="ongkos" required
                                        placeholder="ongkos">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Berat/pcs/goni/ikat/... x Ongkos </label>
                                    <br>
                                    <button id="kalkulasi" type="button" class="btn btn-primary">Jumlahkan</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Ongkos Kirim</label>
                                    <input id="fakeTotal" type="text" class="form-control" placeholder="Rp. 0" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <input id="total" type="number" class="form-control" name="total" required hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Jenis Pembayaran Di</label>
                                    <input type="text" class="form-control" name="jenis_pembayaran" required
                                        placeholder="jenis pembayaran">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" required
                                        placeholder="tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                </form>
            </div>
        </div>


        @endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // Get value on button click and show alert
                $("#kalkulasi").click(function() {
                    var ongkos = $("#ongkos").val();
                    var berat = $("#berat").val();
                    var hasil = ongkos * berat;
                    $("#fakeTotal").attr("placeholder",
                        `Rp. ${parseFloat(hasil, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()}`
                    );
                    $('#total').val(hasil);
                });
            });
        </script>