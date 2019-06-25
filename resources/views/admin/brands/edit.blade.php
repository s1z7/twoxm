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
        	<span>品牌添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/brands/{{ $brands->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}

                {{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">品牌名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="bname" class="small" value="{{ $brands->bname }}" disabled>
        				</div>
        			</div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">当前logo</label>
                        <div class="mws-form-item">
                            <img style="border-radius: 5px;border: 1px solid #ccc;width: 50px;" src="/uploads/{{ $brands->img }}">
                        </div>
                    </div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">品牌商标</label>
        				<div class="mws-form-item">
        					<input type="file" name="img" class="small">
                            <input type="hidden" name="old_img" value="{{ $brands->img }}">
        				</div>
        			</div>
                    
                    @if($brands->status == 0)
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态:</label>
                        <div class="mws-form-item">
                            <ul class="mws-form-list">
                                <li><input id="gender_male" type="radio" name="status" value="1" class="required"> <label for="gender_male">激活</label></li>
                                <li><input id="gender_female" type="radio" name="status" value="0" checked> <label for="gender_female">未激活</label></li>
                            </ul>
                            <label for="gender" class="error plain" generated="true" style="display:none"></label>
                        </div>
                    </div>
                    @else
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态:</label>
                        <div class="mws-form-item">
                            <ul class="mws-form-list">
                                <li><input id="gender_male" type="radio" name="status" value="1" class="required" checked> <label for="gender_male">激活</label></li>
                                <li><input id="gender_female" type="radio" name="status" value="0" > <label for="gender_female">未激活</label></li>
                            </ul>
                            <label for="gender" class="error plain" generated="true" style="display:none"></label>
                        </div>
                    </div>
                    @endif
				</div>
        		<div class="mws-button-row">
        			<input type="submit" value="Submit" class="btn btn-danger">
        			<input type="reset" value="Reset" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection