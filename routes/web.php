<?php

use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\NewController;
use App\Http\Controllers\NewDetailsController;
use App\Http\Controllers\Admin\LoaitinController;
use Illuminate\Support\Facades\DB;

// Bài 2: Client Routes
Route::prefix('category')->group(function(){

    // Danh sách chuyên mục
    Route::get('/',[CategoryController::class,'index'])->name('category.list');

    // Lấy chi tiết 1 chuyên mục (áp dụng show form sửa chuyên mục)
    Route::get('/edit/{id}',[CategoryController::class,'getCategory'])->name('category.edit');

    // Xử lí update
    Route::post('/edit/{id}',[CategoryController::class,'updateCategory']);

    // Hiển thị form add dữ liệu
    Route::get('/add',[CategoryController::class,'addCategory'])->name('category.add');

    // Xử lí thêm chuyên mục
    Route::post('/add',[CategoryController::class,'handleAddCategory']);

    // Xoá chuyên mục
    Route::delete('/delete/{id}',[CategoryController::class,'deleteCategory'])->name('category.delete');
});

//Admin Routes
Route::middleware('auth.admin')->prefix('admin')->group(function(){ 

  Route::get('/',[DashboardController::class,'index']);
  Route::resource('products',ProductController::class)->middleware('auth.admin.product');
});


// Blade Template - phan 1
Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('/san-pham',[HomeController::class,'products'])->name('sp');

Route::get('/them-san-pham' , [HomeController::class,'getAdd']);

// Route::post('/user/{id}',[HomeController::class,'postAdd']);

Route::put('/them-san-pham',[HomeController::class,'putAdd']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route người dùng
Route::prefix('users')->group(function(){
  Route::get('/',[UserController::class,'index']);
  
});

Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::post('/login',[UserController::class,'login']);

Route::get('/news',[NewController::class,'index'])->name('news');
Route::get('/new-details',[NewDetailsController::class,'index'])->name('newdetails');


// Đăng nhập với tài khoản CSDL 

Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::post('/login',[UserController::class,'login']);



Route::prefix('/loaitin')->name('loaitin.')->group(function(){

  Route::get('/',[LoaitinController::class,'index'])->name('index');

  Route::get('/add',[LoaitinController::class,'add'])->name('add');

  Route::post('/add',[LoaitinController::class,'postAdd'])->name('postAdd');

  Route::get('/edit/:{IDLoai}',[LoaitinController::class,'getEdit'])->name('edit');

  Route::post('/edit/:{id}',[LoaitinController::class,'postEdit'])->name('post-edit');
});