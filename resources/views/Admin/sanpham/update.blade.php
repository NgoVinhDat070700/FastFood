@extends('layouts.layouts_admin')
@section('content_admin')
<h2 align="center">Sửa sản phẩm
</h2>
@if($errors->any())
<div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
<form name="form1" action="{{route('Admin/sanpham.update',$sanpham->id)}}" method="POST" enctype="multipart/form-data" >
@csrf
@method("PUT")
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Tên sản phẩm:</td>
      <td width="322"><input type="text" name="tTensanpham" id="tTensanpham" value="{{$sanpham->tensanpham}}"></td>
    </tr>
    <tr>
      <td>Ảnh sản phẩm:</td>
      <td><input type="file" name="image" id="image" value="{{$sanpham->image}}"></td>
    </tr>
    <tr>
      <td>Ảnh liên quan:</td>
      <td><input type="file" name="image" id="image" value="{{$sanpham->image_list}}"></td>
    </tr>
    <tr>
      <td>Giá:</td>
      <td><input type="text" name="tGia" id="tGia" value="{{$sanpham->gia}}"></td>
    </tr>
    <tr>
      <td>Mô tả:</td>
      <td><textarea name="tMota" id="tMota" rows="5" cols="50">{{$sanpham->mota}}</textarea></td>
    </tr>
    <tr>
      <td>Trạng thái:</td>
      <td>
      Còn 
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Còn" {{$sanpham->trangthai=="Còn"?"checked":""}}>
      Hết
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Hết" {{$sanpham->trangthai=="Hết"?"checked":""}}>
      </td>
    </tr>
    <tr>
        <td for="">Id loại sản phẩm:</td>
        <td>
        <select id="idloaisanpham" name="idloaisanpham" style="width:200px;height:30px;"> <br> <br>
            @foreach($loaisanpham as $lsp)     
            <option value="{{$lsp->id}}"
            @if($sanpham->loaisanpham_id==$lsp->id)
                selected = "selected"
            @endif
            >{{$lsp->tenloaisanpham}}</option>
            @endforeach
        </select>
        </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
    </tr>
  </table>
</form>

@endsection