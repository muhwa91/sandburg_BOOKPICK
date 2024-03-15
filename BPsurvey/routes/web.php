<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserAuthController;

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

// ### User ###
// User Login
Route::get('/login', function () {
    return view('welcome');
});

Route::middleware('userValidation')
    ->post('/', [UserRegisterController::class, 'userRegister']);

Route::prefix('login')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::middleware('userValidation')
    ->post('/', [UserAuthController::class, 'userLogin']);
});


// ### Admin ###
// Admin Login
Route::get('/admin', function () {
    return view('welcome');
});
// Admin index
Route::get('/admin/index', function () {
    return view('welcome');
});
