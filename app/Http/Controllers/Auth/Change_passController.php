<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Change_passController extends Controller
{
  
    public function change_pass(){
      return view('auth.change_pass');
       
    }
    public function check_change_pass(Request $request){
      $auth = auth()->user();
        $request->validate([
          'old_password' => ['required',function($attribute,$value,$fail) use($auth){
            
              if(!Hash::check($value,$auth->password)){
                $fail('Sai mật khẩu !');
              }
          }],
          'password' => 'required|min:4',
          'confirm_password' => 'required|same:password'
        ],['confirm_password.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu mới.']);
       $data['password'] = bcrypt($request->password) ;
       if($auth->update($data)){
        return redirect()->route('admin.logout');
        
       }
        
    }
}
