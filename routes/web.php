<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/user/login', [UserController::class, 'getLogin'])->name('login');
Route::post('/user/postlogin', [UserController::class, 'postLogin']);

Route::get('/user/dashboard', [UserController::class, 'getDashboard'])->middleware('auth')->name('profile');;
Route::get('/user/logout', [UserController::class, 'getLogout']);