@extends('admin.header')

@section('content')

<div class="col mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Transaksi</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Toko Sinjai.
                        <small class="pull-right">Tanggal: 2/10/2014</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Penerima
                    <address>
                        <strong>Toko Sinjai.</strong><br>
                        Jln. Sultan Hassanudin, Ende<br>
                        Telp: (0381) 21474<br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Penjual
                    <address>
                        <strong>{{$data->nama}}</strong><br>
                        {{$data->alamat}}<br>
                        Telp: {{$data->telepon}}<br>

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>ID Pembelian:</b> {{$data->id}}<br>
                    <b>Tanggal:</b> {{$data->created_at}}<br>
                    <b>Lama Kredit:</b> {{$data->jumlahhari}}<br>
                    <b>Jatuh Tempo:</b> {{$data->jatuhtempo}}<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $key => $value)
                            <tr>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>


            <!-- this row will not appear when printing -->
            <div class="row">
                <div class="col-xs-12">

                </div>
            </div>
            <div class="row no-print">
                <div class="col-xs-12">

                </div>
            </div>
        </div>

        <div class="card-footer">

        </div>
    </div>
    <!-- title row -->

</div>


@endsection