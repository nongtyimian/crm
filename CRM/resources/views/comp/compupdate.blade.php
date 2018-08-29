<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="index/css/font.css">
    <link rel="stylesheet" href="index/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="index/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="index/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>
<div class="x-body">
        <form class="layui-form"  method="post">
		@csrf
		<table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>用户</th>
            <th>主题</th>
            <th>意见</th>
			<th>操作</th>
        </thead>
        <tbody> 
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
			<td><input type="text" value="{{$res['m_id']}}" name="m_id" readonly></td>
            <td><input type="text" value="{{$res['u_id']}}" name="u_id"></td>
            <td><input type="text" value="{{$res['theme']}}" name="theme"></td>
            <td><input type="text" value="{{$res['idea']}}" name="idea"></td>
			<td><div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
             <div  class="layui-btn" lay-filter="add" lay-submit="">
                保存
            </div>
			</td>
          </div>
          </tr>
        </tbody>
      </table>
      </form>
    </div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
                ,layer = layui.layer;
        //自定义验证规则
//        form.verify({
//            nikename: function(value){
//                if(value.length < 2){
//                    return '昵称至少得2个字符啊';
//                }
//            }
//        });
        //监听提交 
       form.on('submit(add)', function(data){
            $.ajax({
                method:"post",
                url:"/compupdo",
                data:data.field,
                success:function(result){
                    if(result.code == 1){
                        layer.msg(result.font,{icon:result.code});
                        parent.location="/comp";
                    }else{
                        layer.msg(result.font,{icon:result.code});
                    }
                }
            });
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
