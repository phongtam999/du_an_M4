<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ShopController;
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
//trang chủ shop
    
Route::patch('update-cart', [ShopController::class,'update'])->name('shop.updateCart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('shop.remove');
Route::prefix('shop')->group(function () {
    //shop đăng nhập,đăng ký
    Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
    Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
    Route::get('/login', [ShopController::class, 'login'])->name('shop.login');
    Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
    //trang chinh shop
    Route::get('/1991', [ShopController::class, 'shop'])->name('shop');
    //xem chi tiết
    Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
    //check out
    Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
    Route::post('/order', [ShopController::class, 'order'])->name('order');

    //giỏ hàng
    Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
    //thêm vào giỏ hàng
    Route::get('/addToCart/{id}', [ShopController::class, 'addToCart'])->name('shop.addcart');
   
});



//đăng nhập
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
// quên mật khẩu gửi đến mail
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/post_forgot_password', [AuthController::class, 'post_forgot_password'])->name('post_forgot_password');
//dang nhap 
Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::get('/', function () {
        return view('dashboard'); })->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//thể loại
Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/add', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::get('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
        Route::delete('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
        Route::get('/search', [CategoryController::class, 'search'])->name('category.search');
    });
//sản phẩm
Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/add', [ProductController::class, 'create'])->name('product.add');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::get('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
        Route::delete('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
        Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    });

     //đơn hàng
Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    });
     //khách hàng
Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');

    });

    //user
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/add', [UserController::class, 'create'])->name('user.add');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
});
//nhóm
Route::prefix('groups')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');

    
});

});


