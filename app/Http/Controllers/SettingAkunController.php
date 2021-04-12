<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\Department;
use Session;
use Illuminate\Support\Facades\DB;

class SettingAkunController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::where('id', '=', $userId)->get();
        return view('setting-account.index', compact('user'));
    }

    public function proses_update_akunpassword(Request $request, $id)
    {
     //    dd($request->all());
        DB::table('users')->where('id', $id)->update([
             'password' => Hash::make($request->password),
         ]);
         return redirect('/setting-akun')->with('success', 'Password Berhasil di Update');;
     }

     
}
