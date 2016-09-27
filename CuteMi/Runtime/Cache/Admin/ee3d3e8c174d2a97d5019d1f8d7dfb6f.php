<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品管理</title>
<link href="../css/css.css" type="text/css" rel="stylesheet" />
<link href="../css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
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
    <td width="99%" align="left" valign="top">您的位置：商品管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      

     <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
	      <th align="center" valign="middle" class="borderright">商品名称</th>
		  <th align="center" valign="middle" class="borderright">剩余库存</th>
		  <th align="center" valign="middle" class="borderright">颜色</th>
		  <th align="center" valign="middle" class="borderright">价格</th>
		  <th align="center" valign="middle" class="borderright">版本</th>
		  <th align="center" valign="middle" class="borderright">图片</th>
		  <th align="center" valign="middle" class="borderright">图片1</th>
		  <th align="center" valign="middle" class="borderright">图片2</th>
		  <th align="center" valign="middle" class="borderright">图片3</th>

		  <th align="center" valign="middle" class="borderright">添加时间</th>
		  <th align="center" valign="middle" class="borderright">操作</th>
	</tr>
		<?php if(is_array($good)): foreach($good as $key=>$goods): ?><tr align='right'onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
		<td align="center" valign="middle" class="borderright borderbottom"><?php echo ($goods["gname"]); ?></td>
		<td align="center" valign="middle" class="borderright borderbottom"><?php echo ($goods["store"]); ?></td>
		<td align="center" valign="middle" class="borderright borderbottom"><?php echo ($goods["color"]); ?></td>
		
		<td align="center" valign="middle" class="borderright borderbottom"><?php echo ($goods["price"]); ?></td>
		
		<td align="center" valign="middle" class="borderright borderbottom"><?php echo ($goods["verson"]); ?></td>
		<td align="center" valign="middle" class="borderright borderbottom" ><img width='50px' height='50px' src="/CuteMi/Public/uploads/<?php echo ($goods["pic"]); ?>"></td>
		<td align="center" valign="middle" class="borderright borderbottom" ><img width='50px' height='50px' src="/CuteMi/Public/uploads/<?php echo ($goods["pic1"]); ?>"></td>
		<td align="center" valign="middle" class="borderright borderbottom" ><img width='50px' height='50px' src="/CuteMi/Public/uploads/<?php echo ($goods["pic2"]); ?>"></td>
		<td align="center" valign="middle" class="borderright borderbottom" ><img width='50px' height='50px' src="/CuteMi/Public/uploads/<?php echo ($goods["pic3"]); ?>"></td>
		


		<td align="center" valign="middle" class="borderright borderbottom"><?php echo ($goods["addtime"]); ?></td>
		

	
		<td align="center" valign="middle" class="borderright borderbottom">
			<a href='/CuteMi/index.php/Admin/Goods/moddetail/gid/<?php echo ($goods["gid"]); ?>'>修改商品详情</a>|
			<a href='/CuteMi/index.php/Admin/Goods/mod/gid/<?php echo ($goods["gid"]); ?>'>修改</a>|
			<a href='/CuteMi/index.php/Admin/Goods/delete/gid/<?php echo ($goods["gid"]); ?>'>删除</a>
		</td>

		</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="11">
			共有 : <?php echo ($total); ?>条数据&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($no); ?>/<?php echo ($maxpage); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/CuteMi/index.php/Admin/Goods/index/no/1">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/CuteMi/index.php/Admin/Goods/index/no/<?php echo ($no-1); ?>">上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/CuteMi/index.php/Admin/Goods/index/no/<?php echo ($no+1); ?>">下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/CuteMi/index.php/Admin/Goods/index/no/<?php echo ($maxpage); ?>">尾页</a>
		</td>					
	</tr>

	


	<!-- <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'"><td colspan=8 align="center" valign="middle" class="borderright borderbottom">无数据</td></tr>
	 -->






 
  
</body>
</html>