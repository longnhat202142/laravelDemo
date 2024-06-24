<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ='users';
    protected $fillable = [
        'name',
        'email',
        'password'
        
    ];

    // public function getAuthPass(){
    //     return $this->MatKhau;
    // }
   
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function getUser(){
        return DB::table('users')->orderBy('created_at','desc')->get();
    }
    public function AddUser($data){
        return DB::table('users')->insert($data);
    }
    public function getDetail($id){
        return DB::table('users')->where('id',$id)->first();
    }
    public function UpdateUser($id, $data){
        return DB::table('users')->where('id', $id)->update($data);
    }
    public function DeleteUser($id){
        return DB::table('users')->where('id', $id)->delete();
    }
    public function SearchUser($text){
         return DB::table('users')
                    ->where('name','like','%'.$text.'%')
                    ->get();
    }
    public function User_vaitro($data){
        return DB::table('vaitro_user')->insert($data);
    }
    public function deleteUser_vaitro($id){
        return DB::table('vaitro_user')->where('id', $id)->delete();
    }
    
    public function roleDetails($id){
        return DB::table('vaitro')
                ->join('vaitro_user', 'vaitro.IDVaiTro', '=', 'vaitro_user.IDVaiTro')
                ->where('vaitro_user.id', $id)
                ->pluck('VaiTro');
    }
    
    
    public function hasPermission($route){
        $routes = $this->routes();
        return in_array($route,$routes)?true:false;
    }
    
    public function getRoles(){
        try {
            return DB::table('vaitro')
                ->join('vaitro_user', 'vaitro.IDVaiTro', '=', 'vaitro_user.IDVaiTro')
                ->where('vaitro_user.id', $this->id)
                ->get();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu cần
            // Ví dụ: ghi log lỗi và trả về một collection rỗng
            \Log::error('Lỗi truy vấn getRoles: ' . $e->getMessage());
            return collect(); // Trả về một collection rỗng
        }
    }
    //các route đã được gán cho người dùng này
    public function routes(){
        $data = [];
        foreach($this->getRoles() as $role){
            $quyen = json_decode($role->Quyen);
            foreach($quyen as $per){
                if(!in_array($per,$data)){
                    array_push($data,$per);
                }
            }
        }
        return $data;
    }
    
}
