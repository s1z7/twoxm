@extends('admin.layout.index')


@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 订单列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>订单号</th>
                    <th>买家</th>
                    <th>收货人</th>
                    <th>收货地址</th>
                    <th>联系方式</th>
                    <th>下单时间</th>
                    <th>订单状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $k=>$v)
                <tr align="center">
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->orders_numbers }}</td>
                    <td>{{ $v->orders_users->uname }}</td>
                    <td>{{ $v->orders_addresses->name }}</td>
                    <td>{{ $v->orders_addresses->address }}</td>
                    <td>{{ $v->orders_addresses->phone }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                        @if($v->status == 0)
                            <font style="color:#CC3333">未发货</font>
                        @elseif($v->status == 1)
                            <font style="color:#00CC00">已发货</font>
                        @elseif($v->status == 2)
                            <font style="color:#99CCFF">已收货</font>
                        @elseif($v->status == 3)
                            <font style="color:#CC3333">已取消订单</font>
                        @elseif($v->status == 4)
                            <font style="color:#CC0033">申请取消订单</font>
                        @endif
                    </td>
                    <td>
                        <a href="/admin/ordermanage/info/{{ $v->id }}"><button class="btn btn-link">订单详情</button></a>
                        <a href="/admin/ordermanage/cancel/{{ $v->id }}"><button class="btn btn-link">取消订单</button></a>
                        <a href="/admin/ordermanage/send/{{ $v->id }}"><button class="btn btn-link">执行发货</button></a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection