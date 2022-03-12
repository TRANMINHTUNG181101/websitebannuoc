<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['hoten','madh','tongtien', 'diachi', 'dienthoai', 'ghichu', 'trangthai', 'id_nhanvien', 'id_khachhang', 'email', 'ngaytao', 'httt','trangthaithanhtoan'];
    protected $status = [
        '1' => [
            'class' => 'info',
            'name' => 'Chờ xác nhận',
            'progress' => ''
        ],
        '2' => [
            'class' => 'warning',
            'name' => 'Đang xử lí',
            'progress' => 'load33'
        ],
        '3' => [
            'class' => 'primary',
            'name' => 'Vận chuyển',
            'progress' => 'load66'
        ],
        '4' => [
            'class' => 'success',
            'name' => 'Đã giao',
            'progress' => 'load100'
        ],
        '-1' => [
            'class' => 'danger',
            'name' => 'Đã huỷ',
            'progress' => 'load0'
        ],
    ];

    public function getStatus() {
        return Arr::get($this->status, $this->trangthai, 'N/A');
    }
}
