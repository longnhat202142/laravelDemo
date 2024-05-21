<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function test(){
        $query = DB::table('danhmuc')->get();
        return view('test', compact('query'));
    }
    public function test2(Request $request){
       if($request->has($request->input('noidung'))){
        print_r($request->input('noidung'));
       }
    }
}
