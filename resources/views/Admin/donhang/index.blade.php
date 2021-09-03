@extends('layouts.layouts_admin')
@section('content_admin')
<h1 align="center">Danh sách hóa đơn</h1>
	<br>
<!--	Tìm kiếm-->
	<form name="fTimkiem" id="fTimkiem" action="/Admin/donhang/show" method="get">
    Từ khóa: 
        <input type="text" name="search" id="search">
    <!-- Nhóm SP:
    <select name="smanhom" id="smanhom">
        <option value="0"> Tất cả nhóm SP </option>
    
    </select> -->
    <input type="submit" name="timkiem" id="timkiem" value="Tìm kiếm">
    </form>
	<table >
		<thead>
			<tr align="center">
				<th>ID hóa đơn</th>
                <th>Tên khách hàng mua</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thông tin</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Chi tiết hóa đơn</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
        @foreach($hoadons as $hoadon)
        <tr style=" text-align: center;">
            <td>{{$hoadon->id}}</td>
            <td>{{$hoadon->user->name}}</td>
            <td>{{$hoadon->sodienthoai}}</td>
            <td>{{$hoadon->diachi}}</td>
            <td>{{$hoadon->thongtin}}</td>
            <td>{{$hoadon->trangthai}}</td>
            <td>{{$hoadon->created_at}}</td>
            <td>
                <span>
                <button><a style="text-decoration: none;" href="/Admin/donhang/showcthd/{{$hoadon->id}}">Xem Chi Tiết</a> </button>
                </span>
            </td>
            <td style="width: 100px;display: flex;">
            <span>
                <button><a style="text-decoration: none;" href="/Admin/donhang/update/{{$hoadon->id}}">Sửa</a> </button>
            </span>
            - 
            <span>
                <form action="/Admin/donhang/{{$hoadon->id}}" method="POST">
                @csrf 
                @method("delete")
                <button type="submit">Delete</button>
                </form>
            </span>
        </tr>
        @endforeach
		</tbody>
	</table>
    <br>
    @if(session()->has('message'))
        <div>{{ session()->get('message')}}</div>
    @endif
    {{$hoadons->links()}}
<!--	Thanh phân trang-->
@endsection