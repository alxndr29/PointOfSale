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
                    <h3 class="card-title" id="digital-clock" >Tanggal: {{ date('Y-m-d H:i:s') }}</h3>
                </div>
                <div class="col">
                    <h3 class="card-title">Nomor Nota: {{ date('Y-m-d H:i:s')}}</h3>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text" class="form-control" id="barcode" placeholder="Scan Barcode" name="barcode">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Nama</label>
                        <input type="text" class="form-control" id="barcode" placeholder="Scan Barcode" name="barcode">
                    </div>
                </div>

                <div class="col">
                    <h1> Rp. 69.000.00
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
                    <h3 class="card-title">Masuk Penjualan</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Reason</th>
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>


</div>

@endsection