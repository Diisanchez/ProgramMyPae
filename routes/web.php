<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\AuthenticationSessionController;


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

//=========

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [IndexController::class, 'index'])->name('index');

//=============================== Admin =============================================

Route::get('/welcome', [AdminController::class, 'welcome'])->name('welcome');
Route::resource('remittance', RemittanceController::class);
Route::get('remittance/delivery/{remittance}', [RemittanceController::class, 'delivery'])->name('delivery');
Route::resource('institution', InstitutionController::class);


//===========================Login===============================================
Route::get('/login', [AuthenticationSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticationSessionController::class, 'store'])->name('start');
Route::post('/logout', [AuthenticationSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterUserController::class, 'create'])->name('Register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('save');
