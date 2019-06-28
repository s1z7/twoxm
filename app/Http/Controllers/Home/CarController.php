<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Goods;
use App\Models\GoodsInfos;
class CarController extends Controller
{

    // 加入购物车
    public function add(Request $request)
    {	
    	// $_SESSION['car'] = null;
    	// exit;
    	$id = $request->input('id',0);

    	if(empty($_SESSION['car'][$id])){
    	// 获取商品 
    	$data = DB::table('goods')->select('id','title','price')->where('id',$id)->first();
    	$data->num = 1;
    	$data->xiaoji = ($data->price * $data->num);

    	$_SESSION['car'][$id] = $data;
   		}else{
    		// 当前数量
    		$_SESSION['car'][$id]->num = $_SESSION['car'][$id]->num + 1;
    		$_SESSION['car'][$id]->xiaoji = ($_SESSION['car'][$id]->num * $_SESSION['car'][$id]->price);
    	}

    	echo "<script>alert('添加购物车成功');location.href='/home/details/$id'</script>";

    }

    // 统计购物车 总数据量
    public static function countCar()
    {	
    	if(empty($_SESSION['car'])){
    		$count = 0;
    	}else{
    		$count = 0;
    		foreach ($_SESSION['car'] as $key => $value){
    			$count += $value->num;
    		}
    	}
    	return $count;

    }
    // 计算价格总和
    public static function priceCount()
    {
        if(empty($_SESSION['car'])){
            $priceCount = 0;
        }else{
            // 把session里面的小计进行累加,得到商品总和
            $priceCount = 0;
            $list = $_SESSION['car'];
            // dd($lists);
            foreach ($list as $key => $value) {
                
                $priceCount += $value->xiaoji;
            }
        }
        return $priceCount;
    }

    // 购物车的主页面
    public function index(Request $request)
    {
        // $_SESSION['car'] = null;
        // 加载模板
        if(!empty($_SESSION['car'])){
            // 获取session的数据
            $cars = $_SESSION['car'];
            // 因为加入购物车的可能有两个以上,所以遍历
            foreach($cars as $kk=>$vv){
                // dd($vv);
                // 拿到本条商品
                $cars_all[$vv->id] = Goods::where('id',$vv->id)->first();
                // 拿到本条的商品详情
                $cars_all[$vv->id]['infos'] = Goodsinfos::where('goods_id',$vv->id)->first();
                // 拿到数量
                $cars_all[$vv->id]['num'] = $vv->num;
                // 拿到小计
                $cars_all[$vv->id]['price'] = $vv->price * $vv->num;
                // dd($cars_all);
            }
        }else{
            $cars_all = [];
        }
        // 拿到总价格
        $jiage = self::priceCount();
        return view('home.car.index',['cars_all'=>$cars_all,'jiage'=>$jiage]);
    }

    // 添加数量
    public function addNum(Request $request)
    {
        // 拿到id
        $id = $request->input('id');
        // 判断session有没有数据
        if(empty($_SESSION['car'])){
            // 没数据就返回
            return back();
        }else{
            // 有数据就拿到本条数据
            $lists = $_SESSION['car'][$id];
            // 点击加一就把数量累加1
            $n = $lists->num + 1;
            // 拿到商品单价
            $price = $lists->price;
            // 拿到加一后的数量
            $lists->num = $n;
            // 算一下加一后的小计,价格
            $lists->xiaoji = ($n * $price);
            return back();
        }
    }

    // 减少数量
    public function descNum(Request $request)
    {
        // 获取id
        $id = $request->input('id');
        // 判断session有没有数据
        if(empty($_SESSION['car'])){
            // 没数据就返回
            return back();
        }else{
            // 有数据就拿到本条数据
            $lists = $_SESSION['car'][$id];
            
            // 当数量<=1的时候,就返回,不能继续点击
            if($lists->num <= 1){
                return back();
                exit;
            }
            // 给数量-1
            $n = $lists->num - 1;
            // 拿到单价
            $price = $lists->price;
            // 拿到更改后的数量
            $lists->num = $n;
            // 计算小计
            $lists->xiaoji = ($n * $price);
            return back();
        }
    } 

    // 删除数据
    public function delete(Request $request)
    {   
        $id = $request->input('id');

        if(empty($_SESSION['car'][$id])){
            return back();
        }else{
            unset($_SESSION['car'][$id]);
            return back();
        }
    }
    
}
