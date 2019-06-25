<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dresse;
class DresseController extends Controller
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

    	$dresses = Dresse::where('name','like','%'.$search_title.'%')->paginate(2);

        //收货地址页面
        return view('admin.dresse.index',['dresses'=>$dresses,'search_title'=>$search_title,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //收货地址添加
        return view('admin.dresse.create');
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
        $dresse = new Dresse;
        $dresse->name = $data['name'];
        $dresse->phone = $data['phone'];
        $dresse->address = $data['address'];
        $dresse->isStaAdd = $data['isStaAdd'];
        $res = $dresse->save();
        if($res){
        	return redirect('admin/dresse')->with('success','添加成功');
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
        $dresse = Dresse::find($id);
        // 加载修改页面
        return view('admin.dresse.edit',['dresse'=>$dresse]);
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
        $dresse = Dresse::find($id);
        $dresse->name = $request->input('name','');
        $dresse->phone = $request->input('phone','');
        $dresse->address = $request->input('address','');
        $dresse->isStaAdd = $request->input('isStaAdd','');
        $res = $dresse->save();
    
        if($res){
 			return redirect('admin/dresse')->with('success','修改成功');
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
        $result= Dresse::where('id',$id)->delete();
        if( $result){
              return redirect('/admin/dresse')->with('success','删除成功');
        }else{
              return back()->with('error','删除失败');
        }
    }
}
