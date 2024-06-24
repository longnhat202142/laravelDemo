<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Auth;

use DB;

class ThongBaoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->thongbao = new ThongBao();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stt = 1;
        if(!empty($request->text)){
            $loaitin = $this->thongbao->getLoai();
            $text = $request->text;
            $pag = DB::table('tintuc')->paginate(5);
            $thongbaoList = $this->thongbao->SearchThongBao($text);
            return view('admin.content.thongbao',compact('thongbaoList','stt', 'text','loaitin','pag'));
        }
        if(!empty($request->IDLoai)){
            $loaitin = $this->thongbao->getLoai();
            $pag = DB::table('tintuc')->paginate(5);
            $thongbaoList = $this->thongbao->getLoaiTin($request->IDLoai);
            return view('admin.content.thongbao',compact('thongbaoList','stt','loaitin','pag'));
        }
        $pag = DB::table('tintuc')->paginate(5);
        $thongbaoList = $this->thongbao->getThongBao();
        $loaitin = $this->thongbao->getLoai();
        return view('admin.content.thongbao',compact('thongbaoList','stt','loaitin','pag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->session()->flash('back_url',route('admin.admin.thongbao'));
        $list = $this->thongbao->getDetail(0);
        return view('admin/Add/ThongBao', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->TieuDe) && !empty($request->NoiDung) && !empty($request->TomTat) && $request->hasFile('Anh')){
            //    ảnh
            if(!empty($id)){
                    $Anh = $request->file('Anh');
                    $extensionAnh = $Anh->getClientOriginalExtension();
                    $Anhname = now()->format('dmYHis') .'.'.$extensionAnh;
                    $Anh->move('public/storage/AnhDaiDien/', $Anhname);
                     //    end ảnh
                    $file = $request->file('File');
                    $extension = $file->getClientOriginalExtension();
                    $filename = now()->format('dmYHis') .'.'.$extension;
                    $file->move('public/storage/file/', $filename);
                }
                $data=[
                 'MaTinTuc' => $request->MaTinTuc,
                 'TieuDe' => $request->TieuDe,
                 'TomTat' => $request->TomTat,
                 'NoiDung' => $request->NoiDung,
                 'IDNguoiTao' => Auth::user()->id,
                 'NgayTao' => now()->format('Y-m-d H:i:s'),
                 'TinNong' => $request->TinNong,
                 'TrangThai' => $request->TrangThai,
                 'IDDanhMuc' => $request->IDDanhMuc,
                //  'Anh'=>$Anhname,
                //  'File'=>$filename,
                 'IDLoai' => $request->IDLoai
                ];
                $this->thongbao->AddThongBao($data);
           return redirect()->route('admin.thongbao');
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
        $request->session()->flash('back_url',route('admin.thongbao'));
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
         //    ảnh
         if(!empty($id)){
            if($request->hasFile('Anh')){
                $Anh = $request->file('Anh');
                $extensionAnh = $Anh->getClientOriginalExtension();
                $Anhname = now()->format('dmYHis') .'.'.$extensionAnh;
                $Anh->move('public/storage/AnhDaiDien/', $Anhname);
                 //    end ảnh
            }else $Anhname = $request->img;
            if($request->hasFile('File')){
                $file = $request->file('File');
                $extension = $file->getClientOriginalExtension();
                $filename = now()->format('dmYHis') .'.'.$extension;
                $file->move('public/storage/file/', $filename);
            }else $filename = '';
            $data = [
            'MaTinTuc' => $request->MaTinTuc,
            'TieuDe' => $request->TieuDe,
            'TomTat' => $request->TomTat,
            'NoiDung' => $request->NoiDung,
            'IDNguoiCapNhat' =>Auth::user()->id,
            'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            'TinNong' => $request->TinNong,
            'TrangThai' => $request->TrangThai,
            'IDDanhMuc' => $request->IDDanhMuc,
            'Anh'=>$Anhname,
            'File'=>$filename,
            'IDLoai' => $request->IDLoai
            ];
            $this->thongbao->UpdateThongBao($id,$data);
            return redirect()->route('admin.thongbao');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $this->thongbao->DeleteThongBao($id);
            return redirect()->route('admin.thongbao');
        }
    }
    
}
