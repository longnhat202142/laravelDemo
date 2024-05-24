<?php

use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
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

