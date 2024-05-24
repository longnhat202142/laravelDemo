<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';//đổi tên theo csdl 
    protected $fillable = [
        'IDMenu',
        'TieuDe',
        'TrangThai',
        'ThuTuHienThi',
        'LienKet',
        'IDCha',
       
    ];
}
