@extends('admin.header')

@section('content')
<!-- /.col (left) -->

<div class="col mt-3">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Dashboard || Tanggal: 08/12/2020</h3>
                        </div>
                        <div class="col">
                            <label for="birthday">Tanggal:</label>
                            <input type="date" id="birthday" name="birthday">
                            <input type="date" id="birthday" name="birthday">
                            <input type="submit" value="Cari">
                        </div>
                    </div>

                </div>
                <div class="row p-3">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>Rp. 1,000,000</h3>
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
                                <h3>Rp. 250,000</h3>
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
                                <h3>22 Transaksi</h3>
                                <p>Pada Hari Ini</p>
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
                    Daftar Penjualan Pada 22/12/2020
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
                                <td>291019992</td>
                                <td>22 November 2020</td>
                                <td>Rp. 1,250,000</td>
                                <td><a class="btn btn-block btn-success btn-sm" href="#">Lihat</a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>291019992</td>
                                <td>22 November 2020</td>
                                <td>Rp. 1,250,000</td>
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
                            <tr>
                                <td>1</td>
                                <td>291019992</td>
                                <td>Coca Cola</td>
                                <td>22 Produk</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>321312312</td>
                                <td>Aqua Cup</td>
                                <td>21 Produk</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection