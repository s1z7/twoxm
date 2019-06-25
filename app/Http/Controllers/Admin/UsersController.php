<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsers;
use App\Models\Users;
use App\Models\UsersInfo;
use Hash;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 接收搜索的参数
        $search_uname = $request->input('search_uname','');
        $search_email = $request->input('search_email','');

        $users = Users::where('uname','like','%'.$search_uname.'%')->where('email','like','%'.$search_email.'%')->paginate(5);
        // 加载页面
        return view('admin.users.index',['users'=>$users,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示用户添加
        return view('admin.users.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {   
        DB::beginTransaction();

        // 上传头像
        if($request->hasFile('profile')){
            // 创建上传文件对象
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = '';
        }

        $data = $request->all();
        //dump($data);
        // 接收数据
        $user = new Users;
        $user->uname = $data['uname'];
        $user->upass = Hash::make($data['upass']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $res1 = $user->save();
        if($res1){
            // 获取uid
            $uid = $user->id;
        }

        // 压入头像
        $userinfo = new UsersInfo;
        $userinfo->uid = $uid;
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
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
        $user = Users::find($id);
        // 加载修改页面
        return view('admin.users.edit',['user'=>$user]);
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
        DB::beginTransaction();
        // 获取头像
        if ($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }

        $user = Users::find($id);
        $user->email = $request->input('email','');
        $user->phone = $request->input('phone','');
        $res1 = $user->save();
        $userinfo = UsersInfo::where('uid',$id)->first();
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','修改成功');
        }else{
            DB::rollBack();
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
        // 事务回滚
        DB::beginTransaction();
        $res1 = Users::destroy($id);
        $res2 = UsersInfo::where('uid',$id)->delete();
        // 删除用户头像
       /* use Illuminate\Support\Facades\Storage;

        Storage::delete('file.jpg');

        Storage::delete(['file1.jpg', 'file2.jpg']);*/
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }       
    }
}
