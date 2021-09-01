<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $sanphams = SanPham::all();
        $sanphams_detail = SanPham::paginate(3);
        return view('Client/Shop',['sanphams'=>$sanphams,'sanphams_detail'=>$sanphams_detail]);
    }
    public function shop_detail($id){
        $sanphams = SanPham::all();
        $sanpham = SanPham::findOrFail($id);
        return view('Client/Shop_Detail',['sanphams'=>$sanphams,'sanpham'=>$sanpham]);
    }
}
