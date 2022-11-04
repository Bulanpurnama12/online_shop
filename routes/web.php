<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [FrontEndController::class, 'index']);
Route::get('/coba_controller',[App\Http\Controllers\CobaController::class,'index']);

Route::get('/admin/products',[App\Http\Controllers\ProductController::class,'index'])->name('products.index');

Route::get('/admin/products/create',[ProductController::class, 'create'])->name('products.create');

Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');

Route::delete('/admin/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');


Route::get('/admin/category',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index');

Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('category.create');

Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::delete('/admin/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');

Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
