@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">Penjualan</h3>
                </div>
                <div class="col">
                    <h3 class="card-title" id="digital-clock">Tanggal: {{ date('Y-m-d H:i:s') }}</h3>
                </div>
                <div class="col">
                    <h3 class="card-title">Nomor Nota: {{ date('Y-m-d H:i:s')}}</h3>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" class="form-control" id="barcode" placeholder="Scan Barcode" name="barcode">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="barcode">Nama</label>
                                <input type="text" class="form-control" id="namaproduk" placeholder="Nama" name="barcode" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="barcode">Harga</label>
                                <input type="text" class="form-control" id="hargaproduk" placeholder="Harga" name="barcode" disabled>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-3 text-left">
                    <h1 class="p-3" id="jumlahtotal"> Rp. 69.000.00 </h1>
                </div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>

    <div class="row">
        <div class="col-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Penjualan</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0" style="height: 400px;">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                    <th>Opt</th>
                                </tr>
                            </thead>
                            <tbody id="list-data" name="list-data">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Menu Lain</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Pelanggan</label>
                        <select class="form-control">
                            @foreach($pelanggan as $key => $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-block btn-default btn-lg">Bayar</button>
                    <button type="button" class="btn btn-block btn-default btn-lg">Transaksi Baru</button>
                    <button type="button" class="btn btn-block btn-default btn-lg" data-toggle="modal" data-target="#exampleModalCenter">Cari Produk</button>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barcode">Nama Produk</label>
                            <input type="text" class="form-control" id="barcode" placeholder="Masukan Nama Produk" name="barcode">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<script type="text/javascript">
    $(document).ready(function() {
        var result = [];
        var data = [];
        var counter = 0;
        $("body").on("click", "#hapuslist", function(e) {
            var id = $(this).attr('data-id');

        });
        $("#barcode").keyup(function() {
            var input = this.value;
            if (input.length >= 3) {
                cariData(input);
            }
        });
        $.ajax({
            url: "{{url('penjualan/barang')}}",
            method: "GET",
            contentType: false,
            dataType: "json",
            success: function(data) {
                var i = 0;
                data.forEach(function(dt) {
                    result[i] = {};
                    result[i].id = dt.id;
                    result[i].barcode = dt.barcode;
                    result[i].nama = dt.nama;
                    result[i].harga = dt.harga;
                    result[i].stok = dt.stok;
                    result[i].qty = 0;
                    i++;
                });

            }
        });

        var double = false;
        var indexDouble = 0;
        function cariData(id) {
            for (j = 0; j < data.length; j++) {
                if (data[j].barcode == id) {
                    double = true;
                    indexDouble = j;
                    $("#barcode").val("");
                }
            }
            if (double == false) {
                for (i = 0; i < result.length; i++) {
                    if (id == result[i].barcode) {
                        data[counter] = {};
                        data[counter].id = result[i].id;
                        data[counter].barcode = result[i].barcode;
                        data[counter].nama = result[i].nama;
                        data[counter].harga = result[i].harga;
                        data[counter].stok = result[i].stok;
                        data[counter].qty = 1;
                        counter++;
                        $("#barcode").val("");
                        break;
                    }
                }
            }else{
                data[indexDouble].qty++;
                double = false;
            }

            loadData();

        }

        function hapusData(id) {

        }

        function loadData() {
            /*
            console.log("hello world!");
            */
            
            console.log(data);
            
            $("#list-data").empty();
            for (i = 0; i < data.length; i++) {
                $("#list-data").append('<tr> <td>' + data[i].barcode + '</td> <td>' + data[i].nama + '</td> <td> Rp. ' + data[i].harga + '</td><td>' + '<input type="number" value="' + data[i].qty + '">' + '</td><td> Rp. ' + data[i].harga*data[i].qty + '</td><td><button name="hapuslist" id="hapuslist" data-id="' + data[i].barcode + '" class="btn"><i class="fa fa-trash"></i></button></td> </tr>');
            }
        }

        function transaksiBaru() {

        }
    });
</script>
@endsection