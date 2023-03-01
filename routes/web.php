<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/store', 'index')->name('indexProducts');

    Route::get('/admin/store/create', 'create')->middleware(['auth', 'check.roles'])->name('createProduct');
    Route::post('/admin/store', 'store');

    Route::get('/store/{product_code}', 'show')->name('showProducts');

    Route::get('/admin/store/{product_code}/edit', 'edit')->middleware(['auth', 'check.roles'])->name('editProduct');
    Route::patch('/admin/store/{product_code}', 'update');

    Route::delete('/admin/store/{product_code}', 'destroy');

    Route::get('/store/{product_code}/buy', 'buyShow')->middleware('auth')->name('buyProduct');
    Route::post('/store/{product_code}/buy', 'buyStore');

    Route::get('/checkOrders', 'checkOrdersAdminIndex')->middleware(['auth'])->name('checkOrders');
    Route::patch('/admin/confirmOrder/{uuid}', 'confirmOrder');

    Route::get('/historiesOrders', 'checkHistoriesIndex')->middleware(['auth', 'check.roles'])->name('checkHistories');
    Route::delete('/admin/declineOrder/{uuid}', 'declineOrder');
});

require __DIR__ . '/auth.php';
