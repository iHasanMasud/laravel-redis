<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/blogs/{id}', [\App\Http\Controllers\BlogController::class, 'index']);
Route::post('/blogs/update/{id}', [\App\Http\Controllers\BlogController::class, 'update']);
Route::post('/blogs/delete/{id}', [\App\Http\Controllers\BlogController::class, 'delete']);
