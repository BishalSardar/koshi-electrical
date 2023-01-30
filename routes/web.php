<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierBillController;
use App\Http\Controllers\SupplierController;

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


// customer
// customer list route
Route::get('/customer/index', [CustomerController::class, 'customerIndex'])->name('customer.index');
// customer create route
Route::get('/customer/create', [CustomerController::class, 'customerCreate'])->name('customer.create');
// customer store route
Route::post("/customer/store", [CustomerController::class, 'customerStore'])->name('customer.store');
//customer edit route
Route::get("/customer/edit/{id}", [CustomerController::class, 'customerEdit'])->name('customer.edit');
//customer update route
Route::post("/customer/update/{id}", [CustomerController::class, 'customerUpdate'])->name('customer.update');
// customer delete route
Route::get("/customer/delete/{id}", [CustomerController::class, 'customerDelete'])->name('customer.delete');
// customer profile page route
Route::get('/customer/profile/{id}', [CustomerController::class, 'customerProfile'])->name('customer.profile');



// supplier
// supplier list route
Route::get("/supplier/index", [SupplierController::class, 'supplierIndex'])->name('supplier.index');
//supplier list route
Route::get("/product/get", [ProductController::class, 'productGet'])->name('supplier.get');
//supplier post route
Route::post("/product/post", [ProductController::class, 'productPost'])->name('supplier.post');
//supplier edit route
Route::get("/supplier/create", [SupplierController::class, 'supplierCreate'])->name('supplier.create');
//supplier store route
Route::post("/supplier/store", [SupplierController::class, 'supplierStore'])->name('supplier.store');
//supplier edit route
Route::get("/supplier/edit/{id}", [SupplierController::class, 'supplierEdit'])->name('supplier.edit');
//supplier update route
Route::post("/supplier/update/{id}", [SupplierController::class, 'supplierUpdate'])->name('supplier.update');
//supplier delete route
Route::get("/supplier/delete/{id}", [SupplierController::class, 'supplierDelete'])->name('supplier.delete');
// supplier profile page route
Route::get('/supplier/profile/{id}', [SupplierController::class, 'supplierProfile'])->name('supplier.profile');



// supplier bill
// supplier bill index page route
Route::get('/supplier-bill/index', [SupplierBillController::class, 'supplierBillIndex'])->name('supplier-bill.index');
// supplier create page route
Route::get('/supplier-bill/create', [SupplierBillController::class, 'supplierBillCreate'])->name('supplier-bill.create');
// supplier post route
Route::post("/supplier-bill/store", [SupplierBillController::class, 'supplierBillStore'])->name('supplierBill.store');
// supplier bill page route
Route::get('/supplier-bill/profile/{id}', [SupplierBillController::class, 'supplierBillProfile'])->name('supplier-bill.profile');
// supplier bill delete
Route::get('/supplier-bill/delete/{id}', [SupplierBillController::class, 'supplierBillDelete'])->name('supplier-bill.delete');



// stock
// stock index page route
Route::get('/stock/index', [StockController::class, 'stockIndex'])->name('stock.index');
