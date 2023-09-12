<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\homeController::class, 'index']);
Route::get('/product/{id}', [App\Http\Controllers\homeController::class, 'show']);
Route::post('/search', [App\Http\Controllers\homeController::class, 'search']);
Route::get('/catalog', [App\Http\Controllers\homeController::class, 'catalog']);
Route::post('/filter', [App\Http\Controllers\homeController::class, 'filter']);
Route::get('/contact', [App\Http\Controllers\homeController::class, 'contact']);
Route::get('/account', [App\Http\Controllers\accountController::class, 'login']);
