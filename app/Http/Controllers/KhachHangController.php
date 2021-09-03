<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{
    public function index()
    {
        return view('Client/Account');
    }
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'Inputemail' =>'required|email',
                'Inputpassword' =>'required|min:6',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if(Auth::attempt(['email'=>$request->Inputemail,'password'=>$request->Inputpassword]))
            {
                return redirect()->back()->with('message','Bạn đã đăng nhập thành công!');
            }
            else{
                return redirect()->back()->with('message','Bạn đã đăng nhập thất bại!');
            }
        }
    }
    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'Inputname'=>'required|min:6|max:30|alpha',
                'InputEmail1' =>'required|email',
                'InputPassword1' =>'required|min:6',
                'Inputsodienthoai'=>'required|numeric|min:11',
                'Inputdiachi'=>'required|min:6|max:30'
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $khachhang = DB::table('khachhang')->where('email',$request->InputEmail1)->first();
            if(!$khachhang)
            {
                $newkhachhang = new User();
                $newkhachhang->tenkhachhang=$request->Inputname;
                $newkhachhang->password = $request->InputPassword1;
                $newkhachhang->email = $request->InputEmail1;
                $newkhachhang->sodienthoai=$request->Inputsodienthoai;
                $newkhachhang->diachi=$request->Inputdiachi;
                $newkhachhang->save();
                return redirect()->back()->with('message','Bạn đã đăng kí thành công!');
            }
            else{
                return redirect()->back()->with('message','Bạn đã đăng kí thất bại!');
            }
        }
    }
}
