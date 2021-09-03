<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = "donhangs";
    protected $fillable = ["user_id","thongtin","diachi","sodienthoai","hinhthucthanhtoan","trangthai"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
