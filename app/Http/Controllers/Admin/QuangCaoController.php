<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\quangcao;

class QuangCaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Danh sách quảng cáo";
        $query = quangcao::query();
        if($key = request()->key){
            $query->where('NoiDung','like','%' .$key. '%');
        }
        $quangcao = $query->paginate(4);
        return view('Admin.quangcao',compact('quangcao','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Thêm quảng cáo";
        $quangcao = quangcao::all();
        return view('Admin.quangcao.create',compact('quangcao','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        quangcao::create($request->all());
        return redirect()->route('quangcao.index')->with('thongbao','Thêm thành công');
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
    public function edit(string $id)
    {
        $quangcao = quangcao::where('IDQuangCao', $id)->first();
        if(empty($quangcao)){
            return redirect()->route('quangcao.index');
        }
        return view('Admin.quangcao.edit',compact('quangcao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quangcao=quangcao::where('IDQuangCao', $id)->first();
        $quangcao->update($request->all());
        $title="Danh sách quảng cáo";
        return redirect()->route('quangcao.index',compact('title'))->with('thongbao','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quangcao=quangcao::where('IDQuangCao', $id)->first();
        $quangcao->delete();
       // return redirect()->route('quangcao.index')->with('thongbao','Xóa thành công!');
    }
}
