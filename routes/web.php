<?php


use App\Http\Controllers\frontend\CouponController;
use App\Models\Order_statisticals;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you cay the RouteServiceProvider within a group which
| contains the "wn register web routes for your application. These
| routes are loaded beb" middleware group. Now create something great!
|
*/

Route::get('admin', 'DashboardController@show')->name('d');

Route::get('admin/nguyen-lieu', 'MaterialController@show')->name('showMaterial');
Route::get('admin/sua-nguyen-lieu/{id}', 'MaterialController@editMaterialView')->name('material.editview');
Route::post('admin/sua-nguyen-lieu/{id}', 'MaterialController@updateMaterial')->name('material.edithandle');

Route::get('admin/them-nguyen-lieu', 'MaterialController@addMaterialView')->name('material.addview');
Route::post('admin/them-nguyen-lieu', 'MaterialController@addMaterialHandle')->name('material.addhandle');
Route::get('admin/xoa-nguyen-lieu/{id}', 'MaterialController@delMaterial')->name('material.delete');
Route::post('admin/tim-kiem/', 'MaterialController@searchMaterial')->name('material.search');

//san pham
Route::get('admin/san-pham', 'ProductController@show')->name('products.show');
Route::get('admin/them-san-pham', 'ProductController@addProductView')->name('products.addview');
Route::post('admin/them-san-pham', 'ProductController@addProductHandle')->name('products.addhandle');


//auth
Route::get('/register', 'RegisterController@showFormRegister')->name('auth.register');
Route::post('/register', 'RegisterController@postRegister')->name('authregister');
Route::post('/login', 'LoginController@postLogin')->name('authlogin');
Route::get('/login', 'LoginController@getLogin')->name('auth.login');
Route::get('/logoutAdmin', 'LoginController@logout')->name('auth.logout');

//nguyen lieu
Route::get('admin/nguyen-lieu', 'MaterialController@show')->name('showMaterial');
Route::get('/admin/nguyen-lieu-ajax', 'MaterialController@showMalAjax');
Route::post('/admin/xoa-nguyen-lieu-ajax/{id}', 'MaterialController@delMalAjax');

Route::get('admin/sua-nguyen-lieu/{slug}', 'MaterialController@editMaterialView')->name('material.editview');
Route::post('admin/sua-nguyen-lieu/{id}', 'MaterialController@updateMaterial')->name('material.edithandle');
Route::get('admin/them-nguyen-lieu', 'MaterialController@addMaterialView')->name('material.addview');
Route::post('admin/them-nguyen-lieu', 'MaterialController@addMaterialHandle')->name('material.addhandle');
Route::get('admin/xoa-nguyen-lieu/{id}', 'MaterialController@delMaterial')->name('material.delete');
Route::post('admin/tim-kiem/', 'MaterialController@searchMaterial')->name('material.search');

//san pham
Route::get('admin/san-pham', 'ProductController@show')->name('products.show');
Route::get('admin/them-san-pham', 'ProductController@addProductView')->name('products.addview');
Route::post('admin/them-san-pham', 'ProductController@addProductHandle')->name('products.addhandle');
Route::get('admin/sua-san-pham/{slug}', 'ProductController@editProductView')->name('products.editview');
Route::post('admin/sua-san-pham/{id}', 'ProductController@updateProduct')->name('products.edithandle');

//auth

// Route::get('/register','RegisterController@showFormRegister')->name('auth.register');
// Route::post('/register','RegisterController@postRegister')->name('authregister');
// Route::post('/login','LoginController@postLogin')->name('authlogin');
// Route::get('/login','LoginController@getLogin')->name('auth.login');
// Route::get('/logout','LoginController@logout')->name('auth.logout');

Route::get('/fetchData', 'ProductController@sendData');
Route::get('/admin/them-nguyen-lieu-ajax', 'MaterialController@addMaterialViewAjax');
Route::post('/admin/them-nguyen-lieu-ajax1', 'MaterialController@addMaterialHandleAjax');

Route::get('/register', 'RegisterController@showFormRegister')->name('auth.register');
Route::post('/register', 'RegisterController@postRegister')->name('authregister');
Route::post('/login', 'LoginController@postLogin')->name('authlogin');
Route::get('/login', 'LoginController@getLogin')->name('auth.login');
Route::get('/logoutAdmin', 'LoginController@logout')->name('auth.logout');


//xử lí đơn hàng
Route::get('order', 'OrderController@index')->name('get.order');
Route::get('delorder/{id}', 'OrderController@del')->name('get.del');
Route::get('viewDetail/{id}', 'OrderController@viewDetail')->name('get.viewDetail');
Route::get('action/{action}/{id}', 'OrderController@action')->name('get.action');
Route::get('update/{madh}', 'OrderController@update')->name('get.update');
Route::get('actionPayment/{action}/{id}', 'OrderController@actionPayment')->name('get.actionPayment');
Route::get('print-order/{madh}', 'OrderController@print_order')->name('print.order');
Route::post('dels', 'OrderController@dels')->name('dels');


// thêm mã khuyễn mãi
Route::get('coupon', 'CouponController@index')->name('get.admin.coupon');
Route::get('addcoupon', 'CouponController@add')->name('add.coupon');
Route::post('postcoupon', 'CouponController@post')->name('post.coupon');
Route::get('deletecoupon/{id}', 'CouponController@delete')->name('delete.coupon');
Route::get('detailCoupon/{id}', 'CouponController@detailCoupon')->name('get.detail.coupon');
Route::get('edit/{id}', 'CouponController@edit')->name('get.edit');
Route::post('editpost/{id}', 'CouponController@editpost')->name('edit.coupon');

Route::get('getCategoryPromo', 'CouponController@getCategoryPromo');
Route::get('getProductPromo', 'CouponController@getProductPromo');
Route::get('getListData', 'CouponController@getListData');







// thêm phí vận chuyển

Route::get('shipping', 'ShippingController@index')->name('get.shipping');

Route::post('/priceprovince', 'ShippingController@post')->name('post.province');
Route::post('/changefeeship', 'ShippingController@change')->name('change.province');
Route::get('/getward/{district}', 'ShippingController@getWard')->name('get.ward');
Route::get('/getprice/{id}', 'ShippingController@getPrice')->name('get.price');
Route::get('/delprovince/{procode}', 'ShippingController@delProvince')->name('del.feeprovince');

// slide
Route::get('slide', 'AdminController@getSlide')->name('get.slide');
Route::get('addSlide', 'AdminController@addSlide')->name('add.slide');
Route::post('addSlideP', 'AdminController@postAddSlide')->name('post.slide');
Route::get('editSlide/{id}', 'AdminController@editSlide')->name('edit.slide');
Route::post('editSlideP/{id}', 'AdminController@postEdit')->name('post.edit.slide');

Route::get('deleteSlide/{id}', 'AdminController@deleteSlide')->name('delete.slide');
Route::get('activeSlide/{id}', 'AdminController@activeSlide')->name('active.slide');
Route::post('positionSlide/{id}', 'AdminController@positionSlide')->name('position.slide');
















Route::group(['namespace' => 'frontend'], function () {
    //trang chủ
    Route::get('/', 'HomeController@index')->name('get.home');
    //quickview 
    Route::post('/quickview', 'HomeController@quickView')->name('quickview');

    //giỏ hàng
    Route::post('/addCart', 'CartController@addCart')->name('add.cart');
    Route::post('/delItemCart', 'CartController@delItemCart')->name('del.cart');


    Route::get('/Cart', 'CartController@index')->name('get.cart');


    Route::get('/delCart', 'CartController@delCart')->name('testdl');

    //cart update 
    Route::post('/upCart', 'CartController@upCart')->name('get.upCart');
    Route::post('/pupCart', 'CartController@postupCart')->name('postup.cart');
    Route::post('/checkout', 'CartController@postPay')->name('post.checkout');


    // xác nhận hoá đơn
    Route::get('invoice', 'CartController@InvoiceConfirm')->name('invoice.confirm');


    //thanh toán Paypal sandbox
    Route::get('create-transaction', 'PayPalController@createTransaction')->name('createTransaction');
    Route::get('process-transaction', 'PayPalController@processTransaction')->name('processTransaction');
    Route::get('success-transaction', 'CartController@successTransaction')->name('successTransaction');
    Route::get('cancel-transaction', 'CartController@cancelTransaction')->name('cancelTransaction');


    //thanh toán vnpay sandbox
    Route::post('vnpayPayment', 'VnpayController@vnpayPayment')->name('vnpayPayment');

    //thanh toán momo sandbox
    Route::post('momoPayment', 'VnpayController@momoPayment')->name('momoPayment');
    Route::post('momoPaymentQR', 'VnpayController@momoQR')->name('momoPaymentQR');
    Route::post('returnData', 'VnpayController@returnData');


    //mua hàng thành công

    Route::get('checkoutcomplete', 'CartController@checkoutComplete')->name('checkoutcomplete');





    // đăng nhâp với facebook
    Route::get('/login/{type}', 'LoginSocialController@login')->name('login.facebook');
    Route::get('/callback/{type}', 'LoginSocialController@callback');

    Route::get('/logout', 'LoginSocialController@logout')->name('logout');

    Route::post('/register', 'HomeController@register')->name('register');

    Route::post('/registerSDT', 'LoginSocialController@registerSDT')->name('registerSDT');
    Route::post('/active', 'LoginSocialController@activeSDT')->name('activeSDT');




    //tin tức
    Route::get('posts',  'PostsController@index')->name('get.posts');
    Route::get('posts/{slug}',  'PostsController@getPosts')->name('detail.posts');


    Route::get('about',  'AboutController@index')->name('about');


    Route::get('products',  'ProductController@index')->name('product');
    Route::get('detail/{p}',  'ProductController@detail')->name('detail');
    Route::post('search',  'ProductController@search')->name('get.search');


    //tài khoản

    Route::get('account/{nav}', 'LoginSocialController@getInfo')->name('get.infouser');
    Route::get('update_user', 'LoginSocialController@update_user')->name('update.user');
    Route::get('transaction', 'AccountController@index')->name('get.user.transaction');
    Route::post('detail', 'AccountController@detail')->name('get.user.detail');
    Route::post('wishlist/{id}', 'AccountController@wishlist')->name('get.user.wishlist');
    Route::get('delwishlist/{id}', 'AccountController@delwishlist')->name('del.user.wishlist');







    //đăng kí 
    Route::get('register', 'RegisterController@index')->name('get.register');
    Route::post('Pregister', 'RegisterController@register')->name('post.register');
    Route::get('active/{customer}/{token}', 'RegisterController@active')->name('register.active');


    //đăng nhập
    Route::post('loginAcc', 'LoginSocialController@loginAcc')->name('post.login');


    Route::get('x', 'RegisterController@get');


    //quên mật khẩu 
    Route::post('forgetPassword', 'LoginSocialController@loginAcc')->name('post.login');
    Route::post('forget-password', 'RegisterController@postforgetPasss')->name('post.forget');
    Route::get('/get-password/{customer}/{token}', 'RegisterController@getPass')->name('get.pass');
    Route::post('/get-password/{customer}', 'RegisterController@postPass')->name('post.pass');



    //bình luận
    Route::post('comment/{type}/{id}', 'CommentController@comment')->name('get.comment');

    //ma khuyen mai

    Route::get('getcoupon', 'CouponController@getCoupon')->name('get.coupon');
    Route::post('checkcoupon/', 'CouponController@checkCoupon')->name('check.coupon');


    // tat ca khuyen mai
    Route::get('promotion', 'CouponController@getAllPromotion')->name('get.all.promotion');
});