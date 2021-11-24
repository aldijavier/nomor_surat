<?php

namespace App\Http\Controllers;

use App\Department_User;
use App\DepartmentUser;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;
use PhpParser\Node\Expr\AssignOp\Concat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Browser;
use App\Traits\AuditLogsTrait;

class DeptUserController extends Controller
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
        $activity='Akses Halaman Departement User';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
        $dept_user = DepartmentUser::leftJoin('departments', 'departments.id', 'department_user.department_id')
        ->leftJoin('users', 'users.id', 'department_user.user_id')
        ->select(
            'department_user.*',
            'departments.name as department_name',
            'users.name as user_name'
        )->get();
        $user = DB::table('users')->get();
        $department = DB::table('departments')->get();
        return view('dept-user.index', compact('dept_user', 'department', 'user'));
    }

    public function tambah_data_deptuser()
    {
            //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Akses Halaman Tambah Data Deptuser';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
        $user = DB::table('users')->get();
        $department = DB::table('departments')->get();
        return view('dept-user.create', compact('department', 'user'));
    }

    public function proses_tambah_deptuser(Request $request)
    {
            //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Menambah Data DeptUser';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
        DepartmentUser::create([
                'user_id' => $request->user_id,
                'department_id' => $request->department_id,
        ]);
        // dd($request->all());
        return redirect('/dept-user')->with('success', 'Dept User Berhasil di Tambah');;
    }

    public function proses_update_deptuser(Request $request, $id)
    {
            //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Mengupdate DeptUser';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
        // dd($request->all());
        DB::table('department_user')->where('id', $id)->update([
             'user_id' => $request->user_id,
             'department_id' => $request->department_id,
         ]);
         return redirect('/dept-user')->with('success', 'Dept User Berhasil di Update');;
     }
    
     public function hapus_deptuser($id)
     {
            //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Menghapus Deptuser';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
         DB::table('department_user')->where('id',$id)->delete();
         return redirect('/dept-user')->with('success', 'Dept User Berhasil di Hapus');
     }   

}
