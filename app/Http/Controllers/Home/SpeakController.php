<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Speaks;
use App\Models\Link;
class SpeakController extends Controller
{
    // 查看我的评论
    public function index()
    {
    	//获取友情链接
        $data_link = Link::get();
    	// 拿到登录的这个人的所有评论
    	$speaks = Speaks::where('users_id',session('id'))->get();
    	
    	return view('home.speak.index',['speaks'=>$speaks,'data_link'=>$data_link]);
    }
    // 删除评论
    public function delete(Request $request)
    {
        // 拿到本条评论的id
    	$id=$request->input('id','');
        // 去表里删除本条数据
    	$res = Speaks::where('id',$id)->delete();
    	if(!$res){
    		return back();
    	}else{
    		return redirect('home/speak/index');
    	}
    	
    }
}
