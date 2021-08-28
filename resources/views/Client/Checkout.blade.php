@extends('layouts.master_layout')
@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate method="post" action="{{route('Checkout.thanhtoan')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="Inputdiachi" name="Inputdiachi" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Số điện thoại *</label>
                                <input type="text" class="form-control" id="Inputsodienthoai" name="Inputsodienthoai" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Information*</label>
                                <input type="text" class="form-control" id="Inputthongtin" name="Inputthongtin" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your Information. </div>
                            </div>
                            
                            <hr class="mb-4">
                            <hr class="mb-1"> 
                            <input type="submit" value="Order" style="color:rosybrown;" class="col-2 d-flex shopping-box"></input></form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                    @php $total =0;$stt=1; @endphp
                    @if(session('cart'))
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Shipping Method</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                @foreach(session('cart') as $id=>$sanpham)
                                @csrf
                                @method('GET')
                                @php 
                                    $sub_total = $sanpham['gia']*$sanpham['soluong'];
                                    $total += $sub_total;
						        @endphp
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> {{$sanpham['tensanpham']}}</a>
                                            <div class="small text-muted">Price: {{number_format($sanpham['gia'], 0,',','.')}} VNĐ <span class="mx-2">|</span> Qty: {{$sanpham['soluong']}} <span class="mx-2">|</span> Subtotal: {{number_format($sub_total,0,',','.')}} VNĐ</div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5">{{number_format($sub_total,0,',','.')}} VNĐ</div>
                                </div>
                                <hr> </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection