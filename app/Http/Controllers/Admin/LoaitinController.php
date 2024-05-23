<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loaitin;

class LoaitinController extends Controller
{
    private $loaitin;
    // public function __contruct (){
    //     $this->loaitin = new loaitin();
    // }
    public function index(){
        $title = 'Danh sách loại tin';
          $this->loaitin = new loaitin();
        $loaitinList = $this->loaitin->getAll_loaitin();
        return view('Admin.loaitin',compact('title','loaitinList'));
    }



    public function add(){
        $title ='Thêm người dùng';
        return view('Admin.loaitin.add',compact('title'));
    }

    public function postAdd(Request $request){
            $request->validate([
            // 'IDLoai' => 'required|integer|max:9',
            'TenLoai' => 'required'
        ], [
            // 'IDLoai.required' => 'ID loại bắt buộc phải nhập',
            // 'IDLoai.integer' => 'ID loại phải là số nguyên',
            // 'IDLoai.max' => 'ID loại không được lớn hơn :max',
            'TenLoai.required' => 'Tên loại bắt buộc phải nhập'
        ]);
     $dataInsert = [

         $request->TenLoai
        // $request->input('TenLoai')
     ];

      $this->loaitin = new loaitin();
      $this->loaitin->add_Loaitin($dataInsert);
      return redirect()->route('loaitin.index');
    }


    public function getEdit($id){
         $title ='Cập nhật người dùng';
         $this->loaitin = new loaitin();
        if (!empty($id)) {
            $getLoaitin = $this->loaitin->getID_Loaitin($id);
            dd($getLoaitin);
        } 
        else {
            return redirect()->route('loaitin.index');
        }
        return view('Admin.loaitin.edit',compact('title'));
    }
}
