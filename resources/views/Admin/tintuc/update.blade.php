@extends('layouts.layouts_admin')
@section('content_admin')
<h2 align="center">Sửa Tin tức
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
<form name="form1" action="{{route('Admin/tintuc.update',$tintuc->id)}}" method="POST" enctype="multipart/form-data" >
@csrf
@method("PUT")
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Tên sản phẩm:</td>
      <td width="322"><input type="text" name="tTieude" id="tTieude" value="{{$tintuc->tieude}}"></td>
    </tr>
    <tr>
      <td>Ảnh:</td>
      <td><input type="file" name="hinhanh" id="hinhanh" value="{{$tintuc->hinhanh}}"></td>
    </tr>
      <td>Nội dung:</td>
      <td><textarea name="tNoidung" id="tNoidung" rows="5" cols="50">{{$tintuc->noidung}}</textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="bSubmit" id="bSubmit" value="Đồng ý"> 
    </tr>
  </table>
</form>

@endsection