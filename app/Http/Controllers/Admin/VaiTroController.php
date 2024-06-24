<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use DB;

class VaiTroController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->vaitro = new VaiTro();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stt = 1;
        if(!empty($request->text)){
            $text = $request->text;
            $vaitroList = $this->vaitro->SearchVaiTro($text);
            return view('admin.content.vaitro',compact('vaitroList','stt', 'text'));
        }
        $vaitroList = $this->vaitro->getVaiTro();
        return view('admin.content.vaitro',compact('vaitroList','stt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    {
        $request->session()->flash('back_url', route('admin.vaitro'));
        $list = $this->vaitro->getDetail(0);
        $vaitroList = $this->vaitro->getVaiTro();
        $allRoutes = Route::getRoutes();
        $routes = [];
        foreach($allRoutes as $i){
            if(strpos($i->getName(),'admin')===0){
                array_push($routes, $i->getName());
            }
        }
        
        // dd($routes)  ;
        return view('admin.Add.VaiTro', compact('list','vaitroList','routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->VaiTro)){
            $data=[
             'VaiTro' => $request->VaiTro,
             'TrangThai' => $request->TrangThai,
             'NgayTao' => now()->format('Y-m-d H:i:s'),
             'Quyen' => json_encode($request->Quyen)
             // 'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            ];
            $this->vaitro->AddVaiTro($data);
            return redirect()->route('admin.vaitro');
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
        $request->session()->flash('back_url', route('admin.vaitro'));
        $vaitroList = $this->vaitro->getVaiTro();
        if(!empty($id)){
            $list = $this->vaitro->getDetail($id);
        }else return 'lỗi';
        $allRoutes = Route::getRoutes();
        $routes = [];
        foreach($allRoutes as $i){
            if(strpos($i->getName(),'admin')===0){
                array_push($routes, $i->getName());
            }
        }
        
        return view('admin.Add.VaiTro', compact('list','vaitroList','routes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        if(!empty($id)){
            $data = [
                'VaiTro' => $request->VaiTro,
                'TrangThai' =>$request->TrangThai,
                'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
                'Quyen' => json_encode($request->Quyen)
            ];
            $this->vaitro->UpdateVaiTro($id,$data);
            return redirect()->route('admin.vaitro');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        if(!empty($id)){
            $this->vaitro->DeleteVaiTro($id);
            return redirect()->route('admin.vaitro');
        }
    }   
}
