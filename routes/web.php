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


// Bài 1
// Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/tintuc','App\Http\Controllers\HomeController@getNews')->name('news');
// Route::get('/chuyen-muc/{id}',[HomeController::class,'getCategory']);

// Route::prefix('admin')->middleware('checkpermission')->group(function(){
//     Route::get('home' ,function(){
//     return view('home');
//     });
//     Route::get('show-form',function(){
//         return view('form');
//     })->name('admin.show-form');

//     Route::get('show/{slug}-{id}.html', function($slug,$id){
//         $content ='Phuong thuc tham so :';
//         $content.='id ='.$id.'<br/>';
//         $content.='slug ='.$slug;
//         return $content;
//     })->where(
//         [
//         'slug' =>'.+',
//         'id' =>'[0-9]+'
//     ]
// );

//     Route::prefix('product')->group(function(){
//         Route::get('add',function(){
//             return 'them san pham';
//         });
//         Route::get('delete',function(){
//             return 'xoa san pham';
//         });
//     });
   
    

// });


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