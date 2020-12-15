@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">Pembelian</h3>
                </div>
                <div class="col">
                    <h3 class="card-title" id="digital-clock">Tanggal: {{ date('Y-m-d H:i:s') }}</h3>
                </div>
                <div class="col">
                    <h3 class="card-title" id="digital-clock">Pegawai: Alexander Evan</h3>
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
                    <h1 class="p-3" id="jumlahtotal"> Rp. 0 </h1>
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
                        <label>Pilih Suplier</label>
                        <select class="form-control" id="idsuplier">
                            @foreach($suplier as $key => $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Jenis Transaksi</label>
                        <select class="form-control" id="jenispembayaran">
                            <option value="Cash" selected>Cash</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jatuhtempo" placeholder="Hari Jatuh Tempo">
                    </div>

                    <button type="button" class="btn btn-block btn-default btn-lg" data-toggle="modal" data-target="#modalbayar">Proses</button>
                    <button type="button" class="btn btn-block btn-default btn-lg" id="transaksibaru">Transaksi Baru</button>
                    <button type="button" class="btn btn-block btn-default btn-lg" data-toggle="modal" data-target="#exampleModalCenter">Cari Produk</button>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <!-- Modal Pembayaran -->
        <div class="modal fade" id="modalbayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h3 class="modal-title w-100" id="totalmodal"> Total Pembayaran: Rp. 160,000</h3>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-block btn-default btn-lg" id="bayar">Proses</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Pencarian Produk-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barcode">Hasil Pencarian</label>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody id="list-datasearch" name="list-datasearch">
                                    @foreach($barang as $key => $value)
                                    <tr>
                                        <td>{{$value->nama}}</td>
                                        <td>{{$value->hargabeli}}</td>
                                        <td> <a href="javascript:void(0)" id="searchproduk" name="searchproduk" data-id="{{$value->barcode}}" class="btn btn-block btn-success btn-sm">Pilih</a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<script type="text/javascript">
    $(document).ready(function() {

        transaksiBaru();

        var result = [];
        var data = [];
        var counter = 0;
        var total = 0;

        $("#jenispembayaran").change(function() {
            var data = $("#jenispembayaran").val();

            if (data == "Cash") {
                $('#jatuhtempo').val(0);
                $("#jatuhtempo").prop("disabled", true);
            } else {
                $("#jatuhtempo").prop("disabled", false);
            }
        });

        $("body").on("click", "#hapuslist", function(e) {
            var id = $(this).attr('data-id');
            for (i = data.length - 1; i >= 0; i--) {
                if (id == data[i].barcode) {
                    data.splice(i, 1);
                    console.table(data);
                    loadData();
                    break;
                }
            }
        });
        $("body").on("change", "#inputqty", function(e) {
            var id = $(this).attr('data-id');
            var val = $(this).val()
            updateQty(id, val);
            loadData();
        });
        $("body").on("change", "#inputharga", function(e) {
            var id = $(this).attr('data-id');
            var val = $(this).val()
            updateHarga(id, val);
            loadData();
        });
        $("body").on("click", "#searchproduk", function(e) {
            var id = $(this).attr('data-id');
            cariData(id);
            $('#exampleModalCenter').modal('hide');
        });
        $("#barcode").keyup(function() {
            var input = this.value;
            if (input.length >= 3) {
                cariData(input);
            }
        });
        $("#transaksibaru").click(function() {
            location.reload();
        });
        $("#bayar").click(function() {
            insertTransaksi();
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
                    result[i].hargajual = dt.hargajual;
                    result[i].hargabeli = dt.hargabeli;
                    result[i].stok = dt.stok;
                    result[i].qty = 0;
                    i++;
                });
            }
        });

        var double = false;
        var indexDouble = 0;

        function cariData(id) {
            console.table(data);
            for (j = 0; j < data.length; j++) {
                if (data[j].barcode == id) {
                    double = true;
                    indexDouble = j;
                    $("#barcode").val("");
                    $("#namaproduk").val(data[j].nama);
                    $("#hargaproduk").val(data[j].hargabeli);
                }
            }
            if (double == false) {
                for (i = 0; i < result.length; i++) {
                    if (id == result[i].barcode) {
                        data[counter] = {};
                        data[counter].id = result[i].id;
                        data[counter].barcode = result[i].barcode;
                        data[counter].nama = result[i].nama;
                        data[counter].hargajual = result[i].hargajual;
                        data[counter].hargabeli = result[i].hargabeli;
                        data[counter].stok = result[i].stok;
                        data[counter].qty = 1;
                        counter++;
                        $("#barcode").val("");
                        $("#namaproduk").val(result[i].nama);
                        $("#hargaproduk").val(result[i].hargabeli);
                        break;
                    }
                }
            } else {
                data[indexDouble].qty++;
                double = false;
            }
            loadData();
        }

        function updateQty(id, qty) {

            for (i = 0; i < data.length; i++) {
                if (id == data[i].barcode) {
                    if (qty > data[i].stok) {
                        alert("Qty melebihi Stok. Sisa stok adalah: " + data[i].stok)
                    } else {
                        data[i].qty = qty;
                    }

                }
            }
        }

        function updateHarga(id, harga) {
            for (i = 0; i < data.length; i++) {
                if (id == data[i].barcode) {
                    data[i].hargabeli = harga;
                }
            }
        }


        function loadData() {

            data = data.filter(Boolean);
            total = 0;

            $("#list-data").empty();
            for (i = 0; i < data.length; i++) {
                total += (data[i].hargabeli * data[i].qty);
                $("#list-data").append('<tr> <td>' + data[i].barcode + '</td> <td>' + data[i].nama + '</td> <td> Rp. ' +
                    '<input type="number" id="inputharga" val="' + data[i].hargabeli + '" data-id="' + data[i].barcode + '" value="' + data[i].hargabeli + '">' + '</td><td>' + '<input type="number" id="inputqty" val="' + data[i].qty + '" data-id="' + data[i].barcode + '" value="' + data[i].qty + '">' +
                    '</td><td> Rp. ' + addCommas(data[i].hargabeli * data[i].qty) +
                    '</td><td><button name="hapuslist" id="hapuslist" data-id="' + data[i].barcode +
                    '" class="btn"><i class="fa fa-trash"></i></button></td> </tr>');
            }

            $("#jumlahtotal").text("Rp. " + addCommas(total));
            $("#totalmodal").text("Rp. " + addCommas(total));
        }

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        function insertTransaksi() {
            var jenispembayaran = $('#jenispembayaran').val();
            var suplier = $('#idsuplier').val();
            var jatuhtempo = $('#jatuhtempo').val();

            if (data.length != 0) {
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('pembelianstore') }}",
                    type: 'POST',
                    data: {
                        _token: token,
                        id: data,
                        jenispembayaran: jenispembayaran,
                        suplier: suplier,
                        jatuhtempo: jatuhtempo
                    },
                    success: function(response) {
                        /*
                        if (response.success == "berhasil") {
                            alert("Hello World!");
                        }
                        */
                       alert(response.success);
                        console.table(response);
                    }
                });
            } else {
                alert("Belum ada data");
            }
        }

        function transaksiBaru() {
            $("#barcode").val("");
            $("#namaproduk").val("");
            $("#hargaproduk").val("");
            $("#jatuhtempo").prop("disabled", true);
        }
    });
</script>
@endsection