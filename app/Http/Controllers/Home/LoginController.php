<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use Session;
class LoginController extends Controller
{
    //前台登录
    public function index()
    {
      return view('home.login.index');
    }
    //账号与密码比对数据库路由
	public function dologin(Request $request)
	{

		$rs = $request->except('token');
		$user = Users::where('uname',$rs['uname'])->first();
		if (!$user) {
			echo "<script>alert('用户名或密码错误');location.href='/home/login';</script>";			
		}else{
			$data = Hash::check($rs['upass'],$user->upass);
			if (!$data) {
				echo "<script>alert('用户名或密码错误');location.href='/home/login';</script>";
			}else{
				 session(['uname'=>$user->uname,'id'=>$user->id]);
				  return redirect('/home/index')->with('success','登录成功');
			}
		}

	}
	//用户退出路由
	public function outlogin()
	{
		Session::forget('uname','id');
        return redirect('/home/index')->with('success','退出成功');
	}
}
