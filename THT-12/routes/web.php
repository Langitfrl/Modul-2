<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CovidHospitalController;

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

Route::get('/', [CovidHospitalController::class, 'index'])->name('halaman-utama');
Route::post('/', [CovidHospitalController::class, 'show'])->name('tampil-data');