<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSo extends Model
{
    use HasFactory;
    protected $table = "coso";
    protected $fillable = ["tensoso","sodienthoai","email","trangthai"];
}
