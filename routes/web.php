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

Route::get('/', function () {
    return redirect(route('rides.index'));
});

Route::resource('rides',\App\Http\Controllers\RideController::class);
Route::resource('repairs',\App\Http\Controllers\RepairController::class);
Route::resource('cars',\App\Http\Controllers\CarController::class);
Route::resource('workers',\App\Http\Controllers\WorkerController::class);
Route::get('/search/', [App\Http\Controllers\RideController::class,'search'])->name('search');
Route::get('/charts/', [App\Http\Controllers\RideController::class,'charts'])->name('charts');
Route::get('/pdfview/', [App\Http\Controllers\RideController::class,'downloadPDF'])->name('pdfview');
Route::get('/xml',function (){
    $rides = \App\Models\Ride::all();
    return response()->xml(['rides'=>$rides->toArray()]);
});
Route::get('export', [App\Http\Controllers\RideController::class,'exportData']);




