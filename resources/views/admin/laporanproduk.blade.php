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

                    </div>

                </div>
                <div class="row p-3">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{count($data)}} Produk</h3>
                                <p>Total Keseluruhan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                   
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$jumlahStokDibawah}} Produk</h3>
                                <p>Dengan Stok Dibawah 10 Pcs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$jumlahKategori}} Jenis</h3>
                                <p>Total Kategori</p>
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
                    Daftar Produk
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Kategori</th>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Stok(Pcs)</th>
                                <th>Stok(Karton)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{$key + 1}}</td>

                                <td>{{$value->namakategori}}</td>
                                <td>{{$value->barcode}}</td>
                                <td>{{$value->nama}}</td>
                                @if($value->stok <= 10)
                                    <td><b>{{$value->stok}}</b></td>
                                @else
                                    <td>{{$value->stok}}</td>
                                @endif
                                <td>OnGoing</td>
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

</script>

@endsection