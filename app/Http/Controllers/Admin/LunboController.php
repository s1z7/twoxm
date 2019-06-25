<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	//接受搜索数据
    	$search_title = $request->input('search_title','');

    	$banners = Banner::where('title','like','%'.$search_title.'%')->paginate(2);

        //轮播图页面
        return view('admin.lunbo.index',['banners'=>$banners,'search_title'=>$search_title,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //轮播图添加
        return view('admin.lunbo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加操作
        //上传图片
        if($request->hasFile('pic')){
            $banners_path = $request->file('pic')->store(date('Ymd'));
        }else{
        	$banners_path = '';
        }
        //接收所有form表单传过来的数据
        $data = $request->all();
        //压入数据库
        $banner = new Banner;
        $banner->title = $data['title'];
        $banner->desc = $data['desc'];
        $banner->status = $data['status'];
        $banner->pic =$banners_path;
        $res = $banner->save();
        if($res){
        	return redirect('admin/lunbo')->with('success','添加成功');
        }else{
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
        $banner = Banner::find($id);
        // 加载修改页面
        return view('admin.lunbo.edit',['banner'=>$banner]);
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
        // 获取图片
        if ($request->hasFile('pic')){
            $file_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $file_path = $request->input('pic');
        }

        $lunbo = Banner::find($id);
        $lunbo->title = $request->input('title','');
        $lunbo->desc = $request->input('desc','');
        $lunbo->status = $request->input('status','');
        $lunbo->pic = $file_path;
        $res = $lunbo->save();
    
        if($res){
 			return redirect('admin/lunbo')->with('success','修改成功');
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
       	//根据id删除图片
        $res = Banner::where('id',$id)->first();

        //删除信息
        $result= Banner::where('id',$id)->delete();
        if( $result){
              return redirect('/admin/lunbo')->with('success','删除成功');
        }else{
              return back()->with('error','删除失败');
        }
    }
}
