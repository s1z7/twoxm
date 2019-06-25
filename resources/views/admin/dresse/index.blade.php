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
		<div class="mws-panel-body no-padding">
                    	<form action="/admin/dresse" method="get">
                        <label>
                            <input type="text" name="search_title" value="" aria-controls="DataTables_Table_1"> 
                        </label>
                            <button class="btn btn-info">搜索</button>
                  		 </form>
               		</div>
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收货地址管理</font></font></span>
                    </div>
						<table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>姓名</th>
                                    <th>手机号</th>
                                    <th>地址</th>
                                    <th>是否默认地址</th>
                                    <th>编辑</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($dresses as $k=>$v)
                                <tr style="text-align:center">
                                 	<td>{{$v->id}}</td>
                                 	<td>{{$v->name}}</td>
                                 	<td>{{$v->phone}}</td>
                                 	<td>{{$v->address}}</td>
                                 	<td>
                                 		@if($v->isStaAdd == 1)
				                              是
				                            @else
				                              否
				                            @endif
                                 	</td>
                                 	<td>
			                           <a href="/admin/dresse/{{$v->id}}/edit" class="btn btn-warning" >修改
			                           </a>
			                           <form action="/admin/dresse/{{$v->id}}" method="post" style="display:inline"> 
			                               <button class="btn btn-danger" onclick="return confirm('确认要删除吗?');">删除</button>
			                        
			                           {{csrf_field()}}
			                           {{method_field('DELETE')}}
			                           </form>
			                            
                          			</td>
                    		</tr>
                     @endforeach  
                               
                            </tbody>
                        </table>
                        <div id="page_page">
							{{ $dresses->appends($params)->links() }}
				        </div>
                    </div>
@endsection