<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    public function index(){
        
        return view('Client/MyAccount');
    }
    public function show($user_id){
        $show = DB::table('donhangs')
                    ->join('users', 'donhangs.user_id', '=', 'users.id')
                    ->where('donhangs.user_id', '=', $user_id)
                    ->select('donhangs.*','users.name as name')
                    ->get();
        return view('Client/Your_Order',['show'=>$show]);
    }
}
