<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/add-user', [UserController::class, 'store']);

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('purchase-order', 'App\Http\Controllers\PurchaseOrderController');
	Route::resource('invoice', 'App\Http\Controllers\InvoiceController');
	Route::resource('pengeluaran-bbm', 'App\Http\Controllers\PengeluaranBbmController');
	Route::resource('biaya-operasional', 'App\Http\Controllers\BiayaOperasionalController');
	Route::resource('pendapatan', 'App\Http\Controllers\PendapatanController');
	Route::resource('surat-jalan', 'App\Http\Controllers\SuratJalanController');
	Route::get('pengeluaran/pendapatan', ['uses' => 'App\Http\Controllers\PendapatanController@pengeluaran'])->name('pendapatan.pengeluaran');
	Route::get('pemasukan/pendapatan', ['uses' => 'App\Http\Controllers\PendapatanController@pemasukan'])->name('pendapatan.pemasukan');
	Route::get('penghasilan/pendapatan', ['uses' => 'App\Http\Controllers\PendapatanController@penghasilan'])->name('pendapatan.penghasilan');

	Route::get('user/hapus/{id}', ['uses' => 'App\Http\Controllers\UserController@destroy'])->name('user.hapus');
	Route::get('laporan/biaya-operasional', ['uses' => 'App\Http\Controllers\BiayaOperasionalController@laporan'])->name('biaya-operasional.laporan');
	Route::get('pengeluaran-bbm/hapus/{id}', ['uses' => 'App\Http\Controllers\PengeluaranBbmController@destroy'])->name('pengeluaran-bbm.hapus');
	Route::get('biaya-operasional/hapus/{id}', ['uses' => 'App\Http\Controllers\BiayaOperasionalController@destroy'])->name('biaya-operasional.hapus');
	Route::get('laporan/invoice', ['uses' => 'App\Http\Controllers\InvoiceController@laporan'])->name('invoice.laporan');
	Route::get('laporan/invoice/cetak', 'App\Http\Controllers\InvoiceController@cetak')->name('invoice.cetak');
	Route::get('show/invoice/cetakdata', 'App\Http\Controllers\InvoiceController@cetakdata')->name('invoice.cetakdata');
	Route::get('laporan/surat-jalan/cetak', 'App\Http\Controllers\SuratJalanController@cetak')->name('surat-jalan.cetak');
	Route::get('laporan/pengeluaran-bbm', ['uses' => 'App\Http\Controllers\PengeluaranBbmController@laporan'])->name('pengeluaran-bbm.laporan');
	Route::get('invoice/hapus/{id}', ['uses' => 'App\Http\Controllers\InvoiceController@destroy'])->name('invoice.hapus');
	Route::get('surat-jalan/hapus/{id}', ['uses' => 'App\Http\Controllers\SuratJalanController@destroy'])->name('surat-jalan.hapus');
	Route::get('laporan/surat-jalan', 'App\Http\Controllers\SuratJalanController@laporan')->name('surat-jalan.laporan');
	Route::get('surat-jalan/pdf/{id}', ['uses' => 'App\Http\Controllers\SuratJalanController@pdf'])->name('surat-jalan.pdf');
	Route::get('invoice/pdf/{id}', ['uses' => 'App\Http\Controllers\InvoiceController@pdf'])->name('invoice.pdf');
	Route::get('laporan/invoice/filter', 'App\Http\Controllers\InvoiceController@filter')->name('invoice.filter');
	Route::get('laporan/biaya-operasional/pdf', 'App\Http\Controllers\BiayaOperasionalController@pdf')->name('biaya-operasional.pdf');
	Route::get('index/pendapatan/filter', 'App\Http\Controllers\PendapatanController@filter')->name('pendapatan.filter');
	Route::get('pengeluaran/pendapatan/filter3', 'App\Http\Controllers\PendapatanController@filter3')->name('pendapatan.filter3');
	Route::get('pemasukan/pendapatan/filter', 'App\Http\Controllers\PendapatanController@filter2')->name('pendapatan.filter2');
	Route::get('laporan/purchase-order/filter', 'App\Http\Controllers\PurchaseOrderController@filter')->name('purchase-order.filter');
	Route::get('laporan/surat-jalan/filter', 'App\Http\Controllers\SuratJalanController@filter')->name('surat-jalan.filter');
	Route::get('laporan/biaya-operasional/filter', 'App\Http\Controllers\BiayaOperasionalController@filter')->name('biaya-operasional.filter');
	Route::get('laporan/pengeluaran-bbm/filter', 'App\Http\Controllers\PengeluaranBbmController@filter')->name('pengeluaran-bbm.filter');
	Route::get('pemasukan/pendapatan/cetak', 'App\Http\Controllers\PendapatanController@cetak')->name('pemasukan.cetak');
	Route::get('index/pendapatan/cetak2', 'App\Http\Controllers\PendapatanController@cetak2')->name('pendapatan.cetak');
	Route::get('laporan/purchase-order/cetak', 'App\Http\Controllers\PurchaseOrderController@cetak')->name('purchase-order.cetak');
	Route::get('laporan/pengeluaran-bbm/cetak', 'App\Http\Controllers\PengeluaranBbmController@cetak')->name('pengeluaran-bbm.cetak');
	Route::get('laporan/biaya-operasional/cetak', 'App\Http\Controllers\BiayaOperasionalController@cetak')->name('biaya-operasional.cetak');
	Route::get('laporan/purchase-order', ['uses' => 'App\Http\Controllers\PurchaseOrderController@laporan'])->name('purchase-order.laporan');
	Route::get('purchase-order/hapus/{id}', ['uses' => 'App\Http\Controllers\PurchaseOrderController@destroy'])->name('purchase-order.hapus');
	Route::get('purchase-order/status/{status}/{id}', ['as' => 'purchase-order.status', 'uses' => 'App\Http\Controllers\PurchaseOrderController@status']);
	Route::post('purchase-order/komen/{id}', [ 'uses'=>'App\Http\Controllers\PurchaseOrderController@komen'])->name('purchase-order.komen');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => ["Direktur"]], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
});
