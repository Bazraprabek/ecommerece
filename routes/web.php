<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
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

// Customer
Route::get('/', [CustomerController::class, 'index']);
Route::post('/', [CustomerController::class, 'sendContact']);
Route::group(['prefix' => '/products'], function () {
    Route::get('/', [CustomerController::class, 'products']);
    Route::get('/{id}', [CustomerController::class, 'product']);
});
Route::get('/profile', [CustomerController::class, 'profile'])->middleware('loginCheck');
Route::get('/setting', [CustomerController::class, 'setting'])->middleware('loginCheck');
Route::get('/login', [CustomerController::class, 'login'])->middleware('alreadyLogin');
Route::get('/signup', [CustomerController::class, 'signup'])->middleware('alreadyLogin');
Route::post('/login', [CustomerController::class, 'loginUser']);
Route::post('/signup', [CustomerController::class, 'signupUser']);
Route::get('/logout', function () {
    session()->forget('user_id');
    return redirect('/login');
});
Route::get('/sort', [CustomerController::class, 'sort']);

// Admin
Route::get('/admin', [AdminController::class, 'admin'])->middleware('checkAdmin');
Route::get('/add-admin', [AdminController::class, 'add'])->middleware('checkAdmin');
Route::post('/add-admin', [AdminController::class, 'addAdmin'])->middleware('checkAdmin');
Route::get('/admin-account', [AdminController::class, 'account'])->middleware('checkAdmin');
Route::get('/account-trash', [AdminController::class, 'accountTrash'])->middleware('checkAdmin');
Route::get('/admin-account/delete/{id}', [AdminController::class, 'deleteUser'])->middleware('checkAdmin');
Route::get('/admin-account/forcedelete/{id}', [AdminController::class, 'forcedeleteUser'])->middleware('checkAdmin');
Route::get('/admin-account/restore/{id}', [AdminController::class, 'restoreUser'])->middleware('checkAdmin');
Route::get('/admin-products', [AdminController::class, 'products'])->middleware('checkAdmin');
Route::get('/products-trash', [AdminController::class, 'productsTrash'])->middleware('checkAdmin');
Route::get('/admin-products/forcedelete/{id}', [AdminController::class, 'forcedeleteProduct'])->middleware('checkAdmin');
Route::get('/admin-products/restore/{id}', [AdminController::class, 'restoreProduct'])->middleware('checkAdmin');
Route::get('/admin-products/delete/{id}', [AdminController::class, 'deleteProduct'])->middleware('checkAdmin');
Route::get('/admin-upload', [AdminController::class, 'upload'])->middleware('checkAdmin');
Route::post('/admin-upload', [AdminController::class, 'uploadProduct'])->middleware('checkAdmin');
Route::get('/admin-shop', [AdminController::class, 'shop'])->middleware('checkAdmin');
Route::get('/admin-contact', [AdminController::class, 'contact'])->middleware('checkAdmin');
Route::get('/admin-contact/delete/{id}', [AdminController::class, 'deleteContact'])->middleware('checkAdmin');
Route::get('/admin-setting', [AdminController::class, 'setting'])->middleware('checkAdmin');
Route::post('/admin-setting/update/{id}', [AdminController::class, 'settingUpdate'])->middleware('checkAdmin');

// Testing
Route::get('/test', [CustomerController::class, 'test']);
