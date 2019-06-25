<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;
use App\Models\Brands;
use App\Models\Goodsinfos;
use Illuminate\Support\Facades\Storage;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接受搜索参数
        $goods_title = $request->input('goods_title','');
        $goods = Goods::where('title','like','%'.$goods_title.'%')->paginate(5);

        foreach($goods as $k=>$v){
            $cate = Cates::find($v->cates_id);
            $brand = Brands::find($v->brands_id);
            $v->cates_name = $cate->cname;
            $v->brands_name = $brand->bname;
        }

        return view('admin.goods.index',['goods'=>$goods,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取 brands cates表
        $brands = Brands::all();
        $cates = Cates::all();
        // 加载视图
        return view('admin.goods.create',['brands'=>$brands,'cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 上传商品图片
        if($request->hasFile('pic')){
            $file_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $file_path = '';
        }

        // 验证数据
        $this->validate($request, [
             'title' => 'required',
             'cates_id' => 'required',
             'brands_id' => 'required',
             'price' => 'required',
             'store' => 'required',
             
        ],[
             'title.required' => '商品名必填',
             'cates_id.required' => '所属分类必填',
             'brands_id.required' => '所属品牌必填',
             'price.required' => '价格必填',
             'title.required' => '商品库存必填',
        ]);

        // 执行商品添加
        $data = $request->all();

        // 压入数据
        $good = new Goods;
        $good->title = $data['title'];
        $good->cates_id = $data['cates_id'];
        $good->brands_id = $data['brands_id'];
        $good->price = $data['price'];
        $good->store = $data['store'];
        $good->pic = $file_path;
        $good->sale = rand(1000,6666);
        $good->status = 0;
        $good->recommend = $data['recommend'];

        // 执行添加
        $res1 = $good->save();
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
        // 根据id查询要修改的数据
        $goods = Goods::find($id);

        // 获取分类里面的所有数据
        $cates = Cates::all();

        // 获取品牌里面的所有数据
        $brands = Brands::all();

        // 用当下商品的分类id获取分类表的这一条数据
        $cate = Cates::find($goods->cates_id);

        // 用当下商品的品牌id获取品牌表的这一条数据
        $brand = Brands::find($goods->brands_id);

        // 拿到当下分类的id
        $cates_id = $cate->id;

        // 拿到当下的品牌id
        $brands_id = $brand->id;

        return view('admin.goods.edit',['goods'=>$goods,'cates'=>$cates,'brands'=>$brands,'cates_id'=>$cates_id,'brands_id'=>$brands_id]);
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
        // 确认是否更改图片
        if($request->hasFile('pic')){
            Storage::delete($request->input('pic_path'));
            $path = $request->file('pic')->store(date('Ymd'));
        }else{
            $path = $request->input('pic_path','');
        }

        // 执行修改
        $goods = Goods::find($id);
        $goods->title = $request->input('title','');
        $goods->cates_id = $request->input('cates_id','');
        $goods->brands_id = $request->input('brands_id','');
        $goods->price = $request->input('price');
        $goods->store = $request->input('store','');
        $goods->status = $request->input('status','');
        $goods->pic = $path;
        $res2 = $goods->save();
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
        // 开启事务 同时删除两个表里的数据
         DB::beginTransaction();
        // 删除 商品表中的数据 
        $res1 = Goods::destroy($id);
        $res2 = Goodsinfos::where('goods_id',$id)->delete();

        // 删除图片
       
        if($request->hasFile('pic')){
             Storage::delete($request->input('pic'));
        }
            
        if($res1 || $res2){
            // 如果两个表都删除成功 就提交事务
            DB::commit();
            return redirect('admin/goods')->with('success','删除成功');
        }else{
            // 否则 就执行事务回滚
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
