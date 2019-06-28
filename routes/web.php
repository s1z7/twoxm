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

// 后台 轮播图
Route::resource('admin/lunbo','admin\LunboController');

// 后台 导航条
Route::resource('admin/daohang','admin\DaohangController');

// 后台 友情链接
Route::resource('admin/link','admin\LinkController');

// 后台 收货地址
Route::resource('admin/dresse','admin\DresseController');


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

// 前台 商品列表页面
Route::get('home/list','Home\ListController@index');

// 前台 商品详情页面
Route::get('home/details/{id}','Home\DetailsController@index');

// 前台 加入购物车
Route::get('home/car/add','Home\CarController@add');

// 前台购物车页
Route::get('home/car/index','Home\CarController@index');

// 前台购物车增加商品数量
Route::get('home/car/addnum','Home\CarController@addNum');

// 前台购物车减少商品数量
Route::get('home/car/descnum','Home\CarController@descNum');

// 前台购物车删除
Route::get('home/car/delete','Home\CarController@delete');

// 前台确认结算
Route::get('home/order/account','Home\OrderController@account');

// 前台执行添加新地址
Route::post('home/order/add','Home\OrderController@add');

// 前台订单添加新地址
Route::get('home/order/create','Home\OrderController@create');

// 前台往订单表添加数据
Route::get('home/order/index','Home\OrderController@index');

// 前台查看我的订单页
Route::get('home/order/myorder','Home\OrderController@myorder');

// 前台生成订单付款页
Route::get('home/order/myods','Home\OrderController@myods');