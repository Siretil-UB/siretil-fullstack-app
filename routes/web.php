<?php

use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post("/login", [LoginController::class, 'authenticate'])->name('login');
Route::get("/login", [LoginController::class, 'getForm']);
Route::delete('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// protected route
Route::middleware('auth')->group( function () {
        Route::get("/", function(){
            return view('home', [
                'page' => 'home'
            ]);
        });
        Route::get("/profile", function(){
            return view('profile', [
                'page' => 'profile'
            ]);
        });
        Route::get("/search", function(){
            return view('search', [
                'page' => 'search'
            ]);
        });
        Route::get("/team", function(){
            return view('team', [
                'page' => 'team'
            ]);
        });
        Route::get("/notification", function(){
            return view('notification', [
                'page' => 'notification'
            ]);
        });
    }
);
