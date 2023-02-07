<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthenticateController;

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

Route::post('/login', [AuthenticateController::class, 'authenticate']);
Route::post('/register', [AuthenticateController::class, 'store']);
Route::post('/logout', [AuthenticateController::class, 'logout']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'index'])->name('login');
    Route::get('/register', [AuthenticateController::class, 'register']);
});

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/store', 'index');

    Route::get('/admin/store/create', 'create')->middleware(['auth', 'check.roles']);
    Route::post('/admin/store', 'store');

    Route::get('/store/{product_code}', 'show');

    Route::get('/admin/store/{product_code}/edit', 'edit')->middleware(['auth', 'check.roles']);
    Route::patch('/admin/store/{product_code}', 'update');

    Route::delete('/admin/store/{product_code}', 'destroy');

    Route::get('/store/{product_code}/buy', 'buyShow')->middleware('auth');
    Route::post('/store/{product_code}/buy', 'buyStore');

    Route::get('/admin/checkOrders', 'checkOrdersAdminIndex')->middleware(['auth', 'check.roles']);
    Route::patch('/admin/confirmOrder/{uuid}', 'confirmOrder');

    Route::get('/admin/historiesOrders', 'checkHistoriesIndex');
    Route::delete('/admin/declineOrder/{uuid}', 'declineOrder');
});
