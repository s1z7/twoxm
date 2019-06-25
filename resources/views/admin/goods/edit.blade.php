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
        	<span>商品修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/goods/{{ $goods->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
                {{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="title" class="small" value="{{ $goods->title }}">
        				</div>
        			</div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">所属分类</label>
                        <div class="mws-form-item">
                            <select class="small" name="cates_id">
                                @foreach($cates as $k=>$v)
                                    @if($v->id == $cates_id)
                                        <option value="{{$v->id}}" selected>{{$v->cname}}</option>
                                    @else
                                        <option value="{{$v->id}}">{{$v->cname}}</option>
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
                                @if($v->id == $brands_id)
                                <option value="{{ $v->id }}" selected>{{ $v->bname }}</option>
                                @else
                                <option value="{{ $v->id }}">{{ $v->brands }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" name="price" class="small" value="{{ $goods->price }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">商品库存</label>
                        <div class="mws-form-item">
                            <input type="text" name="store" class="small" value="{{ $goods->store }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                                    <label class="mws-form-label">是否推荐 </label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input id="gender_male" type="radio" name="recommend" class="required" value="0" checked=""> <label for="gender_male">暂不推荐</label></li>
                                            <li><input id="gender_female" type="radio" name="recommend" value="1"> <label for="gender_female">推荐</label></li>
                                        </ul>
                                        <label for="gender" class="error plain" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品限定</label>
                        <div class="mws-form-item">
                            <select class="small" name="status">
                                <option value="0" selected>普通商品</option>
                                <option value="1">热门商品</option>
                                <option value="2">限时特卖</option>
                                <option value="3">猜你喜欢</option>
                            </select>
                        </div>
                    </div>           
                    


                    <div class="mws-form-row">
                        <label class="mws-form-label">当前商品图片</label>
                        <div class="mws-form-item">
                            <img style="border-radius: 5px;border: 1px solid #ccc;width: 50px;" src="/uploads/{{ $goods->pic }}">
                        </div>
                    </div>
                    
                    <input type="hidden" name="old_pic" value="{{ $goods->pic }}">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品图片</label>
                        <div class="mws-form-item">
                            <input type="file" name="pic" class="small">
                            <input type="hidden" name="pic_path" value="{{$goods->pic}}">
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