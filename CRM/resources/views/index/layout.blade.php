
	<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.0</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/index/css/font.css">
        <link rel="stylesheet" href="/index/css/xadmin.css">
		<link href="/index/inet.css" rel="stylesheet" type="text/css" />
		<link href="/index/co.css" rel="stylesheet" type="text/css" />


    
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red">test</span>！当前时间:2018-04-25 20:50:53</blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>66</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite>12</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>回复数</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div id="columns">
        
        <ul id="column1" class="column">
            <li class="widget color-1">
                <div class="widget-head">
                    <h3><a href="../OA/Notice.asp">内部公文</a></h3>
                </div>
                <div class="widget-content">
					<ul>
						
						<li ><span class="r">08/18</span>[公告] <a onclick='Notice_InfoView5()' style="cursor:pointer" >明天放假</a></li>
						<script>function Notice_InfoView5() {$.dialog.open('../OA/GetUpdate.asp?action=Notice&sType=View&Id=5', {title: '查看', width: 800,height: 480, fixed: true}); };</script>
						
						<li ><span class="r">08/11</span>[公告] <a onclick='Notice_InfoView4()' style="cursor:pointer" >踩踩踩从</a></li>
						<script>function Notice_InfoView4() {$.dialog.open('../OA/GetUpdate.asp?action=Notice&sType=View&Id=4', {title: '查看', width: 800,height: 480, fixed: true}); };</script>
						
						<li class='none'><span class="r">06/26</span>[公告] <a onclick='Notice_InfoView3()' style="cursor:pointer" >通知：下午四点全体业务员会议室开会！！</a></li>
						<script>function Notice_InfoView3() {$.dialog.open('../OA/GetUpdate.asp?action=Notice&sType=View&Id=3', {title: '查看', width: 800,height: 480, fixed: true}); };</script>
						
					</ul> 
                </div>
            </li>
            <li class="widget color-2">  
                <div class="widget-head">
                    <h3>站内信通知</h3>
                </div>
                <div class="widget-content">
					<ul>
						
						<li class='none'>Sorry，没有找到符合条件的信息！</li>
						
					</ul>
                </div>
            </li>
            <li class="widget color-3">  
                <div class="widget-head">
                    <h3><a href="../OA/Calendar.asp">个人日历</a></h3>
                </div>
                <div class="widget-content">
					<ul>
					
						<li class='none'>Sorry，没有找到符合条件的信息！</li>
					
					</ul>
                </div>
            </li>
        </ul>

        <ul id="column2" class="column">
            <li class="widget color-4">  
                <div class="widget-head">
                    <span style="float:right;padding-right:10px;padding-top:5px;"><span class="info_help help01" onmouseover="tip.start(this)" tips="三天内需跟单的记录">&nbsp;</span></span><h3><a href="Records.asp">跟单提醒</a></h3>
                </div>
                <div class="widget-content">
					<ul>
						
						<li ><span class="r" style="">08/26</span>[维护] <a onclick='Records_InfoView39()' style="cursor:pointer" > 南通敦宏实验有限公司</a></li>
						<script>function Records_InfoView39() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Records&cId=242', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
						
						<li class='none'><span class="r" style="">08/25</span>[跟单] <a onclick='Records_InfoView27()' style="cursor:pointer" > 思楼传媒</a></li>
						<script>function Records_InfoView27() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Records&cId=219', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
						
					</ul>
                </div>
            </li>
            <li class="widget color-5">  
                <div class="widget-head">
                    <span style="float:right;padding-right:10px;padding-top:5px;"><span class="info_help help01" onmouseover="tip.start(this)" tips="未处理和处理中的订单">&nbsp;</span></span><h3><a href="Order.asp">未完成订单</a></h3>
                </div>
                <div class="widget-content">
					<ul>
						
						<li ><span class="r" style="">08/19</span>[未处理] <a onclick='Order_InfoView10()' style="cursor:pointer" > 盛大发售的方式多少</a></li>
						<script>function Order_InfoView10() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Order&cId=223', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
						
						<li ><span class="r" style="">06/26</span>[未处理] <a onclick='Order_InfoView3()' style="cursor:pointer" > 深圳慧昌机电公司</a></li>
						<script>function Order_InfoView3() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Order&cId=226', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
						
						<li ><span class="r" style="">06/23</span>[处理中] <a onclick='Order_InfoView2()' style="cursor:pointer" > 15515800899</a></li>
						<script>function Order_InfoView2() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Order&cId=225', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
						
						<li class='none'><span class="r" style="">06/12</span>[处理中] <a onclick='Order_InfoView1()' style="cursor:pointer" > A王先生</a></li>
						<script>function Order_InfoView1() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Order&cId=213', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
						
					</ul>
                </div>
            </li>
            <li class="widget color-6">  
                <div class="widget-head">
                    <span style="float:right;padding-right:10px;padding-top:5px;"><span class="info_help help01" onmouseover="tip.start(this)" tips="已过期不显示">&nbsp;</span></span><h3><a href="Hetong.asp">合同提醒</a></h3>
                </div>
                <div class="widget-content">
					<ul>
						
						<li class='none'>Sorry，没有找到符合条件的信息！</li>
						
					</ul>
                </div>
            </li>
        </ul>
        <ul id="column3" class="column">
            <li class="widget color-7" id="intro">  
                <div class="widget-head">
                    <h3>概要统计</h3>
                </div>
                <div class="widget-content">
					<ul style="padding-top:10px;">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_1" style="border:0;margin:5px 0;">
						<col width="20%"><col width="20%"><col width="20%"><col width="20%">
						<style>.td_l_c {border:0;border-bottom:1px solid #ddd;}
						</style>
							<tr>
								<td class="td_l_c"></td>
								<td class="td_l_c">7天内</td>
								<td class="td_l_c">7-30</td>
								<td class="td_l_c">>30</td>
								<td class="td_l_c">总量</td>
							</tr>
							
							<tr>
								<td class="td_l_c">客户</td>
								<td class="td_l_c">0</td>
								<td class="td_l_c">4</td>
								<td class="td_l_c">10</td>
								<td class="td_l_c">14</td>
							</tr>
							<tr>
								<td class="td_l_c">跟单</td>
								<td class="td_l_c">1</td>
								<td class="td_l_c">5</td>
								<td class="td_l_c">26</td>
								<td class="td_l_c">32</td>
							</tr>
							<tr>
								<td class="td_l_c">订单</td>
								<td class="td_l_c">0</td>
								<td class="td_l_c">1</td>
								<td class="td_l_c">4</td>
								<td class="td_l_c">5</td>
							</tr>
							<tr>
								<td class="td_l_c">合同</td>
								<td class="td_l_c">0</td>
								<td class="td_l_c">0</td>
								<td class="td_l_c">0</td>
								<td class="td_l_c">0</td>
							</tr>
							<tr>
								<td class="td_l_c" style="border:0;" >售后</td>
								<td class="td_l_c" style="border:0;">0</td>
								<td class="td_l_c" style="border:0;">0</td>
								<td class="td_l_c" style="border:0;">0</td>
								<td class="td_l_c" style="border:0;">0</td>
							</tr>
							
						</table> 
					</ul>
                </div>
            </li>
        </ul>
        
    </div>

        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>xxxxx(xxxx)
                                <a href="http://www.xxx.com/" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>测试人员</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery</blockquote>
    </div>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>
