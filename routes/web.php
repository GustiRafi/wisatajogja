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
            'wisatas' => App\Models\wisata::all(),
        ]);
    })->name('dashboard');
    Route::resource('/dashboard/wisata', App\Http\Controllers\wisataController::class);
    Route::resource('/dashboard/kategori',App\Http\Controllers\categoriController::class);
});

require __DIR__.'/auth.php';