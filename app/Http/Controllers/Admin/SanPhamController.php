<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(){
        $sanpham = SanPham::orderBy('id','desc')->paginate(5);
        return view('Admin/sanpham.index',['sanpham'=>$sanpham]);
    }
    public function create(){
        $loaisanpham = LoaiSanPham::all();
        return view('Admin/sanpham.create',['loaisanpham'=>$loaisanpham]);
    }
    public function edit($id){
        $loaisanpham = LoaiSanPham::all();
        $sanpham = SanPham::findOrFail($id);
        return view('Admin/sanpham.update',['loaisanpham'=>$loaisanpham,'sanpham'=>$sanpham]);
    }
    public function store(Request $request){
        $request->validate([
            'tTensanpham'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048',
            'image_list'=>'required|mimes:jpg,png,jpeg|max:5048',
            'tGia'=>'required',
            'tMota'=>'required',
            'rTrangthai'=>'required'
        ]);
        $newImageName = uniqid() .'-'.$request->tTensanpham .'.'.
        $request->image->extension();
        $request->image->move(public_path('images/img_sanpham'),$newImageName);
        $newImageList = uniqid() .'-'.$request->tTensanpham .'.'.
        $request->image_list->extension();
        $request->image_list->move(public_path('images/img_sanpham'),$newImageList);
        SanPham::create([
            'tensanpham'=>$request->input('tTensanpham'),
            'image'=>$newImageName,
            'image_list' =>$newImageList,
            'gia'=>$request->input('tGia'),
            'mota'=>$request->input('tMota'),
            'trangthai'=>$request->input('rTrangthai'),
            'loaisanpham_id'=>$request->input('idloaisanpham'),
        ]);
        return redirect('/Admin/sanpham')->with('Thêm thành công');
    }
    public function update(Request $request,$id){
        $sanpham = SanPham::findOrFail($id);
        if($request->hasFile('image') && $request->hasFile('image_list'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time() . "." . $extension;
            $file->move(public_path('images/img_sanpham'),$filename);
            $sanpham->image = $filename;
            $file_list = $request->file('image_list');
            $extension = $file_list->getClientOriginalExtension();
            $filename_list=time() . "." . $extension;
            $file_list->move(public_path('images/img_sanpham'),$filename_list);
            $sanpham->image_list = $filename_list;
        }
        
        $sanpham->tensanpham = $request->input('tTensanpham');
        $sanpham->gia = $request->input('tGia');
        $sanpham->mota = $request->input('tMota');
        $sanpham->trangthai = $request->input('rTrangthai');
        $sanpham->loaisanpham_id = $request->input('idloaisanpham');
        $sanpham->save();
        return redirect('/Admin/sanpham')->with('sanpham',$sanpham);
    }
    public function delete($id){
        $sanpham = SanPham::findOrFail($id);
        $sanpham->delete();
        return redirect('/Admin/sanpham');
    }
    public function show(Request $request)
    {
        $search = $request->get('search');
        $sanpham = SanPham::where('tensanpham','like','%'.$search.'%')->paginate(5);
        return view('Admin/sanpham.index',['sanpham'=>$sanpham]);
        
    }
}
