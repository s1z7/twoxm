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

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>角 色 修 改</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/roles/{{ $role_data->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<fieldset>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">角色名称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="rname" value="{{ $role_data->rname}}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">角色权限 :</label>
								<div class="controls">
								 	@foreach($list as $k=>$v)
								 		<div style="margin-top: 6px;font-size: 16px; color:#808080">{{ $controller[$k] }} &nbsp;<small>({{ $k }})</small></div>
								 		@foreach($v as $kk=>$vv)
									  <label class="checkbox inline">
									  		
									  		<input type="checkbox" id="inlineCheckbox1" name="nid[]" value="{{ $vv['id'] }}" {{ in_array($vv['id'],$temp) ? 'checked' : ''}}>{{ $vv['desc'] }}	
											
									  </label>
									  	@endforeach
									 @endforeach
									</div>
								</div>
							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">修 &nbsp; 改</button>
								
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div>
		</div>	

@endsection