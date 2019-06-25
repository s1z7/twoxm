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

	<form action="/admin/brands" method="get">
	品牌名称: <input type="text" name="search_bname" value="{{ $params['search_bname'] or '' }}">
	<input type="submit" class="btn btn-info">
	</form>
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-table"></i> Simple Table</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>品牌ID</th>
                        <th>品牌名称</th>
                        <th>品牌logo</th>
                        <th>是否显示</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($brands as $k=>$v)
                    <tr style="text-align: center;">
                    	<td>{{ $v->id }}</td>
                    	<td>{{ $v->bname }}</td>
                    	<td><img src="/uploads/{{ $v->img }}" style="border-radius: 5px;border: 1px solid #ccc;width: 50px;"></td>
                    	<td>{{ $v->status == 0 ? '隐藏' : '显示' }}</td>
                    	<td>
                    		<a href="/admin/brands/{{ $v->id }}/edit" class="btn btn-info">修改</a>
                    		<form action="/admin/brands/{{ $v->id }}" method="post" style="display:inline-block">
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
            {{ $brands->appends($params)->links() }}
        </div>
        </div>
    </div>
@endsection