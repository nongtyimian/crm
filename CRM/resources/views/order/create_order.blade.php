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
		@csrf
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>客户
              </label>
              <div class="layui-input-inline">
                  <select id="pgs" name="user" class="valid"  lay-filter="business" >
					  <option>请选择</option>	
                      @foreach($user as $k=>$v)
                      <option value="{{$v['user_id']}}">{{$v['user_name']}}</option>
                      @endforeach
                  </select>
              </div>
          
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>联系电话
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="tel" name="tel" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>备用电话
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="b_tel" name="b_tel" required="" lay-verify="required"
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
                <select name="shi" id="city2" class="diss" lay-filter="test2">
                    <option value=""></option>
                </select>
            </div>
            <label for="L_email" style="float: left;margin-top: 10px;" >
                <span>县</span>
            </label>
            <div class="layui-input-inline" style="margin-left: 5px;">
                <select name="xian" id="city3">
                    <option value=""></option>
                </select>
            </div>
            <div class="layui-input-inline">
                <input type="text" id="area" name="addr" required="" lay-verify="required"
                       autocomplete="off" class="layui-input" placeholder="详细地址">
            </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>业务
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="project" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>代收
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="furl_money" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>运费
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="tran_money" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		   <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>优惠金额
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="d_money" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>优惠方式
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="d_meth" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>实收金额
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="t_money" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		   <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>打款金额
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="p_money" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>打款方式
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="p_meth" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			   <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>交货方式
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="o_meth" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
		   <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>订单金额
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="project" name="o_money" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
			
          </div>
          
          <div class="layui-form-item layui-form-text">
              <label for="desc" class="layui-form-label">
                  商品增加
              </label>
              <div class="layui-input-block">
			  
                  <table class="layui-table">
				  <tr>
					<td>商品名</td>
					<td>数量</td>
					<td>单价</td>
					<td>折扣</td>
					<td>金额</td>
				  </tr>
                    <tbody>
                      <tr>
                        <td><select name="c_name[]" id="">
							@foreach($goods as $v)
								<option value="{{$v['p_name']}}">{{$v['p_name']}}</option>
							@endforeach
						</select></div></td>
                        <td>
							<!-- <input type="button" value="-" class="jian" style="backgrount-color:green;width:20px;height:20px;">
							<em >0</em>
							
							<input type="button" value="+" class="jia" style="backgrount-color:green;width:20px;height:20px;"> -->
							<input type="text" style="width:60px;height:20px;" name="num[]"/>
							<input type="text" style="width:30px;height:20px;" name="unit[]" placeholder="单位"/>
						</td>
						<td><input type="text" style="width:60px;height:20px;" name="price[]" /></td>
						<td><input type="text" style="width:60px;height:20px;" name="discount[]"/></td>
                        <td><input type="text" style="width:60px;height:20px;" name="money[]" /></td>
                      </tr>
                     
                    </tbody>
                  </table>
				
				<div class="layui-btn layui-btn-radius layui-btn-warm" id="addgoods"><i class="layui-icon"></i>添加商品</div>
				
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            var $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
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
          form.on('submit(add)', function(data){
            console.log(data);
            //发异步，把数据提交给php
			 $.ajax({
                      type: 'get',
                      dataType: "json",
                      data: data.field,
                      url: "/order_modify",
                      success: function (datas) {
                          
             
                      }

                  })
				  layer.alert("增加成功", {icon: 6},function () {
				window.parent.location.reload();
				var index = parent.layer.getFrameIndex(window.name);
					
					parent.layer.close(index);
            });



           
            return false;
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
                            var ac = "<option>请选择</option>";
                            for( i in asss){
                                ac +="<option value='"+asss[i].area_id+"'>"+asss[i].area_name+"</option>";
                            }
                            $('#city2').html(ac);
							$('#city3').html("");
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

		$("#addgoods").on("click",function(){
			$.get("/sele_goods",{},function(data){
				
			

				$(".layui-table").append(data);
				form.render();
			})
			
			
		})

		  form.on('select(business)', function(data){
			var id=$("#pgs").val();
			$.ajax({
                      type: 'get',
                      dataType: "json",
                      data:{user_id:id},
                      url: "/sele_user",
                      success: function (datas) {

					
//                          console.log(data);
							$("#tel").val(datas.tel);
							$("#b_tel").val(datas.back_tel);
							$("#area").val(datas.addr);
							$("#project").val(datas.project);
							

                         
                      }

                  })

})
          
          
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
	$(".jian").on("click",function(){
		var jian=parseInt($(this).next().html())-1;

		if(jian-1<0){
			jian=0;
		}
		$(this).next().html(jian);
	})

	$(".jia").on("click",function(){
		var jia=parseInt($(this).prev().html())+1;
		
		$(this).prev().html(jia);
	})
</script>