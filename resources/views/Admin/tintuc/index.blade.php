@extends('layouts.layouts_admin')
@section('content_admin')
<h1 align="center">Danh sách Tin tức</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
        <div class="ngang1"><a href="{{route('Admin/tintuc.create')}}"><button>Thêm tin tức</button></a></div>
	</div>
	<table >
		<thead>
			<tr align="center">
				<th>ID</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Ngày đăng</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
        @foreach($tintuc as $tt)
        <tr style=" text-align: center;">
            <td>{{$tt->id}}</td>
            <td>{{$tt->tieude}}</td>
            <td><img src="{!!asset('images/img_tintuc/').'/'.$tt->hinhanh!!}" width="100px" height="100px"></td>
            <td>{{$tt->noidung}}</td>
            <td>{{$tt->created_at}}</td>
            <td style="width: 100px;display: flex;">
            <span>
                <button><a style="text-decoration: none;" href="{{route('Admin/tintuc.update',$tt->id)}}">Sửa</a> </button>
            </span>
            - 
            <span>
                <form action="{{route('Admin/tintuc.index',$tt->id)}}" method="POST">
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
    {{$tintuc->links()}}
<!--	Thanh phân trang-->
@endsection