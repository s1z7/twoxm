
<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="/ho/regist/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/ho/regist/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/ho/regist/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/ho/regist/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
    <style type="text/css">
        .login-boxtitle{
          margin-top: 20px;
          margin-bottom: 20px;
        }
    </style>
  </head>

  <body>

    <div class="login-boxtitle">
      <div class="logo"><a href="Index.html"><img src="/h/images/logo.png" /></a></div>

    </div>

    <div class="res-banner">
      <div class="res-main">
        <div class="log_img"><img src="/h/images/l_img.png" style="margin-top:30px;margin-left:-130px;" width="611" height="425" /></div>

        <div class="login-box" style="margin-top:-430px;">

            <div class="am-tabs" id="doc-my-tabs">
              <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                <li class="am-active"><a href="">邮箱注册</a></li>
                <li><a href="">手机号注册</a></li>
              </ul>

              <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                 
                  <form method="post" action="/home/register/insert">
                     {{ csrf_field() }}
                     <div class="user-email">
                        <label for="email"><i class="am-icon-envelope-o"></i></label>
                        <input type="text" name="email" id="email" placeholder="请输入邮箱账号">
                     </div>                   
                     <div class="user-pass">
                        <label for="password"><i class="am-icon-lock"></i></label>
                        <input type="password" name="upass" id="password" placeholder="设置密码">
                     </div>                   
                     <div class="user-pass">
                        <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                        <input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
                     </div> 
                    <div class="am-cf" style="">
                      <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>
                 </form>
 
                </div>

                <div class="am-tab-panel">

                  <form method="post" action="/home/register/store">

                    {{ csrf_field() }}
                     <div class="user-phone">
                        <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                        <input type="tel" name="phone" id="phone" placeholder="请输入手机号">
                     </div>                                     
                        <div class="verification">
                          <label for="code"><i class="am-icon-code-fork"></i></label>
                          <input type="tel" name="code" id="code" placeholder="请输入验证码">
                          <a class="btn" href="javascript:void(0);" onclick="sendMobileCode(this);" id="sendMobileCode">
                            <span id="dyMobileButton">获取</span></a>
                        </div>
                     <div class="user-pass">
                        <label for="password"><i class="am-icon-lock"></i></label>
                        <input type="password" name="upass" id="password" placeholder="设置密码">
                     </div>                   
                     <div class="user-pass">
                        <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                        <input type="password" name="repass" id="passwordRepeat" placeholder="确认密码">
                     </div> 
                     <div class="am-cf">
                          <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                      </div>
                  </form>
                 
                
                  <hr>
                </div>

                <script>
                  $(function() {
                      $('#doc-my-tabs').tabs();
                    })
                </script>

                <!-- 获取单击事件 -->
                <script type="text/javascript">
                    function sendMobileCode(obj)
                    {
                          // 获取用户的手机号

                           let phone = $('#phone').val(); 
                                                
                            // 验证格式
                            let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
                            
                            //判断手机号格式
                            if(!phone_preg.test(phone)){
                              // console.log('手机号ok');
                               alert('手机号格式不正确');
                                
                                return false; 
                            }
                        // 给span 获取按钮加样式 
                        $(obj).attr('disabled',true);
                        $(obj).css('color','#ccc');
                        $(obj).css('cursor','no-drop');
                        $('#dyMobileButton').css('color','#ccc');
                         let time = null;
                         // 当span标签中的html标签内容是获取时进行
                         if($('#dyMobileButton').html() == '获取'){
                            let i = 60;
                            // 设置定时器 倒计时60秒
                            time = setInterval(function(){
                              i--;
                              $('#dyMobileButton').html('('+i+')s');
                              if(i < 1){
                                // 当i<1时 span 标签的样式恢复到没有改变之前 可以再单击获取验证码
                                $(obj).attr('disabled',false);
                                $(obj).css('color','#333');
                                $(obj).css('cursor','pointer');
                                $('#dyMobileButton').css('color','#333'); 
                                $('#dyMobileButton').html('获取');
                                clearInterval(time);
                              }
                            },1000);
                           
                              // 发送ajax 发送验证码
                            $.get('/home/register/sendPhone',{phone},function(res){
                             if(res.error_code == 0){
                              alert('发送成功,验证码10分钟有效');
                             }else{
                              alert('发送失败');
                             }
                            },'json');
                         }
                    }
                </script>

              </div>
            </div>

        </div>
      </div>
      
          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">two商城</a>
                <b>|</b>
                <a href="/home/index">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于two</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
              </p>
            </div>
          </div>
  </body>

</html>