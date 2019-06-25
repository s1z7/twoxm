@extends('admin.layout.index')
    
@section('css')
<style type="text/css">
#page_page{
    margin-top:15px;
}
    #page_page ul,#page_page li{
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    #page_page a,#page_page span{
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    #page_page .active span{
        color: #fff;
        background-color: #c5d52b;
    }
</style>
@endsection

@section('content')
    
    <form action="/admin/goods" method="get">
    商品标题: <input type="text" name="goods_title" value="{{ $params['goods_title'] or '' }}">
    <input type="submit" class="btn btn-info">
    </form>

	<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> 商品列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>商品标题</th>
                                    <th>商品图片</th>
                                    <th>所属分类</th>
                                    <th>所属品牌</th>
                                    <th>商品价格</th>
                                    <th>商品销量</th>
                                    <th>商品库存</th>
                                    <th>商品状态</th>
                                    <th>是否推荐</th>
                                    <th>商品详情</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($goods as $k=>$v)
                                <tr style="text-align: center;">
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->title }}</td>
                                    <td><img src="/uploads/{{ $v->pic }}"style="width: 70px;height: auto"></td>
                                    <td>{{ $v->cates_name }}</td>
                                    <td>{{ $v->brands_name }}</td>
                                    <td>{{ $v->price }}</td>
                                    <td>{{ $v->sale }}</td>
                                    <td>{{ $v->store }}</td>
                                    <td>
                                        @if($v->status ==0)
                                            普通商品
                                        @elseif($v->status ==1)
                                            热门商品
                                        @elseif($v->status ==2)
                                            限时特卖
                                        @else
                                            猜你喜欢
                                        @endif
                                    </td>
                                    <td>
                                        @if($v->recommend ==0)
                                            暂不推荐
                                        @else
                                            推荐
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/goodsinfos/create/{{ $v->id }}" class="btn btn-info">添加</a>
                                        <a href="/admin/goodsinfos/index/{{ $v->id }}" class="btn btn-success">查看</a>
                                    </td>
                                    <td>
                                        <a href="/admin/goods/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                                        <form action="/admin/goods/{{ $v->id }}" method="post" style="display:inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="删除" class="btn btn-danger">
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="page_page">
                        {{ $goods->appends($params)->links() }}
                        </div>
                    </div>
                </div>
@endsection