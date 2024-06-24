<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(){

        $thongbaoList = DB::table('tintuc')
        ->where('IDLoai','1')
        ->orderBy('NgayTao','DESC')
        ->get();
        $tintucList = DB::table('tintuc')
                ->where('IDLoai','2')
                ->orderBy('NgayTao','DESC')
                ->get();
        return view('components.component.news', compact('thongbaoList', 'tintucList'));     
    }
}
