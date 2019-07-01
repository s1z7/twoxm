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
<form action="/admin/adminuser" method="get">

    管理员名称: <input type="text" name="search_uname" value="" style="margin-top: 10px">

    <input type="submit" class="btn btn-info" value="查询" style="height: 30px">
</form>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 管理员列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头像</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->id }}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->uname }}</font></font></td>
                    <td>
                              @if(!empty($v->profile))
                               <img src="/uploads/{{ $v->profile }}" style="width: 100px;height:auto">
                             @else
                               <img src="/ad/img/tou.jpg" style="width: 100px;height:auto">
                              @endif
                            </td>
                   <td>
                                <a href="/admin/adminuser/{{ $v->id }}/edit" class="btn btn-info">修改角色</a>
                                
                            </td>
                </tr>
               @endforeach
            </tbody>
        </table>
              <div id="page_page">
                {{ $data->appends(['search_uname'=>$search_uname])->links() }}
              </div> 
    </div>
</div>

@endsection