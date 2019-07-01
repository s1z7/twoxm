@extends('admin.layout.index')


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
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>角色添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/roles" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">角色名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="rname">
                    </div>
                </div>
            
                <div class="mws-form-row">
                    <label class="mws-form-label">角色权限</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline small">
                            @foreach($list as $k=>$v)
                            <h3>{{ $controller[$k] }} <small>{{ $k }}</small> </h3>
                                @foreach($v as $kk=>$vv)
                                <li><input type="checkbox" name="nids[]" value="{{ $vv['id'] }}"> <label>{{ $vv['desc'] }}</label></li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-danger">
                <input type="reset" value="Reset" class="btn ">
            </div>
        </form>
    </div>      
</div>
@endsection