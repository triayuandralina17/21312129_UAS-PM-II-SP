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

use App\Http\Controllers\UasController;

Route::get('/npm', [UasController::class, 'index']);
Route::get('/npm/create', [UasController::class, 'create']);
Route::post('/npm', [UasController::class, 'store']);
Route::get('/npm/{id}/edit', [UasController::class, 'edit']);
Route::put('/npm/{id}', [UasController::class, 'update']);
Route::delete('/npm/{id}', [UasController::class, 'destroy']);

