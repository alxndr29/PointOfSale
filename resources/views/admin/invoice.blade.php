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
                        <strong>Gusti Bagus</strong><br>
                        Rungkut Mejoyo Selatan V No. 3<br>
                        Telp: 081312312391<br>
                        
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>ID Pembelian:</b> 4F3S8J<br>
                    <b>Tanggal:</b> 2/22/2014<br>
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
                                <th>Qty</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>Rp. 22,000</td>
                                <td>1</td>
                                <td>Rp. 22,000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>Rp. 22,000</td>
                                <td>1</td>
                                <td>Rp. 22,000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Call of Duty</td>
                                <td>Rp. 22,000</td>
                                <td>1</td>
                                <td>Rp. 22,000</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td>Rp. 22,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            
    
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">

                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Kembali
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Buat PDF
                    </button>
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