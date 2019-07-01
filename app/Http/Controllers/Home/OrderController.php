<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goodsinfos;
use App\Models\Addresses;
use App\Models\Cars;
use App\Models\Orders;
use App\Models\Ordermanage;
use App\Models\Link;
use App\Models\Speaks;
use App\Models\Link;
use App\Http\Controllers\Home\CarController;
class OrderController extends Controller
{

    // 结算页面
    public function account(Request $request)
    {
    	// $_SESSION['car'] = null;
        // 加载模板
        if(!empty($_SESSION['car'])){
            $cars = $_SESSION['car'];
            // dd($cars);
            foreach($cars as $kk=>$vv){
                
                $cars_all[$vv->id] = Goods::where('id',$vv->id)->first();
                $cars_all[$vv->id]['infos'] = Goodsinfos::where('goods_id',$vv->id)->first();
                $cars_all[$vv->id]['num'] = $vv->num;
                $cars_all[$vv->id]['price'] = $vv->price * $vv->num;
            }
            // dd($cars_all);
        }else{
            $cars_all = [];
        }
 
        // 总价格
        $jiage = CarController::priceCount();
        // dd(session('home_user')->id);
        $address = Addresses::where('users_id',session('id'))->get();
        
        // dd($cars_all);
        return view('home.order.account',['cars_all'=>$cars_all,'jiage'=>$jiage,'address'=>$address]);
    }
    // 添加新地址的页面
    public function create()
    {
        return view('home.order.create');
    }
    // 执行添加新地址
    public function add(Request $request)
    {
        // 验证数据
        $this->validate($request, [
             'name' => 'required',
             'phone' => 'required',
             'address' => 'required',
             
        ],[
             'name.required' => '收货人姓名必填',
             'phone.required' => '联系方式必填',
             'address.required' => '详细地址必填',
        ]);
        // 执行地址添加操作
        $data = $request->all();
        // 接收数据
        $addresses = new Addresses;
        $addresses->name = $data['name'];
        $addresses->phone = $data['phone'];
        $addresses->address = $data['address'];
        $addresses->users_id = session('id');
        // 执行添加操作
        $res1 = $addresses->save();
        if($res1){
            return redirect('home/order/account')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
    // 确认订单页面
    public function index(Request $request)
    {
        if(empty(session('uname'))){
            return back();
        }
        $data = $request->all();
        $id = $data['ad'];
        $adds = Addresses::where('id',$id)->first();
        $list = $_SESSION['car'];
        // dd($list);
        foreach($list as $k=>$v){
            $orders = new Orders;
            $orders->orders_numbers = $v->numbers;
            $orders->priceall = $v->price * $v->num;
            $orders->users_id = session('id');
            $orders->address_id = $adds->id;
            $orders->goods_id = $v->id;
            $orders->numbers = $v->num;
            $orders->prices = $v->price;
            $orders->status = 0;
            $orders->save();
        }
        return redirect('home/order/myods');
    } 
    // 生成订单页面
    public function myods()
    {
        $ods = $_SESSION['car'];
        $zong = 0;
        foreach($ods as $k=>$v){
            // dd($k);
            $zong += $v->xiaoji;
        }
        // dd($zong);
        return view('home.order.index',['ods'=>$ods,'zong'=>$zong]);
    }
    public function myorder()
    {
    	$data_link = Link::get();
        $allods = Orders::where('users_id',session('id'))->get();
        // dd($allods);
        return view('home.geren.dingdan',['allods'=>$allods,'data_link'=>$data_link]);
    }

    public function delete($id)
    {
        $res = Orders::where('id',$id)->delete();

        if(!$res){
            return back();
        }else{
            return redirect('home/order/myorder');
        }
    }
     public function speak($id)
    {
        $data_link = Link::get();
        $order = Orders::where('id',$id)->first();
        return view('home.order.speak',['order'=>$order,'data_link'=>$data_link]);
    }
    public function dospeak(Request $request,$id)
    {   if($request->hasFile('pic')){
            $file_path = $request->file('pic')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        // dd($file_path);
        // dd($request->all());
        $ors = Orders::where('id',$id)->first();
        // 上传图片
        
        
        // 执行添加操作
        $data = $request->all();
        // 接收数据
        $speaks = new Speaks;
        $speaks->users_id = session('id');
        $speaks->goods_id = $ors->goods_id;
        $speaks->speak = $data['spe'];
        $speaks->start = $data['start'];
        $speaks->picture = $file_path;
        $res1 = $speaks->save();
        if($res1){
            echo "<script>alert('评论成功');location.href='/home/order/myorder'</script>";
        }else{
            return back()->with('error','添加失败');
        }
    }
    
}
