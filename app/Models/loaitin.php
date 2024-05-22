<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class loaitin extends Model
{
    use HasFactory;
    protected $table = 'loaitin';
    public function getAll_loaitin(){
        $loaitin = DB::select('select * from loaitin');
        return $loaitin;

    }

    public function add_Loaitin( $data){
        DB::insert('INSERT INTO loaitin (TenLoai) VALUES (?)', $data);
    }
}
