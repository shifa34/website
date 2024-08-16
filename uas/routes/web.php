<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanBackendController;
use App\Http\Controllers\MakananBackendController;
use App\Http\Controllers\MinumanBackendController;
use App\Http\Controllers\BahanBackendController;
use App\Http\Controllers\PosisiBackendController;
use App\Http\Controllers\PelangganBackendController;
use App\Http\Controllers\UserBackendController;
use App\Http\Controllers\FrontendController;

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
//     return view('frontend.index');
// });

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
});


Route::resource('karyawan-backend',KaryawanBackendController::class);
Route::resource('makanan-backend',MakananBackendController::class);
Route::resource('minuman-backend',MinumanBackendController::class);
Route::resource('bahan-backend',BahanBackendController::class);
Route::resource('posisi-backend',PosisiBackendController::class);
Route::resource('pelanggan-backend',PelangganBackendController::class);
Route::resource('/',FrontendController::class);

Route::resource('user-backend', UserBackendController::class);


