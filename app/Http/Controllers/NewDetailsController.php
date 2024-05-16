<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewDetailsController extends Controller
{
     public  function index(){
        $this->data['title'] = 'Trang chi tiết thông tin';
        return view('clients.newdetails' ,$this->data);
    }
}
