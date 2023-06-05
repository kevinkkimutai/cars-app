<?php

use App\Http\Controllers\CarModelsController;
use App\Http\Controllers\CarsController;
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

Route::get('/cars', [CarsController::class, 'index']);
Route::get('/cars/create', [CarsController::class, 'create']);
Route::post('/cars', [CarsController::class, 'store']);
Route::get('/cars/{id}', [CarsController::class, 'show']);
Route::get('/cars/{id}/edit', [CarsController::class, 'edit']);
Route::put('/cars/{id}', [CarsController::class, 'update']);
Route::delete('/cars/{id}', [CarsController::class, 'destroy']);

// carModel routes

Route::get('/carmodel/list', [CarModelsController::class, 'index']);
Route::get('/carmodel/create', [CarModelsController::class, 'create']);
Route::post('/carmodel', [CarModelsController::class, 'store']);
Route::get('/carmodel/{id}', [CarModelsController::class, 'show']);
Route::get('/carmodel/{id}/edit', [CarModelsController::class, 'edit']);
Route::put('/carmodel/{id}', [CarModelsController::class, 'update']);
Route::delete('/carmodel/{id}', [CarModelsController::class, 'destroy']);


