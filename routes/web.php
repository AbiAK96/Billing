<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SystemUserController; 
use App\Http\Controllers\CustomerInquiryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrganizationController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');
Route::post('forget-password', [AuthController::class, 'forgetPassword'])->name('profile.forgetpassword');
Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout'); 
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); 
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard'); 

    Route::group(['prefix' => 'customerinquiry'], function() {
        Route::get('/', [CustomerInquiryController::class, 'index'])->name('customerinquiry.index');
        Route::post('store', [CustomerInquiryController::class, 'store'])->name('customerinquiry.store');
        Route::post('delete/{id}', [CustomerInquiryController::class, 'destroy'])->name('customerinquiry.delete');   
        Route::put('update/{id}', [CustomerInquiryController::class, 'update'])->name('customerinquiry.update'); 
    });

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::post('store', [CustomerController::class, 'store'])->name('customer.store');
        Route::post('delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');   
        Route::put('update/{id}', [CustomerController::class, 'update'])->name('customer.update'); 
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::post('delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');   
        Route::put('update/{id}', [ProductController::class, 'update'])->name('product.update'); 
    });

    Route::group(['prefix' => 'systemuser'], function() {
        Route::get('/', [SystemUserController::class, 'index'])->name('systemuser.index');
        Route::post('store', [SystemUserController::class, 'store'])->name('systemuser.store');
        Route::post('delete/{id}', [SystemUserController::class, 'destroy'])->name('systemuser.delete');   
        Route::put('update/{id}', [SystemUserController::class, 'update'])->name('systemuser.update'); 
        Route::post('permission', [SystemUserController::class, 'assignPermission'])->name('permission.assign'); 
    });

    Route::group(['prefix' => 'tax'], function() {
        Route::get('/', [TaxController::class, 'index'])->name('tax.index');
        Route::post('store', [TaxController::class, 'store'])->name('tax.store');
        Route::post('delete/{id}', [TaxController::class, 'destroy'])->name('tax.delete');   
        Route::put('update/{id}', [TaxController::class, 'update'])->name('tax.update'); 
    });

    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', [AuthController::class, 'index'])->name('profile.index');
        Route::put('update/{id}', [AuthController::class, 'update'])->name('profile.update');
        Route::put('password/{id}', [AuthController::class, 'changePassword'])->name('profile.password');
    });

    Route::get('appearance', [SettingController::class, 'appearanceIndex'])->name('appearance.index');

    Route::group(['prefix' => 'invoice'], function() {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index');
        Route::get('download', [InvoiceController::class, 'download'])->name('invoice.download');
        Route::post('store', [InvoiceController::class, 'store'])->name('invoice.store');
    });

    Route::group(['prefix' => 'organization'], function() {
        Route::get('/', [OrganizationController::class, 'index'])->name('organization.index');
        Route::put('update/{id}', [OrganizationController::class, 'update'])->name('organization.update');
    });

});
