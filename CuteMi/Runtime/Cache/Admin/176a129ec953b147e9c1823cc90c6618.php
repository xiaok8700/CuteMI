<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品管理</title>
<link href="../css/css.css" type="text/css" rel="stylesheet" />
<link href="../css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
<!----------------------------百度编译器头部导入文件-------------------------------------------------->
<script type="text/javascript" charset="utf-8" src="/CuteMi/Public/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/CuteMi/Public/utf8-php/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="utf8-php/lang/zh-cn/zh-cn.js"></script>
<!----------------------------百度编译器头部导入文件结束------------------------------------------------>


<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：商品详情修改</td>
  </tr>
  <tr>
</table>
    <!-- <td align="left" valign="top"> -->
    <form action='/CuteMi/index.php/Admin/Goods/changedetail' method='post'>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      

    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	      <th align="center" valign="middle" class="borderright">商品id</th>
		  <!-- <th align="center" valign="middle" class="borderright">内存</th> -->
		  <th align="center" valign="middle" class="borderright">屏幕</th>
		  <th align="center" valign="middle" class="borderright">电池</th>
		  <th align="center" valign="middle" class="borderright">系统</th>
		  
		  <!-- <th align="center" valign="middle" class="borderright">外观</th> -->
		  <th align="center" valign="middle" class="borderright">剩余数量</th>
	</tr>
		
	<tr align='right'onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td align="center" valign="middle" class="borderright borderbottom">
			<input type='text' name='gid' value=<?php echo ($mod["gid"]); ?>>
		</td>
		<!-- <td align="center" valign="middle" class="borderright borderbottom">
			<input type='text' name='storage' value=<?php echo ($mod["storage"]); ?>>
		</td> -->
		<td align="center" valign="middle" class="borderright borderbottom">
			<input type='text' name='screen' value=<?php echo ($mod["screen"]); ?>>
		</td>
		
		<td align="center" valign="middle" class="borderright borderbottom">
			<input type='text' name='battery' value=<?php echo ($mod["battery"]); ?>>
		</td>
		
		<td align="center" valign="middle" class="borderright borderbottom">
			<input type='text' name='system' value=<?php echo ($mod["system"]); ?>>
		</td>
		<!-- <td align="center" valign="middle" class="borderright borderbottom">
			<!-- <input type='text' name='shell' value=<?php echo ($mod["shell"]); ?>> -->
		</td>
		<td align="center" valign="middle" class="borderright borderbottom">
			<input type='text' name='buynum' value=<?php echo ($mod["buynum"]); ?>>
		</td>

	</tr>
	<tr align='right'onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td align="center" valign="middle" class="borderright borderbottom">
			默认
		</td>
		<!-- <td align="center" valign="middle" class="borderright borderbottom">
			默认
		</td> -->
		<td align="center" valign="middle" class="borderright borderbottom">
			可以修改
		</td>
		
		<td align="center" valign="middle" class="borderright borderbottom">
			可以修改
		</td>
		
		<td align="center" valign="middle" class="borderright borderbottom">
			可以修改
		</td>
		<!-- <td align="center" valign="middle" class="borderright borderbottom">
			可以修改
		</td> -->
		<td align="center" valign="middle" class="borderright borderbottom">
			客户提供
		</td>
	</tr>
	<tr align='right'onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td colspan='6' align="center" valign="middle" class="borderright borderbottom">
		<!----------------------------百度编译器要编辑的内容------------------------------------------------>
     
	 <script id="editor" type="text/plain" name="shell" style="width:1000px;height:350px;"></script>
<!----------------------------百度编译器要编辑的内容------------------------------------------------>	


		</td>
		
	</tr>
	<tr align='right'onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td colspan='6' align="center" valign="middle" class="borderright borderbottom">
			<input type='submit' name='' value='提交修改'>
		</td>
		
	</tr>
</table>
</form>
		
	


	<!-- <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'"><td colspan=8 align="center" valign="middle" class="borderright borderbottom">无数据</td></tr>
	 -->
<!----------------------------百度编译器头部导入文件结束------------------------------------------------>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


</script>
<!----------------------------百度编译器头部导入文件结束------------------------------------------------>





 
  
</body>
</html>