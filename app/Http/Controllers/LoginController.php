<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use DB;
class LoginController extends BaseController
{
    public function register(Request $request) {
        $NIK = $request->input('NIK');
        $nama = $request->input('nama');
        $level_user = $request->input('level_user');
        $password = $request->input('password');

        DB::table('users')->insert($data=[
            'NIK' => $NIK,
            'nama' => $nama ,
            'level_user' => $level_user ,
            'password' => $password

            
       ]);

    return response()->json($data);
    }

    public function login(Request $request) {
        $NIK = $request->input('NIK');
        $user = DB::table('users')
        ->where('NIK',$NIK)->first();
        if(Hash::check($user->password,Hash::make($request->input('password')))){ 
            
            return response()->json([
                        'pesan' => 'login berhasil',
                        'data' => $user
            ],201);
            }
            else {
                return response()->json([
                'pesan' => 'gagal',
                'data' => ''

            ], 400);
            }
       
    }
}
