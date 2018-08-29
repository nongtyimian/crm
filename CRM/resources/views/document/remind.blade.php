@foreach($ar as $v)
<li >
	<span class="r" style="">联系时间：{{date("Y-m-d", + "$v[ntime]")}}</span> 
	<a onclick='Records_InfoView39()' style="cursor:pointer" title="详情">客户：{{$v['user_name']}}&nbsp;&nbsp;内容：{{$v['content']}}</a>
	 
</li>
	<script>function Records_InfoView39() {$.dialog.open('GetUpdate.asp?action=Client&sType=InfoView&oType=Records&cId=242', {title: '查看', width: 900,height: 480, fixed: true}); };</script>
@endforeach
						
						