<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Landing Page
//Route::get('/', function(){return view();});


//Auth
Route::get('/', 'Auth\AuthController@index')->name('login');

Route::post('/login', 'Auth\AuthController@login')->name('logins');

Route::group(['middleware' => 'auth', 'ceklevel:Super Admin'], function(){

    // --- General ----
    Route::get('/dashboard', function(){
        return view('home');
    });
    Route::get('/home', 'DocsController@hitung_messages');
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    // Generate Nomor Surat
    Route::resource('depts', 'DeptsController');
    // Manage Document Type List
    Route::resource('docs', 'DocCodeController');
    // Manage Nomor Surat Generator
    Route::resource('surat', 'DocsController');
    // Route::get('/surat/create', 'DocsController@create')->name('create');

    // Manage Nomor Surat Generator
    Route::resource('setting-account', 'SettingAkunController');

    // Manage Akun User
    Route::get('/user-account', 'UserAccountController@index')->name('userindex');
    Route::get('/tambah-data', 'UserAccountController@tambah_data')->name('tambah_user');
    Route::post('/tambah/proses', 'UserAccountController@proses_tambah')->name('proses_tambah');
    Route::patch('/update-proses/{id}', 'UserAccountController@proses_update');
    Route::patch('/update-proses-password/{id}', 'UserAccountController@proses_update_password');
    // Manage Dept User
    Route::get('/dept-user', 'DeptUserController@index')->name('deptuser');
    Route::get('/tambah-data-deptuser', 'DeptUserController@tambah_data_deptuser');
    Route::post('/tambah/proses-deptuser', 'DeptUserController@proses_tambah_deptuser')->name('proses_tambah_deptuser');
    Route::patch('/update-proses-deptuser/{id}', 'DeptUserController@proses_update_deptuser')->name('proses_update_deptuser');
    Route::get('/hapus-data-deptuser/{id}','DeptUserController@hapus_deptuser')->name('deletedept/{id}');
    // Manage Setting Akun
    Route::get('/setting-akun', 'SettingAkunController@index')->name('akunset');
    Route::patch('/update-proses-akunpassword/{id}', 'SettingAkunController@proses_update_akunpassword');
    
    //  --- Sales Support --- 
    
    // Customer 
    
    // Quotation
    
    // --------------------------
    
    // Manage Department List 
});

Route::group(['middleware' => 'auth', 'ceklevel:Admin,User'], function(){

    // --- General ----
    Route::get('/dashboard', function(){
        return view('home');
    });
    Route::get('/home', 'DocsController@hitung_messages');
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    // Manage Nomor Surat Generator
    Route::resource('surat', 'DocsController');
    Route::get('/surat/create', 'DocsController@create')->name('createsurat');
    Route::post('/tambahsurat', 'DocsController@store')->name('tambahsurat');
     // Manage Setting Akun
     Route::get('/setting-akun', 'SettingAkunController@index');
    
    //  --- Sales Support --- 
    
    // Customer 
    
    // Quotation
    
    // --------------------------
    
    // Manage Department List 
});
