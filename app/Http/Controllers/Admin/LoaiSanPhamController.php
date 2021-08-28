<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function index(){
        $loaisanpham = LoaiSanPham::all();
        return view('Admin/loaisanpham.index',['loaisanpham'=>$loaisanpham]);
    }
    public function create(){
        return view('Admin/loaisanpham.create');
    }
    public function store(Request $request){
        $request->validate(['tTen' =>'required',
        'rTrangthai'=>'required']);
        LoaiSanPham::create([
            'tenloaisanpham'=>$request->input('tTen'),
            'trangthai'=>$request->input('rTrangthai')
        ]);
        return redirect('/Admin/loaisanpham')->with('message','Thêm thành công!');
    }
    public function edit($id){
        $loaisanpham = LoaiSanPham::findOrFail($id);
        return view('Admin/loaisanpham.update',['loaisanpham'=>$loaisanpham]);
    }
    public function update(Request $request,$id){
        $request->validate(['tTen'=>'required','rTrangthai'=>'required']);
        $loaisanpham = LoaiSanPham::findOrFail($id);
        $loaisanpham->tenloaisanpham = $request->input('tTen');
        $loaisanpham->trangthai = $request->input('rTrangthai');
        $loaisanpham->save();
        return redirect('/Admin/loaisanpham')->with('loaisanpham',$loaisanpham);
    }
    public function destroy($id){
        $loaisanpham = LoaiSanPham::findOrFail($id);
        $loaisanpham->delete();
        return view('Admin/loaisanpham.index');
    }
}
