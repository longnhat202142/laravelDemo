<?php

use Illuminate\Support\Facades\Route;
use  App\Models\User;


use App\Http\Controllers\UserController;
use App\Http\Controllers\TuyenDungController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewDetailsController;
use App\Http\Controllers\Admin\LoaitinController;
use App\Http\Controllers\ThongBaoController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;

//admin
  Route::prefix('admin')->group(function () {
    Route::prefix('thongbao')->group(function () {
      Route::get('/',[ThongBaoController::class,'index'])->name('thongbao');
      Route::get('/add',[ThongBaoController::class,'create'])->name('ThongBao.getAdd');
      Route::post('/add',[ThongBaoController::class,'store'])->name('ThongBao.Add');
      Route::get('/edit/{id}',[ThongBaoController::class,'edit'])->name('ThongBao.Edit');
      Route::put('/edit/{id}',[ThongBaoController::class,'update'])->name('ThongBao.Edit');
      Route::get('/delete/{id}',[ThongBaoController::class,'destroy'])->name('ThongBao.Delete');
    });
    Route::prefix('danhmuc')->group(function () {
      Route::get('/',[DanhMucController::class,'index'])->name('danhmuc');
      Route::get('/add',[DanhMucController::class,'create'])->name('DanhMuc.getAdd');
      Route::post('/add',[DanhMucController::class,'store'])->name('DanhMuc.Add');
      Route::get('/edit/{id}',[DanhMucController::class,'edit'])->name('DanhMuc.Edit');
      Route::put('/edit/{id}',[DanhMucController::class,'update'])->name('DanhMuc.Edit');
      Route::get('/delete/{id}',[DanhMucController::class,'destroy'])->name('DanhMuc.Delete');
    });
    Route::get('/menu', function(){
        return view('admin.content.menu');
      })->name('menu');
      Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[LoginController::class,'login']);
      Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
      Route::post('/register', [RegisterController::class, 'create'])->name('register');
      Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    
  });
  Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
//end admin
Route::get('/footer', function(){
  return view('components.component.footer');
});
Route::get('/header', function(){
  return view('clients.blocks.header');
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
// Auth::routes();
Route::get('/',[UserController::class,'showUser'])->name('home');

// Route::prefix('/loaitin')->name('loaitin.')->group(function(){

//   Route::get('/',[LoaitinController::class,'index'])->name('index');

//   Route::get('/add',[LoaitinController::class,'add'])->name('add');

//   Route::post('/add',[LoaitinController::class,'postAdd'])->name('postAdd');

//   Route::get('/edit/{id}',[LoaitinController::class,'getEdit'])->name('edit');

//   Route::post('/update',[LoaitinController::class,'postEdit'])->name('post-edit');

//    Route::get('/delete/{id}',[LoaitinController::class,'delete'])->name('delete');
// });