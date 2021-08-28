@extends('layouts.master_layout')
@section('content')
<div class="cart-box-main">
    @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('message')}}
        </div>
    @endif
    <div class="container">
        <div class="row new-account-login">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Account Login</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                <form class="mt-3 collapse review-form-box" id="formLogin" action="{{route('KhachHang.login')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputEmail" class="mb-0">Email Address</label>
                            <input type="email" class="form-control" id="InputEmail" name="Inputemail" placeholder="Enter Email"> </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="InputPassword" name="Inputpassword" placeholder="Password"> </div>
                    </div>
                    <button type="submit" class="btn hvr-hover">Login</button>
                </form>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Create New Account</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                <form class="mt-3 collapse review-form-box" id="formRegister" method="post" action="{{route('KhachHang.register')}}">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">Name</label>
                                <input type="text" class="form-control" name = "Inputname" id="InputName" placeholder="Tên đăng nhập"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email </label>
                                <input type="email" class="form-control" name="InputEmail1" id="InputEmail1" placeholder="Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" placeholder="Mật khẩu"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Phone:</label>
                                <input type="text" class="form-control" id="Inputsodienthoai" name="Inputsodienthoai" placeholder="Số điện thoại"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Address</label>
                                <input type="text" class="form-control" name="Inputdiachi" id="Inputdiachi" placeholder="Địa chỉ"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Register</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection