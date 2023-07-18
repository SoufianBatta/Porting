<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('Index');
})->name('Index');

Route::get('/login', [LoginController::class, 'ViewLogin'])->name('Login');
Route::post('/login', [LoginController::class, 'Login'])->name('Login');

Route::get('/singin',[SigninController::class, 'ViewSignin'])->name('Signin');
Route::post('/singin',[SigninController::class, 'Signin'])->name('Signin');

Route::get('/HomePage',[HomePageController::class, 'ViewHomePage'])->name('HomePage');
Route::get('/HomePage/logout',[HomePageController::class, 'Logout'])->name('Logout');