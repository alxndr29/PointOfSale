<?php

namespace App\Http\Controllers;

use App\NotaBeli;
use App\NotaJual;
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

        $tglawa = date('Y-m-d', $tglawaraw);
        $tglakhir = date('Y-m-d', $tglakhirraw);

        $date = $tglawa  . " sampai " . $tglakhir;

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
        return view('admin.invoicepenjualan', compact('data', 'barang'));
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

        return view('admin.invoicepenjualanprintpdf', compact('data', 'barang'));
        
    }

    //PEMBELIAN
    public function laporanpembelianindex()
    {
        $mytime = Carbon\Carbon::now();
        $date = $mytime->toDateString();

        $totalMenungguAntar = NotaBeli::where('status', '=', 'Menunggu Pengantaran')->count();
        $totalSelesai = NotaBeli::where('status', '=', 'Selesai')->count();
        $totalBayar = NotaBeli::where('status', '=', 'Belum Dibayar')->count();
        //DATEDIFF(tabungans.tanggal_akhir,CURDATE())  as dayleft')
        $totalJatuhTempo = DB::table('notabelis')
            ->select(DB::raw('DATEDIFF(notabelis.created_at,CURDATE())  as dayleft'))
            ->get();

        $dataselesai = NotaBeli::where('status','=','Selesai')->get();
        $databelumbayar = NotaBeli::where('status','=','Belum Dibayar')->get();
        $datamenungguantar = NotaBeli::where('status','=','Menunggu Pengantaran')->get();

        return view('admin.laporanpembelian', compact('date','totalMenungguAntar','totalBayar','totalSelesai','totalJatuhTempo'
        ,'dataselesai','databelumbayar','datamenungguantar'));
    }
    public function terimaBarang($id)
    {
        $notaBeli = NotaBeli::find($id);

        if ($notaBeli->tipebayar == "Kredit") {
            /*
            $created_at = Carbon\Carbon::parse($notaBeli->created_at);
            $date = Carbon\Carbon::createFromFormat('Y-m-d', $created_at->format('Y-m-d'));
            */
            $date = Carbon\Carbon::now();
            $jatuhTempo = $date->addDays($notaBeli->jumlahhari);
            $notaBeli->jatuhtempo = $jatuhTempo->toDateString();
            $notaBeli->status = "Belum Dibayar";
            $notaBeli->save();
        }else{
            $notaBeli->status = "Selesai";
            $notaBeli->save();
        }
       

    }
    public function invoicepembelian($id)
    {
        $data = DB::table('notabelis')
        ->join('supliers','supliers.id','=','notabelis.suplier_id')
        ->where('notabelis.id','=',$id)
        ->select('notabelis.*','supliers.*')
        ->first();
        $barang = DB::table('notabelis')
        ->join('notabelidetil','notabelidetil.id_notabeli','=','notabelis.id')
        ->join('barangs','barangs.id','=','notabelidetil.id_barang')
        ->where('notabelis.id',$id)
        ->select('notabelidetil.*','barangs.*')
        ->get();
        //return $barang;
        return view('admin.invoicepembelian',compact('data'));
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
