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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard',[
            'wisata' => App\Models\wisata::all(),
            'kategori' => App\Models\categori::all(),
            'logos' => App\Models\logo::all(),
        ]);
    })->name('dashboard');
    Route::resource('/dashboard/wisata', App\Http\Controllers\wisataController::class);
    Route::resource('/dashboard/categori',App\Http\Controllers\categoriController::class);

    Route::prefix("/settings")->group(function (){
        Route::get("/logo", [App\Http\Controllers\logoController::class,'index']);
        Route::get("/about", [App\Http\Controllers\aboutController::class,'index']);
        Route::get("/contact", [App\Http\Controllers\contactController::class,'index']);

        Route::post('/logo/{id}',[App\Http\Controllers\logoController::class,'update']);
        Route::post("/about/{id}", [App\Http\Controllers\aboutController::class,'update']);
        Route::post("/contact/{id}", [App\Http\Controllers\contactController::class,'update']);
    });

    Route::prefix("/account")->group(function(){
        Route::get('/change-profile',[App\Http\Controllers\Auth\editProfileController::class,'index']);
        Route::post('/change-profile/{id}',[App\Http\Controllers\Auth\editProfileController::class,'change']);

        Route::get('/change-password',[App\Http\Controllers\Auth\changePasswordController::class,'index']);
        Route::post('/change-password',[App\Http\Controllers\Auth\changePasswordController::class,'changepassword']);
    });
});

require __DIR__.'/auth.php';