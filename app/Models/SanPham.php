<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    public $table = "sanpham";
    protected $fillable = ["tensanpham","image","image_list","gia","mota","trangthai","loaisanpham_id"];
}
