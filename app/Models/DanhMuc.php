<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'DanhMuc';
    public function getDanhMuc(){
        return DB::table('DanhMuc')->orderBy('ThuTuHienThi', 'ASC')->get();
    }
    
    public function AddDanhMuc($data)
    {
        return DB::table('DanhMuc')->insert($data);
    }
    
    public function getDetail($id){
        return $users = DB::table('DanhMuc')->where('IDDanhMuc', $id)->first();
    }
    
    public function UpdateDanhMuc($id, $data){
        return DB::table('DanhMuc')->where('IDDanhMuc', $id)->update($data);
    }
    
    public function DeleteDanhMuc($id){
        return DB::table('DanhMuc')->where('IDDanhMuc', $id)->delete();
    }
    
    public function SearchDanhMuc($text){
        return DB::table('DanhMuc')
                ->where('MaDanhMuc','like','%'.$text.'%')
                ->orWhere('TieuDe','like','%'.$text.'%')
                ->get();
    }
}
