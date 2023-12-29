<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;

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

Route::get('/signup', 'AkunController@create')->name('signup');
Route::resource('akun', AkunController::class);

require_once __DIR__.'/public/index.php';