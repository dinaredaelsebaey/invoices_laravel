<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
 });
Auth::routes();


Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
Route::post('/sections/store', [SectionController::class, 'store'])->name('sections.store');
Route::get('/section/show/{id}', [SectionController::class, 'show'])->name('sections.show');
Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('sections.edit');
Route::post('/section/update/{id}', [SectionController::class, 'update'])->name('sections.update');
Route::get('/section/delete/{id}', [SectionController::class, 'delete'])->name('sections.delete');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');


Route::get('/{page}', [AdminController::class, 'index']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');