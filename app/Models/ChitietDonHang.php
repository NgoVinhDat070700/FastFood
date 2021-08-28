<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChitietDonHang extends Model
{
    use HasFactory;
    protected $table = "ctdonhg";
    protected $fillable = ["donhang_id","sanpham_id","soluong","gia"];
}
