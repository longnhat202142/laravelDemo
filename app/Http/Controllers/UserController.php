<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    public function index(){
        $title = 'Danh sách người dùng';
        return view('clients.user.list',compact('title'));
    }
    public function showlogin(){
        return view('clients.user.login');
    }
    public function login(Request $request){
         $TenDangNhap = $request->TenDangNhap; 
         $MatKhau = $request->input('MatKhau');

         $password = Hash::make('MatKhau');
      
        
        
         if(Auth::attempt(['TenDangNhap'=>$TenDangNhap ,'MatKhau'=>$MatKhau, 'password'=>$password])){
            echo 'Đăng nhập thành công';
        }
        else
            echo 'Đăng nhập thất bại';
    
        
    }


    public function showUser(){
        return view('clients.news');
    }

}
