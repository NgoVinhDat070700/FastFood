<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function index()
    {
        return view('Client/Contact-Us');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'sodienthoai'=>'required',
            'chude'=>'required',
            'loinhan'=>'required'
        ]);
        LienHe::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'sodienthoai'=>$request->input('sodienthoai'),
            'chude'=>$request->input('chude'),
            'loinhan'=>$request->input('loinhan')
        ]);
        return redirect()->back()->with('message','Gửi thành công!');
    }
}
