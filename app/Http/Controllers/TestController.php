<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public $data =[];
    public function index(){

        $this->data['welcome'] = 'Di vui ve';
        return view('test',$this->data);
    }
}
