<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->action('DocsController@index');
        }
        return redirect()->action('Auth\AuthController@login')->with('message','email atau password salah !');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->action('Auth\AuthController@logout')->with('message','berhasil logout !');
    }
}
