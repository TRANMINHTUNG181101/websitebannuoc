<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'trangthai', 'noidung', 'id_sanpham', 'id_baiviet', 'id_khachhang', 'parent_id', 'type', 'ngaybl'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'id_khachhang');
    }
    public function replay()
    {
        return $this->hasMany(Comments::class, 'parent_id', 'id');
    }
}