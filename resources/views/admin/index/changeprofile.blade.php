@extends('admin.layout.index')

@section('content')


	@if (count($errors) > 0)
	<div class="alert alert-error">
		<ul>
			<button type="button" class="close" data-dismiss="alert">×</button>
			@foreach($errors->all() as $error)
				<li> {{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> 修 改 头 像</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/doprofile/{{ session('admin_user')->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							
							<fieldset>
								<div class="control-group success">
								<label class="control-label" for="inputSuccess">原头像 :</label>
								<div class="controls">
								  <img src="/uploads/{{ session('admin_user')->profile }}" style="width: 80px;height: auto;margin-left: 40px">
								</div>
							  </div>
								
							   <div class="control-group success">
								<label class="control-label" for="inputSuccess">头像 :</label>
								<div class="controls">
								  <input type="file" id="inputSuccess" name="profile" value="">
								  <input type="hidden" name="profile_path" value="{{ session('admin_user')->profile }}">
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
