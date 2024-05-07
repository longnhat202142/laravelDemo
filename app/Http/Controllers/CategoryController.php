<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct(){
        echo 'Welcome  ';
 
    }

    // hiển thị danh mục chuyên mục :: get
    public function index(Request $request){

        // if (isset($_GET['id'])){
        //     echo $_GET['id'];
        // }

        
        $allData = $request->all();
        dd($allData);

        return view('clients/category/list');
    }


    //Lấy ra ::get
    public function getCategory($id){
        return view('clients/category/edit');
    }

    // Cập nhật ::post
    public function updateCategory($id){
        return 'Submit sửa chuyên mục : '.$id;

    }

    // Thêm ::post
    public function addCategory(Request $request){

        $path = $request->path();
        echo $path;
        return view('clients/category/add');
    }

    // Show form thêm đữ liệu ::Get
    public function showCategory(){

    }

    // Thêm dữ liệu vào chuyên mục POST
    public function handleAddCategory(Request $request){
        
        $allData = $request->all();
       
        // dd($allData);
        //print_r($_POST);
    //    return redirect(route('category.add'));
       //return 'Submit thêm chuyên mục ';
    }

    //Xoá dữ liệu :: delete
    public function deleteCategory($id){
        return 'Xoá chuyên mục' .$id;
    }
}
