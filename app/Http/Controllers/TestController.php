<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function test(Request $request){
        $query = DB::table('danhmuc')->get();
        return view('test', compact('query'));
        
    }
    public function test2(Request $request){
       $title = $request->input('tieude');
       return view('admin.add', compact('title'));
    }
}
