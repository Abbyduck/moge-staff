<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StaffsController;
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


Route::prefix('admin')->get('logout', [LoginController::class,'logout'])->name('admin.logout');
Route::prefix('admin')->get('login', [LoginController::class,'login'])->name('admin.login');
Route::prefix('admin')->post('login', [LoginController::class,'authenticate'])->name('admin.login');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->to('admin.dashboard');
});
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/attendance', function () {
        return view('starter',['title'=>'attendance']);
    })->name('staff.attendance');
    Route::get('/setting', function () {
        return view('starter',['title'=>'setting']);
    })->name('setting');

    Route::resource('staffs', StaffsController::class)->names([
        'index'=>'staff.list',
    ]);
});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
