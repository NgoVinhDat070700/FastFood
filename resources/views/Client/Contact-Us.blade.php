@extends('layouts.master_layout')
@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Contact Us</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Contact Us </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>GET IN TOUCH</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio justo, ultrices ac nisl sed, lobortis porta elit. Fusce in metus ac ex venenatis ultricies at cursus mauris.</p>
                    <form name="myForm" id="myForm" action="{{route('Contact_Us.store')}}" method="POST">
                        @csrf
                        <p style="color: #5E5B5B; font-size: 22px;">Tên của bạn*<br><input type="text" name="name" id="name" onFocus="mau(this)" onBlur="kiemtraname()" style="height: 25px; width: 600px;"></p>
                        <p id="erroname"></p>
                        <p style="color: #5E5B5B; font-size: 22px;">Số điện thoại*<br><input type="text" onFocus="mau(this)" onBlur="kiemtrasdt()" value="" name="sodienthoai" id="sodienthoai" style="height: 25px; width: 600px; z-index: 9999;"></p>
                        <p id="errodt"></p>
                        <p style="color: #5E5B5B; font-size: 22px;">Email*<br><input type="text" name="email" id="email" onFocus="mau(this)" onBlur="kiemtraemail()" style="height: 25px; width: 600px;"></p>
                        <p id="erroemail"></p>
                        <p style="color: #5E5B5B; font-size: 22px;">Chủ đề*<br><input type="text" name="chude" id="chude" onFocus="mau(this)" onBlur="kiemtraemail()" style="height: 25px; width: 600px;"></p>
                        <p id="erroemail"></p>
                        <p style="color: #5E5B5B; font-size: 22px;">Hãy cho chúng tôi biết về nhu cầu của bạn*<br>
                            <textarea rows="6" cols="80" onBlur="kiemtranc()" name="loinhan" id="loinhan"></textarea>
                        </p>
                        <p id="erronc"></p>
                        <input type="submit" name="button" value="ĐĂNG KÝ" style="height: 50px; width: 300px; background: red; border:none; border-radius: 5px;">
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>CONTACT INFO</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    <ul>
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 9000 <br>Preston Street Wichita,<br> KS 87213 </p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection