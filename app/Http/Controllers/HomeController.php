<?php

namespace App\Http\Controllers;
use DB;
use PDF;
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

        $datajual = DB::table('notajuals')->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
        ->select('notajuals.id as idtransaksi', 'notajuals.tanggal as tanggal', DB::raw('SUM(notajualdetil.harga) as totaljual'), DB::raw('SUM(notajualdetil.hargamodal) as totalmodal'))
        ->groupBy('notajuals.id')
        ->orderBy('notajuals.id', 'desc')
        ->limit(5)
        ->get();

        //return $datajual;
        return view('home',compact('date','jumlahjual','datajual'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
