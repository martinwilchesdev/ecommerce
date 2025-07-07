<?php

use App\Http\Controllers\Admin\FamilyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('admin.dashboard');
})->name('dashboard');

// rutas para las familias
Route::resource('families', FamilyController::class);
