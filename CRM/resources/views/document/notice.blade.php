<ul>
						
						 <xblock>
        
       
			@foreach($res as $k=>$v)
						 <a  onclick="x_admin_show('详情','/info?id={{$v['off_id']}}')" style="cursor:pointer;">
						<li ><span class="r">{{date("Y-m-d", + "$v[off_ctime]")}}</span>[公告]{{$v['off_tittle']}}
						<span class="r">发布人：{{$new["$v[admin_id]"]}}</span>
						</li>

						<script>function Notice_InfoView5() {$.dialog.open('../OA/GetUpdate.asp?action=Notice&sType=View&Id=5', {title: '查看', width: 800,height: 480, fixed: true}); };</script>
						</a>
						@endforeach
		
       
      </xblock>
						
						
</ul> 