@extends('layouts.layouts_admin')
@section('content_admin')
<h2 align="center">Sửa đơn hàng
</h2>
@if($errors->any())
<div>
            <ul>
                @foreach($errors->all() as $error)
                <li></li>
                @endforeach
            </ul>
        </div>

    @endif
<form name="form1" action="/Admin/donhang/update/{{$hoadon->id}}" method="POST" enctype="multipart/form-data" >
@csrf
@method("PUT")
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Tên khách hàng:</td>
      <td width="322"><input type="text" name="tTenkhachhangmua" id="tTenkhachhangmua" value="{{$hoadon->user->name}}"></td>
    </tr>
    <tr>
      <td>Số điện thoại:</td>
      <td><input type="text" name="tSodienthoai" id="tSodienthoai" value="{{$hoadon->sodienthoai}}"></td>
    </tr>
    <tr>
      <td>Địa chỉ:</td>
      <td><input type="text" name="tDiachi" id="tDiachi" value="{{$hoadon->diachi}}"></td>
    </tr>
    <tr>
      <td>Thông tin:</td>
      <td><textarea name="tThongtin" id="tThongtin" rows="5" cols="50">{{$hoadon->thongtin}}</textarea></td>
    </tr>
    <tr>
      <td>Trạng thái:</td>
      <td>
      Đã thanh toán 
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Đã thanh toán" {{$hoadon->trangthai=="Đã thanh toán"?"checked":""}}>
      Chưa thanh toán
      <input type="radio" name="rTrangthai" id="rTrangthai" value="Chưa thanh toán" {{$hoadon->trangthai=="Chưa thanh toán"?"checked":""}}>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
           <input type="reset" name="Reset" id="button" value="Nhập lại"></td>
    </tr>
  </table>
</form>

@endsection