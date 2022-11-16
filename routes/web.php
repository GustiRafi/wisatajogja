<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    return view('home.index',[
        'jombotron' => App\Models\cover::all(),
        'logos' => App\Models\logo::all(),
        'categoris' => App\Models\categori::all(),
        'cover' => App\Models\cover::first(),
        'abouts' => App\Models\about::all(),
        'contact' => App\Models\contact::all(),
        'sosmeds' => App\Models\sosmed::all(),
    ]);
});
Route::get('/wisata-jogja/{slug}', function ($slug) {
    $categori = App\Models\categori::firstWhere('slug',$slug);
    return view('home.daftarwisata',[
        'jombotron' => App\Models\cover::all(),
        'logos' => App\Models\logo::all(),
        'wisatas' => App\Models\wisata::Where('categori_id',$categori->id)->orderBy('id','desc')->get(),
        'categoris' => App\Models\categori::all(),
        'kategori' => $categori->id,
        'contact' => App\Models\contact::all(),
        'sosmeds' => App\Models\sosmed::all(),
        'cover' => App\Models\cover::first(),
    ]);
});
Route::get('/detail-wisata/{slug}', function ($slug) {
    return view('home.detail-wisata',[
        'jombotron' => App\Models\cover::all(),
        'logos' => App\Models\logo::all(),
        'wisata' => App\Models\wisata::firstWhere('slug',$slug),
        'categoris' => App\Models\categori::all(),
        'contact' => App\Models\contact::all(),
        'sosmeds' => App\Models\sosmed::all(),
        'cover' => App\Models\cover::first(),
    ]);
});
Route::get('/contact',function(){
    return view('home.contact',[
        'jombotron' => App\Models\cover::all(),
        'logos' => App\Models\logo::all(),
        'contact' => App\Models\contact::all(),
        'categoris' => App\Models\categori::all(),
        'sosmeds' => App\Models\sosmed::all(),
        'cover' => App\Models\cover::first(),
    ]);
});
Route::post('/send-request',[App\Http\Controllers\sendEmailController::class,'send']);
Route::get('/cari-nama',[App\Http\Controllers\cariController::class,'cari']);
Route::get('/cari-wilayah',[App\Http\Controllers\cariController::class,'cariwilayah']);
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard',[
            'wisata' => App\Models\wisata::all(),
            'kategori' => App\Models\categori::all(),
            'komen' => App\Models\comment::all(),
            'logos' => App\Models\logo::all(),
        ]);
    })->name('dashboard');
    Route::resource('/dashboard/wisata', App\Http\Controllers\wisataController::class);
    Route::resource('/dashboard/categori',App\Http\Controllers\categoriController::class);

    Route::prefix("/settings")->group(function (){
        Route::get("/logo", [App\Http\Controllers\logoController::class,'index']);
        Route::get("/about", [App\Http\Controllers\aboutController::class,'index']);
        Route::get("/contact", [App\Http\Controllers\contactController::class,'index']);
        Route::get("/cover", [App\Http\Controllers\coverController::class,'index']);

        Route::post('/logo/{id}',[App\Http\Controllers\logoController::class,'update']);
        Route::post("/about/{id}", [App\Http\Controllers\aboutController::class,'update']);
        Route::post("/contact/{id}", [App\Http\Controllers\contactController::class,'update']);
        Route::post("/cover/{id}", [App\Http\Controllers\coverController::class,'update']);

        Route::resource('/media-sosial',App\Http\Controllers\sosmedController::class);
    });

    Route::prefix("/account")->group(function(){
        Route::get('/change-profile',[App\Http\Controllers\Auth\editProfileController::class,'index']);
        Route::post('/change-profile/{id}',[App\Http\Controllers\Auth\editProfileController::class,'change']);

        Route::get('/change-password',[App\Http\Controllers\Auth\changePasswordController::class,'index']);
        Route::post('/change-password',[App\Http\Controllers\Auth\changePasswordController::class,'changepassword']);
    });
});

require __DIR__.'/auth.php';