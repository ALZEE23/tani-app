<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
// File: web.php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeknologiController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\PestisidaController;
use App\Http\Controllers\BudidayaController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\GakpoktansController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\PencegahanController;
use App\Http\Controllers\PenyuluhController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PoktanController;
use App\Http\Controllers\DesaController;
use App\Http\Middleware\Petugas;
use App\Models\Gakpoktans;
use App\Models\Penyuluh;
use App\Models\Pupuk;

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
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/penyuluh-filter/{id}', [App\Http\Controllers\KelembagaanController::class, 'filter_penyuluh'])->name('penyuluh-filter');
Route::get('/kelembagaan', [App\Http\Controllers\KelembagaanController::class, 'index'])->name('kelembagaan');
Route::get('/kelembagaan-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'penyuluh'])->name('kelembagaan-penyuluh');
Route::get('/tambah-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'tambah_penyuluh'])->name('tambah-penyuluh');
Route::post('/store-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'store'])->name('store-penyuluh');
Route::post('/update-penyuluh', [App\Http\Controllers\KelembagaanController::class, 'update'])->name('update-penyuluh');
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
Route::get('/export-excel-gakpoktan', [KelembagaanController::class, 'export_excel_gakpoktans'])->name('export-excel-gakpoktan');
Route::get('/export-pdf-gakpoktan', [KelembagaanController::class, 'export_pdf_gakpoktans'])->name('export-pdf-gakpoktan');
Route::get('/gakpoktan-filter/{id}', [App\Http\Controllers\KelembagaanController::class, 'filter_gakpoktan'])->name('gakpoktan-filter');

Route::get('/teknologi', [TeknologiController::class, 'index'])->name('teknologi');
Route::get('/pupuk', [PupukController::class, 'index'])->name('pupuk');
Route::get('/pupuk-padat', [PupukController::class, 'padat'])->name('padat');
Route::get('pupuks/{id}', [PupukController::class,'proudctCart'])->name('addProduct.to.cart');
Route::post('/pupuk-padat-create', [PupukController::class, 'tambah'])->name('tambah');
Route::get('/tambah', [PupukController::class, 'store'])->name('store');
Route::get('/pupuk-cair', [PupukController::class, 'cair'])->name('cair');
Route::get('/pestisida', [PestisidaController::class, 'index'])->name('pestisida');
Route::get('/pestisida/kimia', [PestisidaController::class, 'kimia'])->name('pestisida.kimia');
Route::get('/pestisida/tambah', [PestisidaController::class, 'store'])->name('pestisida.tambah');
Route::post('/pestisida/tambah', [PestisidaController::class, 'tambah']);
Route::get('/teknologi/pestisida/search', [PestisidaController::class, 'search'])->name('pestisida.search');
Route::get('/pestisida/organik', [PestisidaController::class, 'organik'])->name('pestisida.organik');
Route::get('/pestisida/tambah-organik', [PestisidaController::class, 'store_organik'])->name('pestisida.tambah-organik');
Route::post('/pestisida/tambah-organik', [PestisidaController::class, 'tambah_organik']);
Route::get('/teknologi-budidaya', [BudidayaController::class, 'index'])->name('budidaya');
Route::get('/teknologi-hortikultura', [BudidayaController::class, 'hortikultura'])->name('hortikultura');
Route::get('/teknologi-pangan', [BudidayaController::class, 'pangan'])->name('pangan');
Route::get('/teknologi-perkebunan', [BudidayaController::class, 'perkebunan'])->name('perkebunan');
Route::get('/pencegahan-&-pengendalian-OPT', [PencegahanController::class, 'pencegahan'])->name('pencegahan');


// Kecamatan


// Admin
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('kecamatan', KecamatanController::class)->name('kecamatan','index');
    Route::resource('desa', DesaController::class)->name('desa','index');
    Route::resource('petani', PetaniController::class)->name('petani','index');
    Route::resource('petugas', PetugasController::class)->name('petugas','index');
    Route::resource('dinas', DinasController::class)->name('dinas','index');
    Route::resource('penyuluh', PenyuluhController::class)->name('penyuluh','index');
    Route::resource('poktan', PoktanController::class)->name('poktan','index');
    Route::resource('gakpoktan', GakpoktansController::class)->name('gakpoktan','index');

    // Additional routes specific to the admin section
});