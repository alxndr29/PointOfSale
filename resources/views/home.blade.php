@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Dashboard || Tanggal: {{$date}}</h3>
                </div>
                <div class="row p-3">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$jumlahjual}} Transaksi</h3>
                                <p>Pembelian Hari Ini</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('laporanpenjualanindex')}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$totalBayar}} Transaksi</h3>
                                <p>Tagihan Belum Terbayarkan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>2 Transaksi</h3>
                                <p>Mendekati Jatuh Tempo</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{$jumlahStokHabis}} Produk</h3>
                                <p>Dengan Stok Dibawah 10</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-notifications"></i>
                            </div>
                            <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Transaksi Penjualan Terakhir</h3>
            </div>
           
            <div class="card-body">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
            
            <div class="card-footer">
                <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    -->
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Transaksi Penjualan Terakhir</h3>
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap">
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
                            @foreach($datajual as $key => $value)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$value->idtransaksi}}</td>
                                <td>{{$value->tanggal}}</td>
                                <td>Rp. {{number_format($value->totaljual,2)}}</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="{{route('laporanpenjualaninvoice',$value->idtransaksi)}}">Lihat</a></td>
                            <tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{route('laporanpenjualansemua')}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Transaksi Pembelian Terakhir</h3>
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>ID Transaksi</th>
                                <th>Waktu Transaksi</th>
                                <th>Total Transaksi</th>
                                <th> Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($databeli as $key => $value)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$value->idtransaksi}}</td>
                                <td>{{$value->tanggal}}</td>
                                <td>Rp. {{number_format($value->totalbeli,2)}}</td>
                                <td>{{$value->status}}</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="{{route('invoicepembelian',$value->idtransaksi)}}">Lihat</a></td>
                            <tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{route('laporanpenjualansemua')}}" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection