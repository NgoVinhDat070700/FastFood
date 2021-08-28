@extends('layouts.layouts_admin')
@section('content_admin')
<h2 align="center">Thêm loại sản phẩm
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
<form name="form1" action="{{route('Admin/loaisanpham.update',$loaisanpham->id)}}" method="POST" enctype="multipart/form-data" >
@csrf
@method('PUT')
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Tên loại sản phẩm:</td>
      <td width="322"><input type="text" name="tTen" id="tTen" value="{{$loaisanpham->tenloaisanpham}}"></td>
    </tr>
    <tr>
      <td>Trạng thái:</td>
      <td>
      Còn 
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Còn" {{$loaisanpham->trangthai=="Còn"?"checked":""}}>
      Hết
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Hết" {{$loaisanpham->trangthai=="Hết"?"checked":""}}>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
    </tr>
  </table>
</form>
@endsection