<?php

header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => 'checkAdminTaiKhoan'], function () {
    Route::group(['prefix' => '/danh-muc-mon-an'], function () {
        Route::get('/index', [\App\Http\Controllers\DanhMucMonAnController::class, 'index']);

        Route::get('/get-data', [\App\Http\Controllers\DanhMucMonAnController::class, 'getData']);
        Route::get('/update-status/{id}', [\App\Http\Controllers\DanhMucMonAnController::class, 'updateStatus']);

        Route::post('/index', [\App\Http\Controllers\DanhMucMonAnController::class, 'store']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucMonAnController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucMonAnController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\DanhMucMonAnController::class,'destroy']);
    });

    Route::group(['prefix' => '/mon-an'], function () {
        Route::get('/index', [\App\Http\Controllers\MonAnController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\MonAnController::class, 'store']);

        Route::post('/check-ma-mon-an', [\App\Http\Controllers\MonAnController::class,'checkMaMonAn']);
        Route::post('/check-ten-mon-an', [\App\Http\Controllers\MonAnController::class,'checkTenMonAn']);
        Route::post('/check-slug-mon-an', [\App\Http\Controllers\MonAnController::class,'checkSlugMonAn']);

        Route::get('/get-data', [\App\Http\Controllers\MonAnController::class, 'getData']);

        Route::get('/update-status/{id}', [\App\Http\Controllers\MonAnController::class, 'updateStatus']);


        Route::get('/edit/{id}', [\App\Http\Controllers\MonAnController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\MonAnController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\MonAnController::class,'destroy']);
    });


    Route::group(['prefix' => '/tai-khoan'], function () {
        Route::get('/index', [\App\Http\Controllers\TaiKhoanController::class, 'index']);
        Route::post('/index', [\App\Http\Controllers\TaiKhoanController::class, 'store']);

        Route::post('/check-email', [\App\Http\Controllers\TaiKhoanController::class,'checkEmail']);
        Route::post('/check-so-dien-thoai', [\App\Http\Controllers\TaiKhoanController::class,'checkSoDienThoai']);

        Route::get('/get-data', [\App\Http\Controllers\TaiKhoanController::class, 'getData']);

        Route::get('/update-status/{id}', [\App\Http\Controllers\TaiKhoanController::class, 'updateStatus']);


        Route::get('/edit/{id}', [\App\Http\Controllers\TaiKhoanController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\TaiKhoanController::class, 'update']);

        Route::get('/destroy/{id}', [\App\Http\Controllers\TaiKhoanController::class,'destroy']);
        Route::get('logout', [\App\Http\Controllers\TaiKhoanController::class, 'logout']);
    });

    Route::group(['prefix' => '/don-hang'], function () {
        Route::get('/', [\App\Http\Controllers\Customer\OrderController::class, 'index']);

    });
});
// Page is not need login
Route::get('/admin/login', [\App\Http\Controllers\TaiKhoanController::class, 'viewLogin']);
Route::post('/admin/login', [\App\Http\Controllers\TaiKhoanController::class, 'actionLogin']);
Route::get('/admin/logout', [\App\Http\Controllers\TaiKhoanController::class, 'logout']);
// Page is not need login--


// Page login customer
Route::get('/login', [\App\Http\Controllers\CustomerController::class, 'viewLogin']);
Route::post('/login', [\App\Http\Controllers\CustomerController::class, 'actionLogin']);
Route::get('/register', [\App\Http\Controllers\CustomerController::class, 'viewRegister']);
Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'actionRegister']);
Route::get('/kich-hoat/{hash}', [\App\Http\Controllers\CustomerController::class, 'active']);

Route::get('/logout', [\App\Http\Controllers\HomepageController::class, 'actionLogout']);

Route::group(['prefix' => '/customer', 'middleware' => 'checkCustomerTaiKhoan'], function () {
    Route::group(['prefix' => '/cart'], function () {
        Route::get('/add-to-cart/{id_mon_an}', [\App\Http\Controllers\GioHangController::class, 'store']);
        Route::get('/', [\App\Http\Controllers\GioHangController::class, 'index']);
        Route::get('/remove/{id}', [\App\Http\Controllers\GioHangController::class, 'removeCart']);
        Route::post('/update', [\App\Http\Controllers\GioHangController::class, 'updateCart']);

        Route::post('/addCartFromDetail', [\App\Http\Controllers\GioHangController::class, 'addCartFromDetail']);
    });
    Route::group(['prefix' => '/checkout'], function () {
        Route::get('/', [\App\Http\Controllers\CheckoutController::class, 'index']);
        Route::get('/getData', [\App\Http\Controllers\CheckoutController::class, 'getData']);
        Route::post('/finish', [\App\Http\Controllers\CheckoutController::class, 'store']);
    });
    Route::group(['prefix' => '/order'], function () {
        Route::get('/', [\App\Http\Controllers\ManagerOrderController::class, 'index']);
        Route::get('/get-data', [\App\Http\Controllers\ManagerOrderController::class, 'getData']);
        Route::get('/deleteOrder/{id}', [\App\Http\Controllers\ManagerOrderController::class, 'delete']);
    });
});
Route::get('/customer/cart/data', [\App\Http\Controllers\GioHangController::class, 'dataCart']);
Route::get('/customer/cart/total', [\App\Http\Controllers\GioHangController::class, 'totalCart']);



// Page is not need login
Route::get('/home', [\App\Http\Controllers\HomepageController::class, 'viewHome']);
Route::get('/home/countCart', [\App\Http\Controllers\HomepageController::class, 'countCart']);

Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index']);

Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('/menu/category', [App\Http\Controllers\MenuController::class, 'getCategory']);
Route::get('/menu/getFood/{id}', [App\Http\Controllers\MenuController::class, 'getFood']);

Route::get('/menu/detailFood/{id}', [App\Http\Controllers\MenuController::class, 'getDetailFood']);
Route::get('/menu/search/{key}', [App\Http\Controllers\MenuController::class, 'searchFood']);

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index']);
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
