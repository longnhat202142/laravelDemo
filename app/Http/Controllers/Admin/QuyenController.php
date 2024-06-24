<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quyen;
use Illuminate\Support\Facades\Auth;
use DB;

class QuyenController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->quyen = new Quyen();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stt = 1;
        if(!empty($request->text)){
            $text = $request->text;
            $quyenList = $this->Quyen->SearchQuyen($text);
            return view('admin.content.quyen',compact('quyenList','stt', 'text'));
        }
        $quyenList = $this->quyen->getQuyen();
        return view('admin.content.quyen',compact('quyenList','stt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    {
        $request->session()->flash('back_url', route('quyen'));
        $list = $this->quyen->getDetail(0);
        $quyenList = $this->quyen->getQuyen();
        return view('admin.Add.Quyen', compact('list','quyenList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->Quyen)){
            $data=[
             'Quyen' => $request->Quyen,
             'TrangThai' => $request->TrangThai,
             'NgayTao' => now()->format('Y-m-d H:i:s'),
             // 'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            ];
            $this->quyen->AddQuyen($data);
            return redirect()->route('quyen');
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
        $request->session()->flash('back_url', route('quyen'));
        $quyenList = $this->quyen->getQuyen();
        if(!empty($id)){
            $list = $this->quyen->getDetail($id);
        }else return 'lỗi';
        return view('admin.Add.Quyen', compact('list','quyenList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        if(!empty($id)){
            $data = [
                'Quyen' => $request->Quyen,
                'TrangThai' =>$request->TrangThai,
                'NgayCapNhat' => now()->format('Y-m-d H:i:s')
            ];
            $this->quyen->UpdateQuyen($id,$data);
            return redirect()->route('quyen');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        if(!empty($id)){
            $this->quyen->DeleteQuyen($id);
            return redirect()->route('quyen');
        }
    }
}
