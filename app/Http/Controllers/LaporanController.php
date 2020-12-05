<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $id = DB::table('notajuals')->max('id');
        
        $data = DB::table('notajuals')
            ->join('users', 'users.id', '=', 'notajuals.user_id')
            ->join('pelanggans', 'pelanggans.id', '=', 'notajuals.pelanggan_id')
            ->where('notajuals.id', '=', $id)
            ->select('notajuals.created_at as tanggal', 'users.name as nama_pegawai', 'pelanggans.nama as nama_pelanggan','notajuals.id as idnotajual')
            ->first();
        $barang = DB::table('notajuals')
            ->join('notajualdetil', 'notajualdetil.notajual_id', '=', 'notajuals.id')
            ->join('barangs', 'notajualdetil.barang_id', '=', 'barangs.id')
            ->where('notajuals.id', '=', $id)
            ->select('notajualdetil.jumlah as jumlah', 'barangs.nama as nama', 'notajualdetil.harga as harga')
            ->get();
        
        //return view('admin.kwitansi', compact('data', 'barang'));
        
        $pdf = PDF::loadView('admin.kwitansi',['data'=>$data,'barang'=>$barang]);
        $name = "notapenjualan".$id.".pdf";
        return $pdf->download($name);
    }
    public function print()
    {
       
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
