<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use Hash;
use Session;
use App\Models\Users;
use App\Models\AdminUsers;
class LoginController extends Controller
{
    public function outlogin()
    {
        session(['admin_login'=>false]);
        session(['admin_user'=>null]);

        return redirect('admin/login');
    }


    // 显示登录页面
    public function login()
    {
    	// 加载登录页面
    	return view('admin.login.login');
    }

    // 执行登录操作
    public function dologin(Request $request)
    {
    	// dump($request->all());
    	$uname = $request->input('uname','');
    	$upass = $request->input('upass','');


    	$admin_user_data = AdminUsers::where('uname',$uname)->first();
    	if(!$admin_user_data){
    		echo "<script>alert('用户名或密码错误');location.href='/admin/login';</script>";
    		exit;
    	}

    	// 验证密码
    	if (!Hash::check($upass, $admin_user_data->upass)) {
		    // 密码对比...
		    echo "<script>alert('用户名或密码错误');location.href='/admin/login';</script>";
    		exit;
		}

    	// dump($admin_user_data);
    	// 执行登录
    	session(['admin_login'=>true]);
    	session(['admin_user'=>$admin_user_data]);

        // 获取当前用户的权限
        $admin_user_nodes = DB::select('select n.aname,n.cname from nodes as n,roles_nodes as rn,adminusers_roles as ur where ur.uid = '.$admin_user_data->id.' and ur.rid = rn.rid and rn.nid = n.id');
        
        $temp = [];
        foreach ($admin_user_nodes as $key => $value) {
            $temp[$value->cname][] = $value->aname;
            if($value->aname == 'create'){
                $temp[$value->cname][] = 'store';
            }
            if($value->aname == 'edit'){
                $temp[$value->cname][] = 'update';
            }

            if($value->aname == 'index'){
                $temp[$value->cname][] = 'show';
            }
        }

        // dump($temp);
        // dump($admin_user_nodes);
        session(['admin_user_nodes'=>$temp]);
    	// 跳转
    	return redirect('admin');

    }

    	/**
     * 修改密码页面
     *
     * @return \Illuminate\Http\Response
     */
    public function pass()
    {
        return view('admin.pass');
    }

    /**
     * 处理修改密码
     *
     * @return \Illuminate\Http\Response
     */
	public function dopass(Request $request)
    {
        $this->validate($request, [
            'oldpass' => 'required',
            'password' => 'required',
            // 'repass' => 'required',
            // 'profile' => 'required|image',
            'repass'=>['required',"same:password"//不为空,两次密码是否相同
                 ],

        ],[
            'oldpass.required' => '旧密码不能为空',
            'password.required' => '新密码不能为空',
            'repass.required'=>"确认密码不能为空",
            'repass.same'=>'新密码与确认密码不匹配',
           
       ]);



        //验证
        //
        //获取旧密码
        $pass = $request->oldpass;

        //获取当前用户ID 密码
        $uid = $request->input('uid');

        $password = $request->input('password');

        //获取当前用户的信息
        $rs = AdminUsers::find($uid);

        //Hash
        if(!Hash::check($pass,$rs->upass )){

            return back()->with('error','旧密码有误');
        }

        //两次密码一致
        $password = Hash::make($request->input('password',''));

        //更新数据库密码
        $rs->upass = $password;
        $data = $rs->save();

        if($data){
            //清空session
            session(['admin_login'=>false]);
        	session(['admin_user'=>null]);

            return redirect('/admin/login')->with('success','修改成功！');
        } else {

            return back()->with('error','修改失败!');
        }

    }
    // 修改头像页面
    public function changeprofile($id)
    {

        return view('admin.index.changeprofile');
    }


    // 处理修改头像 操作
    public function doprofile(Request $request,$id)
    {
       
        // 文件上传
        if($request->hasFile('profile')){
             //有新的文件上传 就删除之前的旧图片
            Storage::delete($request->input('profile_path'));

            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = $request->input('profile_path');
        }

       $data['profile'] = $path;
    
       $res = DB::table('admin_users')->where('id',$id)->update($data);
        if($res){
              $new_user = DB::table('admin_users')->where('id',$id)->first();
              // dd($new_profile);
              session(['admin_user'=>$new_user]);
             return redirect('/admin/adminuser')->with('success','修改成功');
              
        }else{
             return back()->with('error','修改失败');
      }
    }


}
