@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Barang</h3>
                </div>
                <form method="post" action="{{ route('barangstore') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="barcodebarang">Barcode Barang</label>
                            <input type="number" class="form-control" id="barcodebarang" placeholder="Masukan Barcode Barang" name="barcode" required>
                        </div>
                        <div class="form-group">
                            <label for="namabarang">Nama Barang</label>
                            <input type="text" class="form-control" id="namabarang" placeholder="Masukan Nama Barang" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="hargabarang">Harga Jual Barang</label>
                            <input type="text" class="form-control" id="hargabarang" placeholder="Masukan Harga Barang" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="hargabarang">Harga Beli Barang</label>
                            <input type="text" class="form-control" id="hargabarang" placeholder="Masukan Harga Barang" name="hargabeli" required>
                        </div>
                        <div class="form-group">
                            <label for="stokbarang">Stok Barang</label>
                            <input type="text" class="form-control" id="stokbarang" placeholder="Masukan Stok Barang" name="stok" required>
                        </div>
                        <div class="form-group">
                            <label for="stokbarang">Kategori Barang</label>
                            <select class="form-control" name="kategori_id" required>
                                @foreach($kategori as $key => $value)
                                <option value="{{$value->id}}">{{$value->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Master Barang</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive text-center">
                                <table class="table table-head-fixed text-nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Barcode</th>
                                            <th>Nama</th>
                                            <th> Harga Jual </th>
                                            <th> Harga Beli </th>
                                            <th> Stok </th>
                                            <th> Kategori </th>
                                            <th> Edit </th>
                                            <th> Hapus </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barang as $key => $value)
                                        <tr>
                                            <td>{{$barang->firstItem() + $key }}</td>
                                            <td>{{$value->barcode}}</td>
                                            <td>{{$value->nama}}</td>
                                            <td>Rp. {{number_format($value->hargajual)}}</td>
                                            <td>Rp. {{number_format($value->hargabeli)}}</td>
                                            <td>{{$value->stok}}</td>
                                            <td>{{$value->namakategori}}</td>
                                            <td><a class="btn btn-block btn-success btn-sm" href="{{route('barangedit',$value->id)}}">Edit</a></td>
                                            <td>
                                                <a href="javascript:void(0)" id="hapusbarang" name="hapusbarang" data-id="{{$value->id}}" class="btn btn-block btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>
@endsection