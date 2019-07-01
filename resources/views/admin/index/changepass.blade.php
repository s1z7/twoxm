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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> 修 改 密 码</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/dopass/{{ session('admin_user')->id }}" method="post" enctype="multipart/form-data">

							{{ csrf_field() }}
							
							<fieldset>
								<div class="control-group success">
									<label class="control-label" for="inputSuccess">原密码 :</label>
									<div class="controls">
									  <input type="password" id="inputSuccess" name="upass" value="">
									</div>
							  	</div>
								<div class="control-group success">
									<label class="control-label" for="inputSuccess">密码 :</label>
									<div class="controls">
									  <input type="password" id="inputSuccess" name="pass" value="">
									</div>
							  </div>
							   <div class="control-group success">
									<label class="control-label" for="inputSuccess">确认密码 :</label>
									<div class="controls">
									  <input type="password" id="inputSuccess" name="repass" value="">
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
