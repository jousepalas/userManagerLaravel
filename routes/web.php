<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
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

Route::get('/index', [ClientController::class, 'index'])->middleware('auth');
Route::get('/show/{user}', [ClientController::class, 'show'])->middleware('auth');
Route::get('/user/new', [ClientController::class, 'create'])->middleware('auth');
Route::post('/store', [ClientController::class, 'store'])->middleware('auth');
//create
//store - store new
//edit
Route::get('user/edit/{user}', [ClientController::class, 'edit'])->middleware('auth');
//update
Route::put('user/edit/submit/{user}', [ClientController::class, 'update'])->middleware('auth');
//soft delete
Route::delete('user/delete/submit/{user}', [ClientController::class, 'delete'])->middleware('auth');
//destroy
Route::post('user/destroy/submit/{user}', [ClientController::class, 'destroy'])->middleware('auth');
//show soft delete
Route::get('/softDeleted', [ClientController::class, 'showDeleted'])->middleware('auth');
//restore client
Route::get('/restoreClient/{user}', [ClientController::class, 'restoreClient'])->middleware('auth');

//Admin routes
//Register
Route::get('/register', [UserController::class, 'create']);
Route::post('/register/new', [UserController::class, 'new']);

//login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/admin/authenticate', [UserController::class, 'authenticate']);
//logout
Route::post('/logout', [UserController::class, 'logout']);





