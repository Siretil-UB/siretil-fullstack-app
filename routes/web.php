<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserControllers\MahasiswaController;
use App\Http\Controllers\UserControllers\KetuaController;
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

Route::middleware('guest')->group(function(){
    Route::post("/login", [LoginController::class, 'login'])->name('login');
    Route::get("/login", [LoginController::class, 'loginForm']);
});

// protected route
Route::middleware('auth')->group( function () {
    // ketua route
    Route::middleware('can:accessKetua,App\Http\Models\User')->group(function () {
        Route::prefix('/ketua')->group(function (){
            Route::get("/", [KetuaController::class, 'getHome'])->name('ketua-home');
            Route::get("/team", [KetuaController::class, 'getTeam']);
            Route::get("/profile", [KetuaController::class, 'getProfile']);

            Route::get("/notification", function(){
                return view('notification', [
                    'page' => 'notification'
                ]);
            });
        });
    });

    // mahasiswa route
    Route::middleware('can:accessMahasiswa,App\Http\Models\User')->group(function(){
        Route::get("/profile", function(){
            return view('profile', [
                'page' => 'profile'
            ]);
        });
    });

    Route::delete('logout', [LoginController::class, 'logout'])->name('logout');
    }
);


// Test route
Route::get("/tes1", [MahasiswaController::class, 'reqTim']);
Route::get("/tes2", [KetuaController::class, 'reqMenuPengajuan']);
