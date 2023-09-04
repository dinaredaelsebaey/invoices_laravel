<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailsController;
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
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/show/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('/invoicesDetails/{id}', [InvoiceDetailsController::class, 'show'])->name('invoicesDetails.show');
Route::post('/invoices/status_update/{id}', [InvoiceController::class, 'status_update'])->name('invoices.status_update');
Route::get('/invoices/paied', [InvoiceController::class, 'invoice_paied'])->name('invoices.paied');
Route::get('/invoices/unPaied', [InvoiceController::class, 'invoice_unPaied'])->name('invoices.unPaied');
Route::get('/invoices/partial', [InvoiceController::class, 'invoice_partial'])->name('invoices.partial');
//route to get products of section
Route::get('/section/{id}', [InvoiceController::class, 'getProduct']);

Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
Route::post('/sections/store', [SectionController::class, 'store'])->name('sections.store');
Route::get('/section/show/{id}', [SectionController::class, 'show'])->name('sections.show');
Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('sections.edit');
Route::post('/section/update/{id}', [SectionController::class, 'update'])->name('sections.update');
Route::get('/section/delete/{id}', [SectionController::class, 'delete'])->name('sections.delete');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');






Route::get('/{page}', [AdminController::class, 'index']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');