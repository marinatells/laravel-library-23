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
use App\Http\Controllers\LoginController;

// Книги

Route::get('/book/all', [BookController::class, 'all'])->middleware(['auth:sanctum', 'ability:user']);
Route::post('/book/change_availabilty/{id}', [BookController::class, 'changeAvailabilty'])->middleware(['auth:sanctum', 'ability:admin']);
Route::post('/book/add', [BookController::class, 'add'])->middleware(['auth:sanctum', 'ability:admin']);
Route::post('/book/delete/{id}', [BookController::class, 'delete'])->middleware(['auth:sanctum', 'ability:admin']);

// Пользователь
Route::post('/user/register', [LoginController::class, 'createUser']);
Route::post('/user/login', [LoginController::class, 'createToken']);
Route::post('/user/logout', [LoginController::class, 'removeToken'])->middleware(['auth:sanctum']);
Route::get('/user', [LoginController::class, 'getUser'])->middleware(['auth:sanctum']);


