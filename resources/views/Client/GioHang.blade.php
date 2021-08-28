@extends('layouts.master_layout')
@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<center>
    <h3>
        @if(session()->has('message'))
        {{ session()->get('message')}}
        @endif
    </h3>
</center>
<!-- Start Cart  -->
<div class="cart-box-main">
    @php $total =0;$stt=1; @endphp
    @if(session('cart'))
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('cart') as $id=>$sanpham)
                            @csrf
                            @method('GET')
                                @php 
                                    $sub_total = $sanpham['gia']*$sanpham['soluong'];
                                    $total += $sub_total;
						        @endphp
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{!!asset('images/img_sanpham').'/'.$sanpham['image']!!}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        {{$sanpham['tensanpham']}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{number_format($sanpham['gia'], 0, ',', '.')}}VNĐ</p>
                                </td>
                                <td class="quantity-box"><input type="number" size="4" value="{{$sanpham['soluong']}}" min="0" step="1" class="c-input-text qty text"></td>
                                <td class="total-pr">
                                    <p>{{number_format($sub_total, 0, ',', '.')}}VNĐ</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="{{route('Remove_GioHang',[$id])}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-2 col-sm-2">
                <div class="update-box">
                    <input value="Update Cart" type="submit">
                </div>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Tổng các mặt hàng:</h5>
                        <div class="ml-auto h5">{{number_format($total,0,',','.')}} VNĐ</div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="{{route('Checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>
        
    @endif
    </div>
</div>
@endsection