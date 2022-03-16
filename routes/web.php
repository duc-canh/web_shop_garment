<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/',[WebController::class,'home'])->name('home'); 

Route::get('detail/{slug}',[WebController::class,'detail'])->name('web.detail');

Route::post('detail/comment/{id}',[WebController::class, 'comment'])->name('web.detail.comment');

Route::get('login',[WebController::class,'loginform'])->name('web.loginform');

Route::post('login',[WebController::class,'login'])->name('web.login');

Route::post('register',[WebController::class,'register'])->name('web.register');

Route::get('cart',[WebController::class,'cart'])->name('web.cart');

Route::get('/AddCart/{id}',[WebController::class,'AddCart'])->name('web.cart.addCart');

Route::get('/Delete-Item-Cart/{id}',[WebController::class,'DeleteItemCart'])->name('web.cart.DeleteItemCart');

Route::get('/Save-Item-Cart/{id}/{quanty}',[WebController::class,'SaveItemCart'])->name('web.cart.DeleteItemCart');



// Route::get('/Delete-Item-List-Cart/{id}',[WebController::class,'DeleteItemListCart'])->name('web.cart.DeleteItemCart');

Route::get('checkout',[WebController::class,'checkout'])->name('web.checkout');




Route::prefix('admin')->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('admin.auth.login');

    Route::post('login',[AuthController::class,'checkLogin'])->name('admin.auth.check-login');
});

Route::prefix('admin')->middleware('admin.login')->group(function(){

    Route::get('logout',[AuthController::class,'logout'])->name('admin.logout');

    Route::get('profile',[AuthController::class,'profile'])->name('admin.profile.index');
    Route::put('profile',[AuthController::class,'updateProfile'])->name('admin.profile.update');

    Route::prefix('category')->group(function(){
        Route::get('',[CategoryController::class,'list'])->name('admin.category.list');

        Route::get('create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');

        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('update/{id}',[CategoryController::class,'update'])->name('admin.category.update');

        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });

    Route::prefix('product')->group(function(){
        Route::get('',[ProductController::class,'list'])->name('admin.product.list');

        Route::get('create',[ProductController::class,'create'])->name('admin.product.create');
        Route::post('store',[ProductController::class,'store'])->name('admin.product.store');

        Route::get('edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::put('update/{id}',[ProductController::class,'update'])->name('admin.product.update');

        Route::get('delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
    });

    Route::prefix('user')->group(function(){
        Route::get('',[UserController::class,'list'])->name('admin.user.list');

        Route::get('create',[UserController::class,'create'])->name('admin.user.create');
        Route::post('store',[UserController::class,'store'])->name('admin.user.store');

        Route::get('edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
        Route::put('update/{id}',[UserController::class,'update'])->name('admin.user.update');

        Route::get('delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
    });

    Route::get('contact',[ContactController::class,'list'])->name('admin.contact.list');

    Route::get('order',[OrderController::class,'list'])->name('admin.order.list');
});

