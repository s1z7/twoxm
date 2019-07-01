@extends('admin.layout.index')
@section('css')
<style type="text/css">
	#table_css th,#table_css td
	{
		text-align: center;
		padding-top: 15px;
	}
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
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/admin/nodes" method="get">

	权限名称: <input type="text" name="search_desc" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px;"">
</form>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 权限列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>权限名称</th>
                    <th>控制器名称</th>
                    <th>方法名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nodes_data as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->desc }}</td>
                    <td>{{ $v->cname }}</td>
                    <td>{{ $v->aname }}</td>
                	<td>
                        <a href="/admin/nodes/{{ $v->id }}/edit" class="btn btn-info">修改</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="page_page">
                {{ $nodes_data->appends(['search_desc'=>$search_desc])->links() }}
              </div>
    </div>
</div>

@endsection