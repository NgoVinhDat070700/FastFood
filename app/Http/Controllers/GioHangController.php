<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function cart()
    {
        return view('Client/GioHang');
    }
    public function addToCart(SanPham $sanpham)
    {
        $cart = session()->get('cart');
        if(!$cart)
        {
            $cart = [
                $sanpham->id=>[
                    
                    'tensanpham' => $sanpham->tensanpham,
                    'soluong' =>1,
                    'gia' => $sanpham->gia,
                    'image' =>$sanpham->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('GioHang.cart')->with('thanhcong','Thêm thành công!');
        }
        if(isset($cart[$sanpham->id]))
        {
            $cart[$sanpham->id]['soluong']++;
            session()->put('cart',$cart);
            return redirect()->route('GioHang.cart')->with('thanhcong','Thêm thành công!');
        }
        $cart[$sanpham->id]=[
                'tensanpham' => $sanpham->tensanpham,
                'soluong' =>1,
                'gia' => $sanpham->gia,
                'image' =>$sanpham->image,
            ];
        session()->put('cart', $cart);
        return redirect()->route('GioHang.cart')->with('thanhcong','Thêm thành công!');
    }
    public function RemoveGioHang($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('GioHang.cart')->with('message', 'Xóa thành công!');
    }
}
