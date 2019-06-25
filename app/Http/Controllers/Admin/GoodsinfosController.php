<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsinfos;
use Illuminate\Support\Facades\Storage;
use App\Models\Brands;
use App\Models\Cates;
use DB;

class GoodsinfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 加载页面
        $goods = Goods::find($id);
        $goodsinfos = Goodsinfos::where('goods_id',$id)->first();
        if(empty($goodsinfos)){
            return back()->with('error','暂无数据');
        }
        // dd($goodsinfos);
        // 显示首页模板
        return view('admin.goodsinfos.index',['goods'=>$goods,'goodsinfos'=>$goodsinfos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        // 根据id查询要修改的数据
        $goods = Goods::find($id);
        $goodsinfos = Goodsinfos::where('goods_id',$id)->first();
        // dd($goodsinfos);
        if(!empty($goodsinfos)){
            return back()->with('error','已添加,请点击查看');
        }
        // 加载视图
        return view('admin.goodsinfos.create',['goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // 上传图片
        if($request->hasFile('pic1')){
            $file_path1 = $request->file('pic1')->store(date('Ymd'));
        }else{
            $file_path1 = '';
        }
        // 上传商品图片2
        if($request->hasFile('pic2')){
            $file_path2 = $request->file('pic2')->store(date('Ymd'));
        }else{
            $file_path2 = '';
        }
        // 上传商品图片3
        if($request->hasFile('pic3')){
            $file_path3 = $request->file('pic3')->store(date('Ymd'));
        }else{
            $file_path3 = '';
        }

        // 验证数据
        $this->validate($request,[
            'desc' => 'required',
            'capa' => 'required',
            'taste' => 'required',
        ],[
            'desc.required' => '商品描述不能为空!',
            'capa.required' => '商品型号不能为空!',
            'taste.required' => '商品属性不能为空!'
        ]);

        // 执行添加
        $data = $request->all();
        $goodsinfos = new Goodsinfos;
        // 压入数据
        $goodsinfos->desc = $data['desc'];
        $goodsinfos->goods_id = $id;
        $goodsinfos->capa = $data['capa'];
        $goodsinfos->taste = $data['taste'];
        $goodsinfos->pic1 = $file_path1;
        $goodsinfos->pic2 = $file_path2;
        $goodsinfos->pic3 = $file_path3;
        $res1 = $goodsinfos->save();

        if($res1){
            return redirect('admin/goods')->with('success','添加成功');
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
        $goods = Goods::find($id);
        $goodsinfos = Goodsinfos::where('goods_id',$id)->first();
        // 加载视图
        return view('admin.goodsinfos.edit',['goodsinfos'=>$goodsinfos,'goods'=>$goods]);
        
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
        // 确认是否更改图片1
        if($request->hasFile('pic1')){
            Storage::delete($request->input('pic1_path'));
            $path1 = $request->file('pic1')->store(date('Ymd'));
        }else{
            $path1 = $request->input('pic1_path','');
        }
        // 确认是否更改图片2
        if($request->hasFile('pic2')){
            Storage::delete($request->input('pic2_path'));
            $path2 = $request->file('pic2')->store(date('Ymd'));
        }else{
            $path2 = $request->input('pic2_path','');
        }
        // 确认是否更改图片3
        if($request->hasFile('pic3')){
            Storage::delete($request->input('pic3_path'));
            $path3 = $request->file('pic3')->store(date('Ymd'));
        }else{
            $path3 = $request->input('pic3_path','');
        }

        $goodsinfos = Goodsinfos::find($id);
        $goodsinfos->desc = $request->input('desc','');
        $goodsinfos->capa = $request->input('capa','');
        $goodsinfos->taste = $request->input('taste','');
        $goodsinfos->pic1 = $path1;
        $goodsinfos->pic2 = $path2;
        $goodsinfos->pic3 = $path3;
        $res2 = $goodsinfos->save();
        if($res2){
            return redirect('admin/goods')->with('success','修改成功');
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
    public function destroy(Request $request, $id)
    {
        $res = Goodsinfos::destroy($id);
        // 删除用户头像
        
        if($request->hasFile('pic1')){
             Storage::delete($request->input('pic1'));
        }
        if($request->hasFile('pic2')){
             Storage::delete($request->input('pic2'));
        }
        if($request->hasFile('pic3')){
             Storage::delete($request->input('pic3'));
        }
        if($res){
            return redirect('admin/goods')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
