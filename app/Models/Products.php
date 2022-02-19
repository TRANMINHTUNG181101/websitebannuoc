<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    protected $table = 'products';
    protected $fillable = [
        'ten_san_pham', 'gia_ban', 'hinh_anh', 'trang_thai','id'
    ];
}
