<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>商品添加</title>
		<style type='text/css'>
		td{
		text-align:center;
		height:40px;
		}
		</style>
	</head>
	<body>
		<form action="/CuteMi/index.php/Admin/Goods/change" method="post">
			<table width='500'>
				
				<tr>
					<td>商品名字:</td>
					<td ><input  type="text" name='gname' value="<?php echo ($goods["gname"]); ?>"></td>
				</tr>
				<tr>
					<td>商品价格:</td>
					<td><input  type="text" name='price'  value="<?php echo ($goods["price"]); ?>"></td>
				</tr>
				<tr>
					<td>商品内存:</td>
					<td><input disabled=true type="text" name='storage'  value="<?php echo ($goods["storage"]); ?>"></td>
				</tr>
				<tr>
					<td>商品版本:</td>
					<td><input disabled=true type="text" name='verson'  value="<?php echo ($goods["verson"]); ?>"></td>
				</tr>
				<tr>
					<td>商品颜色:</td>
					<td><input disabled=true type="text" name='color'  value="<?php echo ($goods["color"]); ?>"></td>
				</tr>
				<tr>
					<td>商品库存:</td>
					<td><input type="text" name='store'  value="<?php echo ($goods["store"]); ?>"></td>
				</tr>
				
				
				<!-- <tr>
					<td>商品图片:</td>
					<td><input type="file" name='pic' value="<?php echo ($goods["pic"]); ?>"></td>
				</tr> -->
				<tr>
					<td colospan='2'><input type='submit' value='提交'></td>
					
				</tr>

			</table>
		</form>
	</body>


</html>