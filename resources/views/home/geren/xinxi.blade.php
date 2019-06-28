@extends('home.geren.layout')


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
				<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115">
                    	<div class="m_user">{{$data_users->uname}}</div>
                    	<img src="/uploads/{{$data_usersinfo->profile}}" width="90" height="90"/>
                    </td>
                  </tr>
                </table>	
            </div>
             <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40%">用户ID：<span style="color:#555555;">{{$data_users->id}}</span></td>
                <td width="40%">用户名：<span style="color:#555555;">{{$data_users->uname}}</span></td>
              </tr>
              <tr>
                <td width="40%">年&nbsp; &nbsp; 龄：<span style="color:#555555;">{{$data_usersinfo->age}}</span></td>
                 <td width="40%">性&nbsp; &nbsp; 别：
               
                 	@if($data_usersinfo->sex == 1)	
                 		 <span style="color:#555555;">女</span>
                 	@else
                 		<span style="color:#555555;">男</span>
                    @endif
                 </td>
              </tr>
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{$data_users->phone}}</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{$data_users->email}}</span></td>
              </tr>
             <tr>
             	<td width="40%">&nbsp; &nbsp;QQ ：<span style="color:#555555;">{{$data_usersinfo->qq}}</span></td>
             </tr>
            </table>


@endsection