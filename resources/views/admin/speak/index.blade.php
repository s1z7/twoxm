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
                        <span><i class="icon-table"></i> 评论列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>商品图片</th>
                                    <th>商品名称</th>
                                    <th>评论用户</th>
                                    <th>评论内容</th>
                                    <th>星级评论</th>
                                    <th>评论图片</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($speaks as $k=>$v)
                                <tr style="text-align: center;">
                                    <td>{{$v->id}}</td>
                                    <td><img src="/uploads/{{$v->speaks_goods->pic}}" style="width:60px"></td>
                                    <td>{{$v->speaks_goods->title}}</td>
                                    <td>{{$v->speaks_users->uname}}</td>
                                    <td>{{$v->speak}}</td>
                                    <td>
                                        @if($v->start == 0)
                                            五星好评
                                        @elseif($v->start == 1)
                                            ★★
                                        @else
                                            零星差评
                                        @endif
                                    </td>
                                    <td><img src="/uploads/{{$v->picture}}" style="width:60px"></td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="page_page">
                        {{ $speaks->appends($params)->links() }} 
                        </div>
                    </div>
                </div>
@endsection