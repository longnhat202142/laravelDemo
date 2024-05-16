<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Action index()
    public $data =[];
    public function index(){
        $this->data['title'] = 'Phần nội dung';
    //   $user= DB::select('select * from nguoidung where tennguoidung =  :tennguoidung ',[
    //     'tennguoidung' => 'nhat'
    //   ]);
    //   dd($user);
        return view('clients.home',$this->data);
    }

    public function products(){
         $this->data['title'] = 'Phần nội dung';
        return view('clients.category.add',compact('title'));
    }

    //Action GetNews
    // public function getNews(){
    //     return 'Danh sách tin tức';
    // }

    // //
    // public function getCategory($id){
    //     return 'Chuyên mục : ' .$id;
    // }

    public function getAdd(){
         $this->data['title'] = 'Thêm sản phẩm';
        return view('add',$this->data);
    }

    public function postAdd (Request $request){
        dd($request);
    }

    public function putAdd (Request $request){
        return 'Phương thức put';
        dd($request);
    }
}
