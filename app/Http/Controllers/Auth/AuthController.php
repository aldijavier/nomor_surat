<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\AuditLogsTrait;
use Browser;

class AuthController extends Controller
{
    use AuditLogsTrait;
    public function index(){
        // return redirect('https://stagingsysdev.nap.net.id/sso/signout');
        return redirect('http://localhost:8000/sso/signout');
    }

    public function postlogin(Request $request, $q)
    {
        $email =base64_decode($q);
        $password='-';
        // $cre = $request->only('email','password');
        $credentials = [

            'email' => $email,

            'password' => $password

        ];
        // dd($credentials);
        
        $cekuser_status=User::where('email',$email)->first();
        if(Auth::attempt($credentials)){
            //Audit Log
            //update last login
                //update last login
                $update_lastlogin=User:: where('email',$email)
                ->update([
                    'last_login' => now(),
                    'login_counter' => $cekuser_status->login_counter+1,
                ]);

                if($update_lastlogin){
                //Audit Log
                $username= auth()->user()->email; 
                $ipAddress=$_SERVER['REMOTE_ADDR'];
                $location='0';
                $access_from=Browser::browserName();
                $activity='Login';

                //dd($access_from);
                $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
                return redirect()->action('DocsController@index');
                }
        } else
        // return redirect('https://stagingsysdev.nap.net.id/sso/signout');
        return redirect('http://localhost:8000/sso/signout');
    }

    public function logout(Request $request){
       //Audit Log
       $username= auth()->user()->email; 
       $ipAddress=$_SERVER['REMOTE_ADDR'];
       $location='0';
       $access_from=Browser::browserName();
       $activity='Logout';

       //dd($access_from);
       $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
       $email_user=auth()->user()->email;
    //    return redirect('https://stagingsysdev.nap.net.id/sso/portal/'.$email_user);
       return redirect('http://localhost:8000/portal/'.$email_user);
    }
}
