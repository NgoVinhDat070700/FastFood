@extends('layouts.layouts_admin')
@section('content_admin')
<h2 align="center">Thêm Sản Phẩm
</h2>
@if($errors->any())
<div>
            <ul>
                @foreach($errors->all() as $error)
                  {{$error}}
                @endforeach
            </ul>
        </div>

    @endif
<form name="form1" action="/Admin/sanpham" method="POST" enctype="multipart/form-data" >
@csrf
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Tên sản phẩm:</td>
      <td width="322"><input type="text" name="tTensanpham" id="tTensanpham"></td>
    </tr>
    <tr>
      <td>Ảnh sản phẩm:</td>
      <td><input type="file" name="image" id="image"></td>
    </tr>
    <tr>
      <td>Ảnh liên quan:</td>
      <td><input type="file" name="image_list" id="image_list"></td>
    </tr>
    <tr>
      <td>Giá:</td>
      <td><input type="text" name="tGia" id="tGia"></td>
    </tr>
    <tr>
      <td>Mô tả:</td>
      <td><textarea name="tMota" id="tMota" rows="5" cols="50"></textarea></td>
    </tr>
    <tr>
      <td>Trạng thái:</td>
      <td>
      Còn 
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Còn">
      Hết
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Hết">
      </td>
    </tr>
    <tr>
        <td for="">Id loại sản phẩm:</td>
        <td>
        <select id="idloaisanpham" name="idloaisanpham" style="width:200px;height:30px;"> <br> <br>
            @foreach($loaisanpham as $lsp)     
            <option value="{{$lsp->id}}">{{$lsp->tenloaisanpham}}</option>
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