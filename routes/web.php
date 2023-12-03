<?php

use Illuminate\Support\Facades\Route;
// File: web.php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/kelembagaan', [App\Http\Controllers\KelembagaanController::class, 'index'])->name('kelembagaan');
Route::get('/kelembagaan-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'penyuluh'])->name('kelembagaan-penyuluh');
Route::get('/tambah-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'tambah_penyuluh'])->name('tambah-penyuluh');
Route::post('/store-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'store'])->name('store-penyuluh');
Route::get('/edit/penyuluh/{id}', [App\Http\Controllers\KelembagaanController::class, 'edit_penyuluh'])->name('edit.penyuluh');
Route::get('/delete/penyuluh/{id}', [App\Http\Controllers\KelembagaanController::class, 'delete_penyuluh'])->name('delete.penyuluh');

// 
Route::get('/kelembagaan-petani', [App\Http\Controllers\KelembagaanController::class, 'petani'])->name('kelembagaan-petani');
Route::get('/gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'gakpoktan'])->name('kelembagaan-gakpoktan');
Route::get('/poktan', [App\Http\Controllers\KelembagaanController::class, 'poktan'])->name('kelembagaan-poktan');
Route::get('/poktan-register', [App\Http\Controllers\KelembagaanController::class, 'poktan_register'])->name('poktan-register');
Route::get('/detail-poktan', [App\Http\Controllers\KelembagaanController::class, 'detail_poktan'])->name('detail-poktan');

Route::get('/gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'gakpoktan'])->name('kelembagaan-gakpoktan');
Route::get('/tambah-gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'tambah_gakpoktan'])->name('tambah-gakpoktan');
Route::post('/store-gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'store_gakpoktan'])->name('store-gakpoktan');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');