<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;



    protected $table = 'products';
    protected $fillable = [
        'ten_san_pham', 'gia_ban', 'hinh_anh', 'trang_thai','id','mo_ta','slug'
    ];
    public function size(){
        return $this->belongsToMany(Sizes::class,'size_pros','id_pro','id_size');
    }

}
