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
        	<span>导航添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/daohang" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">导航名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="dname" class="small" value="{{ old('title') }}">
        				</div>
        			</div>


        			<div class="mws-form-row">
        				<label class="mws-form-label">链接地址</label>
        				<div class="mws-form-item">
        					<input type="text" name="dlink" class="small">
        				</div>
        			</div>

        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="Submit" class="btn btn-danger">
        			<input type="reset" value="Reset" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection