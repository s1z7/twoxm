
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/d/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/custom-plugins/picklist/picklist.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/plugins/select2/select2.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/plugins/ibutton/jquery.ibutton.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/plugins/cleditor/jquery.cleditor.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/d/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/d/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/d/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/d/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/d/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/d/css/themer.css" media="screen">

<title>TWO 商城 后台</title>
    @section('css')

    @show
        

</head>

<body>

	

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<font style="color:#c5d52b;width:300px;font-size:30px;line-height: 50px;margin-left:50px;margin:0 auto;">two 商城</font>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	
            
            
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/uploads/{{ session('admin_user')->profile }}" alt="">
                </div>
                @if(session('admin_user'))
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{ session('admin_user')->uname }}
                    </div>
                    <ul>
                    	<li><a href="/admin/changeprofile/{{ session('admin_user')->id }}"><i class="halflings-icon user"></i>修改头像</a></li>
                        <li><a href="/admin/pass">修改 密码</a></li>
                        <li><a href="/admin/outlogin">退出</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-user"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/users"></i>  用户列表</a></li>
                            <li><a href="/admin/users/create">  用户添加</a></li>
                        </ul>
                    </li>

                     <li class="active">
                        <a href="#"><i class="icon-align-justify"></i> 管理员管理</a>
                        <ul>
                            <li><a href="/admin/adminuser">  管理员列表</a></li>
                            <li><a href="/admin/adminuser/create">  管理员添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-github"></i>角色管理</a>
                        <ul>
                            <li><a href="/admin/roles">  角色列表</a></li>
                            <li><a href="/admin/roles/create">  角色添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-windows"></i>权限管理</a>
                        <ul>
                            <li><a href="/admin/nodes">  权限列表</a></li>
                            <li><a href="/admin/nodes/create">  权限添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-fullscreen"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cates">  分类列表</a></li>
                            <li><a href="/admin/cates/create">  分类添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-vimeo"></i> 品牌管理</a>
                        <ul>
                            <li><a href="/admin/brands">  品牌列表</a></li>
                            <li><a href="/admin/brands/create">  品牌添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-shopping-cart"></i>商品管理</a>
                        <ul>
                            <li><a href="/admin/goods">  商品列表</a></li>
                            <li><a href="/admin/goods/create">  商品添加</a></li>
                        </ul>
                    </li>
                    
                    <li class="active">
                        <a href="#"><i class="icon-picture"></i> 轮播图管理</a>
                        <ul>
                            <li><a href="/admin/lunbo">  轮播图列表</a></li>
                            <li><a href="/admin/lunbo/create">  轮播图添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-paper-airplane"></i> 导航条管理</a>
                        <ul>
                            <li><a href="/admin/daohang"></i>  导航列表</a></li>
                            <li><a href="/admin/daohang/create">  导航添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-picassa"></i> 友情链接管理</a>
                        <ul>
                            <li><a href="/admin/link"></i>  友情链接列表</a></li>
                            <li><a href="/admin/link/create">  友情链接添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-picassa"></i> 订单管理</a>
                        <ul>
                            <li><a href="/admin/ordermanage/index"></i>  订单列表</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-picassa"></i> 评论管理</a>
                        <ul>
                            <li><a href="/admin/speak/index"></i>  评论列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- 内容 开始 -->
            <div class="container">
                <!-- 读取提示消息 -->
                @if(session('error'))
                <div class="mws-form-message error">
                    {{ session('error') }}
                </div>
                @endif

                 @if(session('success'))
                <div class="mws-form-message success">
                    {{ session('success') }}
                </div>
                @endif


                @section('content')
            	
                @show
                
            </div>
            <!-- 内容 结束 -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/d/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/d/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/d/js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/d/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/d/jui/jquery-ui.custom.min.js"></script>
    <script src="/d/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/d/jui/js/globalize/globalize.js"></script>
    <script src="/d/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="custom-plugins/picklist/picklist.min.js"></script>
    <script src="/d/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/d/plugins/select2/select2.min.js"></script>
    <script src="/d/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/d/plugins/validate/jquery.validate-min.js"></script>
    <script src="/d/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="/d/bootstrap/js/bootstrap.min.js"></script>
    <script src="/d/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/d/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/d/js/demo/demo.formelements.js"></script>

</body>
</html>
