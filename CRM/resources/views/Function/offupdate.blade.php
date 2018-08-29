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
            <th>用户名称</th>
            <th>电话号码</th>
            <th>省</th>
            <th>市</th>
			<th>县</th>
			<th>地址</th>
			<th>备用电话</th>
			<th>网络</th>
			<th>客户类型</th>
			<th>客户等级</th>
			<th>客户来源</th>
			<th>其他联系</th>
			<th>主营项目</th>
			<th>备注</th>
			<th>状态</th>
        </thead>
        <tbody> 
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
			<td><input type="text" value="{{$res['user_id']}}" name="user_id" readonly></td>
            <td><input type="text" value="{{$res['user_name']}}" name="user_name"></td>
            <td><input type="text" value="{{$res['tel']}}" name="tel" readonly></td>
            <td><input type="text" value="{{$res['area']}}" name="area"></td>
            <td><input type="text" value="{{$res['part']}}" name="part"></td>
			 <td><input type="text" value="{{$res['xian']}}" name="xian"></td>
			 <td><input type="text" value="{{$res['addr']}}" name="addr"></td>
			<td><input type="text" value="{{$res['back_tel']}}" name="back_tel"></td>
			<td><input type="text" value="{{$res['ip']}}" name="ip"></td>
			<td><input type="text" value="{{$res['type']}}" name="type"></td>
			<td><input type="text" value="{{$res['lv']}}" name="lv"></td>
			<td><input type="text" value="{{$res['source']}}" name="source"></td>
			<td><input type="text" value="{{$res['o_tel']}}" name="o_tel"></td>
			<td><input type="text" value="{{$res['project']}}" name="project"></td>
			<td><input type="text" value="{{$res['remark']}}" name="remark"></td>
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
                url:"/offupdo",
                data:data.field,
                success:function(result){
					alert(result);
                    if(result.code == 1){
                        layer.msg(result.font,{icon:result.code});
                        parent.location="/offic";
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
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>客户姓名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="username" required="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>联系电话
            </label>
            <div class="layui-input-inline">
                <input type="text" id="phone" name="phone" required="" lay-verify="phone"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>地址
            </label>
            <label for="L_email" style="float: left;margin-top: 10px;">
                <span>省</span>
            </label>
            <div class="layui-input-inline" style="margin-left: 5px;">
                <select name="sheng" id="1" lay-filter="test">
                    <option value="">请选择</option>
                    <?php foreach($data as $k=>$v){?>
                    <option value="<?php echo $v['area_id']?>"><?php echo $v['area_name']?></option>
                    <?php }?>
                </select>
            </div>
            <label for="L_email" style="float: left;margin-top: 10px;">
                <span>市</span>
            </label>
            <div class="layui-input-inline" id="citys" style="margin-left: 5px;">
                <select name="di" id="city2" class="diss" lay-filter="test2">
                    <option value=""></option>
                </select>
            </div>
            <label for="L_email" style="float: left;margin-top: 10px;">
                <span>县</span>
            </label>
            <div class="layui-input-inline" style="margin-left: 5px;">
                <select name="xian" id="city3">
                    <option value=""></option>
                </select>
            </div>
            <div class="layui-input-inline">
                <input type="text" id="area" name="area" required="" lay-verify="required"
                       autocomplete="off" class="layui-input" placeholder="详细地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>备用电话
            </label>
            <div class="layui-input-inline">
                <input type="test" id="L_pass" name="lass_phone" required="" lay-verify="pass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>网络
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_repass" name="inter" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>客户类型
            </label>
            <div class="layui-input-inline">
                <select name="type" id="">
                    @foreach($array as $v)
                        <option value="{{$v['t_id']}}">{{$v['t_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>客户等级
            </label>
            <div class="layui-input-inline">
                <select name="dengji" id="">
                    <?php foreach($arr as $k=>$v){?>
                    <option value="<?php echo $v['l_id']?>"><?php echo $v['l_name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>客户来源
            </label>
            <div class="layui-input-inline">
                <select name="laiyuan" id="">
                    <?php foreach($date as $k=>$v){?>
                    <option value="<?php echo $v['s_id']?>"><?php echo $v['s_name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>其他联系
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_repass" name="out_phone" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>主营项目
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_repass" name="xaingmu" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>备注
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
        //自定义验证规则
        form.verify({
            nikename: function(value){
                if(value.length < 2){
                    return '昵称至少得2个字符啊';
                }
            }
        });
        //监听提交
        form.on('submit(add)', function(data){
            var username = $('[name=username]').val();
            var phone = $('[name=phone]').val();
            var sheng = $('[name=sheng]').val();
            var di = $('[name=di]').val();
            var area = $('[name=area]').val();
            var lass_phone = $('[name=lass_phone]').val();
            var inter = $('[name=inter]').val();
            var type = $('[name=type]').val();
            var dengji = $('[name=dengji]').val();
            var laiyuan = $('[name=laiyuan]').val();
            var out_phone = $('[name=out_phone]').val();
            var xaingmu = $('[name=xaingmu]').val();
            var remarks = $('[name=remarks]').val();
            $.ajax({
                method:"post",
                url:"/user_add_doadd",
                data:data.field,
                success:function(result){
                    if(result.code == 1){
                        layer.msg(result.font,{icon:result.code});
                        top.location="/user_add";
                    }
                }
            });
        });
        form.on('select(test)', function(data){
            var id=$('#1').attr('id');
            var parent_id=$('#1').val();
            var o=$('#1');
            var _token = $('input[type=hidden]').val();
            if(id!=3){
                if(id==1){
                    $('#1').next().next().html("<option>请选择</option>");
                }
                $.post("/user_add_sel",
                        {
                            _token:_token,
                            parent_id:parent_id
                        },
                        function(arr){
                            var asss = eval( '('+arr+')' );
                            var ac = '';
                            for( i in asss){
                                ac +="<option value='"+asss[i].area_id+"'>"+asss[i].area_name+"</option>";
                            }
                            $('#city2').html(ac);
                            form.render();
                        });
            }
        });
        form.on('select(test2)', function(data){
            var id = 2;
            var parent_id=$('#city2').val();
            var o=$('#city2');
            var _token = $('input[type=hidden]').val();
            if(id!=3){
                if(id==1){
                    $('#1').next().next().html("<option>请选择</option>");
                }
                $.post("/user_add_sel",
                        {
                            _token:_token,
                            parent_id:parent_id
                        },
                        function(arr){

                            var asss = eval( '('+arr+')' );
                            var ac = '';
                            for( i in asss){
                                ac +="<option value='"+asss[i].area_id+"'>"+asss[i].area_name+"</option>";
                            }
                            $('#city3').html(ac);
                            form.render();
                        });
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

