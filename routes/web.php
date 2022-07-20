<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StaffsController;
use App\Models\Staffs;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


Route::get('logout', [LoginController::class,'logout'])->name('logout');
Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class,'authenticate']);

Route::get('/email/verify', function () {
    return view('admin.staff.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\HomeController::class,'verifyEmail'])->where(['id' => '[0-9]+', 'hash' => '[0-9a-fA-F]+'])->name
('email.verify');
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
});
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

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
