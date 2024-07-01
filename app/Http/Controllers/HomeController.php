<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = DB::table('danhmuc')->get();
        return view('layouts.news',compact('data'));      
    }
    public function ThongBao(Request $request){
        $title = 'Thông Báo';
        $url = $request->url();
        $listDM = DB::table('danhmuc')->get();
        $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
        $list = DB::table('tintuc')->where('IDLoai','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
        return view('components.component.ThongBao',compact('title', 'list','listDM','hotnew', 'url'));
    }
    public function ChuyenMuc(){
       
    }
    public function SearchDetail_Tb(Request $request, $id = null, $ChuyenMuc = null){
        $url = $request->url();
        if(!empty($request->ChuyenMuc)){
            $listDM = DB::table('danhmuc')->get();
            $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
            // $listTb = DB::table('tintuc')->where('IDLoai','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
            $list = DB::table('tintuc')
                    ->where('IDLoai','1')
                    ->where('TrangThai', '1')
                    ->where('IDDanhMuc', $request->ChuyenMuc)
                    ->orderBy('NgayTao','DESC')->get();
            foreach($listDM as $item){
                if($item->IDCha == $request->ChuyenMuc){
                    $list = DB::table('tintuc')
                    ->where('IDLoai','1')
                    ->where('TrangThai', '1')
                    ->whereIn('IDDanhMuc', [$request->ChuyenMuc, $item->IDDanhMuc])
                    ->orderBy('NgayTao','DESC')->get();
                }
            }
            return view('components.component.ThongBao',compact('list','listDM','hotnew','url'));
        }
        if(!empty($request->id)){
            $listDM = DB::table('danhmuc')->get();
            $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
            $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
            $palace = DB::table('danhmuc')->where('IDDanhMuc',$baiviet->IDDanhMuc)->value('TieuDe');
            $user = DB::table('users')->where('id',$baiviet->IDNguoiTao)->value('name');
           return view('components.component.ThongBao', compact('baiviet','user','palace','listDM','hotnew','url'));
        }
    }
    public function TinTuc(Request $request){
        $title = 'Tin Tức';
        $url = $request->url();
        $listDM = DB::table('danhmuc')->get();
        $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
        $list = DB::table('tintuc')->where('IDLoai', '2')->where('TrangThai', '1')->orderBy('NgayTao', 'DESC')->get();
        return view('components.component.TinTuc', compact('title', 'list', 'listDM','hotnew','url'));
    }
    public function SearchDetail_Tt(Request $request, $id = null, $ChuyenMuc = null){
        $url = $request->url();
        if(!empty($request->ChuyenMuc)){
            $listDM = DB::table('danhmuc')->get();
            $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->orderBy('NgayTao','DESC')->get();
           $list = DB::table('tintuc')
                    ->where('IDLoai','2')
                    ->where('TrangThai', '1')
                    ->where('IDDanhMuc', $request->ChuyenMuc)
                    ->orderBy('NgayTao','DESC')->get();
            foreach($listDM as $item){
                if($item->IDCha == $request->ChuyenMuc){
                    $list = DB::table('tintuc')
                    ->where('IDLoai','2')
                    ->where('TrangThai', '1')
                    ->whereIn('IDDanhMuc', [$request->ChuyenMuc, $item->IDDanhMuc])
                    ->orderBy('NgayTao','DESC')->get();
                }
            }
            return view('components.component.TinTuc',compact('list','listDM','hotnew','url'));
        }
        if(!empty($request->id)){
            $listDM = DB::table('danhmuc')->get();
            $hotnew = DB::table('tintuc')->where('TinNong','1')->where('TrangThai', '1')->take(5)->orderBy('NgayTao','DESC')->get();
           $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
           $baiviet = DB::table('tintuc')->where('IdTinTuc', $request->id)->first();
           $palace = DB::table('danhmuc')->where('IDDanhMuc',$baiviet->IDDanhMuc)->value('TieuDe');
           $user = DB::table('users')->where('id',$baiviet->IDNguoiTao)->value('name');
           return view('components.component.TinTuc', compact('baiviet','user','palace','listDM','hotnew','url'));
        }
    }
    
}
