<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Link;
use App\Models\Goodsinfos;
use App\Models\Brands;
use App\Models\Cates;
use App\Models\Speaks;
use App\Http\Controllers\Home\CarController;

class DetailsController extends Controller
{   
    public static function getPidCateData($pid = 0)
    {
        //获取一级分类
        $data = Cates::where('pid',$pid)->get();
        foreach($data as $k=>$v){
            $v->sub = self::getPidCateData($v->id);
        }

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
    	//获取友情链接
        $data_link = Link::get();

        $countCar = CarController::countCar();

        // 商品表数据
        $goods = Goods::where('id',$id)->first();
        // 商品品牌
        $brands = Brands::where('id',$goods->brands_id)->first();
        // dd($brands);
        // 商品详情
        $goodsinfos = Goodsinfos::where('goods_id',$goods->id)->first();
        $speak = Speaks::where('goods_id',$id)->get();
        //没有详情就返回
        if(empty($goodsinfos)){
            return back();
        }

        // 加载视图
        return view('home.details.index',['goodsinfos'=>$goodsinfos,'goods'=>$goods,'brands'=>$brands,'countCar'=>$countCar,'data_link'=>$data_link,'speak'=>$speak]);

    }

}
