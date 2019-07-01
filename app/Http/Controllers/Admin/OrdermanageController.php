<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;

class OrdermanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $orders = Orders::paginate(8);
        return view('admin.ordermanage.index',['orders'=>$orders,'params'=>$request->all()]);
    }

    public function info($id)
    {
        // 根据条件查询
        $orders = Orders::where('id',$id)->first();

        return view('admin.ordermanage.info',['orders'=>$orders]);
    }

    // 后台 管理开始发货
    public function send($id)
    {
        $orders = Orders::where('id',$id)->first();
        $orders->status = 1;
        $res = $orders->save();
        if($res){
            return redirect('admin/ordermanage/index')->with('success','发货成功');
        }else{
            return back()->with('error','发货失败');
        }
    }

    // 后台 管理取消订单
    public function cancel($id)
    {
        $orders = Orders::where('id',$id)->first();
        $orders->status = 3;
        $res = $orders->save();
        if($res){
            return redirect('admin/ordermanage/index')->with('success','取消成功');
        }else{
            return back()->with('error','取消失败');
        }
    }  

    // 前台 用户申请取消订单
    public function apply($id)
    {
        $orders = Orders::where('id',$id)->first();
        $orders->status = 4;
        $res = $orders->save();
        if($res){
            return redirect('home/order/myorder');
        }else{
            return back();
        }
    }

    // 前台 用户确认收货
    public function confirm($id)
    {
        $orders = Orders::where('id',$id)->first();
        $orders->status = 2;
        $res = $orders->save();
        if($res){
            return redirect('home/order/myorder');
        }else{
            return back();
        }
    }

}
