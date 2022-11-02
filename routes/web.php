<?php

header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => 'checkAdminTaiKhoan'], function () {
    Route::group(['prefix' => '/danh-muc-mon-an'], function () {
        Route::get('/index', [\App\Http\Controllers\Admin\DanhMucMonAnController::class, 'index']);

        Route::get('/get-data', [\App\Http\Controllers\Admin\DanhMucMonAnController::class, 'getData']);
        Route::get('/update-status/{id}', [\App\Http\Controllers\Admin\DanhMucMonAnController::class, 'updateStatus']);

        Route::post('/index', [\App\Http\Controllers\Admin\DanhMucMonAnController::class, 'store']);
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\DanhMucMonAnController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\Admin\DanhMucMonAnController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\Admin\DanhMucMonAnController::class,'destroy']);
    });

    Route::group(['prefix' => '/mon-an'], function () {
        Route::get('/index', [\App\Http\Controllers\Admin\MonAnController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\Admin\MonAnController::class, 'store']);

        Route::post('/check-ma-mon-an', [\App\Http\Controllers\Admin\MonAnController::class,'checkMaMonAn']);
        Route::post('/check-ten-mon-an', [\App\Http\Controllers\Admin\MonAnController::class,'checkTenMonAn']);
        Route::post('/check-slug-mon-an', [\App\Http\Controllers\Admin\MonAnController::class,'checkSlugMonAn']);

        Route::get('/get-data', [\App\Http\Controllers\Admin\MonAnController::class, 'getData']);

        Route::get('/update-status/{id}', [\App\Http\Controllers\Admin\MonAnController::class, 'updateStatus']);


        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\MonAnController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\Admin\MonAnController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\Admin\MonAnController::class,'destroy']);
    });


    Route::group(['prefix' => '/tai-khoan'], function () {
        Route::get('/index', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'store']);

        Route::post('/check-email', [\App\Http\Controllers\Admin\TaiKhoanController::class,'checkEmail']);
        Route::post('/check-so-dien-thoai', [\App\Http\Controllers\Admin\TaiKhoanController::class,'checkSoDienThoai']);

        Route::get('/get-data', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'getData']);

        Route::get('/update-status/{id}', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'updateStatus']);


        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\Admin\TaiKhoanController::class,'destroy']);
        Route::get('logout', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'logout']);
    });

    Route::group(['prefix' => '/don-hang'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\OrderController::class, 'index']);
        Route::get('/get-data', [\App\Http\Controllers\Admin\OrderController::class, 'getData']);
        Route::get('/get-dataDetail/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'getDataDetail']);
        Route::get('/changeToShipping/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'changeToShipping']);
        Route::get('/changeToShipped/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'changeToShipped']);
        Route::get('/changeToShippingAll', [\App\Http\Controllers\Admin\OrderController::class, 'changeToShippingAll']);
        Route::get('/changeToShippedAll', [\App\Http\Controllers\Admin\OrderController::class, 'changeToShippedAll']);
    });

    Route::group(['prefix' => '/hoa-don'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\HoaDonController::class, 'index']);
        Route::get('/export', [\App\Http\Controllers\Admin\HoaDonController::class, 'export']);
        Route::get('/get-data', [\App\Http\Controllers\Admin\HoaDonController::class, 'getData']);
    });
});

// Page is not need login
Route::get('/admin/login', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'viewLogin']);
Route::post('/admin/login', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'actionLogin']);
Route::get('/admin/logout', [\App\Http\Controllers\Admin\TaiKhoanController::class, 'logout']);
// Page is not need login--


// Page login customer
Route::get('/login', [\App\Http\Controllers\Customer\CustomerController::class, 'viewLogin']);
Route::post('/login', [\App\Http\Controllers\Customer\CustomerController::class, 'actionLogin']);
Route::get('/register', [\App\Http\Controllers\Customer\CustomerController::class, 'viewRegister']);
Route::post('/register', [\App\Http\Controllers\Customer\CustomerController::class, 'actionRegister']);
Route::get('/kich-hoat/{hash}', [\App\Http\Controllers\Customer\CustomerController::class, 'active']);
Route::post('/changePass', [\App\Http\Controllers\Customer\CustomerController::class, 'changePass']);
Route::get('/confirmChangePass/{hash}', [\App\Http\Controllers\Customer\CustomerController::class, 'viewChangePass']);
Route::post('/confirmChangePass', [\App\Http\Controllers\Customer\CustomerController::class, 'newPass']);

Route::get('/logout', [\App\Http\Controllers\Customer\HomepageController::class, 'actionLogout']);

Route::group(['prefix' => '/customer', 'middleware' => 'checkCustomerTaiKhoan'], function () {
    Route::group(['prefix' => '/cart'], function () {
        Route::get('/add-to-cart/{id_mon_an}', [\App\Http\Controllers\Customer\GioHangController::class, 'store']);
        Route::get('/', [\App\Http\Controllers\Customer\GioHangController::class, 'index']);
        Route::get('/remove/{id}', [\App\Http\Controllers\Customer\GioHangController::class, 'removeCart']);
        Route::post('/update', [\App\Http\Controllers\Customer\GioHangController::class, 'updateCart']);

        Route::post('/addCartFromDetail', [\App\Http\Controllers\Customer\GioHangController::class, 'addCartFromDetail']);
    });
    Route::group(['prefix' => '/checkout'], function () {
        Route::get('/', [\App\Http\Controllers\Customer\CheckoutController::class, 'index']);
        Route::get('/getData', [\App\Http\Controllers\Customer\CheckoutController::class, 'getData']);
        Route::post('/finish', [\App\Http\Controllers\Customer\CheckoutController::class, 'store']);
    });
    Route::group(['prefix' => '/order'], function () {
        Route::get('/', [\App\Http\Controllers\Customer\ManagerOrderController::class, 'index']);
        Route::get('/get-data', [\App\Http\Controllers\Customer\ManagerOrderController::class, 'getData']);
        Route::get('/deleteOrder/{id}', [\App\Http\Controllers\Customer\ManagerOrderController::class, 'delete']);
    });
    Route::group(['prefix' => '/account'], function () {
        Route::get('/', [\App\Http\Controllers\Customer\ManagerAccountController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\Customer\ManagerAccountController::class, 'uploadFile']);
    });
});
Route::get('/customer/cart/data', [\App\Http\Controllers\Customer\GioHangController::class, 'dataCart']);
Route::get('/customer/cart/total', [\App\Http\Controllers\Customer\GioHangController::class, 'totalCart']);



// Page is not need login
Route::get('/home', [\App\Http\Controllers\Customer\HomepageController::class, 'viewHome']);
Route::get('/home/countCart', [\App\Http\Controllers\Customer\HomepageController::class, 'countCart']);

Route::get('/about', [\App\Http\Controllers\Customer\AboutController::class, 'index']);

Route::get('/menu', [App\Http\Controllers\Customer\MenuController::class, 'index']);
Route::get('/menu/category', [App\Http\Controllers\Customer\MenuController::class, 'getCategory']);
Route::get('/menu/getFood/{id}', [App\Http\Controllers\Customer\MenuController::class, 'getFood']);

Route::get('/menu/detailFood/{id}', [App\Http\Controllers\Customer\MenuController::class, 'getDetailFood']);
Route::get('/menu/search/{key}', [App\Http\Controllers\Customer\MenuController::class, 'searchFood']);

Route::get('/blog', [\App\Http\Controllers\Customer\BlogController::class, 'index']);
Route::get('/gallery', [\App\Http\Controllers\Customer\GalleryController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\Customer\ContactController::class, 'index']);
