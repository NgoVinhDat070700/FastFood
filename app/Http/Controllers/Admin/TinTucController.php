<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index()
    {
        $tintuc = TinTuc::orderBy('id','desc')->paginate(5);
        return view("Admin/tintuc.index",['tintuc'=>$tintuc]);
    }
    public function create()
    {
        return view('Admin/tintuc.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tTieude'=>'required',
            'hinhanh'=>'required|mimes:jpg,png,jpeg|max:5048',
            'tNoidung'=>'required'
        ]);
        $hinhanh = uniqid() .'-'.$request->tTieude .'.'.
        $request->hinhanh->extension();
        $request->hinhanh->move(public_path('images/img_tintuc'),$hinhanh);
        TinTuc::create([
            'tieude'=>$request->input('tTieude'),
            'hinhanh'=>$hinhanh,
            'noidung'=>$request->input('tNoidung'),
        ]);
        return redirect('/Admin/tintuc')->with('message','Thêm thành công');
    }
    public function edit($id){
        $tintuc = TinTuc::findOrFail($id);
        return view('Admin/tintuc.update',['tintuc'=>$tintuc]);
    }
    public function update(Request $request,$id){
        $tintuc = TinTuc::findOrFail($id);
        if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $extension = $file->getClientOriginalExtension();
            $filename=time() . "." . $extension;
            $file->move(public_path('images/img_tintuc'),$filename);
            $tintuc->hinhanh = $filename;
        }
        
        $tintuc->tieude = $request->input('tTieude');
        $tintuc->noidung = $request->input('tNoidung');
        $tintuc->save();
        return redirect('/Admin/tintuc')->with('tintuc',$tintuc);
    }
    public function delete($id){
        $tintuc = TinTuc::findOrFail($id);
        $tintuc->delete();
        return redirect('/Admin/tintuc');
    }
}
