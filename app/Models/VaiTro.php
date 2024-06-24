<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class VaiTro extends Model
{
    use HasFactory;
    protected $table = 'vaitro, vaitro_quyen';
    public function getVaiTro(){
        return DB::table('vaitro')->orderBy('NgayTao','desc')->get();
    }
    public function AddVaiTro($data){
        return DB::table('vaitro')->insert($data);
    }
    public function getDetail($id){
        return DB::table('vaitro')->where('IDVaiTro',$id)->first();
    }
    public function UpdateVaiTro($id, $data){
        return DB::table('vaitro')->where('IDVaiTro', $id)->update($data);
    }
    public function DeleteVaiTro($id){
        return DB::table('vaitro')->where('IDVaiTro', $id)->delete();
    }
    
    public function SearchVaiTro($text){
         return DB::table('vaitro')
                    ->where('VaiTro','like','%'.$text.'%')
                    ->get();
    }
   
}
