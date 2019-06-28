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
<form action="/home/geren/doeditxi/{{$user_data->id}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
            <table border="0" class="add_tab" style="width:930px;height:400px;"  cellspacing="0" cellpadding="0">
            	<input type="hidden" value="{{session('id')}}" name="id">
             <tr>
             <td width="40%" align="right">&nbsp;&nbsp;用户名</td><td style="font-family:'宋体';"><span style="color:#555555;">{{$user_data->uname}}</span></td></tr>
              <tr>
                <td align="right">年 &nbsp;&nbsp;&nbsp;&nbsp; 龄</td>
                <td style="font-family:'宋体';"><input type="text" name="age" value="" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">性 &nbsp;&nbsp;&nbsp;&nbsp; 别</td>
                <td style="font-family:'宋体';">
                <input id="gender_male" type="radio" name="sex" class="required" value="0" checked=""><label for="gender_female">男</label>
                <input id="gender_female" type="radio" name="sex" value="1"> <label for="gender_female">女</label>
                </td>
              </tr>
              <tr>
                <td align="right">电 &nbsp;&nbsp;&nbsp;&nbsp; 话</td>
                <td style="font-family:'宋体';"><input type="text" name="phone" value="" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">邮 &nbsp;&nbsp;&nbsp;&nbsp; 箱</td>
                <td style="font-family:'宋体';"><input type="text" name="email" value="" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">QQ &nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td style="font-family:'宋体';"><input type="text" name="qq" value="" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">头像 &nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td style="font-family:'宋体';"><input type="file" name="profile" value="" class="add_ipt" /></td>
              </tr>
            </table>
           	<p align="right">
            	<a href="#"><button>确认修改</button></a>
            </p> 
        </form>
@endsection