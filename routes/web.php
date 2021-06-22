<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DrinkController;
use App\Http\Middleware\userType;

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
    return view('home');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Register/User route
Route::get('user_index', [RegisterController::class, 'user_index'])->name('user_index');
Route::post('store', [RegisterController::class, 'store']);


// // Role Route
// Route::get('role_index', [RoleController::class, 'index'])->name('role_index');
// Route::post('role_store', [RoleController::class, 'store']);

// Product Route
// Route::get('prod_index', [ProductController::class, 'index'])->name('prod_index');
// Route::post('prod_store', [ProductController::class, 'store']);

// // Drink Route
// Route::get('drink_index', [DrinkController::class, 'index'])->name('drink_index');
// Route::post('drink_store', [DrinkController::class, 'store']);

// Login Route
Route::get('login', [RegisterController::class, 'showLogin'])->name('login');
Route::post('login_form', [RegisterController::class, 'login']);

// Logout Route
Route::get('logout', [RegisterController::class, 'logout'])->name('logout');

// Middleware Route
Route::group(['middleware'=>['isLogin']], function(){
    // Show User Table
Route::get('userTable',[RegisterController::class, 'userList'])->name('userTable');
Route::get('edit/{id}',[RegisterController::class, 'showUser']);
Route::post('edit',[RegisterController::class, 'updateUser']);
Route::get('delete/{id}',[RegisterController::class, 'deleteData']);
 // Role Route
Route::get('role_index', [RoleController::class, 'index'])->name('role_index');
Route::post('role_store', [RoleController::class, 'store']);

// Product Route
Route::get('prod_index', [ProductController::class, 'index'])->name('prod_index');
Route::post('prod_store', [ProductController::class, 'store']);
// Show Product Table
Route::get('productTable',[ProductController::class, 'productList'])->name('productTable');
Route::get('edit/{id}',[ProductController::class, 'showProduct']);
Route::post('edit',[ProductController::class, 'updateUser']);
Route::get('delete/{id}',[ProductController::class, 'deleteProduct']);

// Drink Route
Route::get('drink_index', [DrinkController::class, 'index'])->name('drink_index');
Route::post('drink_store', [DrinkController::class, 'store']);
// Show Drinks
Route::get('drinkTable',[DrinkController::class, 'drinkList'])->name('drinkTable');
Route::get('edit/{id}',[DrinkController::class, 'showDrink']);
Route::post('edit',[DrinkController::class, 'updateDrink']);
Route::get('delete/{id}',[DrinkController::class, 'deleteDrink']);
});


