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


Route::get('/', function(){
  return view('components.component.footer');
});