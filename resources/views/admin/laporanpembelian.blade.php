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
                                <h3>{{$totalBayar}} Transaksi</h3>
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
                    Daftar Transaksi Pembelian
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datatransaksi as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->id}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>Rp. {{$value->total}}</td>
                                <td>{{$value->status}}</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="{{route('invoicepembelian',$value->id)}}">Lihat</a></td>
                            </tr>
                            @endforeach
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
                    Daftar Transaksi Mendekati Jatuh Tempo
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable2">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Countdown</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datatransaksiJatuhTempo as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->id}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>Rp. {{$value->total}}</td>
                                <td>{{$value->hitunghari}}</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="{{route('invoicepembelian',$value->id)}}">Lihat</a></td>
                            </tr>
                            @endforeach
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