<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
    public $table = "lienhe";
    protected $fillable = ['name','email','sodienthoai','chude','loinhan'];
}
