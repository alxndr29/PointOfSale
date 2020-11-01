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
                                <label for="barcode">Jumlah</label>
                                <input type="text" class="form-control" id="d" placeholder="Jumlah" name="barcode">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="barcode">Nama</label>
                                <input type="text" class="form-control" id="da" placeholder="Nama" name="barcode">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="barcode">Harga</label>
                                <input type="text" class="form-control" id="dad" placeholder="Harga" name="barcode">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-3 text-left">
                    <h1 class="p-3"> Rp. 69.000.00 </h1>
                </div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Penjualan</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0" style="height: 400px;">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>219</td>
                                    <td>Alexander Pierce</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-warning">Pending</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>657</td>
                                    <td>Bob Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-primary">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>

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
                    <h3 class="card-title">Daftar Penjualan</h3>
                </div>
                <div class="card-body">

                    <button type="button" class="btn btn-block btn-default btn-lg">Bayar</button>
                    <button type="button" class="btn btn-block btn-default btn-lg">Transaksi Baru</button>
                    <button type="button" class="btn btn-block btn-default btn-lg">Cari Produk</button>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>


</div>
<script type="text/javascript">
    var result = [];
   
    $(document).ready(function() {
        $("#barcode").keyup(function(){
            var input = this.value;
            loadData(input);
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
    });
    function loadData(id){
        for(i=0; i<result.length; i++){
            if(result[i].barcode === id){
                alert('nemu');
            }
        }
    }
   
</script>
@endsection