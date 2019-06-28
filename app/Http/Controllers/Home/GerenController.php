<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\Users;
use App\Models\UsersInfo;
use DB;
use Hash;
class GerenController extends Controller
{
	//显示个人信息
    public function index()
    {
    	//获取友情链接
        $data_link = Link::get();
       	//获取用户表信息
        $data_users = Users::where('id',session('id'))->first();
        // dd($data_users);
        //获取用户详情表信息
        $data_usersinfo = UsersInfo::where('uid',$data_users->id)->first();
        //dd($data_usersinfo);
        //个人信息
        return view ('home.geren.xinxi',['data_link'=>$data_link,'data_users'=>$data_users,'data_usersinfo'=>$data_usersinfo]);
    }

    //修改个人信息
    public function editxi($id)
    {
    	//获取友情链接
        $data_link = Link::get();
        //修改个人信息
        $user_data = Users::find($id);
        //个人信息
        return view ('home.geren.editxi',['data_link'=>$data_link,'user_data'=>$user_data]);
    }

    //执行修改个人信息
    public function doeditxi(Request $request,$id)
    {
    	//dd($id);
    	//开启事务 用户表和用户详情表同时添加数据
    	DB::beginTransaction();
    	// 获取头像
        if ($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('profile');
        }
        $user = Users::find($id);
        $user->email = $request->input('email','');
        $user->phone = $request->input('phone','');
        $res1 = $user->save();
        
        $sex = $request->input('sex','');
        $age = $request->input('age','');
        $qq = $request->input('qq','');
        

        $userinfo = UsersInfo::where('uid',$id)->first();
        //dd($userinfo);
        $userinfo->uid = $id;
        $userinfo->sex = $sex;
        $userinfo->age = $age;
        $userinfo->qq = $qq;
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();
        if($res1 && $res2){
            // 如果两个表都修改成功 就提交事务
            DB::commit();

           	echo "<script>alert('修改成功');location.href='/home/geren'</script>";


        }else{
            // 否则 就执行事务回滚
            DB::rollBack();
            echo "<script>alert('修改失败');location.href='/home/geren'</script>";
        } 
  	} 

    //显示修改密码
    public function mima($id)
    {
    	//获取友情链接
        $data_link = Link::get();
        //修改密码
        $user_data = Users::find($id);
        //修改密码
        return view ('home.geren.mima',['data_link'=>$data_link,'user_data'=>$user_data]);
    }

    //执行修改密码
    public function domima(Request $request,$id)
    {
    	$data = Users::find($id);


		$pass = $request->input('upass','');
		$newpass = $request->input('newpass','');
		$repass = $request->input('repass','');
		if(!Hash::check($pass,$data->upass)){
    		echo "<script>alert('原密码错误');location.href='/home/geren'</script>";
            exit;
    	}


    	if(!preg_match("/^[\w]{6,18}$/",$newpass)){
             echo "<script>alert('新密码格式错误');location.href='/home/geren'</script>";
             exit;
        }


         if(!preg_match("/^[\w]{6,18}$/",$repass)){
             echo "<script>alert('确认密码格式错误');location.href='/home/geren'</script>";
             exit;
        }


        if($newpass != $repass){
            echo "<script>alert('两次密码输入不一致');location.href='/home/geren'</script>";
            exit;
        }

        $newpass = Hash::make($request->input('newpass',''));
    	//更新数据库密码
        $data->upass = $newpass;
    	$res = $data->save();
    	if($res){
    		//清空session
            session(['$user->uname'=>false]);
        	session(['$user->id'=>null]);
			return redirect('/home/outlogin')->with('success','修改成功！');
		}else{
			echo "<script>alert('修改密码失败');location.href='/home/geren'</script>";
		}
	
    }

    //显示订单
    public function dingdan()
    {
    	//获取友情链接
        $data_link = Link::get();
        //显示订单
        return view ('home.geren.dingdan',['data_link'=>$data_link]);
    }

}
