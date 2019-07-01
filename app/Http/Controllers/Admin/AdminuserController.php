<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\AdminUsers;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	// 接收查询的数据
        $search_uname = $request->input('search_uname','');

        $data = DB::table('admin_users')->where('uname','like','%'.$search_uname.'%')->paginate(4);

        return view('admin.adminuser.index',['data'=>$data,'search_uname'=>$search_uname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有的 角色
        $roles_data = DB::table('roles')->get();

        return view('admin.adminuser.create',['roles_data'=>$roles_data]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 开始事务
        // dump($request->all());
        DB::beginTransaction();
        
        $uname = $request->input('uname','');
        $upass = $request->input('upass','');
        $repass = $request->input('repass','');
        $rid = $request->input('rid','');
        // 验证数据
        $this->validate($request, [
             'uname' => 'required|regex:/^[\w]{6,18}$/',
             'upass' => 'required|regex:/^[\w]{6,18}$/',
             'repass' => 'required|same:upass',
             'rid' => 'required',
             'profile' => 'required',
        ],[
             'uname.required' => '用户名必填',
             'uname.regex' => '用户名格式错误',
             'upass.required' => '密码必填',
             'upass.regex' => '密码格式错误',
             'repass.required' => '确认密码必填',
             'repass.same' => '两次密码不一致',
             'rid.required' => '角色权限必填',
             'profile.required' => '头像必填',
        ]);

        if($upass != $repass){
            return back()->width('error','俩次密码不一致');
        }

        // 文件上传
        if($request->hasFile('profile')){
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }


        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        $temp['profile'] = $path;


        $uid = AdminUsers::insertGetId($temp);

        $res  = DB::table('adminusers_roles')->insert(['uid'=>$uid,'rid'=>$rid]);

        if($uid && $res){
            DB::commit();
            return redirect('admin/adminuser')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $data = DB::table('admin_users')->where('id',$id)->first();
         //    dd($data);
         // 获取所有的角色
         $roles_data = DB::table('roles')->get();
          // dd($roles_data);
         $role_data = DB::table('adminusers_roles')->where('uid',$id)->first();
         //dd($role_data);

         return view('admin.adminuser.edit',['roles_data'=>$roles_data,'data'=>$data,'role_data'=>$role_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $uname = $request->input('uname','');
        // $profile = $path;
        $rid = $request->input('rid','');


        $res = DB::table('adminusers_roles')->where('uid',$id)->update(['rid'=>$rid]);

         if($res){
            return redirect('admin/adminuser')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
