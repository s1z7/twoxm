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

	<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> 商品列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>商品标题</th>
									<th>商品描述</th>
									<th>商品属性</th>
									<th>商品型号</th>     
									<th>图片1</th>     
									<th>图片2</th>     
									<th>图片3</th>    
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr style="text-align: center;">
                                    <td>{{ $goods->title }}</td>
									<td>{{ $goodsinfos->desc }}</td>
									<td>{{ $goodsinfos->capa }}</td>
									<td>{{ $goodsinfos->taste }}</td>
									<td>
										<img src="/uploads/{{ $goodsinfos->pic1 }}" style="width: 70px;height: auto">
									</td>  
									<td>
										<img src="/uploads/{{ $goodsinfos->pic2 }}" style="width: 70px;height: auto">
									</td> 
									<td>
										<img src="/uploads/{{ $goodsinfos->pic3 }}" style="width: 70px;height: auto">
									</td>                                   
									<td>
										<a href="/admin/goodsinfos/edit/{{$goods->id}}" class="btn btn-info">修改</a>
										<form action="/admin/goodsinfos/destroy/{{ $goodsinfos->id }}" method="post" style="display:inline-block">
											{{ csrf_field() }}
											<input type="submit" value="删除" class="btn btn-danger">
										</form>
									</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection