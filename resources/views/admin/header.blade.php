<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('templateadmin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('templateadmin/plugins/toastr/toastr.min.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">



    <script src="{{asset('templateadmin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('templateadmin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('templateadmin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('templateadmin/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('templateadmin/plugins/sparklines/sparkline.js')}}"></script>

    <!-- JQVMap -->
    <script src="{{asset('templateadmin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('templateadmin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('templateadmin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('templateadmin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('templateadmin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('templateadmin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('templateadmin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('templateadmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('templateadmin/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('templateadmin/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('templateadmin/dist/js/pages/dashboard.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
           
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{asset('templateadmin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Toko Sinjai</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('templateadmin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->name}}</a>
                        
                        <a class="d-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>

                <!-- SidebarSearch Form -->

                <!-- 
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('kategoriindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('barangindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('suplierindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Supplier</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pegawaiindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pelangganindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pelanggan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('laporanpenjualanindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaksi Penjualan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('laporanpembelianindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaksi Pembelian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('laporanproduk')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Produk</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Kasir
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('penjualanindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penjualan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('pembelianindex')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembelian</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="col mt-3">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-pre
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

</body>

<script type="text/javascript">
    @if(session('status'))
    alert('{{session('status')}}');
    @endif

    function clockUpdate() {
        var date = new Date();
        $('.digital-clock').css({
            'color': '#fff',
            'text-shadow': '0 0 6px #ff0'
        });

        function addZero(x) {
            if (x < 10) {
                return x = '0' + x;
            } else {
                return x;
            }
        }

        function twelveHour(x) {
            if (x > 12) {
                return x = x - 12;
            } else if (x == 0) {
                return x = 12;
            } else {
                return x;
            }
        }

        var datenow = date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate();

        var h = addZero(twelveHour(date.getHours()));
        var m = addZero(date.getMinutes());
        var s = addZero(date.getSeconds());
        $('#digital-clock').text(datenow + ':' + h + ':' + m + ':' + s);
    }
    $(document).ready(function() {
        clockUpdate();
        setInterval(clockUpdate, 1000);


        $('#myTable').DataTable({
            pageLength : 5
        });
        $('#myTable2').DataTable({
            pageLength : 5
        });
        $('#myTable3').DataTable({
            pageLength : 5
        });
        $('#myTable4').DataTable({
            pageLength : 5
        });

        $("body").on("click", "#hapuskategori", function(e) {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content');

            if (confirm('Apa anda yakin ingin menghapus?')) {
                $.ajax({
                    url: "{{url('kategori/delete')}}/" + id, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        alert(response.status);
                        location.reload();
                    }
                });

            } else {


            }
        });
        $("body").on("click", "#hapusbarang", function(e) {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            //alert(token);

            if (confirm('Apa anda yakin ingin menghapus?')) {
                $.ajax({
                    url: "{{url('barang/delete')}}/" + id, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        alert(response.status);
                        location.reload();
                    }
                });

            } else {


            }
        });
        $("body").on("click", "#hapussuplier", function(e) {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Apa anda yakin ingin menghapus?')) {
                $.ajax({
                    url: "{{url('suplier/delete')}}/" + id, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        alert(response.status);
                        location.reload();
                    }
                });

            } else {


            }
        });
        $("body").on("click", "#hapuspelanggan", function(e) {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content');

            if (confirm('Apa anda yakin ingin menghapus?')) {
                $.ajax({
                    url: "{{url('pelanggan/delete')}}/" + id, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        alert(response.status);
                        location.reload();
                    }
                });

            } else {


            }
        });
        $("body").on("click", "#hapuspenjualan", function(e) {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content');

            if (confirm('Apa anda yakin ingin menghapus?')) {
                
                $.ajax({
                    url: "{{url('penjualan/delete')}}/" + id, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        alert(response.status);
                        location.href = "{{route('laporanpenjualanindex')}}";   
                    }
                });
                

            } else {
               
            }
        });
        $("body").on("click", "#hapuspembelian", function(e) {
            var id = $(this).attr('data-id');
            var token = $('meta[name="csrf-token"]').attr('content');

            if (confirm('Apa anda yakin ingin menghapus?')) {
                
                $.ajax({
                    url: "{{url('pembelian/delete')}}/" + id, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function(response) {
                        alert(response.status);
                        location.href = "{{route('laporanpembelianindex')}}";   
                    }
                });
                

            } else {
               
            }
        });
    });
</script>

</html>