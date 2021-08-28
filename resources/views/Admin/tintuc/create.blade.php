@extends('layouts.layouts_admin')
@section('content_admin')
<h2 align="center">Thêm tin tức
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
<form name="form1" action="{{route('Admin/tintuc.store')}}" method="POST" enctype="multipart/form-data" >
@csrf
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Tiêu đề:</td>
      <td width="322"><input type="text" name="tTieude" id="tTieude"></td>
    </tr>
    <tr>
      <td>Ảnh sản phẩm:</td>
      <td><input type="file" name="hinhanh" id="hinhanh"></td>
    </tr>
    <tr>
      <td>Nội dung:</td>
      <td><textarea name="tNoidung" id="tNoidung" rows="5" cols="50"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
    </tr>
  </table>
</form>

@endsection