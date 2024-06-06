<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        return view('layouts.news');         
    }
    public function ThongBao(){
        return view('components.component.ThongBao');
    }
    public function SearchDetail_Tb(Request $request, $id){
        if(!empty($request->id)){
           $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
           return view('components.component.ThongBao', compact('baiviet'));
        }
    }
    public function TinTuc(){
        return view('components.component.TinTuc');
    }
    public function SearchDetail_Tt(Request $request, $id){
        if(!empty($request->id)){
           $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
           return view('components.component.TinTuc', compact('baiviet'));
        }
    }
    
}
