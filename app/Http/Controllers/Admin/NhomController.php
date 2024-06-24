<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nhom;
use Illuminate\Support\Facades\Auth;
use DB;

class NhomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->nhom = new Nhom();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stt = 1;
        if(!empty($request->text)){
            $text = $request->text;
            $nhomList = $this->nhom->SearchNhom($text);
            return view('admin.content.nhom',compact('nhomList','stt', 'text'));
        }
        $nhomList = $this->nhom->getNhom();
        return view('admin.content.nhom',compact('nhomList','stt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    {
        $request->session()->flash('back_url', route('nhom'));
        $list = $this->nhom->getDetail(0);
        $nhomList = $this->nhom->getNhom();
        return view('admin.Add.nhom', compact('list','nhomList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->Nhom)){
            $data=[
             'nhom' => $request->Nhom,
             'TrangThai' => $request->TrangThai,
             'NgayTao' => now()->format('Y-m-d H:i:s'),
             // 'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            ];
            $this->nhom->AddNhom($data);
            return redirect()->route('nhom');
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
    public function edit( Request $request, $id)
    {
        $request->session()->flash('back_url', route('nhom'));
        $nhomList = $this->nhom->getNhom();
        if(!empty($id)){
            $list = $this->nhom->getDetail($id);
        }else return 'lỗi';
        return view('admin.Add.nhom', compact('list','nhomList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        if(!empty($id)){
            $data = [
                'nhom' => $request->Nhom,
                'TrangThai' =>$request->TrangThai,
                'NgayCapNhat' => now()->format('Y-m-d H:i:s')
            ];
            $this->nhom->UpdateNhom($id,$data);
            return redirect()->route('nhom');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        if(!empty($id)){
            $this->nhom->DeleteNhom($id);
            return redirect()->route('nhom');
        }
    }
}
