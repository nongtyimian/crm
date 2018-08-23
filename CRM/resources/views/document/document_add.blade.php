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
    <script type="text/javascript" src="/index/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/index/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/index/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form">
           <div class="layui-form-item">
			  <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>客户
              </label>
              <div class="layui-input-inline">
                  <select id="user" name="user" class="valid">
				  @foreach($user as $k=>$v)
                    <option value="{{$v['user_id']}}">{{$v['user_name']}}</option>
                  @endforeach  
                  </select>
              </div>
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>跟单类型
              </label>
              <div class="layui-input-inline">
                  <select id="type" name="type" class="valid">
				  @foreach($type as $k=>$v)
                    <option value="{{$v['t_name']}}">{{$v['t_name']}}</option>
                  @endforeach  
                  </select>
              </div>

          </div>
		 
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>联系进度
              </label>
              <div class="layui-input-inline">
                  <select id="pgs" name="pgs" class="valid">
                      @foreach($pgs as $k=>$v)
                      <option value="{{$v['p_name']}}">{{$v['p_name']}}</option>
                      @endforeach
                  </select>
              </div>
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>提前时间
              </label>
              <div class="layui-input-inline">
                  <select id="time" name="time" class="valid">
                      @foreach($time as $k=>$v)
                      <option value="{{$v['r_name']}}">{{$v['r_name']}}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="layui-form-item">
              <div class="layui-inline">
                  <label class="layui-form-label">下次联系</label>
                  <div class="layui-input-inline">
                      <input type="text" name="date" id="date1" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                  </div>
              </div>
          </div>
          
          <div class="layui-form-item layui-form-text">
              <label for="desc" class="layui-form-label">
                  描述
              </label>
              <div class="layui-input-block">
                  <textarea placeholder="请输入内容" id="desc" name="desc" class="layui-textarea"></textarea>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="" id="add">
                  增加
              </button>
          </div>
      </form>
    </div>
    <script>
        layui.use(['form','layer', 'laydate'], function(){
            $ = layui.js;
          var form = layui.form
          ,layer = layui.layer
          ,laydate = layui.laydate;
          

           laydate.render({
                elem: '#date'
            });
            laydate.render({
                elem: '#date1'
				});
            	 
			
          //自定义验证规则
          form.verify({
            nikename: function(value){
              if(value.length < 5){
                return '昵称至少得5个字符啊';
              }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
          });



          //监听提交
         
          
          
        });
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>
<script>
	$("#add").on("click",function(){
		var user=$("#user").val();
		var type=$("#type").val();
		var pgs=$("#pgs").val();
		var time=$("#time").val();
		var date1=$("#date1").val();
		var desc=$("#desc").val();
		$.get("/documentary_add_do",{user:user,type:type,pgs:pgs,time:time,date1:date1,desc,desc},function(data){
			alert(data);
		});
	})
</script>
