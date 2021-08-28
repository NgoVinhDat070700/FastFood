<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sanpham = SanPham::all();
        $tintucs = TinTuc::all();
        return view('Client/Home',['sanpham'=>$sanpham,'tintucs'=>$tintucs]);
    }
}
