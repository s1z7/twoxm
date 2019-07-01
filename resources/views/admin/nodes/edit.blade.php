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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>权 限 修 改</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="/admin/nodes/{{ $node_data->id }}" method="post">

							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<fieldset>
								<div class="control-group success">
								<label class="control-label" for="inputSuccess">权限描述 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="desc" value="{{ $node_data->desc }}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">控制器名称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="cname" value="{{ $node_data->cname }}">
								</div>
							  </div>
							  <div class="control-group success">
								<label class="control-label" for="inputSuccess">方法名称 :</label>
								<div class="controls">
								  <input type="text" id="inputSuccess" name="aname" value="{{ $node_data->aname }}">
								  
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