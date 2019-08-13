<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USer;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::all();
        $response =[
            'susccec'=>true,
            'data'=>$user,
            'massage'=>'berhasil'
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::all();
        $response =[
            'susccec'=>true,
            'data'=>$user,
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

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
        $user = User::findOrFaill($id);
        $response = [
            'suscces'=>true,
            'data'=>$user,
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
        $user = User::findOrFaill($id);
        $response = [
            'success'=>true,
            'data'=>$user,
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
        $user = User::findOrFaill($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

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
        $user = User::findOrFaill($id);
        $user->delete();
        $response=[
            'success'=>true,
            'data'=>$user,
            'massage'=>'berhasil. menghapus'
        ];
        return response()->json($response,200);
    }
}