<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CustomerBillController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegularBillController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierBillController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarrantyGuaranteeClaimController;
use App\Http\Controllers\WarrantyGuaranteeController;
use App\Models\Customer;

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



// regular bill
// regular bill index page
Route::get('/regular-bill/index', [RegularBillController::class, 'regularBillIndex'])->name('regularBill.index');
// regular bill create page
Route::get('/regular-bill/create', [RegularBillController::class, 'regularBillCreate'])->name('regularBill.create');
// regular bill store post route
Route::post("/regular-bill/store", [RegularBillController::class, 'regularBillStore'])->name('regularBill.store');
// regular bill page route
Route::get('/regular-bill/profile/{id}', [RegularBillController::class, 'regularBillProfile'])->name('regularBill.profile');



// category
// category list route
Route::get('/category/index', [CategoryController::class, 'categoryIndex'])->name('category.index');
// category create route
Route::get('/category/create', [CategoryController::class, 'categoryCreate'])->name('category.create');
// category store route
Route::post("/category/store", [CategoryController::class, 'categoryStore'])->name('category.store');
//category edit route
Route::get("/category/edit/{id}", [CategoryController::class, 'categoryEdit'])->name('category.edit');
// category update route
Route::post("/category/update/{id}", [CategoryController::class, 'categoryUpdate'])->name('category.update');
// category delete route
Route::get("/category/delete/{id}", [CategoryController::class, 'categoryDelete'])->name('category.delete');






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



// warranty_guarantee
// warranty_guarantee list route
Route::get('/warranty_guarantee/index', [WarrantyGuaranteeController::class, 'warrantyGuaranteeIndex'])->name('warranty.guarantee.index');
// warranty_guarantee create page route
Route::get('/warranty_guarantee/create', [WarrantyGuaranteeController::class, 'warrantyGuaranteeCreate'])->name('warranty.guarantee.create');
// warranty_guarantee store route
Route::post('warranty_guarantee/store', [WarrantyGuaranteeController::class, 'warrantyGuaranteeStore'])->name('warranty.guarantee.store');
// warranty_guarantee edit page
Route::get("/warranty_guarantee/edit/{id}", [WarrantyGuaranteeController::class, 'warrantyGuaranteeEdit'])->name('warranty.guarantee.edit');
//warranty_guarantee update route
Route::post("/warranty_guarantee/update/{id}", [WarrantyGuaranteeController::class, 'warrantyGuaranteeUpdate'])->name('warranty.guarantee.update');



// warranty_guarantee claim
Route::get('/warranty_guarantee_claim/index', [WarrantyGuaranteeClaimController::class, 'warrantyGuaranteeClaimIndex'])->name('warranty.guarantee.claim.index');
// warranty_guarantee customer search
Route::get('/warranty_guarantee_claim/customer_search_page', [WarrantyGuaranteeClaimController::class, 'warrantyGuaranteeCustomerSearchPage'])->name('warranty.guarantee.customer.search.page');
// warranty_guarantee customer result page
Route::post('/warranty_guarantee_claim/customer_search_claim', [WarrantyGuaranteeClaimController::class, 'warrantyGuaranteeCustomerSearchClaim'])->name('warranty.guarantee.customer.search.claim');
// warranty_guarantee claim
// Route::post("/warranty_guarantee_customer_claim", [WarrantyGuaranteeClaimController::class, 'claim'])->name('warranty.guarantee.customer.claim');

// warranty_guarantee regular search
Route::get('/warranty_guarantee_claim/regular_search_page', [WarrantyGuaranteeClaimController::class, 'warrantyGuaranteeRegularSearchPage'])->name('warranty.guarantee.regular.search.page');









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
// customer change status
Route::get('/customer/status/{id}', [CustomerController::class, 'customerStatus'])->name('customer.change.status');



// customer bill
// customer bill page route
Route::get('/customer-bill/index', [CustomerBillController::class, 'customerBillIndex'])->name('customerBill.index');
// customer bill create page route
Route::get('/customer-bill/create', [CustomerBillController::class, 'customerBillCreate'])->name('customerBill.create');
// customer bill store post route
Route::post("/customer-bill/store", [CustomerBillController::class, 'customerBillStore'])->name('customerBill.store');
// customer bill delete
Route::get("/customer-bill/delete/{id}", [CustomerBillController::class, 'customerBillDelete'])->name('customerBill.delete');
// customer bill page route
Route::get('/customer-bill/profile/{id}', [CustomerBillController::class, 'customerBillProfile'])->name('customerBill.profile');
// customer bill status change
Route::get('/customer-bill/change/status/{id}', [CustomerBillController::class, 'customerBillChangeStatus'])->name('customerBill.change.status');







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
// admin - stock selling price edit route
Route::get('/stock/edit/{id}', [StockController::class, 'stockEdit'])->name('stock.edit');
// admin - stock selling price update route
Route::post('/stock/update/{id}', [StockController::class, 'stockUpdate'])->name('stock.update');



// contracts
// contracts index page route 
Route::get('/contract/index', [ContractController::class, 'contractIndex'])->name('contract.index');
// contracts create page route
Route::get('/contract/create', [ContractController::class, 'contractCreate'])->name('contract.create');
// contracts store route
Route::post("/contract/store", [ContractController::class, 'contractStore'])->name('contract.store');
// contract edit page route
Route::get('/contract/edit/{id}', [ContractController::class, 'contractEdit'])->name('contract.edit');
// contract update route
Route::post("/contract/update/{id}", [ContractController::class, 'contractUpdate'])->name('contract.update');
// contract delete route
Route::get("/contract/delete/{id}", [ContractController::class, 'contractDelete'])->name('contract.delete');
// contract change status
Route::get('/contract/status/{id}', [ContractController::class, 'contractStatus'])->name('contract.change.status');
// contract profile
Route::get('/contract/profile/{id}', [ContractController::class, 'contractProfile'])->name('contract.profile');
