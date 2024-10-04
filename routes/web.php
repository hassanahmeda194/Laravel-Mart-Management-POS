<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::redirect('/', '/login');
Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/submit-login', 'submitLogin')->name('submit.login');
    });

Route::middleware('check.auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::controller(BranchController::class)
        ->prefix('Branches')
        ->group(function () {
            Route::get('/', 'index')->name('branch.index');
            Route::post('/store', 'store')->name('branch.store');
            Route::get('/edit', 'edit')->name('branch.edit');
            Route::post('/update/{id}', 'update')->name('branch.update');
            Route::get('/delete/{id}', 'destroy')->name('branch.delete');
        });

    Route::controller(RoleController::class)
        ->prefix('Role')
        ->group(function () {
            Route::get('/', 'index')->name('role.index');
            Route::post('/store', 'store')->name('role.store');
            Route::get('/edit', 'edit')->name('role.edit');
            Route::post('/update/{id}', 'update')->name('role.update');
            Route::get('/delete/{id}', 'destroy')->name('role.delete');
        });
    Route::controller(UserController::class)
        ->prefix('User')
        ->group(function () {
            Route::get('/', 'index')->name('user.index');
            Route::post('/store', 'store')->name('user.store');
            Route::get('/edit', 'edit')->name('user.edit');
            Route::post('/update/{id}', 'update')->name('user.update');
            Route::get('/delete/{id}', 'destroy')->name('user.delete');
        });
    Route::controller(ProfileController::class)
        ->prefix('Profile')
        ->group(function () {
            Route::get('/', 'index')->name('profile.index');
            Route::post('/update/{id}', 'update')->name('profile.update');
        });
    Route::controller(CategoryController::class)
        ->prefix('Category')
        ->group(function () {
            Route::get('/', 'index')->name('category.index');
            Route::post('/store', 'store')->name('category.store');
            Route::get('/edit', 'edit')->name('category.edit');
            Route::post('/update/{id}', 'update')->name('category.update');
            Route::get('/delete/{id}', 'destroy')->name('category.delete');
        });

    Route::controller(BrandController::class)
        ->prefix('Brand')
        ->group(function () {
            Route::get('/', 'index')->name('brand.index');
            Route::post('/store', 'store')->name('brand.store');
            Route::get('/edit', 'edit')->name('brand.edit');
            Route::post('/update/{id}', 'update')->name('brand.update');
            Route::get('/delete/{id}', 'destroy')->name('brand.delete');
        });

    Route::controller(UnitController::class)
        ->prefix('Unit')
        ->group(function () {
            Route::get('/', 'index')->name('unit.index');
            Route::post('/store', 'store')->name('unit.store');
            Route::get('/edit', 'edit')->name('unit.edit');
            Route::post('/update/{id}', 'update')->name('unit.update');
            Route::get('/delete/{id}', 'destroy')->name('unit.delete');
        });

    Route::controller(ProductController::class)
        ->prefix('Product')
        ->group(function () {
            Route::get('/', 'index')->name('product.index');
            Route::post('/store', 'store')->name('product.store');
            Route::get('/edit', 'edit')->name('product.edit');
            Route::post('/update/{id}', 'update')->name('product.update');
            Route::get('/delete/{id}', 'destroy')->name('product.delete');
        });

    Route::view('/POS/', 'pos.index')->name('pos.index');
    Route::get('/search-product', [ProductController::class, 'searchProduct'])->name('search.product');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
