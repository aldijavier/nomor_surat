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

class UserAccountController extends Controller
{
    //
    public function index()
    {
        $user = User::leftJoin('departments', 'departments.id', 'users.department_id')
        ->select(
            'users.*',
            'departments.name as department_name'
        )
        ->get();
        $department = DB::table('departments')->get();
        return view('user-account.index', compact('user', 'department'));
    }

    public function tambah_data()
    {
        $department = DB::table('departments')->get();
        return view('user-account.create', compact('department'));
    }

    public function proses_tambah(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'unique:users',
            ],
            [
                'email.unique' => 'Email sudah terdaftar, silahkan dicek kembali.',

            ]
        );        
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'department_id' => $request->department_id,
                'password' => Hash::make($request->password),
                'email_verified_at' => $request->email_verified_at = Carbon::now(),
        ]);
        // dd($request->all());
        return redirect('/user-account')->with('success', 'Akun User Berhasil di Tambah');;
    }

    public function proses_update(Request $request, $id)
    {
     //    dd($request->all());
        DB::table('users')->where('id', $id)->update([
             'name' => $request->name,
             'email' => $request->email,
             'level' => $request->level,
             'department_id' => $request->department_id,
         ]);
         return redirect('/user-account')->with('success', 'Akun User Berhasil di Update');;
     }

     public function proses_update_password(Request $request, $id)
    {
     //    dd($request->all());
        DB::table('users')->where('id', $id)->update([
             'password' => Hash::make($request->password),
         ]);
         return redirect('/user-account')->with('success', 'Password Berhasil di Update');;
     }

}
