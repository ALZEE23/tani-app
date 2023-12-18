<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
// File: web.php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeknologiController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\ProduksitanamanController;
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
use App\Http\Controllers\AlsintanController;
use App\Models\Produksitanaman;
use App\Http\Controllers\ProfileController;

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
Route::get('/tambah-poktan', [App\Http\Controllers\KelembagaanController::class, 'tambah_poktan'])->name('tambah-poktan');
Route::post('/store-poktan', [App\Http\Controllers\KelembagaanController::class, 'store_poktan'])->name('store-poktan');
Route::get('/detail-poktan/{id}', [App\Http\Controllers\KelembagaanController::class, 'detail_poktan'])->name('detail-poktan');
Route::get('/edit/poktan/{id}', [App\Http\Controllers\KelembagaanController::class, 'edit_poktan'])->name('edit_poktan');
Route::put('/update-poktan', [App\Http\Controllers\KelembagaanController::class, 'update_poktan'])->name('update-poktan');

Route::get('/daftar-poktan', [App\Http\Controllers\KelembagaanController::class, 'daftar_poktan'])->name('poktan-daftar');
Route::get('/poktan-register', [App\Http\Controllers\KelembagaanController::class, 'poktan_register'])->name('poktan-register');
Route::post('/store-register-poktan', [App\Http\Controllers\KelembagaanController::class, 'store_poktan_register'])->name('store-register-poktan');
Route::get('/detail-register-poktan/{id}', [App\Http\Controllers\KelembagaanController::class, 'detail_register_poktan'])->name('detail-register-poktan');

Route::get('/cek-anggota', [App\Http\Controllers\KelembagaanController::class, 'cek_anggota'])->name('cek-anggota');
Route::get('/proses-cek-anggota', [App\Http\Controllers\KelembagaanController::class, 'proses_cek_anggota'])->name('procek');


Route::get('/gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'gakpoktan'])->name('kelembagaan-gakpoktan');
Route::get('/tambah-gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'tambah_gakpoktan'])->name('tambah-gakpoktan');
Route::post('/store-gakpoktan', [App\Http\Controllers\KelembagaanController::class, 'store_gakpoktan'])->name('store-gakpoktan');
Route::get('/export-excel-gakpoktan', [KelembagaanController::class, 'export_excel_gakpoktans'])->name('export-excel-gakpoktan');
Route::get('/export-pdf-gakpoktan', [KelembagaanController::class, 'export_pdf_gakpoktans'])->name('export-pdf-gakpoktan');
Route::get('/gakpoktan-filter/{id}', [App\Http\Controllers\KelembagaanController::class, 'filter_gakpoktan'])->name('gakpoktan-filter');
Route::get('/csdesa/session/{id}', [App\Http\Controllers\KelembagaanController::class, 'csdesa'])->name('csdesa');
Route::get('/cskecamatan/session/{id}', [App\Http\Controllers\KelembagaanController::class, 'cskecamatan'])->name('cskecamatan');



Route::get('/teknologi', [TeknologiController::class, 'index'])->name('teknologi');
Route::get('/pupuk', [PupukController::class, 'index'])->name('pupuk');
Route::get('/pupuk-padat', [PupukController::class, 'padat'])->name('padat');
Route::get('pupuks/{id}', [PupukController::class,'proudctCart'])->name('addProduct.to.cart');
Route::post('/pupuk-padat-create', [PupukController::class, 'tambah'])->name('tambah');
Route::get('/tambah', [PupukController::class, 'store'])->name('store');
Route::get('/pupuk-cair', [PupukController::class, 'cair'])->name('cair');
Route::get('/pupuk/edit/{id}', [PupukController::class, 'edit'])->name('pupuk.edit');
Route::put('/pupuk/update/{id}', [PupukController::class,'update'])->name('pupuk.update');
Route::delete('/pupuk/delete/{id}', [PupukController::class,'delete'])->name('pupuk.delete');
Route::get('/pestisida', [PestisidaController::class, 'index'])->name('pestisida');
Route::get('/pestisida/kimia', [PestisidaController::class, 'kimia'])->name('pestisida.kimia');
Route::get('/pestisida/tambah', [PestisidaController::class, 'store'])->name('pestisida.tambah');
Route::post('/pestisida/tambah', [PestisidaController::class, 'tambah']);
Route::get('/teknologi/pestisida/search', [PestisidaController::class, 'search'])->name('pestisida.search');
Route::get('/pestisida/organik', [PestisidaController::class, 'organik'])->name('pestisida.organik');
Route::get('/pestisida/tambah-organik', [PestisidaController::class, 'store_organik'])->name('pestisida.tambah-organik');
Route::post('/pestisida/tambah-organik', [PestisidaController::class, 'tambah_organik']);
Route::get('/pestisida/edit/{id}', [PestisidaController::class, 'edit'])->name('pestisida.edit');
Route::put('/pestisida/update/{id}', [PestisidaController::class,'update'])->name('pestisida.update');
Route::delete('/pestisida/delete/{id}', [PestisidaController::class,'delete'])->name('pestisida.delete');
Route::get('/teknologi-budidaya', [BudidayaController::class, 'index'])->name('budidaya');
Route::get('/teknologi-hortikultura', [BudidayaController::class, 'hortikultura'])->name('hortikultura');
Route::get('/teknologi-pangan', [BudidayaController::class, 'pangan'])->name('pangan');
Route::get('/teknologi-perkebunan', [BudidayaController::class, 'perkebunan'])->name('perkebunan');
Route::get('teknologi-tambah', [BudidayaController::class, 'store'])->name('teknologi.store');
Route::post('teknologi-tambah', [BudidayaController::class, 'tambah'])->name('teknologi.tambah');
Route::get('/pencegahan', [PencegahanController::class, 'index'])->name('pencegahan');
Route::get('/pencegahan/tambah', [PencegahanController::class, 'store'])->name('pencegahan.store');
Route::post('/pencegahan/tambah', [PencegahanController::class, 'tambah'])->name('pencegahan.tambah');
Route::get('/pencegahan/edit/{id}', [PencegahanController::class, 'edit'])->name('pencegahan.edit');
Route::put('/pencegahan/update/{id}', [PencegahanController::class,'update'])->name('pencegahan.update');
Route::delete('/pencegahan/delete/{id}', [PencegahanController::class,'delete'])->name('pencegahan.delete');
Route::get('/alsintan', [AlsintanController::class, 'index'])->name('alsintan');
Route::get('/alsintan/tambah', [AlsintanController::class, 'store'])->name('alsintan.store');
Route::post('/alsintan/tambah', [AlsintanController::class, 'tambah'])->name('alsintan.tambah');
Route::get('/alsintan/filter', [AlsintanController::class, 'filterByKecamatan'])->name('alsintan.filterByKecamatan');
Route::get('/export-alsintan', [AlsintanController::class, 'exportToExcel'])->name('export-alsintan');
Route::get('/fetch-desa-options', [AlsintanController::class, 'fetchDesaOptions']);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/informasi-pribadi', [ProfileController::class, 'informasi'])->name('profile.informasi');
Route::get('/profile/sandi', [ProfileController::class, 'sandi'])->name('profile.sandi');
Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');




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


Route::resource('desa', DesaController::class)->name('desa', 'index');
Route::get('/produksi', [ProduksitanamanController::class, 'index'])->name('produksi.index');
Route::get('/produksi/tanaman', [ProduksitanamanController::class, 'tanaman'])->name('produksi.tanaman');
Route::get('/produksi/kecamatan', [ProduksitanamanController::class, 'kecamatan'])->name('produksi.tanaman.kecamatan');
Route::get('/produksi/tanaman/tambah', [ProduksitanamanController::class, 'tambah_tanaman'])->name('produksi.tanaman.tambah');
Route::post('/produksi/tanaman/store', [ProduksitanamanController::class, 'store_tanaman'])->name('produksi.tanaman.store');
Route::post('/filter-produksi', [ProduksitanamanController::class, 'filterProduksi'])->name('filter.produksi');

// Route::resource('penyuluhan', PenyuluhanController::class)->name('penyulihan', 'index');
