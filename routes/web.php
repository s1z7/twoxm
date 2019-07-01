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
	
// 后台登录页面
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
Route::get('admin/outlogin','Admin\LoginController@outlogin');

Route::get('admin/rbac',function(){
	return view('admin.rbac');
});

Route::group(['middleware'=>['login']],function(){
			// 后台 首页
			Route::get('admin','Admin\IndexController@index');

			// 后台 用户
			Route::resource('admin/users','Admin\UsersController');

			// 后台 分类
			Route::resource('admin/cates','admin\CatesController');

			// 后台 管理员
			Route::resource('admin/adminuser','Admin\AdminuserController');
			// 后台  角色
			Route::resource('admin/roles','Admin\RolesController');
			// 后台 权限
			Route::resource('admin/nodes','Admin\NodesController');

			// 后台 轮播图
			Route::resource('admin/lunbo','admin\LunboController');

			// 后台 导航条
			Route::resource('admin/daohang','admin\DaohangController');

			// 后台 友情链接
			Route::resource('admin/link','admin\LinkController');

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

			//修改密码
			Route::get('admin/pass','Admin\LoginController@pass');
			Route::post('admin/dopass','Admin\LoginController@dopass');

			// 后台修改头像 路由
			Route::get('admin/changeprofile/{id}','Admin\LoginController@changeprofile');
			Route::post('admin/doprofile/{id}','Admin\LoginController@doprofile');
});
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

// 前台 注册 路由
Route::get('home/register','Home\RegisterController@index');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
// 处理 手机号注册
Route::post('home/register/store','Home\RegisterController@store');
// 处理 邮箱注册
Route::post('home/register/insert','Home\RegisterController@insert');
Route::get('home/register/changeStatus/{id}/{token}','Home\RegisterController@changeStatus');
//前台登录
Route::get('home/login','Home\LoginController@index');
//用户退出
Route::get('home/outlogin','Home\LoginController@outlogin');
//用户登录验证
Route::post('home/dologin','Home\LoginController@dologin');
//前台显示个人信息
Route::get('/home/geren','Home\GerenController@index');
//前台修改个人信息
Route::get('/home/geren/editxi/{id}','Home\GerenController@editxi');
//前台执行修改个人信息
Route::post('/home/geren/doeditxi/{id}','Home\GerenController@doeditxi');
//前台订单
Route::get('/home/geren/dingdan','Home\GerenController@dingdan');
//前台修改密码
Route::get('/home/geren/mima/{id}','Home\GerenController@mima');
//前台执行修改密码
Route::post('/home/geren/domima/{id}','Home\GerenController@domima');

