<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peminjam;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam= peminjam::all();
        $response =[
            'susccec'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil'
        ];
        return view('peminjam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjam= peminjam::all();
        $response =[
            'susccec'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peminjam = new peminjam();
        $peminjam->name = $request->name;
        $peminjam->email = $request->email;
        $peminjam->password = bcrypt($request->password);
        $peminjam->save();

        $role = Role::where('name', 'superadmin')->first();
        $useattachRole($role);

        return response()->json('berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjam = peminjam::findOrFail($id);
        $response = [
            'suscces'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil'
        ];
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjam = peminjam::findOrFaill($id);
        $response = [
            'success'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil'
        ];
        return response()->json($response,200);
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
        $peminjam = peminjam::findOrFaill($id);
        $peminjam->name = $request->name;
        $peminjam->email = $request->email;
        $peminjam->password = bcrypt($request->password);
        $peminjam->save();

        $role = Role::where('name', 'superadmin')->first();
        $useattachRole($role);

        return response()->json('berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = peminjam::findOrFaill($id);
        $peminjam->delete();
        $response=[
            'success'=>true,
            'data'=>$peminjam,
            'massage'=>'berhasil. menghapus'
        ];
        return response()->json($response,200);
    }
}
