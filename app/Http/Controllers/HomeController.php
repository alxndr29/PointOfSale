<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Barang;
use App\NotaBeli;
use Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mytime = Carbon\Carbon::now();
        $date = $mytime->toDateString();

        $jumlahjual = DB::table('notajuals')->where(DB::raw('DATE(notajuals.tanggal)'), '=', $date)->count();
        $jumlahStokHabis = Barang::where('stok', '<=', 10)->count();
        $totalBayar = NotaBeli::where('status', '=', 'Belum Dibayar')->count();

        $datajual = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->select('notajuals.id as idtransaksi', DB::raw('DATE(notajuals.tanggal) as tanggal'), DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
            ->groupBy('notajuals.id')
            ->orderBy('notajuals.id', 'desc')
            ->limit(5)
            ->get();

        $databeli = DB::table('notabelis')
            ->join('notabelidetil', 'notabelidetil.id_notabeli', '=', 'notabelis.id')
            ->select('notabelis.id as idtransaksi', 'notabelis.status as status', DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(notabelidetil.harga) as totalbeli'))
            ->groupBy('notabelis.id')
            ->orderBy('notabelis.id', 'desc')
            ->limit(5)
            ->get();

        $datatransaksiJatuhTempo = DB::table('notabelis')->join('notabelidetil', 'notabelidetil.id_notabeli', '=', 'notabelis.id')
            ->select('notabelis.*', DB::raw('DATEDIFF(notabelis.jatuhtempo,CURDATE()) as hitunghari'), DB::raw('DATE(notabelis.created_at) as created_at'), DB::raw('SUM(notabelidetil.harga) as total'))
            ->groupBy('notabelis.id')
            ->where('notabelis.tipebayar', '=', 'Kredit')
            ->where('notabelis.status', '=', 'Belum Dibayar')
            ->get();

        $totalJatuhTempo = 0;
        foreach ($datatransaksiJatuhTempo as $key => $value) {
            if ($value->hitunghari <= 3) {
                $totalJatuhTempo++;
            }
        }

        return view('home', compact('date', 'jumlahjual', 'datajual', 'databeli', 'jumlahStokHabis', 'totalBayar','totalJatuhTempo'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
