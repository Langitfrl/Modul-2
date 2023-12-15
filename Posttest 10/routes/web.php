<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/pendataan', [DataController::class, 'showFormPendataan'])->name('show-form-pendataan');
Route::post('/submit-data', [DataController::class, 'submitData'])->name('submit-data');

Route::get('/', function () {
    return redirect()->route('show-form-pendataan');
});

