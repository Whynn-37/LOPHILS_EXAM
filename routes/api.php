<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthTokencheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// clear

Route::get('/blank', function () {
    return view('templates/blank');
});

Route::get('/token', function () {
    return csrf_token();
});



// Route::resource('/task', TaskController::class);

// Route::get('loadUsers', [UserController::class, 'loadUsers']);
// Route::post('editUser/{id}', [UserController::class, 'editUser']);
