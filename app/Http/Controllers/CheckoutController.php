<?php

namespace App\Http\Controllers;

use App\Models\ChitietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        return view('Client/Checkout');
    }
    public function thanhtoan(Request $request)
    {
        $cart = session()->get('cart');
        $donhang = new DonHang();
        $donhang->user_id = Auth::user()->id;
        $donhang->thongtin= $request->input('Inputthongtin');
        $donhang->diachi= $request->input('Inputdiachi');
        $donhang->sodienthoai = $request->input('Inputsodienthoai');
        $donhang->trangthai = "Chưa thanh toán";
        $donhang->save();
        foreach($cart as $key=>$value)
        {
            $ctdonhang = new ChitietDonHang();
            $ctdonhang->donhang_id = $donhang->id;
            $ctdonhang->sanpham_id = $key;
            $ctdonhang->gia  = $value['gia'];
            $ctdonhang->soluong = $value['soluong'];
            $ctdonhang->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('message','Đặt hàng thành công!');
        
    }
}
