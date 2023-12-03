<?php

use Illuminate\Support\Facades\Route;
// File: web.php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeknologiController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\PestisidaController;
use App\Http\Controllers\BudidayaController;
use App\Http\Controllers\PencegahanController;





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

Route::get('/teknologi', [TeknologiController::class, 'index'])->name('teknologi');
Route::get('/pupuk', [PupukController::class, 'index'])->name('pupuk');
Route::get('/pupuk-padat', [PupukController::class, 'padat'])->name('padat');
Route::get('/pupuk-cair', [PupukController::class, 'cair'])->name('cair');
Route::get('/pestisida', [PestisidaController::class, 'index'])->name('pestisida');
Route::get('/pestisida-organik', [PestisidaController::class, 'organik'])->name('organik');
Route::get('/pestisida-kimia', [PestisidaController::class, 'kimia'])->name('kimia');
Route::get('/teknologi-budidaya', [BudidayaController::class, 'index'])->name('budidaya');
Route::get('/teknologi-hortikultura', [BudidayaController::class, 'hortikultura'])->name('hortikultura');
Route::get('/teknologi-pangan', [BudidayaController::class, 'pangan'])->name('pangan');
Route::get('/teknologi-perkebunan', [BudidayaController::class, 'perkebunan'])->name('perkebunan');
Route::get('/pencegahan-&-pengendalian-OPT', [PencegahanController::class, 'pencegahan'])->name('pencegahan');


