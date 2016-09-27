<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>	
		<title>添加商品分类</title>
		<meta charset="utf-8" />
		<style type="text/css">
		    body{
               background:#f7f8f9;
		    }
		    #main-tab{
			 	border:1px solid #eaeaea; 
			 	background:#FFF;
			 	font-size:12px;
			 	}
			#main-tab td{
				 line-height:40px;
				}
			.borderright{ 
				border-right:1px solid #ebebeb
			}
			.borderbottom{ 
				border-bottom:1px solid #ebebeb
			}
			.borderleft{
			 	border-left:1px solid #ebebeb
			}
			.gray{ 
				color:#dbdbdb;
			}
			.bggray{ 
				background:#f9f9f9; 
				font-size:14px; 
				font-weight:bold; 
				padding:10px 10px 10px 0; 
				width:120px;
			}
			.main-for{ 
				background:#f9f9f9;
				padding:10px;
			}
			#search{ 
				font-size:20px; 
				background:#548fc9; 
				margin:0px 10px 0 0; 
				display:inline; 
				width:100%; 
				color:#FFF; 
				float:left
			}
			.main-for input.text-word{
				width:310px; 
				height:36px; 
				line-height:36px; 
				border:#ebebeb 1px solid; 
				background:#FFF; 
				font-family:"Microsoft YaHei","Tahoma","Arial",'宋体';
				 padding:0 10px;
				}
			.main-for select{ 
				width:310px;
				 height:36px;
				 line-height:36px; 
				 border:#ebebeb 1px solid; 
				 background:#FFF; 
				 font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; 
				 color:#666;
				}
			.main-for select{ 
				width:310px;
				 height:36px;
				 line-height:36px; 
				 border:#ebebeb 1px solid; 
				 background:#FFF; 
				 font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; 
				 color:#666;
				}			
			.main-for input.text-but{ 
				width:100px; 
				height:40px;
				line-height:30px;
				border: 1px solid #cdcdcd; 
				background:#e6e6e6; 
				font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; 
				color:#969696;
				margin:0 10px 0 0; 
				display:inline; 
				cursor:pointer; 
				font-size:14px; 
				font-weight:bold;
			}
		</style>
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab" align="center">
		<tr>
    		<td colspan="2" align="center" id="search">修改分类信息</td>
  		</tr>
		</table>
		<tr>
    	<td align="left" valign="top">
		<form action="/CuteMi/index.php/Admin/Type/domod" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab" align="center">
				<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
					<td width="20%" align="right" valign="middle" class="borderright borderbottom bggray">ID</td>
					<td align="left" valign="middle" class="borderright borderbottom main-for">
				       <input type="hidden" name="typeid" value="<?php echo ($data['typeid']); ?>"><span><?php echo ($data["typeid"]); ?></span>	
				    </td>
				<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
					<td width="20%" align="right" valign="middle" class="borderright borderbottom bggray">类别名称</td>
					<td align="left" valign="middle" class="borderright borderbottom main-for"><input type="text" name="tname" class="text-word" value="<?php echo ($data['tname']); ?>"></td>					
				</tr>
				<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
					<td width="20%" align="right" valign="middle" class="borderright borderbottom bggray"></td>
					<td align="left" valign="middle" class="borderright borderbottom main-for"><input type="submit" class="text-but" value="确认修改" /></td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
	</body>
</html>