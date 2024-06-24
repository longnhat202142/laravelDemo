<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Quyen extends Model
{
    use HasFactory;
    protected $table = 'quyen';
    public function getQuyen(){
        return DB::table('quyen')->orderBy('NgayTao','desc')->get();
    }
    public function AddQuyen($data){
        return DB::table('quyen')->insert($data);
    }
    public function getDetail($id){
        return DB::table('quyen')->where('IDQuyen',$id)->first();
    }
    public function UpdateQuyen($id, $data){
        return DB::table('quyen')->where('IDQuyen', $id)->update($data);
    }
    public function DeleteQuyen($id){
        return DB::table('quyen')->where('IDQuyen', $id)->delete();
    }
    public function SearchQuyen($text){
         return DB::table('quyen')
                    ->where('Quyen','like','%'.$text.'%')
                    ->get();
    }
}
