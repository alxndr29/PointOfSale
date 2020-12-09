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
                    Penjual
                    <address>
                        <strong>Toko Sinjai.</strong><br>
                        Jln. Sultan Hassanudin, Ende<br>
                        Telp: (0381) 21474<br>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Penerima
                    <address>
                        <strong>{{$data->nama_pelanggan}}</strong><br>
                        {{$data->alamat_pelanggan}}<br>
                        Telp: {{$data->telepon_pelanggan}}<br>

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>ID Pembelian:</b> {{$data->idnotajual}}<br>
                    <b>Tanggal:</b> {{$data->tanggal}}<br>
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
                                <th>Harga Modal</th>
                                <th>Sub Total</th>
                                <th>Harga Jual</th>
                                
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->jumlah}}</td>
                                <td>Rp. {{number_format($value->hargamodal/$value->jumlah,2)}}</td>
                                <td>Rp. {{number_format($value->hargamodal,2)}}</td>
                                <td>Rp. {{number_format($value->harga/$value->jumlah,2)}}</td>
                                <td>Rp. {{number_format($value->harga,2)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td>Rp. {{number_format($data->totalmodal)}}</td>
                                
                                <td>Total:</td>
                                <td>Rp. {{number_format($data->totaljual,2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>


            <!-- this row will not appear when printing -->
            <div class="row">
                <div class="col-xs-12">
                  Total Pembayaran: Rp. {{number_format($data->totaljual,2)}}
                  <br>
                  Total Modal: Rp. {{number_format($data->totalmodal,2)}}
                  <br>
                  Total Keuntungan: Rp. {{number_format($data->totaljual - $data->totalmodal,2)}}
                  <br>
                  <br>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-xs-12">
                    <a type="button" href="{{route('laporanpenjualanindex')}}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Kembali
                    </a>
                    <a type="button" href="{{route('laporanpenjualaninvoicepdf',$data->idnotajual)}}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Buat PDF
                    </a>
                    <button type="button" class="btn btn-danger pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Batalkan Transaksi
                    </button>
                </div>
            </div>
        </div>

        <div class="card-footer">

        </div>
    </div>
    <!-- title row -->

</div>


@endsection