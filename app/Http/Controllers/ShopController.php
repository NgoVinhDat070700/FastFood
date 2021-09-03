<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function show(Request $request){
        $show = $request->get('search');
        $sanphams = SanPham::where('tensanpham','like','%'.$show.'%')->paginate(6);
        $sanphams_detail = SanPham::where('tensanpham','like','%'.$show.'%')->paginate(6);
        return view('Client/Shop',['sanphams'=>$sanphams,'sanphams_detail'=>$sanphams_detail]);
    }
    public function showproduct_cat($id)
    {
        $category = LoaiSanPham::all();
        $sanphams = DB::table('sanpham')
                ->join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                ->where('sanpham.loaisanpham_id','=',$id)
                ->select('sanpham.*','loaisanpham.*')
                ->get();
        $sanphams_detail = DB::table('sanpham')
                ->join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                ->where('sanpham.loaisanpham_id','=',$id)
                ->select('sanpham.*','loaisanpham.*')
                ->get();
        return view('Client/Shop',['sanphams'=>$sanphams,'sanphams_detail'=>$sanphams_detail,'category'=>$category]);
    }
}
