<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    use HasFactory;
    protected $table = 'nguoidung';
    protected $fillable = [
        'IDNguoiDung',
        'TenNguoiDung',
        'TenDangNhap',
        'MatKhau',
        'Nhom',
        'VaiTro'
    ];
    protected $casts = [
        'IDNguoiDung'=>'int',
        'TenNguoiDung'=>'string',
        'TenDangNhap'=>'string',
        'MatKhau'=>'string',
        'Nhom'=>'string',
        'VaiTro'=>'int'
    ];
}
