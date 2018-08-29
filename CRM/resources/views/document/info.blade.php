

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<link href="/index/co.css" rel="stylesheet" type="text/css">
<script language="javascript" src="/Skin/default/Js/Common.js"></script>
<script language="javascript" src="/Skin/default/Js/jquery.min.js"></script>
<script language="javascript" src="/Skin/default/Js/tips.js"></script>
<script src="/Skin/default/aridialog/jquery.artDialog.js?skin=default"></script>
<script src="/Skin/default/aridialog/iframeTools.js"></script>
</head>
<body>

	<style>body{padding:0 0 55px 0;}</style>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" class="td_n pdl10 pdr10 pdt10"> 
				<table width="100%" border="0" cellspacing="0" cellpadding="0" CLASS="table_1">
					<tr class="tr_t"> 
						<td class="td_l_l"><B>公告标题：</B>{{$arr['off_tittle']}}</td>
					</tr>
					<tr>
						<td class="td_r_l" style="padding:10px;line-height:2em;"> <p> <?php echo htmlspecialchars_decode($arr['off_content']); ?></p>
<p><br>
</p>

<p>                             {{date("Y-m-d", + "$arr[off_ctime]")}}</p></td>
					</tr>
				</table>
			</td> 
		</tr>
	</table>
	<div class="fixed_bg_B">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" class="td_n Bottom_pd "> 
					<span class="Bottom_pd r fontnobold"></span>
					<input name="Back" type="button" id="Back" class="button43" value="关闭" onClick="art.dialog.close();">
				</td>
			</tr>
		</table>
	</div>
	</form>
	<script type="text/javascript" defer="true"> 
	 new tqEditor('ONcontent',{toolbar: 'crm',
	imageUploadUrl: '/Skin/default/TQEditor/UpLoad.asp?oUpLoadType=Images',
	imageFileTypes: '*.jpg;*.gif;*.png;*.jpeg',auto_clean:true});
	</script>
	
<div id="mjs:tip" class="tip" style="position:absolute;left:0;top:0;display:none;margin-left:10px;"></div>
<script src="../data/calendar/WdatePicker.js"></script>
</body>