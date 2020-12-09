<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="col">
        <div class="card card-primary">
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        Penjual
                        <address>
                            <strong>Toko Sinjai.</strong><br>
                            Jln. Sultan Hassanudin, Ende<br>
                            Telp: (0381) 21474<br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col">
                        Penerima
                        <address>
                            <strong>{{$data->nama_pelanggan}}</strong><br>
                            {{$data->alamat_pelanggan}}<br>
                            Telp: {{$data->telepon_pelanggan}}<br>
                        </address>
                    </div>
                    <div class="col">
                       
                            <b>ID Pembelian:</b> {{$data->idnotajual}}<br>
                            <b>Tanggal:</b> {{$data->tanggal}}<br>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td>Rp. {{number_format($value->harga,2)}}</td>
                                    <td>{{$value->jumlah}}</td>
                                    <td>Rp. {{number_format($value->harga*$value->jumlah,2)}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                    <td>Rp. {{number_format(1000000,2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
        <!-- title row -->
    </div>
</body>

</html>