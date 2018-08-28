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
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
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
		<input type="hidden" id="hid" value="{{$dym['dym_id']}}"/>
           <div class="layui-form-item">
			  <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>客户
              </label>
              <div class="layui-input-inline">
                  <select id="user" name="user" class="valid">
				  @foreach($user as $k=>$v)
                    <option value="{{$v['user_id']}}" {{$v['cs']}}>{{$v['user_name']}}</option>
                  @endforeach  
                  </select>
              </div>
			  <div class="layui-btn layui-btn-radius layui-btn-normal" onclick="x_admin_show('添加跟单类型','/dtype_add')"><i class="layui-icon"></i>添加类型</div>
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>跟单类型
              </label>
              <div class="layui-input-inline">
                  <select id="type" name="type" class="valid">
				  @foreach($type as $k=>$v)
                    <option value="{{$v['t_name']}}" {{$v['cs']}}>{{$v['t_name']}}</option>
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
                      <option value="{{$v['p_name']}}" {{$v['cs']}}>{{$v['p_name']}}</option>
                      @endforeach
                  </select>
              </div>
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>提前时间
              </label>
              <div class="layui-input-inline">
                  <select id="time" name="time" class="valid">
                      @foreach($time as $k=>$v)
                      <option value="{{$v['r_name']}}" {{$v['cs']}}>{{$v['r_name']}}</option>
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
                  <textarea placeholder="请输入内容" id="desc" name="desc" class="layui-textarea">{{$dym['content']}}</textarea>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button type="button"  class="layui-btn" lay-filter="add" lay-submit="" id="add" >修改
             </button>     
             
          </div>
      </form>
    </div>
    <script>
        layui.use(['form','layer', 'laydate'], function(){
            var $ = layui.js;
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

		var dym_id=$("#hid").val()
		var u_id=$("#user").val();
		var type=$("#type").val();
		var pgs=$("#pgs").val();
		var time=$("#time").val();
		var ntime=$("#date1").val();
		var content=$("#desc").val();
		$.get("/documentary_update_do",{u_id:u_id,type:type,pgs:pgs,rtime:time,ntime:ntime,content:content,dym_id:dym_id},function(data){
			layui.use(['layer'], function(){
				if(data==1){
					layer.msg("修改成功",{icon:1});
					window.parent.location.reload();
					var index = parent.layer.getFrameIndex(window.name);
					parent.layer.close(index);
					
				}	
			});
		});
	})
</script>
