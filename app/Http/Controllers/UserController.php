<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $username = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('nguoidung')
            ->where('tendangnhap', $username)
            ->where('matkhau', $password)
            ->first();

        if ($user) {
            // Authentication passed
            return redirect()->intended('/'); // Redirect authenticated user to homepage
        } else {
            // Authentication failed
          

            return redirect()->back()->withInput()->withErrors(['username' => 'Username or password is incorrect']);
        }
    }
}
