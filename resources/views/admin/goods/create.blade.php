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
        	<span>商品添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="title" class="small" value="">
        				</div>
        			</div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">所属分类</label>
                        <div class="mws-form-item">
                            <select class="small" name="cates_id">
                                <option value="0">--请选择--</option>
                                @foreach($cates as $k=>$v)
                                @if(substr_count($v->path,',') == 2)
                                <option value="{{ $v->id }}">{{ $v->cname }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                     <div class="mws-form-row">
                        <label class="mws-form-label">所属品牌</label>
                        <div class="mws-form-item">
                            <select class="small" name="brands_id">
                                <option value="0">--请选择--</option>
                                @foreach($brands as $k=>$v)
                                <option value="{{ $v->id }}">{{ $v->bname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" name="price" class="small" value="">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">商品库存</label>
                        <div class="mws-form-item">
                            <input type="text" name="store" class="small" value="">
                        </div>
                    </div>

                    <div class="mws-form-row">
                                    <label class="mws-form-label">是否推荐: </label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input id="gender_male" type="radio" name="recommend" class="required" value="0" checked=""> <label for="gender_male">暂不推荐</label></li>
                                            <li><input id="gender_female" type="radio" name="recommend" value="1"> <label for="gender_female">推荐</label></li>
                                        </ul>
                                        <label for="gender" class="error plain" generated="true" style="display:none"></label>
                                    </div>
                                </div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">商品图片</label>
        				<div class="mws-form-item">
        					<input type="file" name="pic" class="small">
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