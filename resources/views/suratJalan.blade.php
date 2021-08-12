@extends('layouts.admin')

@section('content')
<div class="container">
    <button class="btn btn-dark float-right" onclick="printDiv('printableArea')">print</button>
    <br>
    <br>
    <form>
        <div class="card" id="printableArea">
            <div class="row mt-3">
                <div class="col-3">
                    <img src="{{asset('/images/logo.JPG')}}" alt="" height="150px" width="300px"
                        class="mx-auto d-block align-top">
                </div>
                <div class="col-6">
                    <center>
                        <div>
                            <h4 class="mb-0"><B>PT RAHMAT MANDIRI SENTOSA</B></h4>
                            <h6 class="mb-0"><b>TRUCKING & LOGISTICS</b></h6>
                            <h6 class="mb-0"><b>JURUSAN : SUMATERA JAWA</b></h6>
                            <h6 class="mb-0">Jl. Bersama No. 135 Kel. Bandar Selamat Kec. Medan Tembung - Medan</h6>
                            <h6 class="mb-0">Telp. (061) 7364242 / 0853 7999 0777</h6>
                            <h6 class="mb-0">Email : ekspedisirahmats@gmail.com</h6>
                        </div>
                    </center>
                </div>
                <div class="col-3">
                    <div class="float-right px-5">
                        <h6 class="mb-0">Medan, {{date('d-m-Y', strtotime($data_barang->tanggal_keluar));}} </h6>
                    </div>
                </div>
            </div>
            <br>
            <center>
                <h4 class="mb-0"><b>SURAT JALAN</b></h4>
            </center>
            <div class="card-body">
                <div class="row mb-0">
                    <div class="col-3">Nomor Polisi : {{$data_barang->no_truk}}</div>
                </div>
                {{-- hover --}}
                <table class="table">
                    <tr>
                        <td><b> Pengirim</b></td>
                        <td>:</td>
                        <td>{{ $data_barang->pengirim }}</td>
                        <td><b>Nomor Hp Pengirim</b></td>
                        <td>:</td>
                        <td>{{$data_barang->no_pengirim}}</td>
                    </tr>
                    <tr>
                        <td><b>Penerima</b></td>
                        <td>:</td>
                        <td>{{ $data_barang->penerima }}</td>
                        <td><b>Nomor Hp Penerima</b></td>
                        <td>:</td>
                        <td>{{$data_barang->no_penerima}}</td>
                    </tr>
                    <tr>
                        <td><b>Tujuan</b></td>
                        <td>:</td>
                        <td>{{ $data_barang->tujuan }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Barang</b></td>
                        <td>:</td>
                        <td>{{ $data_barang->barang}}</td>
                        <td><b>Satuan</b></td>
                        <td>:</td>
                        <td>{{$data_barang->satuan }}</td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td>:</td>
                        <td>{{ $data_barang->keterangan}}</td>
                        <td><b>Total berat/pcs</b></td>
                        <td>:</td>
                        <td>{{ $data_barang->berat}}</td>
                    </tr>
                    <tr>
                        <td><b>Ongkos</b></td>
                        <td>:</td>
                        <td>Rp. {{ number_format($data_barang->ongkos) }},-</td>
                        <td><b>Ongkos Kirim</b></td>
                        <td>:</td>
                        <td>Rp. {{ number_format($data_barang->total) }},-</td>
                    </tr>
                </table>
                <hr>
                <div class="col-3">
                    <h6 class="text-center">Yang Menerima</h6>
                    <br><br><br>
                    <h6 class="text-center"> (......................................)</h6>
                </div>
                <div class="col-12">
                    <table class="table mb-0 table-border-none">
                        <tr>
                            <td>Note: </td>
                            <td>Kehilangan atau Kerusakan barang diganti ekspedisi, bila tidak dilaporkan dalam tempo 7
                                (tujuh) hari tidak menjadi
                                tanggung jawab RAHMAT'S. Apabila kendaraan mengalami kecelakaan/Bencana alam (force
                                majeur)barang-barang tidak menjadi
                                tanggung jawab RAHMAT'S/Pengusaha. Barang-barang yang sudah naik ke atas motor menjadi
                                tanggung jawab supir
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
    </form>
</div>
@endsection

<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>