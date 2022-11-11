<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [ClientController::class, 'index']);
Route::get('/show/{user}', [ClientController::class, 'show']);
Route::get('/user/new', [ClientController::class, 'create']);
Route::post('/store', [ClientController::class, 'store']);
//create
//store - store new
//edit
Route::get('user/edit/{user}', [ClientController::class, 'edit']);
//update
Route::put('user/edit/submit/{user}', [ClientController::class, 'update']);
//destroy
Route::delete('user/delete/submit/{user}', [ClientController::class, 'delete']);

//Admin routes
//Register
Route::get('/register', [UserController::class, 'create']);
Route::post('/register/new', [UserController::class, 'new']);

//login
Route::get('/login', [UserController::class, 'login']);
Route::post('/admin/authenticate', [UserController::class, 'authenticate']);
//logout
Route::post('/logout', [UserController::class, 'logout']);





