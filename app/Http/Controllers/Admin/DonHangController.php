<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function index()
    {
        $hoadons = DonHang::paginate(5);
        return view('Admin/donhang.index',['hoadons'=>$hoadons]);
    }
    public function edit($id)
    {
        $hoadon = DonHang::find($id);
        return view('Admin/donhang.update',['hoadon'=>$hoadon]);
    }
    public function update(Request $request, $id)
    {
        $hoadon = DonHang::find($id);
        $hoadon->tenkhachhangmua=$request->input('tTenkhachhangmua');
        $hoadon->sodienthoai=$request->input('tSodienthoai');
        $hoadon->diachi=$request->input('tDiachi');
        $hoadon->trangthai=$request->input('rTrangthai');
        $hoadon->thongtin = $request->input('tThongtin');
        $hoadon->save();
        return redirect('/Admin/donhang')->with('hoadon',$hoadon);
    }
    public function destroy($id)
    {
        $hoadon = DonHang::find($id);
        $hoadon->delete();
        return redirect('/Admin/donhang')->with('hoadon',$hoadon);
    }
    public function show(Request $request)
    {
        $search = $request->get('search');
        $hoadon = DonHang::where('name','like','%'.$search.'%')
                            ->orwhere('sodienthoai',$search)
                            ->paginate(5);
        return view('Admin/donhang.index',['hoadons'=>$hoadon]);
    }
    public function showcthd($id_giohang)
    {
        $hoadon = DonHang::find($id_giohang);
        $cthd = DB::table('donhangs')
                    ->join('ctdonhg', 'donhangs.id', '=', 'ctdonhg.donhang_id')
                    ->leftjoin('sanpham', 'ctdonhg.sanpham_id', '=', 'sanpham.id')
                    ->where('ctdonhg.donhang_id', '=', $id_giohang)
                    ->select('donhangs.*', 'ctdonhg.*', 'sanpham.tensanpham as sanpham_tensp')
                    ->get();
        return view('Admin/donhang/showctdh',['cthd'=>$cthd,'hoadon'=>$hoadon]);
                    
    }
}
