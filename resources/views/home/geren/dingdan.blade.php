@extends('home.geren.layout')


@section('content')
  <div class="mem_tit">我的订单</div>
  <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>                                             
        <td width="50px">商品图片</td>
        <td width="100px">订单号</td>
        <td width="100px">下单时间</td>
        <td width="100px">订单总金额</td>
        <td width="100px">订单状态</td>
        <td width="100px">操作</td>
      </tr>
      @foreach($allods as $k=>$v)
        <tr>
          <td><img src="/uploads/{{$v->orders_goods->pic}}" style="width:50px"></td>
          <td><font color="#ff4e00">{{$v->orders_numbers}}</font></td>
          <td>{{$v->created_at}}</td>
          <td>￥{{$v->priceall}}.00</td>
          <td>
              @if($v->status == 0)
                <font style="color:brown">未发货</font>
              @elseif($v->status == 1)
                <font style="color:brown">已发货</font>
              @elseif($v->status == 2)
                <font style="color:brown">已收货</font>
              @elseif($v->status == 3)
                <font style="color:brown">已取消订单</font>
              @elseif($v->status == 4)
                <font style="color:brown">申请取消订单</font>
              @endif
          </td>
          <td>
            @if($v->status != 3)
              <a href="/admin/ordermanage/apply/{{$v->id}}" style="color:tomato">取消订单 </a>
              @if($v->status != 2)
              <a href="/admin/ordermanage/confirm/{{$v->id}}" style="color:green"> 确认收货</a>
              @endif
              @if($v->status == 2)
              <a href="/home/order/speak/{{$v->id}}" style="color:green"> 去评论</a>
              @endif
            @else
              <a href="/home/order/delete/{{$v->id}}" style="color:green"> 删除失效订单</a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection