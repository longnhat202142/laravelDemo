<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('auth');
        $this->users = new User();
    }
    public function index()
    {
        $stt = 1;
        if(!empty($request->text)){
            $text = $request->text;
            $userList = $this->users->SearchUser($text);
            return view('admin.content.user',compact('userList','stt','text','us'));
        }
        $us = $this->users;
        $userList = $this->users->getUser();
        return view('admin.content.user',compact('userList','stt','us'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->session()->flash('back_url', route('admin.user'));
        $list = $this->users->getDetail(0);
        $usersList = $this->users->getUser();
        return view('admin.Add.User', compact('list','usersList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->name) &&  !empty($request->email)){
            $data=[
             'email' => $request->email,
             'name' => $request->name,
             'password' => bcrypt('12345678'),
             'TrangThai'=>$request->TrangThai,
             'created_at' => now()->format('Y-m-d H:i:s')
             // 'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
            ];
            $this->users->AddUser($data);
            return redirect()->route('admin.user');

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
        $request->session()->flash('back_url', route('admin.user'));
        $userList = $this->users->getUser();
       
        if(!empty($id)){
            $list = $this->users->getDetail($id);
        }else return 'lỗi';
        return view('admin.Add.user', compact('list','userList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!empty($id)){
            if(is_array($request->VaiTro)){
                $this->users->deleteUser_vaitro($id);
                foreach($request->VaiTro as $r){
                    $data=[
                        'id' => $request->id,
                        'IDVaiTro' => $r
                       ];
                       $this->users->User_vaitro($data);
                }
                return redirect()->route('admin.user');
            }
                $data=[
                 'email' => $request->email,
                 'name' => $request->name,
                 'TrangThai'=>$request->TrangThai,
                 'updated_at' => now()->format('Y-m-d H:i:s')
                 // 'NgayCapNhat' => now()->format('Y-m-d H:i:s'),
                ];
                $this->users->UpdateUser($id,$data);
            
            return redirect()->route('admin.user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        if(!empty($id)){
            $this->users->DeleteUser($id);
            return redirect()->route('admin.user');
        }
    }
    
    public function role( Request $request, $id)
    {
        $roledetails = $this->users->roleDetails($id)->toArray();
        $request->session()->flash('back_url', route('admin.user'));
        $roles = DB::table('VaiTro')->where('TrangThai',1)->get();
        $list = $this->users->getDetail($id);
        $userList = $this->users->getUser();
        return view('admin.Add.user', compact('list','userList','roles','roledetails'));
    }
    
    public function error()
    {
        $code = request()->code;
        // return view('admin.error');
        return "lỗi phân quyền";
    }
}
