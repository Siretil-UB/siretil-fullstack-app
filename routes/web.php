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
            // non use case
            Route::get("/", [KetuaController::class, 'getHome'])->name('ketua-home');
            Route::get("/team", [KetuaController::class, 'getTim'])->name('ketua-tim');
            Route::get("/profile", [KetuaController::class, 'getProfile']);

            // use case unggah kriteria
            Route::get("/kriteria", [KetuaController::class, 'reqMenuUnggahKriteria'])->name('kriteriaKetua');
            Route::post('/kriteria', [KetuaController::class, 'reqUnggah']);
            Route::get("/redirect-batal-unggah-kriteria", [KetuaController::class, 'batalUnggahKriteria']);
            Route::get("/kriteria-all", [KetuaController::class, 'reqKriteria'])->name('ketua-kriteria');

            // use case setujui permintaan
            Route::get("/notification", [KetuaController::class, 'reqMenuPengajuan']);
            Route::get("/tolakPengajuan", [KetuaController::class, 'reqTolak']);
            Route::post("/setujuPengajuan", [KetuaController::class, 'reqSetuju']);

            // use case hapus tim
            Route::post('/hapus', [KetuaController::class, 'reqHapusTim'])->name('user.index');

            // use case cari anggota
            Route::get('/search', [KetuaController::class, 'reqMenuCariAnggota']);
            Route::post("/search", [KetuaController::class, 'reqMahasiswa']);
        });
    });

    // mahasiswa route
    Route::middleware('can:accessMahasiswa,App\Http\Models\User')->group(function(){
        // non use case
        Route::get("/", [MahasiswaController::class, 'getHome'])->name('mahasiswa-home');
        Route::get("/profile", [MahasiswaController::class, 'getProfile'])->name('profileMahasiswa');
        Route::get("/notification", [MahasiswaController::class, 'notification']);

        // use case cari tim
        Route::get("/search", [MahasiswaController::class, 'reqMenuCariTim']);
        Route::post("/search", [MahasiswaController::class, 'reqTim']);

        // use case aju gabung tim
        Route::post('/gabung',[MahasiswaController::class, 'reqGabungTim']);

        // use case unggah data diri
        Route::get('/rederict-profile',[MahasiswaController::class, 'reqMenuUnggahData'])->name('dataDiriMahasiswa');
        Route::get('/redirect-batal-unggah',[MahasiswaController::class, 'batalUnggahData']);
        Route::post('/unggah',[MahasiswaController::class, 'reqUnggah']);

        // use case buat tim
        Route::get('/buat-tim', [MahasiswaController::class, 'reqMenuBuatTim']);
        Route::post('/buat-tim',[MahasiswaController::class, 'reqBuatTim']);
        Route::get('/redirect-batal-buat-tim', [MahasiswaController::class, 'batalBuatTim']);
        Route::get('/team',[MahasiswaController::class, 'getTim'])->name('timMahasiswa');
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    }
);


// Test route
Route::get("/tes1", [MahasiswaController::class, 'tes']);
Route::get("/tes2", [KetuaController::class, 'tes']);
