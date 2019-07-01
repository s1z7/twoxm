
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/h/css/style.css" />
    <!--[if IE 6]>
    <script src="/h/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/h/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="/h/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/h/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/h/js/menu.js"></script>    
        
	<script type="text/javascript" src="/h/js/select.js"></script>
    
	<script type="text/javascript" src="/h/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/h/js/iban.js"></script>
    <script type="text/javascript" src="/h/js/fban.js"></script>
    <script type="text/javascript" src="/h/js/f_ban.js"></script>
    <script type="text/javascript" src="/h/js/mban.js"></script>
    <script type="text/javascript" src="/h/js/bban.js"></script>
    <script type="text/javascript" src="/h/js/hban.js"></script>
    <script type="text/javascript" src="/h/js/tban.js"></script>
    
	<script type="text/javascript" src="/h/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
        	@if(session('uname'))
            <span class="fl">欢迎回来!&nbsp;{{session('uname')}}&nbsp;|&nbsp;<a href="/home/outlogin">退出</a>&nbsp;|&nbsp;<a href="/home/geren">个人中心</a>&nbsp;|</span>
            @else
        	<span class="fl">你好，请<a href="/home/login">登录</a>&nbsp; <a href="/home/register" style="color:#ff4e00;">免费注册</a>|</span>
            @endif
        	<span class="ss">
            	<div class="ss_list">
                	<a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">我的收藏夹</a></li>
                                <li><a href="#">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                	<a href="#">客户服务</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                	<a href="/home/geren">我的订单</a>
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/h/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="/home/index"><img style="width:245px;margin-top:-15px;height:87px;" src="/h/images/1.png" /></a></div>
    <div class="search">
    	<form action="/home/list" method="get">
            <input type="text" value="" class="s_ipt" name="search" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
    	<div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
       		<!--Begin 购物车未登录 Begin-->
        	<div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
            	<li>
                	<div class="img"><a href="#"><img src="/h/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/h/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/h/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin-->    
    	<div class="nav" style="background-color:red;">
        	<div class="nav_t">全部商品分类</div>
            <div class="leftNav" style="background-color:red;">
                <ul>
                    @foreach($common_cates_data as $k=>$v)
                    <li>
                    	<div class="fj">
                        	<span class="n_img"><span></span><img src="/h/images/nav1.png" /></span>
                            <span class="fl">{{ $v->cname }}</span>
                        </div>
                        <div class="zj">
                            <div class="zj_l">
                                @foreach($v->sub as $kk=>$vv)
                                <div class="zj_l_c">
                                    <h2>{{ $vv->cname }}</h2>
                                    @foreach($vv->sub as $kkk=>$vvv)
                                    <a href="/home/list?id={{ $vvv->id }}">{{ $vvv->cname }}</a>|
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/h/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/h/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li> 
                    @endforeach
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
    	<ul class="menu_r">
        @foreach($data_daohang as $k=>$v)           
        	  <li><a style="color:black;font-weight:bold" href="{{$v->dlink}}">{{$v->dname}}</a></li>
        @endforeach
        </ul>
    </div>
</div>
<!--End Menu End--> 
<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!--Begin Banner Begin-->
    	<div class="banner">    	
            <div class="top_slide_wrap" style="margin-top:2px;">
                <ul class="slide_box bxslider">
                	@foreach($data_pic as $k=>$v)
                    @if($v->status == '1')   
                    <li><img src="/uploads/{{$v->pic}}" width="740" height="401" /></li>
                    @endif
                    @endforeach
                </ul>
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews" style="margin-top:2px;">
        	<div class="news_t">
            	<span class="fr"><a href="#">更多 ></a></span>限时特惠
            </div>
            
            <ul>
                @foreach($goods as $k=>$v)
                 @if($v->status == '2')
            	<li><span>[ 特惠 ]</span>{{ $v->title }}</li>
            	@endif
                @endforeach
            </ul>
            
            
        </div>
    </div>
    <!--Begin 热门商品 Begin-->
    <div class="content mar_10">
    	<div class="h_l_img">
        	<div class="img"><img src="/h/images/l_img.jpg" width="188" height="188" /></div>
            <div class="pri_bg">
                <span class="price fl">￥53.00</span>
                <span class="fr">16R</span>
            </div>
        </div>
        <div class="hot_pro">        	
        	<div id="featureContainer">
                <div id="feature">
                    <div id="block">
                        <div id="botton-scroll">
                            <ul class="featureUL">
                                @foreach($goods as $k=>$v)
                                @if($v->status == '1')
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="h_icon">
                                            <img src="/h/images/hot.png" width="50" height="50" />
                                        </div>
                                        <div class="imgbg">
                                            <a href="#"><img src="/uploads/{{ $v->pic }}" width="160" height="136" /></a>
                                        </div>        
                                        <div class="name">
                                            <a href="#">
                                            <h2>{{$v->title}}</h2>
                                            {{$v->goodsinfos->desc}}
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>{{$v->price}}</span></font>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                
                                
                            </ul>
                        </div>
                    </div>
                    <a class="h_prev" href="javascript:void();">Previous</a>
                    <a class="h_next" href="javascript:void();">Next</a>
                </div>
            </div>
        </div>
    </div>
    <!--Begin 限时特卖 Begin-->

    
    <!--End 限时特卖 End-->
    <div class="content mar_20">
    	<img src="/h/images/mban_1.jpg" width="1200" height="110" />
    </div>
	<!--Begin 进口 生鲜 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">1F</span>
    	<span class="fl">限时 <b>·</b> 热卖</span>                
        
    </div>
    <div class="content">
    	<div class="fresh_left">
        	<div class="fre_ban">
            	<div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <li><a href="#"><img src="/h/images/fre_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/h/images/fre_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/h/images/fre_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prevf">上一张</div>
                    <div class="nextf">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#">进口水果</a>
                    <a href="#">奇异果</a>
                    <a href="#">西柚</a>
                    <a href="#">海鲜水产</a>
                    <a href="#">品质牛肉</a>
                    <a href="#">奶粉</a>
                    <a href="#">鲜活禽蛋</a>
                    <a href="#">进口酒</a>
                    <a href="#">进口奶粉</a>
                    <a href="#">鲜活禽蛋</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                 @foreach($goods as $k=>$v)
                 @if($v->status == '2')
            	<li>
                	<div class="name"><a href="#">{{ $v->title }}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $v->price }}</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="/uploads/{{ $v->pic }}" width="185" height="155" /></a>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="/h/images/diannao1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/h/images/diannao2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 进口 生鲜 End-->
    <!--Begin 食品饮料 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">2F</span>
    	<span class="fl">猜你喜欢</span>                                
       
    </div>
    <div class="content">
    	<div class="food_left">
        	<div class="food_ban">
            	<div id="imgPlay2">
                    <ul class="imgs" id="actor2">
                        <li><a href="#"><img src="/h/images/food_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/h/images/food_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/h/images/food_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prev_f">上一张</div>
                    <div class="next_f">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                	<a href="#">饼干糕点</a><a href="#">休闲零食</a><a href="#">饮料果汁</a><a href="#">牛奶乳品</a><a href="#">冲饮谷物</a><a href="#">营养保健</a><a href="#">冲饮谷物</a><a href="#">营养保健</a>
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                @foreach($goods as $k=>$v)
                @if($v->status == '3')
            	<li>
                	<div class="name"><a href="#">{{ $v->title }}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $v->price }}</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="/uploads/{{$v->pic}}" width="185" height="155" /></a>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
        	<ul>
            	<li><a href="#"><img src="/h/images/3.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/h/images/4.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/h/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                          		<dt><a href="#">友情链接</a></dt>
              @foreach($data_link as $k=>$v)                
        	  <dd><a href="{{$v->url}}">{{$v->name}}</a></dd>
              @endforeach
        </dl>
        <dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>

        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/h/images/er.gif" width="118" height="118" /></div>
            <img src="/h/images/ss.png" />
        </div>
    </div>   
        
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/h/images/b_1.gif" width="98" height="33" /><img src="/h/images/b_2.gif" width="98" height="33" /><img src="/h/images/b_3.gif" width="98" height="33" /><img src="/h/images/b_4.gif" width="98" height="33" /><img src="/h/images/b_5.gif" width="98" height="33" /><img src="/h/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
