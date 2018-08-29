<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎使用crm后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
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

    <form class="layui-form"  enctype="multipart/form-data">
        @csrf
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>公文标题
            </label>

            <div class="layui-input-inline">
                <input type="text" id="username" name="title" required="" lay-verify="required" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>添加人
            </label>

            <div class="layui-input-inline">
                <input type="text" value="{{$admin_session}}" disabled="disabled" autocomplete="off" class="layui-input">
            </div>
        </div>




        {{--文章内容--}}


        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
                公文内容
            </label>
        </div>


        <div class="layui-form-item layui-form-text">
            <div class="layui-input-block" style="width: 70%;margin-left: 100px;">

                <textarea  id="demo"  name='product_desc' ></textarea>

            </div>
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button class="layui-btn" lay-filter="add" lay-submit="">
                增加
            </button>
        </div>
    </form>
</div>
<script>

    var edit_id='';
    layui.use(['form', 'layer','layedit','upload'], function () {
        $ = layui.jquery;
        var form = layui.form
            , layer = layui.layer
            ,upload = layui.upload
            ,layedit = layui.layedit;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //富文本编辑器
        //创建编辑器
        var introduce = layedit.build('demo',{height: 180});

        //配置图片接口
        layedit.set({
            uploadImage: {
                url:"/off_url"//接口url
                ,type: 'post' //默认post
            }
        });

        edit_id = layedit.build('demo'); //建立编辑器

        //自定义验证规则
//        form.verify({
//            required: function(value){
//                if(value.length <1){
//                    return '部门名称至少得1个字符啊';
//                }
//            }
//
//        });

        //监听提交
        form.on('submit(add)', function (data) {


            //富文本编辑器
            data.field.product_desc = layedit.getContent(edit_id);
//            console.log(data);
            //发异步，把数据提交给php
            // alert(888)
            $.ajax({
                type: 'post',
                dataType: "json",
                data: data.field,
                url: "/off_add_do",
                success: function (datas) {
                    console.log(data);
//                        if (datas.code == 1) {
//                            layer.msg(datas.msg, {icon: datas.code, time: 1500}, function () {
//
//                                location.href = "/";
//                            });
//                        } else {
//                            layer.msg(datas.msg, {icon: datas.code});
//                        }


                    if (datas.code == 1) {
                        layer.alert(datas.msg, {icon: datas.code}, function () {
//                                // 获得frame索引
//                                var index = parent.layer.getFrameIndex(window.name);
//                                //关闭当前frame
//                                parent.layer.close(index);

                            window.parent.location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });
                    } else {
                        layer.msg(datas.msg, {icon: datas.code});
                    }


                }

            })
            return false;


        });


    });
</script>
<script>var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();</script>
</body>

</html>