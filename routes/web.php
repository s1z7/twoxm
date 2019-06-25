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

// 后台 首页
Route::get('admin','Admin\IndexController@index');

// 后台 用户
Route::resource('admin/users','Admin\UsersController');

// 后台 分类
Route::resource('admin/cates','admin\CatesController');


// 后台 品牌
Route::resource('admin/brands','admin\BrandsController');



// 后台 商品详情
Route::resource('admin/goods','Admin\GoodsController');

// 商品详情 添加
Route::get('admin/goodsinfos/create/{id}','Admin\GoodsinfosController@create');

// 商品详情 提交
Route::post('admin/goodsinfos/store/{id}','Admin\GoodsinfosController@store');

// 商品详情 列表
Route::get('admin/goodsinfos/index/{id}','Admin\GoodsinfosController@index');

// 商品详情 修改
Route::get('admin/goodsinfos/edit/{id}','Admin\GoodsinfosController@edit');

// 商品详情 执行修改
Route::post('admin/goodsinfos/update/{id}','Admin\GoodsinfosController@update');

// 商品详情 删除
Route::post('admin/goodsinfos/destroy/{id}','Admin\GoodsinfosController@destroy');

// 前台 首页
Route::resource('home/index','Home\IndexController');
