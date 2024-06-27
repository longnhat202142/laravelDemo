<?php

use Illuminate\Support\Facades\Route;
use  App\Models\User;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\TuyenDungController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewDetailsController;
use App\Http\Controllers\Admin\LoaitinController;
use App\Http\Controllers\Admin\ThongBaoController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NhomController;
use App\Http\Controllers\Admin\VaiTroController;
use App\Http\Controllers\Admin\QuyenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Change_passController;
use Illuminate\Support\Facades\DB;

//admin
Route::get('error', function () {
  $code = request()->code;
  return view('admin.error');
})->name('error');
  Route::prefix('admin')->name('admin.')->group(function () {
    
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
    Route::prefix('user')->group(function () {
      Route::get('/',[UserController::class,'index'])->name('user');
      Route::get('/add',[UserController::class,'create'])->name('User.getAdd');
      Route::post('/add',[UserController::class,'store'])->name('User.Add');
      Route::get('/edit/{id}',[UserController::class,'edit'])->name('User.Edit');
      Route::put('/edit/{id}',[UserController::class,'update'])->name('User.Edit');
      Route::get('/role/{id}',[UserController::class,'role'])->name('User.Role');
      Route::get('/delete/{id}',[UserController::class,'destroy'])->name('User.Delete');
    });
    Route::prefix('vaitro')->group(function () {
      Route::get('/',[VaiTroController::class,'index'])->name('vaitro');
      Route::get('/add',[VaiTroController::class,'create'])->name('VaiTro.getAdd');
      Route::post('/add',[VaiTroController::class,'store'])->name('VaiTro.Add');
      Route::get('/edit/{id}',[VaiTroController::class,'edit'])->name('VaiTro.Edit');
      Route::put('/edit/{id}',[VaiTroController::class,'update'])->name('VaiTro.Edit');
      Route::get('/delete/{id}',[VaiTroController::class,'destroy'])->name('VaiTro.Delete');
    });
    Route::prefix('quyen')->group(function () {
      Route::get('/',[QuyenController::class,'index'])->name('quyen');
      Route::get('/add',[QuyenController::class,'create'])->name('Quyen.getAdd');
      Route::post('/add',[QuyenController::class,'store'])->name('Quyen.Add');
      Route::get('/edit/{id}',[QuyenController::class,'edit'])->name('Quyen.Edit');
      Route::put('/edit/{id}',[QuyenController::class,'update'])->name('Quyen.Edit');
      Route::get('/delete/{id}',[QuyenController::class,'destroy'])->name('Quyen.Delete');
    });
    Route::prefix('nhom')->group(function () {
      Route::get('/',[NhomController::class,'index'])->name('nhom');
      Route::get('/add',[NhomController::class,'create'])->name('Nhom.getAdd');
      Route::post('/add',[NhomController::class,'store'])->name('Nhom.Add');
      Route::get('/edit/{id}',[NhomController::class,'edit'])->name('Nhom.Edit');
      Route::put('/edit/{id}',[NhomController::class,'update'])->name('Nhom.Edit');
      Route::get('/delete/{id}',[NhomController::class,'destroy'])->name('Nhom.Delete');
    });
    Route::get('/menu', function(){
        return view('admin.content.menu');
      })->name('menu');
      Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[LoginController::class,'login']);
      Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
      //Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
      Route::post('/register', [RegisterController::class, 'create'])->name('register');
      Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    //đổi mật khẩu 
      Route::post('/change_pass',[Change_passController::class,'check_change_pass']);
      Route::get('/change_pass',[Change_passController::class,'change_pass'])->name('change_pass');
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
// Ðang nh?p v?i tài kho?n CSDL 
// Auth::routes();
Route::get('/',[HomeController::class,'index'])->name('home');
// thông báo
    Route::get('/thongbao', [HomeController::class,'ThongBao'])->name('ThongBao');
    Route::get('/thongbao/{id?}/{cm?}', [HomeController::class,'SearchDetail_Tb'])->name('search_detail_tb');
// end thông báo
//tin tức 
    Route::get('/tintuc', [HomeController::class,'TinTuc'])->name('tintuc');
    Route::get('/tintuc/{id}/{cm?}', [HomeController::class,'SearchDetail_Tt'])->name('search_detail_tt');
//end tin tức 
//đổi mật khẩu 
