<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountMaintenanceController;
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

Route::get('language/{locale}', function($locale){
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [HomeController::class, 'gotoLogIn'])->middleware('guest');
Route::post('/login-try', [HomeController::class, 'login']);

Route::get('/register', [HomeController::class, 'gotoRegister'])->middleware('guest');
Route::post('/register-try', [HomeController::class, 'register']);

Route::post('/logout', [HomeController::class, 'logout'])->middleware('auth');

Route::get('/book-page/{book_id}', [EbookController::class, 'show'])->middleware('auth');
Route::post('/add-book-to-order/{book_id}', [EbookController::class, 'add_book_to_order'])->middleware('auth');

Route::get('/cart', [CartController::class, 'show'])->middleware('auth')->middleware('auth');
Route::post('/delete_book', [CartController::class, 'delete']);

Route::post('/submit-all-cart', [CartController::class, 'destroy']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/update-profile', [ProfileController::class, 'update']);

Route::get('/acc-maintenance', [AccountMaintenanceController::class, 'index'])->middleware('admin');
Route::get('/update-role/{id}', [AccountMaintenanceController::class, 'update_role'])->middleware('admin');
Route::post('/delete-user', [AccountMaintenanceController::class, 'delete_user']);
Route::post('/update-role-user', [AccountMaintenanceController::class, 'update_role_user']);