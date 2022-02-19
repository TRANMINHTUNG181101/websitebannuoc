<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizePros extends Model
{
    use HasFactory;

    protected $table='size_pros';
    protected $fillable=[
        'id','id_pro','id_size'
    ];
}
