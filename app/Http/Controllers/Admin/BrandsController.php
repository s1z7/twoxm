<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Brands;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $bname = $request->input('bname','');
        // 根据条件查询
        $brands = Brands::where('bname','like','%'.$bname.'%')->paginate(3);
        // 加载视图
        return view ('admin.brands.index',['brands'=>$brands,'bname'=>$bname,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载视图
        return view ('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'bname' => 'required|max:128',
            'img' => 'required',
        ],[
            'bname.required' => '品牌名称不能为空!',
            'img.required' => '请上传品牌logo!',
            'bname.max' => '品牌名称过长'
        ]);

        // 上传头像
        if($request->hasFile('img')){
            // 创建上传文件对象
            $path = $request->file('img')->store(date('Ymd'));
        }else{
            $path = '';
        }

        // 处理 添加操作
        $data = $request->all();
        $brand = new Brands;

        $brand->bname = $data['bname'];
        $brand->img = $path;
        $brand->status = 0;

        $res1 = $brand->save();
        // 执行添加
        if($res1){
            return redirect('admin/brands')->with('success','添加成功');
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
        $brands = Brands::find($id);
        // 加载视图
        return view('admin.brands.edit',['brands'=>$brands]);
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
        // 处理 修改 页面
         // 上传修改品牌图片
        if($request->hasFile('img')){
            // 如果有图片上传 就删除之前的旧图片
             Storage::delete($request->input('img'));
            $brands_path = $request->file('img')->store(date('Ymd'));
        }else{
            $brands_path = $request->input('old_img');
        }

        $brand = Brands::find($id);
        
        $brand->img = $brands_path;
        $brand->status = $request->input('status');
        // 执行数据库添加操作
        $res = $brand->save();
         if($res){
            return redirect('admin/brands')->with('success','修改成功');
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
        // 删除数据
        $res = Brands::destroy($id);
        if($res){
            return redirect('admin/brands')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
