<?php

use Illuminate\Support\Facades\Route;
use  App\Models\User;


use App\Http\Controllers\UserController;
use App\Http\Controllers\TuyenDungController;
use App\Http\Controllers\MenuController;
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


// Route ngu?i dùng
Route::prefix('users')->group(function(){
  Route::get('/',[UserController::class,'index']);
  
});


Route::get('/news',[NewController::class,'index'])->name('news');
Route::get('/new-details',[NewDetailsController::class,'index'])->name('newdetails');


// Ðang nh?p v?i tài kho?n CSDL 
Auth::routes();

Route::get('/home',[UserController::class,'showUser'])->name('home');

Route::prefix('/loaitin')->name('loaitin.')->group(function(){

  Route::get('/',[LoaitinController::class,'index'])->name('index');

  Route::get('/add',[LoaitinController::class,'add'])->name('add');

  Route::post('/add',[LoaitinController::class,'postAdd'])->name('postAdd');

  Route::get('/edit/{id}',[LoaitinController::class,'getEdit'])->name('edit');

  Route::post('/update',[LoaitinController::class,'postEdit'])->name('post-edit');

   Route::get('/delete/{id}',[LoaitinController::class,'delete'])->name('delete');
});