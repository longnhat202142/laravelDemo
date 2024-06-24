<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\DanhMuc;
use DB;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    protected $tableDM = 'danhmuc';
    protected $tableLT = 'loaitin';
    
    public function getThongBao(){
        return DB::table('tintuc')->orderBy('NgayTao','desc')->get();
    }
    public function Pag($i){
        return DB::table('tintuc')->paginate($i);
    }
    public function getLoai(){
        return DB::table('loaitin')->get();
    }
    public function getLoaiTin($id){
        return DB::table('tintuc')->where('IDLoai', $id)->get();
    }
    public function AddThongBao($data){
        return DB::table('tintuc')->insert($data);
    }
    public function getDetail($id){
        return DB::table('tintuc')->where('IDTinTuc',$id)->first();
    }
    public function UpdateThongBao($id, $data){
        return DB::table('tintuc')->where('IDTinTuc', $id)->update($data);
    }
    public function DeleteThongBao($id){
        return DB::table('tintuc')->where('IDTinTuc', $id)->delete();
    }
    public function SearchThongBao($text){
         return DB::table('tintuc')
                    ->where('MaTinTuc','like','%'.$text.'%')
                    ->orWhere('TieuDe','like','%'.$text.'%')
                    ->get();
    }
}
