<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>carousel模块快速使用</title>
  <link rel="stylesheet" href="/layui/css/layui.css" media="all">
</head>
<body>
 
<div class="layui-carousel" id="test1">
  <div carousel-item>
    <div><img src="/img/201815_300.jpg"></div>
    <div><img src="/img/201815_300.jpg"></div>
    <div><img src="/img/201815_300.jpg"></div>
    <div><img src="/img/201815_300.jpg"></div>
    <div><img src="/img/201815_300.jpg"></div>
  </div>
</div>
<!-- 条目中可以是任意内容，如：<img src=""> -->
 
<script src="/layui/layui.js"></script>
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  //建造实例
  carousel.render({
    elem: '#test1'
    ,width: '300px' //设置容器宽度
    ,arrow: '•hover' //始终显示箭头
    //,anim: 'updown' //切换动画方式
	,height: '198px'
	,autoplay:true
  });
});
</script>
</body>
</html>