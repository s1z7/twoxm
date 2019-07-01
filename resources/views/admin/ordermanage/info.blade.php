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
                    <th>买家</th>
                    <th>商品名称</th>
                    <th>商品单价</th>
                    <th>购买数量</th>
                    <th>商品总价</th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td>{{ $orders->id }}</td>
                    <td>{{ $orders->orders_users->uname }}</td>
                    <td>{{ $orders->orders_goods->title }}</td>
                    <td>{{ $orders->prices }}</td>
                    <td>{{ $orders->numbers }}</td>
                    <td>{{ $orders->priceall }}</td>
                </tr>
            </tbody>
        </table>
        <a href="/admin/ordermanage/index"><button class="btn btn-info" style="float:right; width:182px">返回</button></a>
    </div>
</div>

@endsection