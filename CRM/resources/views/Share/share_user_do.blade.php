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
</head>

<body>
<div class="x-body">
    <form class="layui-form">
        @csrf
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>共享
            </label>
            <label for="L_email" style="float: left;margin-top: 10px;">
                <span>管理员</span>
            </label>
            <div class="layui-input-inline" id="citys" style="margin-left: 5px;">
                <select name="di" id="city2" class="diss" lay-filter="test2">
                    <?php foreach($data as $k=>$v){?>
                    <option value="<?php echo $v['admin_id']?>"><?php echo $v['admin_name']?></option>
                        <?php }?>
                </select>
            </div>
            <label for="L_email" style="float: left;margin-top: 10px;">
                <span>我的客户</span>
            </label>
            <div class="layui-input-inline" style="margin-left: 5px;">
                <select name="xian" id="city3">
                    <?php foreach($arr as $k=>$v){?>
                    <option value="<?php echo $v['user_id']?>"><?php echo $v['user_name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit="">
                确认共享
            </button>
        </div>
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
            var username = $('[name=di]').val();
            var phone = $('[name=xian]').val();
            $.ajax({
                method:"post",
                url:"/share_add_doadd",
                data:data.field,
                success:function(result){
                    if(result.code == 1){
                        layer.msg(result.font,{icon:result.code});
                        parent.location="/share_user";
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
