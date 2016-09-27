<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>	
	<head>
		<title>管理员列表</title>
		<meta charset="utf-8">
		<style>
			*{
				list-style-type:none;
			}
			h1{
				text-align:center;
				color:red;
			}
			body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
			#searchmain{ font-size:12px;}
			#search{ font-size:20px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
			#search form span{height:40px; line-height:40px; padding:0 0px 0 10px;}
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
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="searchmain" align="center">
		<tr>
    	<td align="left" valign="top">
   		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
		<td width="90%" align="center" valign="middle">
	    <form>
	    <span>管理员列表</span>
	    </form>
        </td>
  		<td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"></td>
  		</tr>
	</table>
    </td>
  </tr>	
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
			
			<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
				<td align="center" valign="middle" class="borderright borderbottom bggray">ID</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">管理员</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">密码</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">权限</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">用户登陆时间</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">登陆IP</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">操作</td>
			</tr>
			<!--foreach遍历-->
			 <?php if(is_array($admin_user)): foreach($admin_user as $key=>$user): ?><tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
				<td align="center" valign="middle" class="borderright borderbottom bggray"><?php echo ($user["ad_id"]); ?></td>
				<td align="center" valign="middle" class="borderright borderbottom bggray"><?php echo ($user["ad_name"]); ?></td>
				<td align="center" valign="middle" class="borderright borderbottom bggray"><?php echo ($user["ad_pwd"]); ?></td>
				<!-- <td><?php echo ($user["ad_ur"]); ?></td> -->
				<td align="center" valign="middle" class="borderright borderbottom bggray">
					<?php if(($user["ad_ur"]) == "1"): ?>用户管理员<?php endif; ?>
					<?php if(($user["ad_ur"]) == "2"): ?>商品管理员<?php endif; ?>
					<?php if(($user["ad_ur"]) == "3"): ?>订单管理员<?php endif; ?>
					<?php if(($user["ad_ur"]) == "4"): ?>超级管理员<?php endif; ?>
				</td>
				<td align="center" valign="middle" class="borderright borderbottom bggray"><?php echo ($user["ad_logintime"]); ?></td>
				<td align="center" valign="middle" class="borderright borderbottom bggray"><?php echo ($user["ad_loginip"]); ?></td>
				<td align="center" valign="middle" class="borderright borderbottom bggray">
					<a href="/CuteMi/index.php/Admin/Admin/mod/ad_id/<?php echo ($user["ad_id"]); ?>">修改</a>  
					<a href="/CuteMi/index.php/Admin/Admin/delete/ad_id/<?php echo ($user["ad_id"]); ?>" onclick="return confirm('你真的确定删除吗？')">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
			<td colspan="8" align="center" valign="middle" class="borderright borderbottom bggray">
				共有 : <?php echo ($total); ?>条数据&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($no); ?>/<?php echo ($maxpage); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/CuteMi/index.php/Admin/Admin/index/no/1">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/CuteMi/index.php/Admin/Admin/index/no/<?php echo ($no-1); ?>">上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/CuteMi/index.php/Admin/Admin/index/no/<?php echo ($no+1); ?>">下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/CuteMi/index.php/Admin/Admin/index/no/<?php echo ($maxpage); ?>">尾页</a>
			</td>					
		</tr>
	</table>
	</td>
    </tr>
	</body>
</html>