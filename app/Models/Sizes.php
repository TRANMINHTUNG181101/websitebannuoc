<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    use HasFactory;

    protected $table="sizes";
    protected $fillable=[
        'size_name','trang_thai'
    ];
    public function sanpham(){
        return $this->belongsToMany(Products::class,'size_pros','id_size','id_pro');
    }
}
