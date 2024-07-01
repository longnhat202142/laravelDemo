<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Auth;
use DB;

class DanhMucController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->danhmuc = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stt = 1;
        if(!empty($request->text)){
            $text = $request->text;
            $danhmucList = $this->danhmuc->SearchDanhMuc($text);
            return view('admin.content.danhmuc',compact('danhmucList','stt', 'text'));
        }
        $danhmucList = $this->danhmuc->getDanhMuc();
        return view('admin.content.danhmuc',compact('danhmucList','stt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->session()->flash('back_url', route('admin.danhmuc'));
        $list = $this->danhmuc->getDetail(0);
        $danhmucList = $this->danhmuc->getDanhMucCha(0);
        return view('admin.Add.DanhMuc', compact('list','danhmucList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->TieuDe) &&  !empty($request->MaDanhMuc)){
            $data=[
             'MaDanhMuc' => $request->MaDanhMuc,
             'TieuDe' => $request->TieuDe,
             'IDCha' => $request->IDCha,
             'TrangThai' => $request->TrangThai,
             'ThuTuHienThi' => $request->ThuTuHienThi,
             'IDNguoiTao' => Auth::user()->id,
             'NgayTao' => now()->format('Y-m-d H:i:s'),
             // 'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            ];
            $this->danhmuc->AddDanhMuc($data);
            return redirect()->route('admin.danhmuc');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $request->session()->flash('back_url', route('admin.danhmuc'));
        $danhmucList = $this->danhmuc->getDanhMucCha($id);
        if(!empty($id)){
            $list = $this->danhmuc->getDetail($id);
        }else return 'lỗi';
        return view('admin.Add.DanhMuc', compact('list','danhmucList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!empty($id)){
            $data = [
                'MaDanhMuc' => $request->MaDanhMuc,
                'TieuDe' => $request->TieuDe,
                'IDCha' => $request->IDCha,
                'TrangThai' =>$request->TrangThai,
                'ThuTuHienThi' => $request->ThuTuHienThi,
                'IDNguoiCapNhat' => Auth::user()->id,
                'NgayCapNhat' => now()->format('Y-m-d H:i:s')
            ];
            $this->danhmuc->UpdateDanhMuc($id,$data);
            return redirect()->route('admin.danhmuc');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $this->danhmuc->DeleteDanhMuc($id);
            return redirect()->route('admin.danhmuc');
        }
    }
}
