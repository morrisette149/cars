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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route for index
Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars:index');//name boleh letak apa apa je

//route for create
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('cars:create');

//route to store the data
Route::post('/cars/create', [App\Http\Controllers\CarController::class, 'store'])->name('cars:store');

//route to show the data
Route::get('/cars/{car}', [App\Http\Controllers\CarController::class, 'show'])->name('cars:show');

//route to edit the data
Route::get('/cars/{car}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('cars:edit');

//route to update the data
Route::post('/cars/{car}/edit', [App\Http\Controllers\CarController::class, 'update'])->name('cars:update');

//route to delete the data
Route::get('/cars/{car}/delete', [App\Http\Controllers\CarController::class, 'destroy'])->name('cars:delete');// yang 'destroy' tu panggil function dalam controller