<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>客户管理系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/index/css/font.css">
	<link rel="stylesheet" href="/index/css/xadmin.css">
    <script type="text/javascript" src="/index/js/jquery-3.3.1.min.js"></script>
    <script src="/index/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/index/js/xadmin.js"></script>

</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="javascript:;">客户管理系统</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd>
              <dd><a href="/index/login.html">退出</a></dd>
            </dl>
          </li>
          <!-- <li class="layui-nav-item to-index"><a href="/">前台首页</a></li> -->
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b4;</i>
                    <cite>系统首页</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="member-list.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>跟单提醒</cite>
                            
                        </a>
                    </li >
					<li>
                        <a href="member-list.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>内部公文</cite>
                            
                        </a>
                    </li >
                    <li>
                        <a href="member-del.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>个人日历</cite>
                            
                        </a>
                    </li>
					<li>
                        <a href="member-del.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>开单</cite>
                            
                        </a>
                    </li>
					<li>
                        <a href="member-del.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>个人中心</cite>
                            
                        </a>
                    </li>
                   <!--  <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            <cite>会员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="xxx.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员列表</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="xx.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员删除</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="xx.html">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>等级管理</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li> -->
					<li>
                        <a _href="member-del.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>概要统计</cite>
                            
                        </a>
                    </li>
					<li>
                        <a href="member-del.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>绩效排名</cite>
                            
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>客户管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="/user_add">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>新增客户</cite>
                        </a>
                    </li >
					<li>
                        <a href="/documentary_list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>跟单记录</cite>
                        </a>
                    </li>
					<li>
                        <a href="/order_list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>订单记录</cite>
                        </a>
                    </li >
					<li>
                        <a href="/contract_list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>合同记录</cite>
                        </a>
                    </li >
					<li>
                        <a href="order-list.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>附加记录</cite>
                        </a>
                    </li >
					<li>
                        <a href="/share_user">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>客户共享</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>功能插件</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="cate.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>内部公文</cite>
                        </a>
                    </li >
					<li>
                        <a _href="cate.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>任务发布</cite>
                        </a>
                    </li >
					<li>
                        <a _href="cate.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>个人日历</cite>
                        </a>
                    </li >
					<li>
                        <a _href="cate.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>工作报告</cite>
                        </a>
                    </li >
					<li>
                        <a _href="cate.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>数据统计</cite>
                        </a>
                    </li >
					<li>
                        <a _href="cate.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>开单爆屏</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6ce;</i>
                    <cite>系统设置</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="city.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>产品管理</cite>
                        </a>
                    </li >
					<li>
                        <a href="/limit_list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>权限管理</cite>
                        </a>
                    </li >
					<li>
                        <a href="/admin_list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>员工管理</cite>
                        </a>
                    </li >
					<li>
                        <a href="city.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>部门管理</cite>
                        </a>
                    </li >
					<li>
                        <a href="/role_list">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>角色管理</cite>
                        </a>
                    </li >
					<li>
                        <a href="city.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>登陆日志</cite>
                        </a>
                    </li >
					<li>
                        <a href="city.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>操作记录</cite>
                        </a>
                    </li >
					<li>
                        <a href="city.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>数据导出</cite>
                        </a>
                    </li >
					<li>
                        <a href="city.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>数据导入</cite>
                        </a>
                    </li >
                </ul>
            </li>
            
        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                @yield('content')
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved</div>  
    </div>
    <!-- 底部结束 -->
    
</body>
</html>