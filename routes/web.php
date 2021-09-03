<?php

use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\LoaiSanPhamController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\TinTucController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LienHeController;
use App\Models\KhachHang;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('/Admin/loaisanpham',[LoaiSanPhamController::class,'index'])->name('Admin/loaisanpham.index');
    Route::get('/Admin/loaisanpham/create',[LoaiSanPhamController::class,'create'])->name('Admin/loaisanpham.create');
    Route::post('/Admin/loaisanpham/',[LoaiSanPhamController::class,'store'])->name('Admin/loaisanpham.store');
    Route::get('/Admin/loaisanpham/update/{id}',[LoaiSanPhamController::class,'edit'])->name('Admin/loaisanpham.edit');
    Route::put('/Admin/loaisanpham/update/{id}',[LoaiSanPhamController::class,'update'])->name('Admin/loaisanpham.update');
    Route::delete('/Admin/loaisanpham/{id}',[LoaiSanPhamController::class,'destroy'])->name('Admin/loaisanpham.delete');
    // San phẩm
    Route::get('/Admin/sanpham',[SanPhamController::class,'index'])->name('Admin/sanpham.index');
    Route::get('/Admin/sanpham/create',[SanPhamController::class,'create'])->name('Admin/sanpham.create');
    Route::post('/Admin/sanpham/',[SanPhamController::class,'store'])->name('Admin/sanpham.store');
    Route::get('/Admin/sanpham/update/{id}',[SanPhamController::class,'edit'])->name('Admin/sanpham.edit');
    Route::put('/Admin/sanpham/update/{id}',[SanPhamController::class,'update'])->name('Admin/sanpham.update');
    Route::delete('/Admin/sanpham/{id}',[SanPhamController::class,'destroy'])->name('Admin/sanpham.delete');
    //Đơn hàng Admin
    Route::get('/Admin/donhang',[DonHangController::class,'index'])->name('Admin/donhang.index');
    Route::get('/Admin/donhang/show',[DonHangController::class,'show'])->name('Admin/donhang.show');
    Route::get('/Admin/donhang/update/{id}',[DonHangController::class,'edit'])->name('Admin/donhang.update');
    Route::put('/Admin/donhang/update/{id}',[DonHangController::class,'update'])->name('Admin/donhang.update');
    Route::delete('/Admin/donhang/{id}',[DonHangController::class,])->name('Admin/donhang.delete');
    Route::get('/Admin/donhang/showcthd/{id}',[DonHangController::class,'showcthd'])->name('Admin/donhang.showcthd');
    //Giỏ hàng
    //TintucAdmin
    Route::get('/Admin/tintuc',[TinTucController::class,'index'])->name('Admin/tintuc.index');
    Route::get('/Admin/tintuc/create',[TinTucController::class,'create'])->name('Admin/tintuc.create');
    Route::post('/Admin/tintuc/',[TinTucController::class,'store'])->name('Admin/tintuc.store');
    Route::get('/Admin/tintuc/update/{id}',[TinTucController::class,'edit'])->name('Admin/tintuc.edit');
    Route::put('/Admin/tintuc/update/{id}',[TinTucController::class,'update'])->name('Admin/tintuc.update');
    Route::delete('/Admin/tintuc/{id}',[TinTucController::class,'destroy'])->name('Admin/tintuc.delete');
});
Route::middleware(['auth'])->group(function(){
//MyAccount
Route::get('/MyAccount',[\App\Http\Controllers\MyAccountController::class,'index'])->name('MyAccount')->middleware('auth');
Route::get('MyAccount/Your_Order/{id}',[\App\Http\Controllers\MyAccountController::class,'show'])->name('Your_Order');
//Checkout
Route::get('/Checkout',[CheckoutController::class,'index'])->name('Checkout');
Route::post('/ThanhToan',[CheckoutController::class,'thanhtoan'])->name('Checkout.thanhtoan');
});
Route::get('/Home',[HomeController::class,'index'])->name('Home.index');

Route::get('/GioHang',[GioHangController::class,'cart'])->name('GioHang.cart');
Route::get('/Add_GioHang/{sanpham}',[GioHangController::class,'addToCart'])->name('GioHang.addTocart');
Route::get('/Remove_GioHang/{id}',[GioHangController::class,'RemoveGioHang'])->name('Remove_GioHang');

//Contact-Us
Route::get('/Contact-Us',[LienHeController::class,'index'])->name('Contact-Us');
Route::post('/Contact-Us',[LienHeController::class,'store'])->name('Contact_Us.store');

//Shop
Route::get('/Shop',[App\Http\Controllers\ShopController::class,'index'])->name('Shop');
Route::get('/Shop_Detail/{id}',[App\Http\Controllers\ShopController::class,'shop_detail'])->name('Shop_Detail');
Route::get('/Shop/show',[App\Http\Controllers\ShopController::class,'show'])->name('Shop.show');
Route::get('/Shop/Product_Category/{id}',[App\Http\Controllers\ShopController::class,'showproduct_cat'])->name('Shop.showproduct_cat');
//Blog
Route::get('/Blog',[BlogController::class,'index'])->name('Blog');