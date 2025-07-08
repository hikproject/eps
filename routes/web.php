<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PartController;

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
    return view('login');
});
Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::resource('customers', CustomerController::class)->names('customers');
Route::get('customersdata', [CustomerController::class, 'data'])->name('customers.data');
Route::resource('parts', PartController::class)->names('parts');
Route::get('partsdata', [PartController::class, 'data'])->name('parts.data');




