@extends('home.geren.layout')


@section('content')
  <p></p>
  <div class="mem_tit">我的留言</div>
  <form action="/home/order/dospeak/{{$order->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
  <table border="0" style="width:880px; margin-top:20px;" cellspacing="0" cellpadding="0">
    <tbody>
      <tr height="45">
        <td width="80" align="right">商品图片 &nbsp; &nbsp;</td>
        <td>                            
          <img src="/uploads/{{$order->orders_goods->pic}}" style="width:60px;">
        </td>
      </tr>
      <tr height="45">
        <td width="80" align="right">星级评价 &nbsp; &nbsp;</td>
        <td>                            
            <input type="radio" name="start" value="0"><font style="color:tomato">五星好评</font>
            <input type="radio" name="start" value="1"><font style="color:tomato">差评</font>
        </td>
      </tr>

    <tr valign="top" height="110">
      <td align="right">评论内容 &nbsp; &nbsp;</td>
      <td style="padding-top:5px;"><textarea class="add_txt" name="spe"></textarea></td>
    </tr>
    <tr height="45">
      <td align="right">上传图片 &nbsp; &nbsp;</td>
      <td><input type="file" name="pic"></td>
    </tr>

    <tr height="50" valign="bottom">
      <td>&nbsp;</td>
      <td><input type="submit" value="提交" class="btn_tj"></td>
    </tr>
  </tbody></table>
  </form>
@endsection