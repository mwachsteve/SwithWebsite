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
// Route::get('dashboard', function () {
//     return view('layouts.guest');
//     // return view('home');
//     // return view('auth.login');
// })->where('dashboard', '.*');

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::group(['middleware' => ['web', 'is_auth']], function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    // Route::post('atm-withdraw', [UserController::class, 'atmwithdrawal'])->name('atm');
    // Route::post('transfer', [UserController::class, 'fundtransfer'])->name('transfer'); 
    // Route::get('/success', 'Controller@success')->name('success');
});
// Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'login'])->name('login.custom'); 
Route::post('atm-withdraw', [UserController::class, 'atmwithdrawal'])->name('atm');
Route::post('transfer', [UserController::class, 'fundtransfer'])->name('transfer');  
Route::post('atm-withdraw-api', [UserController::class, 'atmwithdrawalapi'])->name('atmapi');
Route::post('transferapi', [UserController::class, 'fundtransferapi'])->name('transferapi'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
