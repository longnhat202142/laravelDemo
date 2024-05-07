<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        // Thường sử dụng session để check login
    }
    public function index()
    {
        return 'Danh sach san pham haha';
    }

    // Hiển thị form thêm sản phảm ::Get
    public function create()
    {
        //
    }

    // Xử lí thêm sản phâm ::POST
    public function store(Request $request)
    {
        //
    }

    // Lấy ra thông tin của 1 sản phẩm :: Get
    public function show(string $id)
    {
        //
    }

    // Hiển thị form sửa sản phẩm:: Get
    public function edit(string $id)
    {
        //
    }

    // Xử lí sửa ::POST
    public function update(Request $request, string $id)
    {
        //
    }

    // Xoá sản phẩm
    public function destroy(string $id)
    {
        //
    }
}
