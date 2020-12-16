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
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>Rp. {{number_format($totalPenjualan->totaljual,2)}}</h3>
                                <p>Total Penjualan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>Rp. {{number_format($totalPenjualan->totaljual - $totalPenjualan->totalmodal,2) }}</h3>
                                <p>Total Keuntungan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$jumlahjual}} Transaksi</h3>
                                <p>Penjualan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
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
                    Daftar Penjualan
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
                            @foreach($datajual as $key => $value)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$value->idtransaksi}}</td>
                                <td>{{$value->tanggal}}</td>
                                <td>Rp. {{number_format($value->totaljual,2)}}</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="{{route('laporanpenjualaninvoice',$value->idtransaksi)}}">Lihat</a></td>
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
                    Total Penjualan Per Produk
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable2">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($databarang as $key => $value)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$value->barcodebarang}}</td>
                                <td>{{$value->namabarang}}</td>
                                <td>{{$value->totalpenjualan}}</td>
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
            
            var url = "{{route('penjualanrange',['tglawal' => 'first' ,'tglakhir'=> 'second' ])}}";
            url = url.replace('first',tglawal);
            url = url.replace('second',tglakhir);
            location.href = url;
            
        });
        $("#carihariini").click(function() {
          
            location.href = "{{route('laporanpenjualanindex')}}";
        });
        $("#carisemua").click(function(){
            location.href = "{{route('laporanpenjualansemua')}}";
        });
    });
</script>

@endsection