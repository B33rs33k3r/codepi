<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

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

Route::resource('catalog', CatalogController::class)->only('index');
Route::resource('product', ProductController::class)->only('index');
Route::resource('category', CategoryController::class)->only('index');

/*Route::get('/', [CatalogController::class, 'index']);
Route::get('/products', [MainController::class, 'products']);
Route::get('/categories', [MainController::class, 'categories']);

Route::post('/saveproduct', [PostController::class, 'product']);
Route::post('/savecategory', [PostController::class, 'category']);
Route::post('/deleteproduct', [PostController::class, 'productDelete']);*/