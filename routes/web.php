<?php

use App\Http\Controllers\AdminStoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Middleware\Authenticate;

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

    Route::get('/store/create', 'create')->middleware(['auth', 'check.roles']);
    Route::post('/store', 'store');

    Route::get('/store/{id}', 'show');

    Route::get('/store/{id}/edit', 'edit')->middleware(['auth', 'check.roles']);
    Route::patch('/store/{id}', 'update');

    Route::delete('/store/{id}', 'destroy');

    Route::get('/store/{id}/buy', 'buyShow')->middleware('auth');
    Route::post('/store/{id}/buy', 'buyStore');

    Route::get('/admin/checkOrders', 'checkOrdersIndex')->middleware(['auth', 'check.roles']);

    Route::patch('/admin/checkOrders/{uuid_code}/confirm', 'confirmOrders');
});
