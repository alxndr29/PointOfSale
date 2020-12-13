<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // PENJUALAN PRINT SEHABIS TRANSAKSI
    public function index()
    {
        $id = DB::table('notajuals')->max('id');

        $data = DB::table('notajuals')
            ->join('users', 'users.id', '=', 'notajuals.user_id')
            ->join('pelanggans', 'pelanggans.id', '=', 'notajuals.pelanggan_id')
            ->where('notajuals.id', '=', $id)
            ->select('notajuals.created_at as tanggal', 'users.name as nama_pegawai', 'pelanggans.nama as nama_pelanggan', 'notajuals.id as idnotajual')
            ->first();
        $barang = DB::table('notajuals')
            ->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->where('notajuals.id', '=', $id)
            ->select('notajualdetil.jumlah as jumlah', 'barangs.nama as nama', 'notajualdetil.harga as harga')
            ->get();

        //return view('admin.kwitansi', compact('data', 'barang'));
        $pdf = PDF::loadView('admin.kwitansi', ['data' => $data, 'barang' => $barang]);
        $name = "kwitansipenjualan" . $id . ".pdf";
        return $pdf->download($name);
    }

    // PENJUALAN
    public function laporanpenjualanindex()
    {
        $mytime = Carbon\Carbon::now();
        $date = $mytime->toDateString();

        $jumlahjual = DB::table('notajuals')->where(DB::raw('DATE(notajuals.tanggal)'), '=', $date)->count();

        $totalPenjualan = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select(DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->where(DB::raw('DATE(notajuals.tanggal)'), '=', $date)
            ->first();

        $datajual = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select('notajuals.id as idtransaksi', 'notajuals.tanggal as tanggal', DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->groupBy('notajuals.id')
            ->orderBy('notajuals.id', 'desc')
            ->where(DB::raw('DATE(notajuals.tanggal)'), '=', $date)
            ->get();

        $databarang = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->select('barangs.nama as namabarang', 'barangs.barcode as barcodebarang', DB::raw('SUM(notajualdetil.jumlah) as totalpenjualan'))
            ->groupBy('barangs.id')
            ->orderBy('totalpenjualan', 'desc')
            ->where(DB::raw('DATE(notajuals.tanggal)'), '=', $date)
            ->get();

        //return $databarang;
        return view('admin.laporanpenjualan', compact('datajual', 'date', 'jumlahjual', 'totalPenjualan', 'databarang'));
    }
    public function laporanpenjualanindexrange($tglawa, $tglakhir)
    {
        $mytime = Carbon\Carbon::now();
        $date = $tglawa . " sampai " . $tglakhir;

        $jumlahjual = DB::table('notajuals')->where(DB::raw('DATE(notajuals.tanggal)'), '=', $date)->count();

        $totalPenjualan = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select(DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->whereBetween(DB::raw('DATE(notajuals.tanggal)'), [$tglawa, $tglakhir])
            ->first();

        $datajual = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select('notajuals.id as idtransaksi', 'notajuals.tanggal as tanggal', DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->groupBy('notajuals.id')
            ->orderBy('notajuals.id', 'desc')
            ->whereBetween(DB::raw('DATE(notajuals.tanggal)'), [$tglawa, $tglakhir])
            ->get();

        $databarang = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->select('barangs.nama as namabarang', 'barangs.barcode as barcodebarang', DB::raw('SUM(notajualdetil.jumlah) as totalpenjualan'))
            ->groupBy('barangs.id')
            ->orderBy('totalpenjualan', 'desc')
            ->whereBetween(DB::raw('DATE(notajuals.tanggal)'), [$tglawa, $tglakhir])
            ->get();

        //return $databarang;
        return view('admin.laporanpenjualan', compact('datajual', 'date', 'jumlahjual', 'totalPenjualan', 'databarang'));
    }
    public function laporanpenjualansemua()
    {
        
        $tglawaraw = strtotime(DB::table('notajuals')->min('tanggal'));
        $tglakhirraw = strtotime(DB::table('notajuals')->max('tanggal'));
       
        $tglawa = date('Y-m-d',$tglawaraw);
        $tglakhir = date('Y-m-d',$tglakhirraw);

        $date = $tglawa  . " sampai " . $tglakhir ;

        $jumlahjual = DB::table('notajuals')->count();

        $totalPenjualan = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select(DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->first();

        $datajual = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select('notajuals.id as idtransaksi', 'notajuals.tanggal as tanggal', DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->groupBy('notajuals.id')
            ->orderBy('notajuals.id', 'desc')
            ->get();

        $databarang = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->select('barangs.nama as namabarang', 'barangs.barcode as barcodebarang', DB::raw('SUM(notajualdetil.jumlah) as totalpenjualan'))
            ->groupBy('barangs.id')
            ->orderBy('totalpenjualan', 'desc')
            ->get();

        return view('admin.laporanpenjualan', compact('datajual', 'date', 'jumlahjual', 'totalPenjualan', 'databarang'));
        
    }
    // PENJUALAN
    public function invoice($id)
    {

        $data = DB::table('notajuals')
            ->join('users', 'users.id', '=', 'notajuals.user_id')
            ->join('pelanggans', 'pelanggans.id', '=', 'notajuals.pelanggan_id')
            ->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->where('notajuals.id', '=', $id)
            ->groupBy('notajuals.id')
            ->select(DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'), 'notajuals.created_at as tanggal', 'users.name as nama_pegawai', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat as alamat_pelanggan', 'pelanggans.telepon as telepon_pelanggan', 'notajuals.id as idnotajual')
            ->first();
        $barang = DB::table('notajuals')
            ->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->where('notajuals.id', '=', $id)
            ->select('notajualdetil.jumlah as jumlah', 'barangs.nama as nama', 'notajualdetil.harga as harga', 'notajualdetil.hargamodal as hargamodal')
            ->get();
        //return view('admin.laporanpenjualan',compact('data','barang'));
        return view('admin.invoice', compact('data', 'barang'));
    }
    // PENJUALAN
    public function invoicepdf($id)
    {
        $data = DB::table('notajuals')
            ->join('users', 'users.id', '=', 'notajuals.user_id')
            ->join('pelanggans', 'pelanggans.id', '=', 'notajuals.pelanggan_id')
            ->where('notajuals.id', '=', $id)
            ->select('notajuals.created_at as tanggal', 'users.name as nama_pegawai', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat as alamat_pelanggan', 'pelanggans.telepon as telepon_pelanggan', 'notajuals.id as idnotajual')
            ->first();
        $barang = DB::table('notajuals')
            ->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->where('notajuals.id', '=', $id)
            ->select('notajualdetil.jumlah as jumlah', 'barangs.nama as nama', 'notajualdetil.harga as harga')
            ->get();

        return view('admin.invoiceprintpdf', compact('data', 'barang'));
        /*
        $pdf = PDF::loadView('admin.invoiceprintpdf', ['data' => $data, 'barang' => $barang])->setPaper('a4', 'landscape');;
        $name = "kwitansipenjualan" . $id . ".pdf";
        return $pdf->download($name);
        */
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
