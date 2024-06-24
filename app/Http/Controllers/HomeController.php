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
        $title = 'Thông Báo';
        $listDM = DB::table('danhmuc')->get();
        $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
        $list = DB::table('tintuc')->where('IDLoai','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
        return view('components.component.ThongBao',compact('title', 'list','listDM','hotnew'));
    }
    public function SearchDetail_Tb(Request $request, $id){
        if(!empty($request->id)){
            $listDM = DB::table('danhmuc')->get();
            $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
            $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
            $palace = DB::table('danhmuc')->where('IDDanhMuc',$baiviet->IDDanhMuc)->value('TieuDe');
            $user = DB::table('users')->where('id',$baiviet->IDNguoiTao)->value('name');
           return view('components.component.ThongBao', compact('baiviet','user','palace','listDM','hotnew'));
        }
    }
    public function TinTuc(Request $request){
        $title = 'Tin Tức';
        $listDM = DB::table('danhmuc')->get();
        $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
        $list = DB::table('tintuc')->where('IDLoai', '2')->where('TrangThai', '1')->orderBy('NgayTao', 'DESC')->get();
        return view('components.component.TinTuc', compact('title', 'list', 'listDM','hotnew'));
    }
    public function SearchDetail_Tt(Request $request, $id){
        if(!empty($request->id)){
            $listDM = DB::table('danhmuc')->get();
            $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->take(5)->orderBy('NgayTao','DESC')->get();
           $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
           $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
           $palace = DB::table('danhmuc')->where('IDDanhMuc',$baiviet->IDDanhMuc)->value('TieuDe');
           $user = DB::table('users')->where('id',$baiviet->IDNguoiTao)->value('name');
           return view('components.component.TinTuc', compact('baiviet','user','palace','listDM','hotnew'));
        }
    }
    
}
