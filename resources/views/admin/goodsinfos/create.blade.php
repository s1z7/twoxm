@extends('admin.layout.index')

@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>添加商品详情</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/goodsinfos/store/{{ $goods->id }}" method="post" enctype="multipart/form-data">
                    		{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">商品名称:</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="large"  value="{{ $goods->title }}" disabled='disabled'>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">商品描述:</label>
                    				<div class="mws-form-item">
                    					<textarea rows="" cols="" class="large" name="desc"></textarea>
                    				</div>
                    			</div>
								<div class="mws-form-row">
                    				<label class="mws-form-label">商品型号:</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="large" name="capa">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">商品属性:</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="large" name="taste">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
			        				<label class="mws-form-label">详情图片1</label>
			        				<div class="mws-form-item">
			        					<input type="file" name="pic1" class="small">
			        				</div>
			        			</div>
			        			<div class="mws-form-row">
			        				<label class="mws-form-label">详情图片2</label>
			        				<div class="mws-form-item">
			        					<input type="file" name="pic2" class="small">
			        				</div>
			        			</div>
			        			<div class="mws-form-row">
			        				<label class="mws-form-label">详情图片3</label>
			        				<div class="mws-form-item">
			        					<input type="file" name="pic3" class="small">
			        				</div>
			        			</div>

                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="提交" class="btn btn-danger">
                    			<input type="reset" value="清除" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection