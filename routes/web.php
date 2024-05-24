<?php

use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TuyenDungController;

use App\Http\Controllers\NewController;
use App\Http\Controllers\NewDetailsController;
use App\Http\Controllers\Admin\LoaitinController;
use Illuminate\Support\Facades\DB;


Route::prefix('admin')->group(function () {
  Route::get('/thongbao', function(){
    return view('admin.content.thongbao');
  })->name('admin');
  Route::get('/add', function(){
    return view('admin.add');
  })->name('admin.add');
});
Route::get('/footer', function(){
  return view('components.component.footer');
});

Route::get('/thongbao', function(){
  return view('components.component.ThongBao');
});
Route::get('/tuyendung', function(){
  return view('components.component.TuyenDung');
});
Route::get('/video', function(){
  return view('components.component.Video');
});
Route::get('/mota', function(){
  return view('components.component.MoTa');
});
Route::get('/test',[TestController::class, 'test2'])->name('test');

// Bài 2: Client Routes
Route::prefix('category')->group(function(){

    // Danh sách chuyên m?c
    Route::get('/',[CategoryController::class,'index'])->name('category.list');

    // L?y chi ti?t 1 chuyên m?c (áp d?ng show form s?a chuyên m?c)
    Route::get('/edit/{id}',[CategoryController::class,'getCategory'])->name('category.edit');

    // X? lí update
    Route::post('/edit/{id}',[CategoryController::class,'updateCategory']);

    // Hi?n th? form add d? li?u
    Route::get('/add',[CategoryController::class,'addCategory'])->name('category.add');

    // X? lí thêm chuyên m?c
    Route::post('/add',[CategoryController::class,'handleAddCategory']);

    // Xoá chuyên m?c
    Route::delete('/delete/{id}',[CategoryController::class,'deleteCategory'])->name('category.delete');
});

//Admin Routes
Route::middleware('auth.admin')->prefix('admin')->group(function(){ 

  Route::get('/',[DashboardController::class,'index']);
  Route::resource('products',ProductController::class)->middleware('auth.admin.product');
});


// Blade Template - phan 1
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('tuyendung',[TuyenDungController::class,'index'])->name('tuyendung');


Route::get('/san-pham',[HomeController::class,'products'])->name('sp');

Route::get('/them-san-pham' , [HomeController::class,'getAdd']);

// Route::post('/user/{id}',[HomeController::class,'postAdd']);

Route::put('/them-san-pham',[HomeController::class,'putAdd']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route ngu?i dùng
Route::prefix('users')->group(function(){
  Route::get('/',[UserController::class,'index']);
  
});

Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::post('/login',[UserController::class,'login']);

Route::get('/news',[NewController::class,'index'])->name('news');
Route::get('/new-details',[NewDetailsController::class,'index'])->name('newdetails');


// Ðang nh?p v?i tài kho?n CSDL 

Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::post('/login',[UserController::class,'login']);



Route::prefix('/loaitin')->name('loaitin.')->group(function(){

  Route::get('/',[LoaitinController::class,'index'])->name('index');

  Route::get('/add',[LoaitinController::class,'add'])->name('add');

  Route::post('/add',[LoaitinController::class,'postAdd'])->name('postAdd');

  Route::get('/edit/{id}',[LoaitinController::class,'getEdit'])->name('edit');

  Route::post('/update',[LoaitinController::class,'postEdit'])->name('post-edit');

   Route::get('/delete/{id}',[LoaitinController::class,'delete'])->name('delete');
});