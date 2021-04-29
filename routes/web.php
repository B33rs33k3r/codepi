<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function() { return view('home'); })->name('home');

Route::resource('catalog', CatalogController::class)->only('index', 'store', 'destroy');
Route::resource('product', ProductController::class)->only('index', 'store', 'update', 'destroy');
Route::resource('category', CategoryController::class)->only('index', 'store', 'update', 'destroy');
