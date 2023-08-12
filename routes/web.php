<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SectionController;
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
Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
Route::get('/{page}', [AdminController::class, 'index']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');