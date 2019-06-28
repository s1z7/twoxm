@extends('admin.layout.index')

@section('content')
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
                            <a href="">修改角色权限</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection