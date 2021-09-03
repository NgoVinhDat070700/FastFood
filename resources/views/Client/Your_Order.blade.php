@extends('layouts.master_layout')
@section('content')
<table >
		<thead>
			<tr align="center">
				<th>ID hóa đơn</th>
                <th>Tên khách hàng mua</th>
                <th>Thông tin</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Chi tiết hóa đơn</th>
			</tr>
		</thead>
		<tbody>
        @foreach($show as $sh)
        <tr style=" text-align: center;">
            <td>{{$sh->id}}</td>
            <td>{{$sh->name}}</td>
            <td>{{$sh->diachi}}</td>
            <td>{{$sh->thongtin}}</td>
            <td>{{$sh->trangthai}}</td>
            <td>{{$sh->created_at}}</td>
        </tr>
        @endforeach
		</tbody>
	</table>

@endsection