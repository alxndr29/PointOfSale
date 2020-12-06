@extends('admin.header')

@section('content')
<!-- /.col (left) -->
<div class="col mt-3">
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pegawai</h3>
                </div>
                <form method="post" action="{{ route('barangstore') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="barcodebarang">Email Pegawai</label>
                            <input type="number" class="form-control" id="barcodebarang" placeholder="Masukan Barcode Barang" name="barcode" required>
                        </div>
                        <div class="form-group">
                            <label for="namabarang">Nama Pegawai</label>
                            <input type="text" class="form-control" id="namabarang" placeholder="Masukan Nama Barang" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="hargabarang">Password Sementara/label>
                            <input type="text" class="form-control" id="hargabarang" placeholder="Masukan Harga Barang" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="stokbarang">Hak Akses Pegawai</label>
                            <select class="form-control" name="kategori_id" required>
                              
                                <option value="">AAA</option>
                               
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
                    <h3 class="card-title">Master Pegawai</h3>
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