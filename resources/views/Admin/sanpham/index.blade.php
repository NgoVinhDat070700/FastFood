@extends('layouts.layouts_admin')
@section('content_admin')
<h1 align="center">Danh sách sản phẩm</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
        <div class="ngang1"><a href="/Admin/sanpham/create"><button>Thêm sản phẩm</button></a></div>
	</div>
	<form name="fTimkiem" id="fTimkiem" action="/Admin/sanpham/search" method="get">
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
				<th>ID sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Ảnh kèm theo</th>
                <th>giá</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>ID loại sản phẩm</th>
                <th>Ngày nhập</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
        @foreach($sanpham as $sp)
        <tr style=" text-align: center;">
            <td>{{$sp->id}}</td>
            <td>{{$sp->tensanpham}}</td>
            <td><img src="{!!asset('images/img_sanpham/').'/'.$sp->image!!}" width="100px" height="100px"></td>
            <td><img src="{!!asset('images/img_sanpham/').'/'.$sp->image_list!!}" width="100px" height="100px"></td>
            <td>{{number_format($sp->gia, 0, ',', '.')}}</td>
            <td>{{$sp->mota}}</td>
            <td>{{$sp->trangthai}}</td>
            <td>{{$sp->loaisanpham_id}}</td>
            <td>{{$sp->created_at}}</td>
            <td style="width: 100px;display: flex;">
            <span>
                <button><a style="text-decoration: none;" href="/Admin/sanpham/update/{{$sp->id}}">Sửa</a> </button>
            </span>
            - 
            <span>
                <form action="/Admin/sanpham/{{$sp->id}}" method="POST">
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
    {{$sanpham->links()}}
<!--	Thanh phân trang-->
@endsection