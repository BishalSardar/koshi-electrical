<?php

use App\Http\Controllers\AdminProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin profile route
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
// admin profile edit route
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
// admin profile update route
Route::post("/admin/profile/update", [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
// admin password edit route
Route::get("/admin/password/edit", [AdminProfileController::class, 'adminPasswordEdit'])->name('admin.password.edit');
// admin password update route
Route::post("/admin/password/update", [AdminProfileController::class, 'adminPasswordUpdate'])->name('admin.password.update');



// product
// product list route
Route::get('/product/index', [ProductController::class, 'productIndex'])->name('product.index');
// product create route
Route::get('/product/create', [ProductController::class, 'productCreate'])->name('product.create');
// product store route
Route::post("/product/store", [ProductController::class, 'productStore'])->name('product.store');
//product edit route
Route::get("/product/edit/{id}", [ProductController::class, 'productEdit'])->name('product.edit');
//product update route
Route::post("/product/update/{id}", [ProductController::class, 'productUpdate'])->name('product.update');
//product delete route
Route::get("/product/delete/{id}", [ProductController::class, 'productDelete'])->name('product.delete');
