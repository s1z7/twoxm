<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Daohang;
class DaohangController extends Controller
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

    	$daohangs = Daohang::where('dname','like','%'.$search_title.'%')->paginate(2);

        //轮播图页面
        return view('admin.daohang.index',['daohangs'=>$daohangs,'search_title'=>$search_title,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //导航条添加
        return view('admin.daohang.create');
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
        $daohang = new Daohang;
        $daohang->dname = $data['dname'];
        $daohang->dlink = $data['dlink'];
        $res = $daohang->save();
        if($res){
        	return redirect('admin/daohang')->with('success','添加成功');
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
        $daohang = Daohang::find($id);
        // 加载修改页面
        return view('admin.daohang.edit',['daohang'=>$daohang]);
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
        
        $daohang = Daohang::find($id);
        $daohang->dname = $request->input('dname','');
        $daohang->dlink = $request->input('dlink','');
        $res = $daohang->save();
    
        if($res){
 			return redirect('admin/daohang')->with('success','修改成功');
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
        $result= Daohang::where('id',$id)->delete();
        if( $result){
              return redirect('/admin/daohang')->with('success','删除成功');
        }else{
              return back()->with('error','删除失败');
        }
    }
}
