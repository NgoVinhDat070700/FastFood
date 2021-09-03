@extends('layouts.layouts_admin')
@section('content_admin')
<div id="order-detail-wrapper">
            <div id="order-detail">
				
                <h1>Chi tiết đơn hàng</h1>
                <label>Người nhận:  </label><span>{{$hoadon->user->name}}</span><br/>
                <label>Điện thoại: </label><span>{{$hoadon->sodienthoai}}</span><br/>
                <label>Địa chỉ: </label><span>{{$hoadon->diachi}}</span><br/>
                <hr/>
                <h3>Danh sách sản phẩm</h3>
                @php
                    $total=0;
                    $tongsl=0;
                @endphp
                    <ul>
                    @foreach($cthd as $key=>$cthoadon)
                        @php
                            $sub_total = $cthoadon->gia * $cthoadon->soluong;
                            $total += $sub_total;
                            $tongsl += $cthoadon->soluong;
                        @endphp
                        <li>
                            <span class="item-name"><strong>Tên Sản Phẩm:</strong>{{$cthoadon->sanpham_tensp}}</span>
							<br>
                            <span class="item-quantity"> <strong> SL:</strong>{{$cthoadon->soluong}}</span>-
                            <span class="item-quantity"> <strong> Giá:</strong>{{number_format($cthoadon->gia, 0, ',', '.')}} VNĐ</span>
                        </li>
                        @endforeach
                    </ul>
                <hr/>
                <label>Tổng SL:{{$tongsl}} </label> - <label>Tổng tiền: {{number_format($total, 0, ',', '.')}}</label> 
                <p><label>Ghi chú:{{$hoadon->thongtin}}</label></p>
				
            </div>
			
        </div>
<!--	Thanh phân trang-->
@endsection