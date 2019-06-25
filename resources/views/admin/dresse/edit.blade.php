@extends('admin.layout.index')

@section('content')
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
        	<span>收货地址修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/dresse/{{$dresse->id}}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">姓名</label>
        				<div class="mws-form-item">
        					<input type="text" name="name" class="small">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号</label>
        				<div class="mws-form-item">
        					<input type="text" name="phone" class="small">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">收获地址</label>
        				<div class="mws-form-item">
        					<input type="text" name="address" class="small">
        				</div>
        			</div>

        			<div class="mws-form-row">
                                    <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">是否默认地址</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input type="radio" id="male" name="isStaAdd" value="0" class="required" checked> <label for="male"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">否</font></font></label></li>
                                            <li><input type="radio" id="female" value="1" name="isStaAdd"> <label for="female"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">是</font></font></label></li>
                                        </ul>
                                        <label class="error plain" generated="true" for="gender" style="display:none"></label>
                                    </div>
                       </div>
                      
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="Submit" class="btn btn-danger">
        			<input type="reset" value="Reset" class="btn ">
        		</div>
        		{{csrf_field()}}
                {{method_field('PUT')}}
        	</form>
        </div>    	
    </div>
@endsection
@endsection