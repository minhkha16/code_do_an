<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Login_adminController;
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

Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('shopcategory', [HomeController::class, 'shopcategory'])->name('shopcategory');
Route::get('productdetails', [HomeController::class, 'productdetails'])->name('productdetails');
Route::get('confirmation', [HomeController::class, 'confirmation'])->name('confirmation');
Route::get('shopingcart', [HomeController::class, 'shopingcart'])->name('shopingcart');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('sinup', [LoginController::class, 'sinup'])->name('sinup');


Route::get('login_admin', [Login_adminController::class, 'login_admin'])->name('login_admin');
Route::post('postlogin_admin', [Login_adminController::class, 'postlogin_admin'])->name('postlogin_admin');
Route::get('logout_admin', [Login_adminController::class, 'logout_admin'])->name('logout_admin');


Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('create', [CateController::class, 'create'])->name('create');
        Route::post('stote', [CateController::class, 'store'])->name('store');
        Route::get('index', [CateController::class, 'index'])->name('index');
        Route::post('update/{id}', [CateController::class, 'update'])->name('update')->where('id', '[0-9]+');
        Route::get('edit/{id}', [CateController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
        Route::get('delete/{id}', [CateController::class, 'delete'])->name('delete')->where('id', '[0-9]+');

    });
    Route::prefix('product')->name('product.')->group(function(){
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('stote', [ProductController::class, 'store'])->name('store');
        Route::get('index', [ProductController::class, 'index'])->name('index');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update')->where('id', '[0-9]+');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete')->where('id', '[0-9]+');
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('index',[UserController::class,'index'])->name('index');
        Route::get('create',[UserController::class,'create'])->name('create');
        Route::post('store',[UserController::class,'store'])->name('store');
        Route::get('edit/{id}',[UserController::class,'edit'])->name('edit')->where('id','[0-9]+');
        Route::post('update/{id}',[UserController::class,'update'])->name('update')->where('id','[0-9]+');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('delete')->where('id','[0-9]+');
    });
});
