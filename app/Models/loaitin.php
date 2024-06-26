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

    public function getID_Loaitin(int $IDLoai)
    {
        return DB::select("SELECT * FROM loaitin WHERE IDLoai = '$IDLoai'");
    }

    public function updateLoaitin($data, $id)
    {
        return DB::update("UPDATE loaitin SET TenLoai = ? WHERE IDLoai = ?", [$data, $id]);
    }

    public function deleteLoaitin($id)
    {
        return DB::delete("DELETE FROM LOAITIN where IDLoai =?",[$id]);
    }
}
