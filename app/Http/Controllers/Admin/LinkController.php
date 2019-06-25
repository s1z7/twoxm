<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
class LinkController extends Controller
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

    	$links = Link::where('name','like','%'.$search_title.'%')->paginate(2);

        //友情链接页面
        return view('admin.link.index',['links'=>$links,'search_title'=>$search_title,'params'=>$request->all()]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //友情链接添加
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收所有form表单传过来的数据
        $data = $request->all();
        //压入数据库
        $link = new Link;
        $link->name = $data['name'];
        $link->url = $data['url'];
        $link->status = $data['status'];
        $link->phone = $data['phone'];
        $link->people = $data['people'];
        $res = $link->save();
        if($res){
        	return redirect('admin/link')->with('success','添加成功');
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
        $link = Link::find($id);
        // 加载修改页面
        return view('admin.link.edit',['link'=>$link]);
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
        $link = Link::find($id);
        $link->name = $request->input('name','');
        $link->url = $request->input('url','');
        $link->status = $request->input('status','');
        $link->phone = $request->input('phone','');
        $link->people = $request->input('people','');
        $res = $link->save();
    
        if($res){
 			return redirect('/admin/link')->with('success','修改成功');
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
        //删除信息
        $result= Link::where('id',$id)->delete();
        if($result){
              return redirect('/admin/link')->with('success','删除成功');
        }else{
              return back()->with('error','删除失败');
        }
    }
}
