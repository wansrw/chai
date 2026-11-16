<?php

use Illuminate\Support\Facades\Route;


Auth::routes();



Route::get('/' , [App\Http\Controllers\IndexController::class , 'index'])->name("index");
Route::get('/catalog' , [App\Http\Controllers\CatalogController::class , 'catalog'])->name("catalog");
Route::get('/contacts' , [App\Http\Controllers\ContactsController::class , 'contacts'])->name("contacts");
Route::get('/cart' , [App\Http\Controllers\CartController::class , 'cart'])->name("cart");
Route::get('/home' , [App\Http\Controllers\HomeController::class , 'index'])->name("home");
Route::get('/tovar/{id}', [App\Http\Controllers\TovarController::class, 'tovar'])->name('tovar');