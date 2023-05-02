<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\BookController;

Route::get('/book/all', [BookController::class, 'all']);

Route::get('/book/change_availabilty/{id}', [BookController::class, 'changeAvailabilty']);

Route::post('/book/add', [BookController::class, 'add']);

Route::get('/book/delete/{id}', [BookController::class, 'delete']);
