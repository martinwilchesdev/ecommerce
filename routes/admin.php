<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('admin.dashboard');
})->name('dashboard');

// rutas para las familias
Route::resource('families', FamilyController::class);

// ruta para las categorias
Route::resource('categories', CategoryController::class);

// rutas para subcategorias
Route::resource('subcategories', SubcategoryController::class);
