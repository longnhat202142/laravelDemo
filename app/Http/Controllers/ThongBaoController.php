<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Auth;

use DB;

class ThongBaoController extends Controller
{
    public function __construct() {
        $this->thongbao = new ThongBao();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stt = 1;
        if(!empty($request->text)){
            $text = $request->text;
            $thongbaoList = $this->thongbao->SearchThongBao($text);
            return view('admin.content.thongbao',compact('thongbaoList','stt', 'text'));
        }
        $thongbaoList = $this->thongbao->getThongBao();
        return view('admin.content.thongbao',compact('thongbaoList','stt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->session()->flash('back_url', route('thongbao'));
        $list = $this->thongbao->getDetail(0);
        return view('admin/Add/ThongBao', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->TieuDe) &&  !empty($request->NoiDung)){
           $data=[
            'MaTinTuc' => $request->MaTinTuc,
            'TieuDe' => $request->TieuDe,
            'NoiDung' => $request->NoiDung,
            'IDNguoiTao' => Auth::user()->id,
            'NgayTao' => now()->format('Y-m-d H:i:s'),
            'TinNong' => $request->TinNong,
            'IDDanhMuc' => $request->IDDanhMuc,
            'IDLoai' => $request->IDLoai
           ];
           $this->thongbao->AddThongBao($data);
           return redirect()->route('thongbao');
        }
    }

    /**
     * xem trước
     */
    public function show($id)
    {
        if(!empty($id)){
            // $list = $this->thongbao->getDetail($id);
            $thongbaoList = $id;
            return view('admin.content.thongbao', compact('thongbaoList'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $request->session()->flash('back_url', route('thongbao'));
        if(!empty($id)){
            $list = $this->thongbao->getDetail($id);
            // $noidung = $this->thongbao->getNoiDung($id);
        }else return 'lỗi';
        return view('admin/Add/ThongBao', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!empty($id)){
            $data = [
            'MaTinTuc' => $request->MaTinTuc,
            'TieuDe' => $request->TieuDe,
            'NoiDung' => $request->NoiDung,
            'IDNguoiCapNhat' =>Auth::user()->id,
            'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            'TinNong' => $request->TinNong,
            'IDDanhMuc' => $request->IDDanhMuc,
            'IDLoai' => $request->IDLoai
            ];
            $this->thongbao->UpdateThongBao($id,$data);
            return redirect()->route('thongbao');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $this->thongbao->DeleteThongBao($id);
            return redirect()->route('thongbao');
        }
    }
    
}
