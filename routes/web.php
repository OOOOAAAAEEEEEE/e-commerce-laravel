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

Route::get('/', [StoreController::class, 'index']);
Route::get('/login', [AuthenticateController::class, 'index']);
Route::post('/login', [AuthenticateController::class, 'authenticate']);
Route::get('/register', [AuthenticateController::class, 'register']);
Route::post('/register', [AuthenticateController::class, 'store']);
Route::post('/logout', [AuthenticateController::class, 'logout']);

Route::resource('/store', StoreController::class);
