<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'canteen-ms'],function (){
    Route::group(['prefix'=>'khachhang'],function (){
        Route::get('danhsach','KhachHangController@getDanhsach');
        Route::get('sua/{id}','KhachHangController@getSua');
        Route::post('sua/{id}','KhachHangController@postSua');
        Route::get('them','KhachHangController@getThem');
        Route::post('them','KhachHangController@postThem');
        Route::get('xoa/{id}','KhachHangController@getXoa');
    });

    Route::group(['prefix'=>'nhanvien'],function (){
        Route::get('danhsach','NhanVienController@getDanhsach');
        Route::get('sua/{id}','NhanVienController@getSua');
        Route::post('sua/{id}','NhanVienController@postSua');
        Route::get('them','NhanVienController@getThem');
        Route::post('them','NhanVienController@postThem');
        Route::get('xoa/{id}','NhanVienController@getXoa');
    });

    Route::group(['prefix'=>'sanpham'],function (){
        Route::get('danhsach','SanPhamController@getDanhsach');
        Route::get('sua/{id}','SanPhamController@getSua');
        Route::post('sua/{id}','SanPhamController@postSua');
        Route::get('them','SanPhamController@getThem');
        Route::post('them','SanPhamController@postThem');
        Route::get('xoa/{id}','SanPhamController@getXoa');
    });
});
