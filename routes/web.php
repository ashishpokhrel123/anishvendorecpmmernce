<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[AdminController::class,'index']);
Route::get('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function()
{
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/banner',[BannerController::class,'index']);
    Route::get('admin/vendor',[VendorController::class,'adminvendor']);
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::post('admin/category',[CategoryController::class,'insert'])->name('category.store');
    Route::get('admin/category',[CategoryController::class,'showCategory']);
    Route::get('del-category/{id}',[CategoryController::class,'delCategory']);
    Route::get('edit-category/{id}',[CategoryController::class,'editCategory']);
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('category.update');
    Route::get('status/{id}',[VendorController::class,'status'])->name('status');
    Route::get('admin/logout',[AdminController::class,'logout']);
       
  
});

Route::get('register',[UserController::class,'index']);
Route::post('register',[UserController::class,'register'])->name('register');
Route::get('user',[UserController::class,'log']);
Route::post('user',[UserController::class,'login'])->name('login');
Route::group(['middleware'=>'user_auth'],function()
{
    Route::get('user/userdash',[UserController::class,'dashboard']);
    Route::get('user/logout',[UserController::class,'logout']);
    
   
});


Route::get('vendor',[VendorController::class,'index']);
Route::get('vendor/register',[VendorController::class,'reg']);
Route::post('vendor/register',[VendorController::class,'register'])->name('register');

Route::post('vendor',[VendorController::class,'login'])->name('login');
Route::group(['middleware'=>'vendor_auth'],function ()
{
    Route::get('vendor/vendordash',[VendorController::class,'dashboard']);
    Route::get('vendor/products',[ProductsController::class,'index']);
    Route::post('vendor/products',[ProductsController::class,'insertProduct'])->name('product.insert');
    Route::get('vendor/showproducts',[ProductsController::class,'showProducts']);
    Route::get('vendor/logout',[VendorController::class,'logout'] );
       
 
});

