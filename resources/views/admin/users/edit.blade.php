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
        	<span>用户修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
                {{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">用户名</label>
        				<div class="mws-form-item">
        					<input type="text" disabled name="uname" class="small" value="{{ $user->uname }}">
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱</label>
        				<div class="mws-form-item">
        					<input type="text" name="email" class="small" value="{{ $user->email }}">
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号</label>
        				<div class="mws-form-item">
        					<input type="text" name="phone" class="small" value="{{ $user->phone }}">
        				</div>
        			</div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">当前头像</label>
                        <div class="mws-form-item">
                        	@if(empty($user->userinfo->profile))
							<img src="/h/images/kong.jpg" style="border-radius: 5px;border: 1px solid #ccc;width: 50px;" >
							@else
							<img style="border-radius: 5px;border: 1px solid #ccc;width: 50px;" src="/uploads/{{ $user->userinfo->profile }}">
							@endif
                        </div>
                    </div>
                    @if(!empty($user->userinfo->profile))
                    <input type="hidden" name="old_profile" value="{{ $user->userinfo->profile }}">
                    
                    @endif
        			<div class="mws-form-row">
        				<label class="mws-form-label">头像</label>
        				<div class="mws-form-item">
        					<input type="file" name="profile" class="small">
        				</div>
        			</div>
                    <div class="control-group success">
                                @if($user->status == 0)
                                     <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;状态</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input type="radio" id="male" name="status" value="0" class="required" checked> <label for="male"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">未激活</font></font></label></li>
                                            <li><input type="radio" id="female" value="1" name="status"> <label for="female"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">已激活</font></font></label></li>
                                        </ul>
                                        <label class="error plain" generated="true" for="gender" style="display:none"></label>
                                    </div>
                                @else
                                     <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input type="radio" id="male" name="status" value="0" class="required" checked> <label for="male"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">未激活</font></font></label></li>
                                            <li><input type="radio" id="female" value="1" name="status"> <label for="female"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">已激活</font></font></label></li>
                                        </ul>
                                        <label class="error plain" generated="true" for="gender" style="display:none"></label>
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