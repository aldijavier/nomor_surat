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
use Browser;
use App\Traits\AuditLogsTrait;

class SettingAkunController extends Controller
{
    use AuditLogsTrait;
    //
    public function index()
    {
            //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Akses Halaman Setting Akun';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
        $userId = Auth::user()->id;
        $user = User::where('id', '=', $userId)->get();
        return view('setting-account.index', compact('user'));
    }

    public function proses_update_akunpassword(Request $request, $id)
    {
            //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Mengupdate Setting Akun';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
     //    dd($request->all());
        DB::table('users')->where('id', $id)->update([
             'password' => Hash::make($request->password),
         ]);
         return redirect('/setting-akun')->with('success', 'Password Berhasil di Update');;
     }

     
}
