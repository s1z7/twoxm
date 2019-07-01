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
<form action="/admin/roles" method="get">

	角色名称: <input type="text" name="search_rname" value="" style="margin-top: 10px">

	<input type="submit" class="btn btn-info" value="查询" style="height: 30px;"">
</form>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 角色列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>角色名称</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($roles_data as $k=>$v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->rname }}</td>
                        <td>
                            <a href="/admin/roles/{{$v->id}}/edit" class="btn btn-info">修改角色权限</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <div id="page_page">
                {{ $roles_data->appends(['search_rname'=>$search_rname])->links() }}
              </div> 
    </div>
</div>

@endsection