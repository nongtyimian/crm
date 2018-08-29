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
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>客户
            </label>
            <div class="layui-input-inline">
                <select name="type1" id="">
                    @foreach($array as $v)
                        <option value="{{$v->user_id}}">{{$v->user_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>定金
            </label>
            <div class="layui-input-inline">
                <input type="text" id="name" name="name" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>返利
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="money" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>合作项目
            </label>
            <div class="layui-input-inline">
                <input type="test" id="L_pass" name="lass_phone" required="" lay-verify="pass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>代理区域
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_repass" name="inter" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>合同类型
            </label>
            <div class="layui-input-inline">
                <select name="type" id="">
                    @foreach($arr as $v)
                    <option value="{{$v->he_id}}">{{$v->he_name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>起始时间
            </label>
            <div class="layui-input-inline">
                <input type="text" id="user" name="time" required="" lay-verify="required"
                       autocomplete="off" class="layui-input" placeholder="/年/月/日">
            </div>
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>到期时间
            </label>
            <div class="layui-input-inline">
                <input type="text" id="text" name="times" required="" lay-verify="required"
                       autocomplete="off" class="layui-input" placeholder="/年/月/日">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>详情备注
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_repass" name="remarks" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="add" lay-submit="">
                保存
            </button>
        </div>
    </form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
                ,layer = layui.layer;
        //监听提交
        form.on('submit(add)', function(data){
            var type = $('[name=type]').val();
            var type1 = $('[name=type1]').val();
            $.ajax({
                type:"post",
                url:"/contract_add_do",
                data:data.field,
                success:function(result){
//                    alert(result);
                    if(result.code == 1){
                        layer.msg(result.font,{icon:result.code});
                        parent.location="/contract_list";
                    }
                }
            });
            return false;
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
