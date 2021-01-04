<?php

namespace App\Http\Controllers;
use App\User;
use App\NotaJual;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.indexpegawai',compact('user'));
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
        User::create([
            'name' => $request->get('nama'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role_id')
        ]);
        return redirect('pegawai')->with('status', 'Berhasil Menambah Pegawai Baru');
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
        $user = User::findOrFail($id);
        return view('admin.pegawaiupdate',compact('user'));
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
        $user = User::findOrFail($id);
        $user->name = $request->get('nama');
        $user->email = $request->get('email');
        if($request->has('password')){
            $user->password = Hash::make($request->get('password'));
        }
        $user->role = $request->get('role_id');
        $user->save();
        return redirect('pegawai')->with('status', 'Berhasil Mengubah Data Pegawai');
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
        $count = NotaJual::where('user_id','=',$id)->count();
        if($count == 0){
            $user = User::find($id);
            $user->delete();
            $response = ['status' => 'Berhasil Menghapus Pegawai'];
            return response()->json($response);
        }else{
            $response = ['status' => 'Tidak Dapat Menghapus. Data Pegawai Digunakan Pada Nota Beli'];
            return response()->json($response);
        }
    }
}
