<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use DB;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $title='Danh sách menu';
     $menu= Menu::paginate(5)   ;
    
   
      //  $menu= DB::table('menu');
       return view('clients.menu.list',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::all();
        return view('clients.menu.create',compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Menu::create($request->all());
        return redirect()->route('menu.index')->with('thongbao','Thêm thành công');
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
        $menu = Menu::where('IDMenu', $id)->first();
        if(empty($menu)){
            return redirect()->route('menu.index');
        }
        return view('clients.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {   
        $menu=Menu::where('IDMenu', $id)->first();
        $menu->update($request->all());
        return redirect()->route('menu.index')->with('thongbao','Cập nhật thành công!'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu=Menu::where('IDMenu', $id)->first();
        $menu->delete();
        return redirect()->route('menu.index')->with('thongbao','Xóa thành công!');
    }
}
