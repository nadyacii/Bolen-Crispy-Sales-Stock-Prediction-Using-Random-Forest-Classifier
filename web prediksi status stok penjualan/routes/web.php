<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // CRUD Produk
    Route::resource('/products', ProductController::class);

    // Tambah stok (custom route)
    Route::get('/products/{product}/add-stock', [ProductController::class, 'addStock'])->name('products.add-stock');
    Route::post('/products/{product}/update-stock', [ProductController::class, 'updateStock'])->name('products.update-stock');
});

// Route::get('/sales-history', function () {
//     return view('sales-history');
// })->middleware(['auth'])->name('sales.history');

Route::resource('/sales', SalesController::class)->only(['index', 'destroy']);

// Penjualan Manual (Transaksi)
Route::get('/penjualan', [\App\Http\Controllers\PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan', [\App\Http\Controllers\PenjualanController::class, 'store'])->name('penjualan.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route untuk hasil prediksi
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('/classification', [\App\Http\Controllers\resultOfPredictController::class, 'store'])->name('resultOfClassification.store');
    Route::get('/result-of-classification', [\App\Http\Controllers\resultOfPredictController::class, 'index'])->name('resultOfClassification.index');
    Route::get('/result-of-predict/get-all-data', [\App\Http\Controllers\resultOfPredictController::class, 'getAllData'])->name('resultOfClassification.getAllData');
});

require __DIR__ . '/auth.php';
