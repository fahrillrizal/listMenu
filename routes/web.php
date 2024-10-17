<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [MenuController::class, 'index']);
Route::get('/menu/{id}', [MenuController::class, 'show']);