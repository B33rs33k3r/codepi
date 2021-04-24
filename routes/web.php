<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/products', [MainController::class, 'products']);
Route::get('/categories', [MainController::class, 'categories']);

Route::post('/saveproduct', [PostController::class, 'product']);
Route::post('/savecategory', [PostController::class, 'category']);
