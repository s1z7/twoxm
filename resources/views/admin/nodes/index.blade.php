@extends('admin.layout.index')

@section('content')
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
                @foreach($data as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->desc }}</td>
                    <td>{{ $v->cname }}</td>
                    <td>{{ $v->aname }}</td>
                	<td>
                        <a href="">修改</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection