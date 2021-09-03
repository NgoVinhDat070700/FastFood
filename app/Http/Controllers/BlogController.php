<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = TinTuc::orderBy('id','desc')->paginate(3);
        return view('Client/Blog',['blogs'=>$blogs]);
    }

}
