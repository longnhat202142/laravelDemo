<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(){

        $this->data['title'] = 'Trang News';
        return view('clients.news', $this->data);
    }
}
