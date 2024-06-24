<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Nhom extends Model
{
    use HasFactory;
    protected $table = 'nhom';
    public function getNhom(){
        return DB::table('nhom')->orderBy('NgayTao','desc')->get();
    }
    public function AddNhom($data){
        return DB::table('nhom')->insert($data);
    }
    public function getDetail($id){
        return DB::table('nhom')->where('IDNhom',$id)->first();
    }
    public function UpdateNhom($id, $data){
        return DB::table('nhom')->where('IDNhom', $id)->update($data);
    }
    public function DeleteNhom($id){
        return DB::table('nhom')->where('IDNhom', $id)->delete();
    }
    public function SearchNhom($text){
         return DB::table('nhom')
                    ->where('nhom','like','%'.$text.'%')
                    ->get();
    }
}
