@extends('admin.header')

@section('content')
<!-- /.col (left) -->

<div class="col mt-3">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-7">
                            <h3 class="card-title">Dashboard || <b>Tanggal: {{$date}}</b> </h3>
                        </div>
                        <div class="col">
                            <label for="birthday">Tanggal:</label>
                            <input type="date" id="tglawal">
                            <input type="date" id="tglakhir">
                            <input type="submit" value="Cari" id="carirange">
                            <input type="submit" value="Hari Ini" id="carihariini">
                            <input type="submit" value="Semua" id="carisemua">
                        </div>
                    </div>

                </div>
                <div class="row p-3">

                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$totalSelesai}} Transaksi</h3>
                                <p>Selesai</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$totalMenungguAntar}} Transaksi </h3>
                                <p>Menunggu Pengantaran</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$totalSelesai}} Transaksi</h3>
                                <p>Belum Dibayar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>10 Transaksi</h3>
                                <p>Dekat Jatuh Tempo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Daftar Selesai
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Daftar Menunggu Pengantaran
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable2">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1234123</td>
                                <td>29-10-1999</td>
                                <td>Rp. 110,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Daftar Belum Dibayar
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable3">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Daftar Dekat Jatuh Tempo
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable4">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#carirange").click(function() {

            var tglawal = $('#tglawal').val();
            var tglakhir = $('#tglakhir').val();

            var url = "{{route('test',['tglawal' => 'first' ,'tglakhir'=> 'second' ])}}";
            url = url.replace('first', tglawal);
            url = url.replace('second', tglakhir);
            location.href = url;

        });
        $("#carihariini").click(function() {

            location.href = "{{route('laporanpenjualanindex')}}";
        });
        $("#carisemua").click(function() {
            location.href = "{{route('laporanpenjualansemua')}}";
        });
    });
</script>

@endsection