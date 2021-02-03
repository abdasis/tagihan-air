<?php

use App\Http\Livewire\Pengaturan\Harga;
use App\Http\Livewire\Pengeluaran\Index as PengeluaranIndex;
use App\Http\Livewire\Pengguna\Index;
use App\Http\Livewire\Pengguna\Show;
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
    return redirect()->route('pengguna.index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('semua-pengguna', Index::class)->name('pengguna.index');
        Route::get('detail-pengguna/{id}', Show::class)->name('pengguna.show');
    });
    Route::group(['prefix' => 'penggunaan'], function () {
        Route::get('semua-data', PengeluaranIndex::class)->name('penggunaan.index');
    });
    Route::get('atur-harga', Harga::class)->name('pengaturan.harga');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
