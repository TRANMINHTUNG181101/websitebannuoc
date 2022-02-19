<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['hoten','madh','tongtien', 'diachi', 'dienthoai', 'ghichu', 'trangthai', 'id_nhanvien', 'id_khachhang', 'email', 'ngaytao', 'httt'];
    protected $status = [
        '0' => [
            'class' => 'info',
            'name' => 'Chờ xác nhận'
        ],
        '1' => [
            'class' => 'primary',
            'name' => 'Vận chuyển'
        ],
        '2' => [
            'class' => 'success',
            'name' => 'Đã giao'
        ],
        '-1' => [
            'class' => 'danger',
            'name' => 'Đã huỷ'
        ],
    ];

    public function getStatus() {
        return Arr::get($this->status, $this->trangthai, 'N/A');
    }
}
